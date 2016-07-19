<?php

namespace sialas\Http\Requests;

use sialas\Http\Requests\Request;

class MarcasRequest extends Request
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
            'nombre'=>'required|min:3',
        ];
    }
    public function messages()
    {
        return[
        'nombre.required'=>'El campo nombre es obligatorio',
        'nombre.min'=>'El campo nombre debe contener por lo menos 3 caracteres',
        ];
    }
}
