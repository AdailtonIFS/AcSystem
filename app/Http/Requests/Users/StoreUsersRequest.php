<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUsersRequest extends FormRequest
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
            'registration' => 'required|numeric|unique:users',
            'name'=>'required',
            'category_id' => 'required',
            'email' => 'required|string|unique:users,email',
            'status'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'registration.required' => 'Informe a matrícula do usuário.',
            'registration.numeric' => 'Os matrículas são representados por números.',
            'registration.unique' => 'Esse usuário já está cadastrado',
            'name.required' => 'Informe o nome do usuário.',
            'email.required' => 'Informe o email do usuário',
            'email.unique' => 'Esse email já está cadastrado',
            'category_id.required' => 'Informe a categoria do usuário.',
            'status.required' => 'Informe o status do usuário.'
        ];
    }
}
