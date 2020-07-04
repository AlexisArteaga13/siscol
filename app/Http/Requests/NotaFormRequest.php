<?php

namespace SisCol\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NotaFormRequest extends FormRequest
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
            'idnota'=> 'max=45',
            'cod_matricula'=> 'max:45',
            'CodCurso'=> 'max:10',
            'NotaPrimBim'=> 'max:10',
            'NotaSegunBim'=> 'max:10',
            'NotaTercerBim'=> 'max:10',
            'NotaCuartoBim'=> 'max:10',
            'NotaFinal'=> 'max:10',
            
        ];
    }
}
