<?php

namespace App\Http\Controllers;

use App\Models\WeightTarget;
use Illuminate\Http\Request;

class GoalSettingController extends Controller
{
    public function edit()
    {
        $target = WeightTarget::where('user_id', auth()->id())->first();

        dd($target);

        return view('weight_logs.goal_setting', ['weightTarget' => $target]);
    }

    public function update(Request $request)
    {
        // バリデーション＆保存
    }
}
