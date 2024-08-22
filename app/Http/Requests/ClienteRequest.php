<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ClienteRequest extends FormRequest
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
            'nombre' => 'required|min:3|max:50|string|regex:/^[a-zA-Z\s]+$/',
            'apellidos' => 'required|min:3|max:100|string|regex:/^[a-zA-Z\s]+$/',
            'correo' => [
                'required',
                'email',
                'max:100',
                Rule::unique('clientes','correo')->ignore($this->cliente),
            ],
            'telefono' => 'required|integer|digits_between:10,13',
            'direccion' => 'required|min:3|max:100',
            'sexo' => 'required|in:Masculino,Femenino'
        ];
    }

    public function messages(): array
    {
        return[
            'nombre.required' => 'El campo nombre es obligatorio.',
            'nombre.min' => 'El nombre debe tener al menos 3 caracteres.',
            'nombre.max' => 'El nombre no puede tener más de 50 caracteres.',
            'nombre.string' => 'El nombre debe ser una cadena de texto.',
            'nombre.regex' => 'El nombre solo puede contener letras y espacios.',

            'apellidos.required' => 'El campo apellidos es obligatorio.',
            'apellidos.min' => 'Los apellidos deben tener al menos 3 caracteres.',
            'apellidos.max' => 'Los apellidos no pueden tener más de 100 caracteres.',
            'apellidos.string' => 'Los apellidos deben ser una cadena de texto.',
            'apellidos.regex' => 'Los apellidos solo pueden contener letras y espacios.',

            'correo.required' => 'El campo correo electrónico es obligatorio.',
            'correo.email' => 'El correo electrónico debe ser una dirección válida.',
            'correo.max' => 'El correo electrónico no puede tener más de 100 caracteres.',
            'correo.unique' => 'El correo electrónico ya está registrado.',

            'telefono.required' => 'El campo teléfono es obligatorio.',
            'telefono.integer' => 'El teléfono debe ser un número entero.',
            'telefono.digits_between' => 'El teléfono debe tener entre 10 y 13 dígitos.',

            'direccion.required' => 'El campo dirección es obligatorio.',
            'direccion.min' => 'La dirección debe tener al menos 3 caracteres.',
            'direccion.max' => 'La dirección no puede tener más de 100 caracteres.',

            'sexo.required' => 'El campo sexo es obligatorio.',
            'sexo.in' => 'El sexo debe ser Masculino o Femenino.',
        ];
    }
}
