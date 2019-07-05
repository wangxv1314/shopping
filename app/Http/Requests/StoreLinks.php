<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLinks extends FormRequest
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
            //
            'lname'=>'required',
            'url'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'lname.required'=>'名称必填',
            'url.required'=>'地址必填',
        ];
    }
}
