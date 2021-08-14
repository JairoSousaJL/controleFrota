<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVeiculoRequest extends FormRequest
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
            'crvVeiculo' => 'numeric|nullable',
            'renavanVeiculo' => 'numeric|nullable',
            'placaVeiculo' => 'required|max:7|min:7',
            'modeloVeiculo' => 'required',
            'anoFabVeiculo' => 'numeric|nullable',
            'anoModVeiculo' => 'numeric|nullable',
        ];
    }

    public function messages()
    {
        return [
            'crvVeiculo.numeric' => 'Digite somente números!',
            'renavanVeiculo.numeric' => 'Digite somente números!',
            'placaVeiculo.required' => 'O campo Placa é Obrigatório!',
            'placaVeiculo.max' => 'Placa inválida!',
            'placaVeiculo.min' => 'Placa inválida!',
            'modeloVeiculo.required' => 'O campo Modelo do Veículo é Obrigatório!',
            'anoFabVeiculo.numeric' => 'Digite somente números!',
            'anoModVeiculo.numeric' => 'Digite somente números!',
        ];
    }
}
