<?php

namespace sialas\Http\Requests;

use sialas\Http\Requests\Request;

class ProveedoresRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nombre'=>'required ',
            'contacto'=>'required',
            'nif'=>'required | max:9',
            'direccion'=>'required',
            'correo'=>'required',
            'telefono'=>'required | max:9'
        ];
    }
}
