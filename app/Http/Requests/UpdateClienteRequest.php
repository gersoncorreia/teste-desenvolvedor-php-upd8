<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClienteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
           /*  'name' => 'required|unique:clients',
            'cpf' => 'required|unique:clients',
            'address' => 'required', */
        ];
    }

    public function messages(): array
    {
        return [
           /*  'name.required' => 'Nome e obrigatório!',
            'cpf.required' => 'CPF obrigatório!',
            'address.required' => 'A description is required!',
            'name.unique' => 'Este nome já existe na sistemas!',
            'cpf.unique' => 'Este CPF já existe no sistema!', */
        ];
    }
}
