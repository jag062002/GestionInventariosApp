<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEntradaStockRequest extends FormRequest
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
            'producto' => 'required|exists:productos,id',
            'cantidad'     => 'required|integer|min:0',
        ];
    }

    public function messages()
    {
        return [
            'producto.required' => 'El producto es obligatorio.',
            'producto.exists'   => 'El producto seleccionado no es válido.',
            'cantidad.required'     => 'El stock es obligatorio.',
            'cantidad.integer'      => 'El stock debe ser un número entero.',
            'cantidad.min'          => 'El stock no puede ser negativo.',
        ];
    }
}
