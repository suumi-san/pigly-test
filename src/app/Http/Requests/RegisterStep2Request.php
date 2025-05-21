<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterStep2Request extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'current_weight' => ['required', 'numeric', 'max:9999.9', 'regex:/^\d{1,4}(\.\d)?$/'],
            'target_weight' => ['required', 'numeric', 'max:9999.9', 'regex:/^\d{1,4}(\.\d)?$/'],
        ];
    }

    public function messages(): array
    {
        return [
            'current_weight.required' => '現在の体重を入力してください',
            'current_weight.numeric' => '4桁までの数字で入力してください',
            'current_weight.regex' => '小数点は1桁で入力してください',

            'target_weight.required' => '目標の体重を入力してください',
            'target_weight.numeric' => '4桁までの数字で入力してください',
            'target_weight.regex' => '小数点は1桁で入力してください',
        ];
    }
}
