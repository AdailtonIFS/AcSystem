<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LabsRequest extends FormRequest
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
        $id = $this->segment(2);
        return [
            'id'=>[
                'required',
                'numeric',
                'unique:laboratories,id,'. $id
            ],
            
            'description'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'id.required' => 'Informe o número do laboratório.',
            'id.numeric' => 'Os laboratórios são representados por números.',
            'id.unique' => 'Esse laboratório já está cadastrado',
            'description.required' => 'Informe a descrição do laboratório.'
        ];
    }
}
