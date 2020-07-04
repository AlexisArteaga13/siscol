<?php

namespace SisCol\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioFormRequest extends FormRequest
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

            'DNI' => 'required|max:8',
            'name' => 'required|max:120',
            'email' => 'required|max:120',
            'password' => 'required|max:120',
            'tipousu'=>'max:20',
            'colegioadmin'=>'varchar:100',

            //
        ];
    }
}
