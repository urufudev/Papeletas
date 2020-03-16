<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LeaveStoreRequest extends FormRequest
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
            'user_id' =>'required',
            'leavetype_id' =>'required',
            'fh_date'=>'required',
            'fh_from'=>'required',
            'fh_to'=>'required',
            'description'=>'required|max:120',

        ];
    }

    public function messages()
    {
    return [
        'fh_date.required' =>'ESCOJA LA FECHA',
        'fh_from.required' =>'ESCOJA LA HORA DE SALIDA',
        'fh_to.required' => 'ESCOJA LA HORA DE RETORNO',
        'description.required' => 'EL CAMPO "DESCRIPCIÓN" ES OBLIGATORIO',
        'description.max' =>'LA DESCRIPCIÓN NO PUEDE SER MAYOR :max CARACTERES.',
    ];
    }
}
