<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGoods extends FormRequest
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
            'tname'=>'required',
            'desc'=>'required',
            'price'=>'required',
            'pic'=>'required',
            'num'=>'required',
            'cid'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'tname.required'=>'商品名称必填',
            'desc.required'=>'商品描述必填',
            'price.required'=>'商品价格必填',
            'pic.required'=>'商品图片必填',
            'num.required'=>'商品库存必填',
            'cid.required'=>'必填',
        ];
    }
}
