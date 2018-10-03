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
            'nome_cliente'=>'required|min:3',
            'nome_consultor'=>'required|min:3',
            'tipo_cliente' =>'required',
            'endereco_cliente' => 'required|min:5',
            'contacto_cliente' => 'required|numeric|min:8',
            'email_cliente' => 'required|email|min:6',
            'data_inicio'=>'required|date|after_or_equal:today',
            'data_prevista_fim'=>'required|date|after:data_inicio',
            'tipo_prospecao'=>'required',
            'origem_prospecao'=>'required',
            'valor_estipulado_carteira' => 'required',
            'detalhes_prospecao'=>'required|min:6'
        ];
    }
}
