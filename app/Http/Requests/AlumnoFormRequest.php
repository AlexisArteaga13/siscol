<?php

namespace SisCol\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlumnoFormRequest extends FormRequest
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
    public function rules(){
        return [	
            'CodAlumno'=> 'required|size:8',
            'NombreAlumno'=> 'required|max:200',
            'ApellidoAlumno'=> 'required|max:200',
            'TelefonoHogarAlumno'=> 'max:9',
            'CorreoAlumno'=> 'max:60',
            'DireccionAlumno'=> 'max:200',
            
        ];
    }
}
