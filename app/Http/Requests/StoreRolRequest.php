<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRolRequest extends FormRequest
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
            'nombre' => 'required|string|unique:rols,nombre',
            'permisos' => 'required|json'
        ];
    }

    public function messages()
    {
        return [
            'nombre.required'    => 'El nombre es obligatorio.',
            'nombre.unique'      => 'Este rol ya está registrado.',
            'permisos.required' => 'debe seleccionar al menos 1 permiso.',
            'permisos.json' => 'el campo permissions tiene el formato incorrecto.',
        ];
    }
}
