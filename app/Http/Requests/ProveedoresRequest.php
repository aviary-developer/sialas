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
            'nombre'=>'required | min:5 |max:30 | regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ]*)*)+$/',
            'contacto'=>'required | min:5 |max:30 | regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ]*)*)+$/',
            'nif'=>'required | max:9',
            'direccion'=>'required',
            'correo'=>'required|email|unique:proveedores',
            'telefono'=>'required | max:9',
        ];
    }
    public function messages()
    {
        return [
            'nombre.required' => 'El campo nombre es obligatorio',
            'nombre.min' => 'El nombre de la empresa debe contener al menos 5 caracteres',
            'nombre.max' => 'El nombre de la empresa debe contener maximo 30 caracteres',
            'nombre.regex' => 'El nombre posee solo letras',

            'contacto.required' => 'El nombre del contacto es obligatorio',
            'contacto.min' => 'El nombre del contacto debe contener al menos 5 caracteres',
            'contacto.max' => 'El nombre del contacto debe contener maximo 30 caracteres',
            'contacto.regex' => 'El nombre de contacto posee solo letras',

            'nif.required' => 'El campo nif es obligatorio',
            'nif.max' => 'El nif de la empresa debe contener maximo 9 caracteres',

            'direccion.required' => 'El campo direccion es obligatorio',

            'correo.required' => 'El campo correo de proveedor es obligatorio',
            'correo.email' => 'El correo no es valido',
            'correo.unique' => 'El correo ya existe',

            'telefono.required' => 'El campo telefono de cliente es obligatorio',
            'telefono.max' => 'El telefono de cliente debe contener maximo 9 caracteres',
            'telefono.regex' => 'No es formato de telefono',
            
        ];
    }
}
