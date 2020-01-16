<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProspecaoRequest extends FormRequest
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
            'user_id'=>'required',
            'nome_consultor'=>'required',
            'client_id' =>'required',
            'client_token' => 'required',
            'data_inicio'=>'required|date|after_or_equal:today',
            'data_prevista_fim'=>'required|date|after:data_inicio',
            'tipo_ramo'=>'required',
            'origem_prospecao'=>'required',
            'valor_estipulado_carteira' => 'required',
            'detalhes_prospecao'=>'required|min:6'
        ];
    }
}
