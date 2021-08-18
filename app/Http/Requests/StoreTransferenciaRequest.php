<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTransferenciaRequest extends FormRequest
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
            'cpfPropAtual' => 'cpf|nullable',
            'dataDespachante' => 'required',
            'placaVeiculo' => 'required|max:7|min:7',
            'renavamVeiculo' => 'numeric|nullable',
            'valorVeiculo' => 'numeric|nullable',
        ];
    }

    public function messages(){
        return [
            'cpfPropAtual.cpf' => 'CPF invlálido!',
            'dataDespachante.required' => 'O campo Data Despachante é Obrigatório!',
            'placaVeiculo.required' => 'O campo Placa é obrigatório!',
            'placaVeiculo.max' => 'Placa Inválida!',
            'placaVeiculo.min' => 'Placa Inválida!',
            'renavamVeiculo.numeric' => 'Digite somente números!',
            'valorVeiculo.numeric' => 'Digite somente números!',
        ];
    }
}
