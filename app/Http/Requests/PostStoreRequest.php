<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;


class PostStoreRequest extends FormRequest
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
                'matric_no' => 'required|integer',
                'name_key' => 'required|string'
            ];

    } 

    public function messages()
    {
     
            
            return [
                'matric_no.required' => "Matric Number is required!",
                'name_key.required' => "Name is required!"
            ];



    }
}
