<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaudeRequest extends FormRequest
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
        'nome_seguradora'=>'required',
        'plano'=>'required|string|min:3|max:100',
        'numero_membro'=>'required|string|min:3|max:100|unique:saudes,numero_membro',
        'tipo_membro'=>'required|string|min:3|max:100',
        'periodicidade_pagamento'=>'required|string',
        'data_inicio'=>'required|date',
        'data_proximo_pagamento'=>'required|date',
        'premio_total'=>'required|numeric|min:1',
        'premio_simples'=>'required|numeric|min:1',
        'taxa_corretagem'=>'required|regex:/^\d*\.?\d*$/',
        'comissao'=>'required|regex:/^\d*\.?\d*$/|min:1',
        'consultor'=>'required|string',
        'nome_grupo'=>'nullable|string',
        'menbro_principal'=>'required_if:tipo_membro,Spouse|required_if:tipo_membro,Child|string',
        'detalhes_item_segurado'=>'nullable|string',
        'user_id'=>'required',
        'client_id' =>'required',
        'client_token' => 'required',
        'file.*' => 'required|mimes:jpeg,png,pdf,doc,docx|max:5000',
        'filetype.*' => 'required',
        ];
    }
}
