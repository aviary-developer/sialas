<?php

namespace sialas\Http\Requests;

use sialas\Http\Requests\Request;

class ClientesRequest extends Request
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
             'nombre'=>'required ',
            'apellido'=>'required ', 
            'dui'=>'required | max:10',
            'nit'=>'required | max:17',
            'direccion'=>'required',
            'correo'=>'required',
            'telefono'=>'required | max:9',



        ];
    }
}
