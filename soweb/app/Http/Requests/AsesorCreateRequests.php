<?php

namespace soweb\Http\Requests;

use soweb\Http\Requests\Request;

class AsesorCreateRequests extends Request
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
           'name' => 'required',
            'iniciales' => 'required',
            'tipoAsesor'=>'required',
            'telefono'=>'min:8',
            'clave'=>'required|confirmed',
            'emailPersonal'=>'required|email',
            'emailEmpresa'=>'requiered|email|unique:asesores',
            'estado'=>'required',
        ];
    }
}
