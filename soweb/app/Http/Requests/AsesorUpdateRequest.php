<?php

namespace soweb\Http\Requests;

use soweb\Http\Requests\Request;

class AsesorUpdateRequest extends Request
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
          'nombre' => 'required',
          'iniciales' => 'required',
          'telefono'=>'min:8',
          'emailPersonal'=>'required|email',
          'emailEmpresa'=>'required|email',

        ];
    }
    
}
