<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'phone' => ['required', 'digits:11'],
            'email' => ['required', 'email:rfc,dns'],
            'text' => ['required', 'min:10']
        ];
    }

    public function messages(): array
    {
        return [
            'required' => 'Введите :attribute!',
            'email' => 'Введите корректный email!',
            'integer' => 'Вводите только цифры (без +, - и пробелов)'
        ];
    }

    public function attributes(): array
    {
        return  [
            'name' => 'имя',
            'phone' => 'номер телефона',
            'email' => 'email',
            'text' => 'запрос'
        ];
    }
}
