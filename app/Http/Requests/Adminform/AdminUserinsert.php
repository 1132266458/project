<?php

namespace App\Http\Requests\Adminform;

use Illuminate\Foundation\Http\FormRequest;

class AdminUserinsert extends FormRequest
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
            'admin_name'=>'required',
        ];
    }

    public function messages(){
        return [
            'admin_name.required'=>'账号不能为空',
        ];
        
    }
}
