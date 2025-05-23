<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProductoRequest extends FormRequest
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
            'categoria' => 'required|exists:categorias,id',
            'proveedor' => 'required|exists:proveedors,id',
            'codigo' => [
                'required',
                'string',
                'max:50',
                Rule::unique('productos', 'codigo')->ignore(request()->route('producto')->id),
            ],
            'nombre' => 'required|string|max:100',
            'stock' => 'required|integer|min:0',
        ];
    }

    public function messages()
    {
        return [
            'categoria.required' => 'La categoría es obligatoria.',
            'categoria.exists'   => 'La categoría seleccionada no es válida.',
            'proveedor.required' => 'El proveedor es obligatorio.',
            'proveedor.exists'   => 'El proveedor seleccionado no es válido.',
            'codigo.required'    => 'El código es obligatorio.',
            'codigo.unique' => 'Ya existe un producto con ese código.',
            'codigo.max'         => 'El código no puede tener más de 50 caracteres.',
            'nombre.required'    => 'El nombre es obligatorio.',
            'nombre.max'         => 'El nombre no puede tener más de 100 caracteres.',
            'stock.required'     => 'El stock es obligatorio.',
            'stock.integer'      => 'El stock debe ser un número entero.',
            'stock.min'          => 'El stock no puede ser negativo.',
        ];
    }
}
