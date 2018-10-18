<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class addressedit extends FormRequest
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
            'address'=>'required',
            'address_phone'=>'required|regex:/\d{11}/',
            'name'=>'required',
            
        ];
    }

    public function messages(){
        return [
            'name.required'=>'收货人不能为空',
            'address_phone.required'=>'手机号码不能为空',
            'address_phone.regex'=>'请输入正确的手机号码',
            'address.required'=>'收货地址不能为空',

        ];
    }
}
