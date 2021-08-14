<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClienteRequest extends FormRequest
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
            'codigoCliente' => 'required|numeric',
            'cpfCliente' => 'cpf|nullable|numeric',
            'nomeCliente' => 'required',
            'bairroCliente' => 'required',
            'logradouroCliente' => 'required',
        ];
    }
 
    public function messages()
    {
        return [
            'codigoCliente.required' => 'O código do Cliente é Obrigatório!',
            'codigoCliente.unique' => 'O código do Cliente ja existe!',
            'codigoCliente.numeric' => 'Informe somente números!',
            'cpfCliente.cpf' => 'O CPF não é válido!',
            'cpfCliente.numeric' => 'Informe somente números!',
            'nomeCliente.required' => 'O campo Nome do Cliente é Obrigatório!',
            'bairroCliente.required' => 'O campo Bairro é Obrigatório!',
            'logradouroCliente.required' => 'O campo Logradouro é Obrigatório!',
        ];
    }
}
