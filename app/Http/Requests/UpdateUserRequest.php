<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'email' => ['required', 'string'],
            'is_admin' => ['sometimes'],
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
            'name' => '"Имя"',
            'email' => '"Email"',
        ];
    }
}
