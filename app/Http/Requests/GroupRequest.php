<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GroupRequest extends FormRequest
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
            'name' => 'required|between:3,20|regex:/^[\x{4e00}-\x{9fa5}\w]+$/u',
            'commit' => 'nullable|between:3,20',
        ];
    }

    public function messages(){
        return [
            'name.required' => '组名不能为空',
            'name.between' => '组名必须介于3~20个字符之间',
            'name.regex' => '组名只支持数字、字母、下划线、横杆以及中文',
            'commit.between' => '描述必须介于3~50个字符之间',
        ];
    }
}
