<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Goodsinsert extends FormRequest
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
            'goods_pic'=>'required',
            'goods_num'=>'required',
            'goods_price'=>'required|regex:/\d/',
            'goods_name'=>'required',
            
        ];
    }

    public function messages(){
        return [
            'goods_pic.required'=>'商品图片不为空',
            'goods_num.required'=>'商品数量不为空',
            'goods_price.required'=>'商品价格不为空',
            'goods_price.regex'=>'商品名称格式不对',
            'goods_name.required'=>'商品名称不为空',
            
            
            
            

        ];
    }
}
