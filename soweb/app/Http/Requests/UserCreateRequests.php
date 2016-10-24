<?php

namespace soweb\Http\Requests;

use soweb\Http\Requests\Request;

class UserCreateRequests extends Request
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
         'email' => 'required|unique:users',
         'tipoUser'=>'required',
         'password' => 'required|confirmed',
        ];
    }
}
