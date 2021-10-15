<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'email' => ['required'],
            'is_admin' => ['required', 'bool'],
        ];
    }

    public function messages(): array
    {
        return [
            'required' => 'Заполните, пожалуйста, поле :attribute!'
        ];
    }

    public function attributes(): array
    {
        return  [
            'name' => 'имя пользователя',
            'email' => 'адрес email',
            'is_admin' => 'статус',
        ];
    }
}
