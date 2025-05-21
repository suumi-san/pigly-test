@extends('layouts.app')

@section('content')
<div class="dashboard-container">
    <!-- ヘッダ情報 -->
    <div class="dashboard-header">
        <div class="goal-box">
            <div>目標体重</div>
            <div class="goal-number">{{ number_format($targetWeight, 1) }}<span>kg</span></div>
        </div>
        <div class="goal-box">
            <div>目標まで</div>
            <div class="goal-number">{{ number_format($latestWeight - $targetWeight, 1) }}<span>kg</span></div>
        </div>
        <div class="goal-box">
            <div>最新体重</div>
            <div class="goal-number">{{ number_format($targetWeight, 1) }}<span>kg</span></div>
        </div>

    </div>

    <!-- 検索フォーム -->
    <form method="GET" action="{{ route('weight_logs.index') }}" class="search-form">
        <input type="date" name="from" value="{{ request('from') }}">
        <span>〜</span>
        <input type="date" name="to" value="{{ request('to') }}">
        <button type="submit" class="btn-search">検索</button>
    </form>

    <div class="search-result">
        @if(request('from') && request('to'))
        {{ request('from') }}〜{{ request('to') }}の検索結果　
        {{ count($weightLogs) }}件
        @endif
    </div>

    <!-- データ追加ボタン -->
    @php $url = route('weight_logs.modal_form'); @endphp
    <button onclick="openModal('{{ $url }}')" class="bg-gradient-to-r from-pink-400 to-purple-400 text-white px-4 py-2 rounded">
        データ追加
    </button>

    <!-- データ表示テーブル -->
    <table class="weight-log-table">
        <thead>
            <tr>
                <th>日付</th>
                <th>体重</th>
                <th>食事摂取カロリー</th>
                <th>運動時間</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($weightLogs as $log)
            <tr>
                <td>{{ $log->date->format('Y/m/d') }}</td>
                <td>{{ number_format($log->weight, 1) }}kg</td>
                <td>{{ $log->calories }}cal</td>
                <td>{{ $log->exercise_time }}</td>
                <td>
                    <a href="{{ route('weight_logs.edit', $log->id) }}" class="edit-icon">✏️</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection