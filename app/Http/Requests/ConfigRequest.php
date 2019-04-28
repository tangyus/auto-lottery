<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConfigRequest extends FormRequest
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
        $rule = [
            'start_date' => 'required|date|after:today',
            'end_date' => 'required|date|after:start_date',
            'prob' => 'required|between:0, 10000',
            'ip_limit' => 'nullable|integer',
            'times_limit' => 'nullable|integer',
            'lottery_times_limit' => 'nullable|integer'
        ];
        if ($this->method == 'POST') {
            $rule['project_id'] = 'required|unique:config';
        }
        return $rule;
    }

    public function messages()
    {
        return [
            'project_id.required' => '项目ID必填',
            'project_id.unique' => '项目ID必须唯一',
            'start_date.required' => '开始时间必填',
            'start_date.date' => '开始时间必须为时间格式',
            'start_date.after' => '开始时间必须在今天之后',
            'end_date.required' => '结束时间必填',
            'end_date.date' => '结束时间必须为时间格式',
            'end_date.after' => '结束时间必须开始时间之后',
            'prob.required' => '中奖几率必填',
            'prob.between' => '中奖几率必须在0 - 10000之间',
            'ip_limit.integer' => 'IP中奖数量必须为数字',
            'times_limit.integer' => '用户中奖次数必须为数字',
            'lottery_times_limit.integer' => '每日抽奖次数必须为数字',
        ];
    }
}
