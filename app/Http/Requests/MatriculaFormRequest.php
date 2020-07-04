<?php

namespace SisCol\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MatriculaFormRequest extends FormRequest
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
           /* 'cod_matricula'=> 'required|max:45',*/
            'cod_AñoEscolar'=> 'required|max:10',
            'detalles_matricula'=> 'max:200',
            'cod_sección'=>'max:10',
            'cod_grado' => 'max:10',
            'cod_nivel'=>'max:10',
            'cod_colegio'=>'max:10',
            'CodAlumno'=>'max:12',
            
        ];
    }
}
