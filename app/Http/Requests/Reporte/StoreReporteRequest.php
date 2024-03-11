<?php

namespace App\Http\Requests\Reporte;

use Illuminate\Foundation\Http\FormRequest;

class StoreReporteRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'medidas'=>'required|array'
        ];
    }

    public function messages(): array
    {
        return [
            'medidas' => [
                'required' => 'Las medidas son obligatorias.',
                'array' => 'Las medidas deben ser un arreglo.'
            ]
        ];
    }
}
