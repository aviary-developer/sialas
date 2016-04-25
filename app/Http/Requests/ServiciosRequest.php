<?php

namespace sialas\Http\Requests;

use sialas\Http\Requests\Request;

class ServiciosRequest extends Request
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
            'nombre'=>'required',
            'proveedor'=>'required',
            'n_recibo'=>'required',
        ];
    }
}
