<?php

namespace SisCol\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContratoFormRequest extends FormRequest
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
            /*'CodContrato'=> 'required|max:45',*/
            'cod_colegio'=> 'required|max:10',
            'DNIDocente'=> 'required|max:8',
            'DetallesContrato'=> 'max:200',
           
            
        ];
    }
}
