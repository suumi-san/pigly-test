<DOCTYPE html>
    <html lang="ja">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Pigly</title>
        <link rel="stylesheet" href="{{ asset('css/style2.css') }}">
    </head>

    <body>

        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div>
                <h1>PiGLy</h1>
                <h2 class="text-2xl font-bold mb-4">新規会員登録</h2>
                <h3>STEP1：アカウント情報の登録</h3>
            </div>
            <!-- 名前 -->
            <div class="mb-4">
                <label for="name">お名前</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}">
                @error('name')
                <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <!-- メール -->
            <div class="mb-4">
                <label for="email">メールアドレス</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}">
                @error('email')
                <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <!-- パスワード -->
            <div class="mb-6">
                <label>パスワード</label>
                <input type="password" name="password" id="password">
                @error('password')
                <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <!-- 次に進むボタン -->
            <div>
                <button type="submit" class="btn">次に進む</button>
                <a href="{{ route('login') }}">ログインはこちら</a>
            </div>
        </form>

    </body>