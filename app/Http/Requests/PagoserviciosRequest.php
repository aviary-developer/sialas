<?php

namespace sialas\Http\Requests;

use sialas\Http\Requests\Request;

class PagoserviciosRequest extends Request
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
          'monto'=>'required',
          'detalle'=>'required',

          'factura'=>'required|min:3|max:9',

        ];
    }
    public function messages()
    {
        return [
            'monto.required' => 'El campo cantidad es obligatorio',
            'detalle.required' => 'El campo detalle es obligatorio',
            'factura.required' => 'El campo detalle es obligatorio',

        ];
    }
}
