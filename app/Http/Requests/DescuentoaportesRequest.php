<?php

namespace sialas\Http\Requests;

use sialas\Http\Requests\Request;

class DescuentoaportesRequest extends Request
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
          'nombre'  =>  'required | min:3',
          'valor'   =>  'required | numeric',
          'techo'   =>  'numeric',
        ];
    }

    public function messages()
    {
        return [

            'nombre.min' => 'Nombre debe contener al menos 5 caracteres',

            'valor.required'  => 'El campo porcentaje es obligatorio',
            'valor.numeric' => 'Porcentaje debe ser numérico',

            'techo.numeric'=>'Techo debe ser numérico',
        ];
    }
}
