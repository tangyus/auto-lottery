<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AwardRequest extends FormRequest
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
            'awards' => 'required',
            'num' => 'required',
            'start' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'awards.required' => '请输入奖品名称，并以英文逗号隔开',
            'num.required' => '请输入奖品数量，格式与奖品名称对应',
            'start.required' => '奖池发放开始时间必填',
        ];
    }
}
