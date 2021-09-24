<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsCreateRequest extends FormRequest
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
            'category_id' => ['required', 'integer'],
            'title' => ['required', 'string', 'min:10', 'max:255'],
            'description' => ['required', 'min:10'],
            'author' => ['required', 'string', 'min:5', 'max:255'],
            'image'  => ['sometimes'],
            'source_id' => ['required', 'integer']
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
            'category_id' => 'категория',
            'title' => 'заголовок новости',
            'author' => 'автор',
            'description' => 'текст новости',
            'source_id' => 'источник'
        ];
    }
}
