<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
            'description'=>['required', 'string'],
            'location'=>['required', 'string'],
            'date'=>['required'],
            'hour'=>['required', 'string'],
            'tags'=>['required', 'string'],
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'El nombre no puede estar vacio',
            'description.required'=>'La descripcion no puede estar vacia',
            'location.required'=>'La localizacion no puede estar vacia',
            'date.required'=>'La fecha no puede estar vacia',
            'hour.required'=>'La hora no puede estar vacia',
            'tags.required'=>'Las etiquetas no pueden estar vacias',

        ];
    }
}
