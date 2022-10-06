<?php

namespace App\Http\Requests\Author;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'author'=> 'required|string|max:255',
            'description'=> 'required|string|max:255',
            'date_of_birth'=> 'required|date',
        ];
    }

    public function messages()
    {
        return [
            'author.required' => 'Это поле необходимо для заполнения',
            'author.string' => 'Данные должны соответствовать строчному типу',
            'description.required' => 'Это поле необходимо для заполнения',
            'description.string' => 'Данные должны соответствовать строчному типу',
            'date_of_birth.required' => 'Это поле необходимо для заполнения',
            'date_of_birth.date' => 'Данные должны соответствовать типу даты',
        ];
    }
}
