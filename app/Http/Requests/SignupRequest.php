<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class SignupRequest extends FormRequest
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
            'name'=>['required', 'string'],
            'email'=>['required', 'string', 'unique:users'],
            'password'=>['required', 'confirmed', Password::defaults()],
            'birthday'=>['required']
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'El nombre no puede estar vacio',
            'email.required'=>'El correo no puede estar vacio',
            'email.unique'=>'Este correo ya esta en uso',
            'password.required'=>'La contraseña no puede estar vacio',
            'password.confirmed'=>'Las contraseñas no coinciden',
            'birthday.required'=>'La fecha de nacimiento no puede estar en blanco',
        ];
    }
}
