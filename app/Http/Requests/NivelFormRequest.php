<?php

namespace SisCol\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NivelFormRequest extends FormRequest
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
            		
          /*'cod_nivel' => 'required | max:10 ',*/
            'nombre_nivel' => 'required | max:45',
            
            
        ];
    }
}