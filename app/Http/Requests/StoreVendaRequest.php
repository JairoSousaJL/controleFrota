<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVendaRequest extends FormRequest
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
            'codigoVeiculo' => 'required',
            'codigoCliente' => 'required',
            'valorVenda' => 'required|numeric',
            'dataVenda' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'codigoVeiculo.required' => 'Informe ou cadastre o Veículo!',
            'codigoCliente.required' => 'Informe ou cadastre o Cliente!',
            'valorVenda.required' => 'Valor da Venda é Obrigatório!',
            'valorVenda.numeric' => 'Informe somente números!',
            'dataVenda.required' => 'Data da Venda é Obrigatória!',
        ];
    }
}
