<h2 class="text-xl font-bold text-center mb-6">目標体重設定</h2>

<form action="{{ route('weight_targets.update') }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-4">
        <input type="number" step="0.1" name="target_weight" id="target_weight"
            value="{{ old('target_weight', $weightTarget->target_weight ?? '') }}"
            class="w-full border rounded px-4 py-2 text-center">
        <span class="text-sm">kg</span>
        @error('target_weight')
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="flex justify-between mt-6">
        <button type="button" onclick="closeModal()"
            class="bg-gray-300 text-black px-4 py-2 rounded shadow w-24">戻る</button>

        <button type="submit"
            class="bg-gradient-to-r from-pink-400 to-purple-400 text-white px-4 py-2 rounded shadow w-24">
            更新
        </button>
    </div>
</form>