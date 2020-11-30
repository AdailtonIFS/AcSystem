<?php

namespace App\Http\Requests\Occurrences;

use Illuminate\Foundation\Http\FormRequest;

class StoreOccurrenceRequest extends FormRequest
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
            'laboratory_id' => 'required',
            'date' => 'nullable',
            'hour' => 'nullable',
            'occurrence' => 'required',
            'observation' => 'nullable',
        ];
    }

    public function messages()
    {
        return[
            'laboratory_id.required' => 'Informe o laboratório',
            'occourrence.required' => 'Informe a ocorrência',
        ];
    }
}
