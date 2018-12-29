<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FinishCheckout extends FormRequest
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
            'nome' => 'required|string',
            'email' => 'required|email',
            'cpf' => 'required|regex:/^[0-9]{3}\.[0-9]{3}\.[0-9]{3}\-[0-9]{2}/',
            'telefone' => 'required|string',
            'cep' => 'required|regex:/^[0-9]{5}\-[0-9]{3}/',
            'endereco' => 'required|string',
            'cidade' => 'required|string',
            'estado' => 'required|string|max:2',
            'password' => 'nullable|min:6',
            'numero' => 'required|integer',
            'complemento' => 'nullable|string',
            'observacao' => 'nullable|string',
        ];
    }
}
