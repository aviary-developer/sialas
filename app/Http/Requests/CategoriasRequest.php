<?php

namespace sialas\Http\Requests;

use sialas\Http\Requests\Request;

class CategoriasRequest extends Request
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
            'nombre'=>'required | min:5',
        ];
    }
    public function messages()
    {
        return [
            'nombre.required' => 'El nombre de categorias es obligatorio',
            'nombre.min' => 'Nombre de categorias debe contener al menos 5 caracteres',
        ];
    }
}
