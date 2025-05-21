<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\WeightTarget;
use App\Models\WeightLog;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\RegisterStep2Request;

class RegisterController extends Controller
{
    public function registerStep1(RegisterRequest $request)
    {
        // バリデーション済のデータ取得
        $validated = $request->validated();

        // ユーザー登録処理（Fortifyと連携 or 独自登録）
        // ...

        return redirect()->route('register.step2');
    }

    // Fortifyによるステップ1登録後の、ステップ2表示
    public function showStep2()
    {
        return view('auth.register_step2');
    }

    public function registerStep2(RegisterStep2Request $request)
    {
        $user = Auth::user();

        if (!$user) {
            $user = \App\Models\User::latest()->first(); // ※必要に応じて対応
            Auth::login($user);
        }

        WeightTarget::create([
            'user_id' => $user->id,
            'target_weight' => $request->target_weight,
        ]);

        WeightLog::create([
            'user_id' => $user->id,
            'date' => now()->toDateString(),
            'weight' => $request->current_weight,
        ]);

        return redirect('/weight_logs');
    }
}
