<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'password' => 'nullable|confirmed|min:6|max:20',
            'head' => 'mimes:jpeg,png,gif|dimensions:min_width=200,min_height=200',
        ];
    }

    public function messages()
    {
        return [
            'real_name.required' => '姓名 不能为空',
            'real_name.max' => '姓名 不能多于10个字符',
            'real_name.regex' => '姓名 的格式不正确',
            'head.mimes' => '头像文件 的格式不正确',
            'head.dimensions' => '头像图片 的大小过小',
        ];
    }
}
