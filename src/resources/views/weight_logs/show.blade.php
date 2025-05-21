@extends('layouts.app')

@section('content')
<div class="dashboard-container">
    <h1>Weight Log</h1>
    <table class="weight-log-table">
        <form action="{{ route('weight_logs.update', $weightLog->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- 日付 -->
            <div>
                <label for="date"><strong>日付:</strong></label>
                <input type="date" id="date" name="date"
                    value="{{ old('date', optional($weightLog->date)->format('Y-m-d')) }}">
            </div>

            <!-- 体重 -->
            <div>
                <label for="weight"><strong>体重:</strong></label>
                <input type="number" step="0.1" name="weight" id="weight"
                    value="{{ old('weight', $weightLog->weight) }}"> kg
            </div>

            <!-- 摂取カロリー -->
            <div>
                <label for="calories"><strong>摂取カロリー:</strong></label>
                <input type="number" name="calories" id="calories"
                    value="{{ old('calories', $weightLog->calories) }}"> cal
            </div>

            <!-- 運動時間 -->
            <div>
                <label for="exercise_time"><strong>運動時間:</strong></label>
                <input type="time" name="exercise_time" id="exercise_time"
                    value="{{ old('exercise_time', $weightLog->exercise_time) }}">
            </div>

            <!-- 運動内容 -->
            <div>
                <label for="exercise_content"><strong>運動内容:</strong></label>
                <textarea name="exercise_content" id="exercise_content">{{ old('exercise_content', $weightLog->exercise_content) }}</textarea>
            </div>

            <!-- 操作 -->
            <div class="mt-4">
                <button type="submit">更新する</button>
            </div>
            <a href="{{ route('weight_logs.index') }}">戻る</a>
        </form>

        <form action="{{ route('weight_logs.destroy', $weightLog->id) }}" method="POST" class="mt-2">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('削除してもよろしいですか？')">削除</button>
        </form>
    </table>

</div>
@endsection