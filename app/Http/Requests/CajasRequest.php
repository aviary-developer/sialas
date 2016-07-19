<?php

namespace sialas\Http\Requests;

use sialas\Http\Requests\Request;

class CajasRequest extends Request
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
        return [
            'nombre'=>'required | min:5',
            'ubicacion'=>'required | min:4',
        ];
    }
    public function messages()
    {
        return [
            'nombre.required' => 'El nombre de caja es obligatorio',
            'nombre.min' => 'Nombre de caja debe contener al menos 5 caracteres',

            'ubicacion.required' => 'El campo ubicacion es obligatorio',
            'ubicacion.min' => 'Ubicacion debe contener al menos 4 caracteres',
        ];
    }
}
