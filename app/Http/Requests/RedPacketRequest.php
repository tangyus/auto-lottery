<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RedPacketRequest extends FormRequest
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
            'amount' => 'required|integer',
            'money_rule' => 'required',
            'rule' => 'required',
            'start' => 'required',
            'end' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'amount.required' => '请输入红包总金额',
            'money_rule.required' => '请选择红包金额规则',
            'rule.required' => '请选择红包发放规则',
            'start.required' => '红包发放开始时间必填',
            'end.required' => '红包发放结束时间必填',
        ];
    }
}
