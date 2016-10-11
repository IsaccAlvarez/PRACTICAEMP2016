<?php

namespace soweb\Http\Requests;

use soweb\Http\Requests\Request;

class SolicitudUpdateRequest extends Request
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
          'idContacto'=>'required',
          'tituloSolicitud'=>'required',
          'idAsesor'=>'required',
          'descripcion'=>'required',
          'fecha'=>'required',
        ];
    }
    public function messages()
    {
      return [
        'idContacto'=>'El Campo Contacto es Obligatorio',
        'titulo'=>'El Campo Titulo Solicitud es Obligatorio',
        'idAsesor'=>'El Campo Asignado A es Obligatorio',
        'descripcion'=>'El campo Descripcion es Obligatorio',
        'fecha'=>'El campo Fecha es Obligatorio',
      ];

    }
}
