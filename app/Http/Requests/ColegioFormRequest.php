<?php

namespace SisCol\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ColegioFormRequest extends FormRequest
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
            /*'cod_colegio' => 'required|max:10',*/
            'Nombre_colegio' => 'required|max:200',
            'Dirección' => 'required|max:200',
            //
        ];
    }
}
