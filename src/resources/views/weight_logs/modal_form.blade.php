<h2 class="text-xl font-bold mb-4">Weight Logを追加</h2>

<form action="{{ route('weight_logs.store') }}" method="POST">
    @csrf

    <!-- 日付 -->
    <div class="mb-3">
        <label for="date" class="block text-sm font-medium text-gray-700">日付 <span class="text-red-500 text-xs">必須</span></label>
        <input type="date" name="date" id="date" value="{{ old('date') }}"
            class="mt-1 w-full border rounded px-3 py-2">
        @error('date')
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>

    <!-- 体重 -->
    <div class="mb-3">
        <label for="weight" class="block text-sm font-medium text-gray-700">体重 <span class="text-red-500 text-xs">必須</span></label>
        <input type="number" step="0.1" name="weight" id="weight" value="{{ old('weight') }}"
            class="mt-1 w-full border rounded px-3 py-2"> <span class="text-sm">kg</span>
        @error('weight')
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>

    <!-- 摂取カロリー -->
    <div class="mb-3">
        <label for="calories" class="block text-sm font-medium text-gray-700">摂取カロリー <span class="text-red-500 text-xs">必須</span></label>
        <input type="number" name="calories" id="calories" value="{{ old('calories') }}"
            class="mt-1 w-full border rounded px-3 py-2"> <span class="text-sm">cal</span>
        @error('calories')
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>

    <!-- 運動時間 -->
    <div class="mb-3">
        <label for="exercise_time" class="block text-sm font-medium text-gray-700">運動時間 <span class="text-red-500 text-xs">必須</span></label>
        <input type="time" name="exercise_time" id="exercise_time" value="{{ old('exercise_time') }}"
            class="mt-1 w-full border rounded px-3 py-2">
        @error('exercise_time')
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>

    <!-- 運動内容 -->
    <div class="mb-3">
        <label for="exercise_content" class="block text-sm font-medium text-gray-700">運動内容</label>
        <textarea name="exercise_content" id="exercise_content" rows="2"
            placeholder="運動内容を追加" class="mt-1 w-full border rounded px-3 py-2">{{ old('exercise_content') }}</textarea>
        @error('exercise_content')
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>

    <!-- ボタン -->
    <div class="flex justify-between mt-6">
        <button type="button" onclick="closeModal()"
            class="bg-gray-300 text-black px-4 py-2 rounded shadow">戻る</button>

        <button type="submit"
            class="bg-gradient-to-r from-pink-400 to-purple-400 text-white px-4 py-2 rounded shadow">
            登録
        </button>
    </div>
</form>