<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
                'unique:categories,id,'. $id
            ],

            'description' => 'required',
        ];
    }

    public function messages(){

        return[
            'id.required' => 'Informe o número da categoria.',
            'id.numeric' => 'As categorias são representadas por números.',
            'id.unique' => 'Essa categoria já está cadastrada.',
            'description.required' => 'Informe a descrição da categoria.'
        ];

    }

}
