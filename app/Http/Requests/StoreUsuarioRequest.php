<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUsuarioRequest extends FormRequest
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
            'nomeAdministrador' => 'required',
            'cpfAdministrador' => 'required|cpf|unique:App\Administrador,cpfAdministrador',
        ];
    }

    public function messages()
    {
        return [
            'nomeAdministrador.required' => 'Nome do Usuário é obrigatório!',
            'cpfAdministrador.required' => 'CPF do Usuário é obrigatório!',
            'cpfAdministrador.cpf' => 'CPF inválido!',
            'cpfAdministrador.unique' => 'CPF já está cadastrado!',
        ];
    }
}
