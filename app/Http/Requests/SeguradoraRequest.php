<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeguradoraRequest extends FormRequest
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
            'nome_seguradora' => 'required|unique:seguradoras|min:4',
            'endereco_seguradora' => 'required|min:10',
            'contacto_seguradora' => 'required|numeric|unique:seguradoras|min:8|',
            'email_seguradora' => 'required|email|unique:seguradoras|min:8',
            'tipo_seguro' => 'required'
        ];
    }
}
