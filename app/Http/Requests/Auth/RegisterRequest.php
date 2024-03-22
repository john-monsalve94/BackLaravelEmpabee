<?php

namespace App\Http\Requests\Auth;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;

class RegisterRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'primer_nombre' => 'required|string|max:45|min:5',
            'segundo_nombre' => 'string|max:45|min:5',
            'primer_apellido' => 'required|string|max:45|min:5',
            'segundo_apellido' => 'string|max:45|min:5',
            'genero' => 'required',
            'telefono' => 'required|string|max:13|min:10',
            'numero_identificacion' => 'required|string',
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'municipio_residencia_id' => ['required', 'exists:municipios,id'],
            'municipio_nacimiento_id' => ['required', 'exists:municipios,id'],
            'tipo_identificacions_id' => ['required', 'exists:tipo_identificacions,id']
        ];
    }
}
