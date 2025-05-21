<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WeightLog;

class WeightLogController extends Controller
{
    public function index()
    {
        $weightLogs = WeightLog::where('user_id', auth()->id())->get();
        $userId = auth()->id();
        $targetWeight = \App\Models\WeightTarget::where('user_id', $userId)->value('target_weight');
        $latestWeight = WeightLog::where('user_id', $userId)
            ->orderBy('date', 'desc')
            ->value('weight');

        return view('weight_logs.index', compact('weightLogs', 'targetWeight', 'latestWeight'));
    }

    public function create()
    {
        return view('weight_logs.form');
    }

    public function store(Request $request)
    {
        // 保存処理
    }

    public function show(WeightLog $weightLog)
    {
        return view('weight_logs.show', compact('weightLog'));
    }

    public function edit(WeightLog $weightLog)
    {
        return view('weight_logs.show', compact('weightLog'));
    }

    public function update(Request $request, WeightLog $weightLog)
    {
        $request->validate([
            'date' => 'required|date',
            'weight' => 'required|numeric|between:0,999.9',
            'calories' => 'nullable|integer',
            'exercise_time' => 'nullable',
            'exercise_content' => 'nullable|string|max:120',
        ]);

        $weightLog->update($request->all());

        return redirect()->route('weight_logs.index')->with('message', '更新しました');
    }

    public function destroy(WeightLog $weightLog)
    {
        $weightLog->delete();
        return redirect()->route('weight_logs.index');
    }
}
