<?php

namespace sialas\Http\Requests;

use sialas\Http\Requests\Request;

class BancomobiliariosRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return ture;
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
        'cantidad'=>'required | min:1'
        'detalle'=>'required | min:6',
        'cheque'=>'required | min:6 | max:6',
        ];
    }
    public function messages()
    {
        return [
            'cantidad.required' => 'El campo cantidad es obligatorio',
            'cantidad.min' => 'El campo cantidad debe contener al menos 1 caracter',

            'detalle.required' => 'El campo detalle es obligatorio',
            'detalle.min' => 'El campo detalle debe contener 6 caracteres',

            'cheque.required'  => 'El campo cheque es obligatorio',
            'cheque.min' => 'El campo cheque debe contener 6 carácteres',
        ];
    }
}
