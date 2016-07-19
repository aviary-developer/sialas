<?php

namespace sialas\Http\Requests;

use sialas\Http\Requests\Request;

class BancosRequest extends Request
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
            'numero'=>'required | min:10 | max:10',
            'representante'=>'required | min:3',
        ];
    }
    public function messages()
    {
        return [
            'nombre.required' => 'El nombre del banco es obligatorio',
            'nombre.min' => 'Nombre de banco debe contener al menos 5 caracteres',

            'numero.required' => 'El número de cheque es obligatorio',
            'numero.min' => 'Número de cheque debe contener 10 caracteres',

            'representante.required'  => 'El campo de representante es obligatorio',
            'representante.min' => 'Nombre de representante debe contener al menos 3 carácteres',
        ];
    }
}
