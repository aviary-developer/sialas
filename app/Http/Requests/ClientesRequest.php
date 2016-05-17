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
            'nombre'=>'required|min:3 |max:30 ',
            'apellido'=>'required|min:3 | max:30', 
            'dui'=>'required | max:10',
            'nit'=>'required | max:17',
            'direccion'=>'required',
            'correo'=>'required|email|unique:clientes',
            'telefono'=>'required | max:9',


        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El campo nombre de cliente es obligatorio',
            'nombre.min' => 'El nombre de cliente debe contener al menos 3 caracteres',
            'nombre.max' => 'El nombre de cliente debe contener maximo 30 caracteres',

            'apellido.required' => 'El campo apellido de cliente es obligatorio',
            'apellido.min' => 'El apellido de cliente debe contener al menos 3 caracteres',
            'apellido.max' => 'El apellido de cliente debe contener maximo 30 caracteres',

            'dui.required' => 'El campo dui es obligatorio',
            'dui.max' => 'El dui debe contener 10 caracteres',

            'nit.required' => 'El campo nit de cliente es obligatorio',
            'nit.max' => 'El nit de cliente debe contener 17 caracteres',

            'direccion.required' => 'El campo direccion de cliente es obligatorio',

            
        ];
    }
}
