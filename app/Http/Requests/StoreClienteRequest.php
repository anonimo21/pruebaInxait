<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClienteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'nombres' => 'required|regex:/^[\pL\s\-]+$/u',
            'apellidos' => 'required|regex:/^[\pL\s\-]+$/u',
            'cedula' => 'required|numeric',
            'departamento_id' => 'required',
            'ciudad_id' => 'required',
            'celular' => 'required|numeric|digits:10',
            'correo' => 'required|email|unique:clientes',
            'terminos' => 'required'
        ];
        return $rules;
    }
}
