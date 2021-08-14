<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSaidaRequest extends FormRequest
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
            'valorSaida' => 'required|numeric',
            'dataSaida' => 'required',
            'descricaoSaida' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'valorSaida.required' => 'O Valor da Saída é Obrigatório!',
            'valorSaida.numeric' => 'Informe somente números!',
            'dataSaida.required' => 'A data da Saída é Obrigatória!',
            'descricaoSaida.required' => 'A descrição da Saída é Obrigatória!',
        ];
    }
}
