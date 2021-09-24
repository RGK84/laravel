<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryCreateRequest extends FormRequest
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
            'title' => ['required', 'string', 'min:5', 'max:255'],
            'description' => ['sometimes']
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
            'title' => 'название рубрики',
            'description' => 'описание рубрики'
        ];
    }
}
