<?php

namespace sialas\Http\Requests;

use sialas\Http\Requests\Request;

class MobiliariosRequest extends Request
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
            'codigo'=>'required'
            'nombre'=>'required | min:5',
            'precio'=>'required',
            'descripcion'=>'required|min:5',
        ];
    }
    public function messages()
    {
        return [
            'codigo.required'=>'El campo codigo es obligatorio',

            'nombre.required' => 'El nombre es obligatorio',
            'nombre.min' => 'Nombre nombre debe contener al menos 5 caracteres',

            'precio.required' => 'El campo precio es obligatorio',

            'descripcion.required' => 'El campo descripcion es obligatorio',
            'descripcion.min'=>'El campo descripcion debe contener al menos 5 caracteres',
        ];
    }
}
