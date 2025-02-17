<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MessagesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'=>['required', 'string', 'max:30'],
            'subject'=>['required', 'string', 'max:100'],
            'text'=>['required'],
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'El nombre no puede estar vacio',
            'name.max'=>'El nombre es demasiado largo',
            'subject.required'=>'El tema del mensaje no puede estar vacio',
            'subject.max'=>'El tema del mensaje es demasiado largo',
            'text.required'=>'El mensaje no puede estar vacio',
        ];
    }
}
