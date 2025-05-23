<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProveedorRequest extends FormRequest
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
            'nombre' => [
                'required',
                'string',
                Rule::unique('proveedors', 'nombre')->ignore(request()->route('proveedor')->id),
            ],
        ];
    }
    public function messages()
    {
        return [
            'nombre.required'    => 'El nombre es obligatorio.',
            'nombre.unique'      => 'Este proveedor ya está registrado.'
        ];
    }
}
