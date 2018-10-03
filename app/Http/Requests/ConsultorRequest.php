<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConsultorRequest extends FormRequest
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
            'nome_consultor' => 'required|min:8',
            // 'email_consultor' => 'required|email|regex:/(.*)@almond\.co\.mz/i|unique:consultors|min:20',
            'telefone_consultor' => 'required|numeric|min:9'
          
       
        ];
       
    }
}
