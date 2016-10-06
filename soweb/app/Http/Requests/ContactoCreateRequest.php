<?php

namespace soweb\Http\Requests;

use soweb\Http\Requests\Request;

class ContactoCreateRequest extends Request
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
            'telefono'=>'required|min:8',
            'email'=>'required|email',
            'direccion'=>'required',
            'emailCobro'=>'email',
        ];
    }
}
