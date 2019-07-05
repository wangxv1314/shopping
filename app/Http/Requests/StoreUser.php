<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUser extends FormRequest
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
            'account'=>'required|unique:users|regex:/^[a-zA-Z]{1}[\w]{5,17}$/',
            'upass'=>'required|regex:/^[\w]{6,18}$/',
            'repass'=>'required|same:upass',
            'phone'=>'required|regex:/^[1]([3-9])[0-9]{9}$/',
            'email'=>'required|email',
        ];
    }

    public function messages()
    {
        return [
             'account.required'=>'账号必填',
            'account.regex'=>'账号格式错误',
            'account.unique'=>'账号已存在',
            'upass.required'=>'密码必填',
            'upass.regex'=>'密码格式错误',
            'repass.required'=>'确认密码必填',
            'repass.same'=>'两次密码不一致',
            'email.required'=>'邮箱必填',
            'email.email'=>'邮箱格式错误',
            'phone.required'=>'手机号必填',
            'phone.regex'=>'手机号格式不正确',
        ];
    }
}
