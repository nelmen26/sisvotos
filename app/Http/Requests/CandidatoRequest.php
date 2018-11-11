<?php

namespace SIS\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CandidatoRequest extends FormRequest
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
        $rules = [
            'nombre' => 'required|min:3',
            'apellidos' => 'required|min:3',
            'tipo_id' => 'required|integer',
            'color' => 'required',
        ];
        if($this->get('foto'))
            $rules = array_merge($rules,['fotografia' => 'mimes:jpg,jpge,png']);
        return $rules;
    }
}
