<?php

namespace sialas\Http\Requests;

use sialas\Http\Requests\Request;

class UsersRequest extends Request
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
            //
            'name'=>'required',
            'email'=>'required',
            'password'=>'required | confirmed',
            'nom_usuario'=>'required',
            'salario'=>'required',
            'fecha_de_nacimiento'=>'required',
            'telefono'=>'required',
            'fecha_inicio'=>'required',
            'direccion'=>'required',
            'tipo'=>'required',

        ];
    }
}