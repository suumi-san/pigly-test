<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pigly</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    @yield('css')
</head>

<body>

    <header class="bg-gray-800 text-white p-4">
        <h1 class="text-2xl font-bold">Pigly</h1>

        @php $goalUrl = route('weight_targets.modal'); @endphp
        <button onclick="openModal('{{ $goalUrl }}')" class="bg-gradient-to-r from-gray-300 to-pink-300 px-4 py-2 rounded">
            目標体重設定
        </button>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">
                ログアウト
            </button>
        </form>
    </header>
    <main>
        @yield('content')
    </main>
</body>
<script>
    function openModal(url) {
        fetch(url)
            .then(res => res.text())
            .then(html => {
                document.getElementById('modal-content').innerHTML = html;
                document.getElementById('modal').classList.remove('hidden');
            });
    }

    function closeModal() {
        document.getElementById('modal').classList.add('hidden');
        document.getElementById('modal-content').innerHTML = '';
    }
</script>


</html>