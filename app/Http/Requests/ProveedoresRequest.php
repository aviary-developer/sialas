<?php

namespace sialas\Http\Requests;

use sialas\Http\Requests\Request;

class ProveedoresRequest extends Request
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
            'nombre'=>'required ',
            'contacto'=>'required',
            'nif'=>'required | max:9',
            'direccion'=>'required',
            'correo'=>'required|email|unique:proveedores',
            'telefono'=>'required | max:9',
        ];
    }
    public function messages()
    {
        return [
            'nombre.required' => 'El campo tipo de servicio es obligatorio',
            'nombre.min' => 'Tipo de servicio debe contener al menos 3 caracteres',

            'proveedor.min' => 'Proveedor debe contener al menos 4 caracteres',

            'n_recibo.required'  => 'El campo número de factura es obligatorio',
            'n_recibo.min' => 'Número de factura debe contener al menos 6 caracteres',
        ];
    }
}
