<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pigly</title>
    <link rel="stylesheet" href="{{ asset('css/style2.css') }}">
</head>

<body>
    <form method="POST" action="{{ route('register.step2.post') }}">
        @csrf
        <div>
            <h1>PiGLy</h1>
            <h2 class="text-2xl font-bold mb-4">新規会員登録</h2>
            <h3>STEP2：体重データの入力</h3>
        </div>
        <div>
            <label for="current_weight">現在の体重（kg）</label>
            <input type="text" name="current_weight" id="current_weight" value="{{ old('current_weight') }}">
            @error('current_weight')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="target_weight">目標の体重（kg）</label>
            <input type="text" name="target_weight" id="target_weight" cvalue="{{ old('target_weight') }}">
            @error('target_weight')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <button class="btn" type="submit">アカウント作成</button>
    </form>
</body>