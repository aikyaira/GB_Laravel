<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreParcerRequest extends FormRequest
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
            'url' => ['required', 'string'],
            'category_id' => ['required', 'numeric'],
            'author'=>['required', 'string'],
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
            'url' => '"URL ресурса"',
            'category_id' => '"Целевая категория парсинга"',
            'author'=>'"Автор"'
        ];
    }
}
