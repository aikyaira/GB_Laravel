<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactRequest extends FormRequest
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
            'name' => ['required', 'string'],
            'phone' => ['required', 'int'],
            'text' => ['required', 'string'],
            'email' => ['sometimes']

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
            'name' => '"ФИО"',
            'phone' => '"Телефон"',
            'text' => '"Сообщение"'
        ];
    }
}