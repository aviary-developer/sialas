<?php

namespace sialas\Http\Requests;

use sialas\Http\Requests\Request;

class BancoserviciosRequest extends Request
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

          'cantidad'=>'required',
          'detalle'=>'required',
          'cheque'=>'required|min:5|max:9',
          'telefono'=>'required | max:9',

        ];
    }
    public function messages()
    {
        return [
            'cantidad.required' => 'El campo cantidad es obligatorio',
            'detalle.required' => 'El campo detalle es obligatorio',
            'cheque.min' => 'El nombre de la empresa debe contener al menos 5 caracteres',
            'cheque.max' => 'El nombre de la empresa debe contener maximo 9 caracteres',



        ];
    }
}
