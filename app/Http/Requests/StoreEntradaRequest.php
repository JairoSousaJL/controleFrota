<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEntradaRequest extends FormRequest
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
            'valorEntrada' => 'required|numeric',
            'dataEntrada' => 'required',
            'descricaoEntrada' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'valorEntrada.required' => 'O Valor da Entrada é Obrigatório!',
            'valorEntrada.numeric' => 'Informe somente números!',
            'dataEntrada.required' => 'A data da Entrada é Obrigatória!',
            'descricaoEntrada.required' => 'A descrição da Entrada é Obrigatória!',
        ];
    }
}
