<?php

namespace sialas\Http\Requests;

use sialas\Http\Requests\Request;

class PagocomprasRequest extends Request
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
            'recibo'=>'required | unique:pagocompras',
            'cheque'=>'required | min:8 | max:8',
            'detalle'=>'required | min:5',
        ];
    }
    public function messages()
    {
        return [
            'recibo.required' => 'El campo recibo es obligatorio',
            'recibo.unique'=>'El recibo ya existe!',

            'cheque.required' => 'El campo cheque es obligatorio',
            'recibo.min' => 'El campo recibo debe contener 8 caracteres',

            'detalle.required'=>'El campo detalle es obligatorio',
            'detalle.min'=>'El campo detalle debe contener al menos 5 caracteres'
        ];
    }
}
