<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'name' => 'required',
            'category_id' => 'required',
            'email' => 'required|unique:users,email',
            'status' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Informa o nome do usuário',
            'category_id.required' => 'Informe a categoria do usuário',
            'email.required' => 'Informe o email do usuário',
            'email.unique' => 'Esse email já está cadastrado',
            'status.required' => 'Informe o status do usuário',
        ];
    }
}
