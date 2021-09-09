<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreNewsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['required', 'string'],
            'author' => ['required', 'string'],
            'description' => ['required', 'string'],
            'image' => ['sometimes'],
            'status' => ['sometimes'],
            'category_id' => ['required', 'numeric'],
            'updated_at' => now('GMT+3')
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Пожалуйста, заполните поле :attribute'
        ];
    }

    public function attributes()
    {
        return [
            'title' => '"Название"',
            'author' => '"Автор"',
            'category_id' => '"Категория"',
            'description' => '"Текст новости"'
        ];
    }
}
