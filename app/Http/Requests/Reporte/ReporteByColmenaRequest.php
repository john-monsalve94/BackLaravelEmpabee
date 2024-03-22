<?php

namespace App\Http\Requests\Reporte;

use Illuminate\Foundation\Http\FormRequest;

class ReporteByColmenaRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'colmena_id' => 'required|int|exists:colmenas,id'
        ];
    }

    public function messages(): array
    {
        return [
            'colmena_id' => [
                'required' => 'Por favor ingrese el id de la colmena',
                'int' => 'El id de la colmena debe ser de tipo entero (int)',
                'exists'=>'La colmena que buscas no existe'
            ]
        ];
    }
}
