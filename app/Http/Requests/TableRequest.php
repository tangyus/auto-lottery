<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TableRequest extends FormRequest
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
            'name' => 'required',
            'engine' => 'required',
        ];
        // $this->route('table') 表示路由参数中自动注入的 table 模型对象
        if ($this->route('table')) {
            $rules['name'] .= '|unique:tables,name,' . $this->route('table')->id;
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'name.required' => '数据表名必填',
            'name.unique' => '数据表名不能重复',
            'engine.required' => '数据表引擎必选',
        ];
    }
}