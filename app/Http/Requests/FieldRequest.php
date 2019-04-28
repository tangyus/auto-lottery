<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FieldRequest extends FormRequest
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
            'table_name' => 'required',
            'name' => 'required',
            'type' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'table_name.required' => '数据表名必填',
            'name.required' => '数据表字段名必填',
            'type.required' => '数据表字段类型必选',
        ];
    }
}