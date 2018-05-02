<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LogRequest extends FormRequest
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
            'title' => 'nullable|min:2',
            'content' => 'required|min:3'
        ];
    }

     public function messages()
    {
        return [
            'title.min' => '标题必须至少两个字符',
            'content.required' => '文章内容不能为空',
            'content.min' => '文章内容必须至少三个字符',
        ];
    }
}
