<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'registration' => [
                'required',
                'numeric'
            ],
            'password' => 'required'
            
        ];
    }
    
    public function messages(){

        return[
            'registration.required' => 'Informe a matrícula.',
            'registration.numeric' => 'As matículas são representadas por números.',
            'password.required' => 'Informe a senha.'
        ];

    }
}
