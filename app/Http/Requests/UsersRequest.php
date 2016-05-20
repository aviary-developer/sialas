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
            'name'=>'required | min:5',
            'email'=>'required | email',
            'password'=>'required | confirmed',
            'nom_usuario'=>'required | min:10',
            'salario'=>'required',
            'fecha_de_nacimiento'=>'required',
            'telefono'=>'required',
            'fecha_inicio'=>'required',
            'direccion'=>'required | min:10',
            'tipo'=>'required',
            'codigo'=>'required | min:4',

        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El campo nombre es obligatorio.',
            'name.min' => 'Nombre debe contener al menos 5 caracteres.',

            'email.required'=>'El campo correo electrónico es obligatorio.',
            'email.email'=>'No es un correo electrónico válido.',

            'password.required'=>'El campo contraseña es obligatorio.',
            'password.confirmed'=>'La confirmación de contraseña no coincide.',

            'nom_usuario.required' => 'El campo nombre de usuario es obligatorio.',
            'nom_usuario.min'=>'Nombre de usuario debe contener al menos 10 caracteres.',

            'telefono.required'=>'El campo teléfono es obligatorio.',

            'fecha_inicio.required'=>'El campo fecha de inicio es obligatorio.',

            'direccion.required'=>'El campo dirección es obligatorio.',
            'direccion.min' => 'Dirección debe contener al menos 5 caracteres.',

            'codigo.required'=>'El campo código es obligatorio.',
        ];
    }
}