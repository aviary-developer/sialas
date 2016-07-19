<?php

namespace sialas\Http\Requests;

use sialas\Http\Requests\Request;

class ComprasRequest extends Request
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
            'factura'=>'required | min:5 | unique:compras',
        ];
    }
    public function messages()
    {
        return [
            'factura.required' => 'El campo de factura es obligatorio',
            'factura.unique' => 'Factura ya existe!',];
    }
}
