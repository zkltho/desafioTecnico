<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioRequest extends FormRequest
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
			'first_name' => 'required|string',
			'last_name' => 'required|string',
			'age' => 'required|integer|min:0',
			'gender' => 'required|string',
			'email' => 'required|email',
			'country' => 'required|string',
			'city' => 'required|string',
			'picture_large' => 'required|url',
        ];
    }
    public function messages()
    {
        return [
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'El correo electrónico debe ser una dirección de correo válida.',
            'first_name.required' => 'El nombre es obligatorio.',
            'last_name.required' => 'El apellido es obligatorio.',
            'age.required' => 'La edad es obligatorio.',
            'age.integer' => 'La edad debe ser un número.',
            'age.min' => 'La edad debe ser mayor a 0.',            
            'gender.required' => 'El genero es obligatorio.',
            'country.required' => 'El país es obligatorio.',
            'city.required' => 'La ciudad es obligatoria.',
            'picture_large.required' => 'La imagen es obligatoria.',
            'picture_large.url' => 'La imagen debe contener un URL válido.'
        ];
    }
}
