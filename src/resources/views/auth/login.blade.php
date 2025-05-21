<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pigly</title>
    <link rel="stylesheet" href="{{ asset('css/style2.css') }}">
</head>

<body>
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div>
            <h1>PiGLy</h1>
            <h2>ログイン</h2>
        </div>
        <!-- メール -->
        <div>
            <label for="email">メールアドレス</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}">
            @error('email')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <!-- パスワード -->
        <div class="mb-6">
            <label for="password">パスワード</label>
            <input type="password" name="password" id="password">
            @error('password')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <!-- ボタンエリア -->
        <div>
            <button type="submit" class="btn">ログイン</button>
            <a href="{{ route('register') }}">アカウント作成はこちら</a>
        </div>
    </form>
</body>