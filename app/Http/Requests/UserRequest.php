<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'real_name' => 'required|max:10|regex:/^[\x{4e00}-\x{9fa5}\w]+$/u',
            'name' => 'required|min:3|max:20|unique:users|regex:/^[\x{4e00}-\x{9fa5}\w]+$/u',
            'email' => 'required|email|unique:users|max:50',
            'password' => 'required|confirmed|min:6|max:20',
        ];
    }

    public function messages()
    {
        return [
            'real_name.required' => '姓名 不能为空',
            'real_name.max' => '姓名 不能多于10个字符',
            'real_name.regex' => '姓名 的格式不正确',
        ];
    }
}
