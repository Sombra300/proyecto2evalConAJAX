<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlayerRequest extends FormRequest
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
            'twitter'=>['required', 'string'],
            'instagram'=>['required', 'string'],
            'twitch'=>['required', 'string'],
            'avatar'=>['string'],
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'El nombre no puede estar vacio',
            'name.max'=>'El nombre es demasiado largo',
            'twiter.required'=>'La cuenta de twitter no puede estar vacio',
            'instagram.required'=>'La cuenta de instagram no puede estar vacio',
            'twitch.required'=>'La cuenta de twitch no puede estar vacio',
        ];
    }
}
