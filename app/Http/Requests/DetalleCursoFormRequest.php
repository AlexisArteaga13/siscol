<?php

namespace SisCol\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DetalleCursoFormRequest extends FormRequest
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
            'CodCurso'=> 'required|max:10',
            'cod_grado' => 'max:10',
            'cod_nivel'=>'max:10',
            'cod_colegio'=>'max:10',
            
        ];
    }
}
