@extends('layouts.app')

@section('content')
    <div class="tpl-content-wrapper">
        <div class="tpl-content-page-title">
            添加{{ $title }}字段
        </div>
        <ol class="am-breadcrumb">
            <li><a href="javascript:;" class="am-icon-home">{{ env('title', '自动生成抽奖器') }}</a></li>
            <li><a href="javascript:;">数据库配置</a></li>
            <li><a href="{{ route('fields.index', request('name')) }}">{{ $title }}</a></li>
            <li class="am-active">添加{{ $title }}字段</li>
        </ol>
        <div class="tpl-portlet-components">

            @include('layouts.message')

            <div class="tpl-block ">
                <div class="am-g tpl-amazeui-form">
                    <div class="am-u-sm-12 am-u-md-12">
                        <form class="am-form am-form-horizontal" action="{{ route('fields.store', request('name')) }}" method="post">
                            {{ csrf_field() }}

                            <div class="am-form-group">
                                <label for="table_name" class="am-u-sm-3 am-form-label label-require">数据表名</label>
                                <div class="am-u-sm-4">
                                    <input type="text" id="table_name" name="table_name" value="{{ request('name') }}" placeholder="请填写字段名 (必填)">
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label for="name" class="am-u-sm-3 am-form-label label-require">字段名</label>
                                <div class="am-u-sm-4">
                                    <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="请填写字段名 (必填)">
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label for="type" class="am-u-sm-3 am-form-label label-require">字段类型</label>
                                <div class="am-u-sm-4">
                                    <select data-am-selected="{btnSize: 'sm', maxHeight: 200}" name="type" placeholder="请选择字段类型">
                                        <option value="" {{ old('type') == '' ? 'selected' : '' }}>请选择字段类型</option>
                                        <option value="int" {{ old('type') == 'int' ? 'selected' : '' }}>int</option>
                                        <option value="tinyint" {{ old('type') == 'tinyint' ? 'selected' : '' }}>tinyint</option>
                                        <option value="varchar" {{ old('type') == 'varchar' ? 'selected' : '' }}>varchar</option>
                                        <option value="char" {{ old('type') == 'char' ? 'selected' : '' }}>char</option>
                                        <option value="float" {{ old('type') == 'float' ? 'selected' : '' }}>float</option>
                                        <option value="text" {{ old('type') == 'text' ? 'selected' : '' }}>text</option>
                                        <option value="datetime" {{ old('type') == 'datetime' ? 'selected' : '' }}>datetime</option>
                                    </select>
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label for="length" class="am-u-sm-3 am-form-label">字段长度</label>
                                <div class="am-u-sm-4">
                                    <input type="text" id="length" name="length" value="{{ old('length') }}" placeholder="请填写字段长度">
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label for="default" class="am-u-sm-3 am-form-label">字段默认值</label>
                                <div class="am-u-sm-4">
                                    <input type="text" id="default" name="default" value="{{ old('default') }}" placeholder="请填写字段默认值">
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label for="comment" class="am-u-sm-3 am-form-label">字段备注</label>
                                <div class="am-u-sm-4">
                                    <input type="text" id="comment" name="comment" value="{{ old('comment') }}" placeholder="请填写字段备注">
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label for="type" class="am-u-sm-3 am-form-label">索引类型</label>
                                <div class="am-u-sm-4">
                                    <select data-am-selected="{btnSize: 'sm', maxHeight: 200}" name="indexes" placeholder="请选择字段索引类型">
                                        <option value="" {{ empty(old('indexes')) ? 'selected' : '' }}>请选择字段索引类型</option>
                                        <option value="normal" {{ old('indexes') == 'normal' ? 'selected' : '' }}>普通索引</option>
                                        <option value="unique" {{ old('indexes') == 'unique' ? 'selected' : '' }}>唯一索引</option>
                                        <option value="full_text" {{ old('indexes') == 'full_text' ? 'selected' : '' }}>全文索引</option>
                                    </select>
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label">字段是否可以删除</label>
                                <div class="am-u-sm-4">
                                    <label class="am-radio-inline">
                                        <input type="radio" name="can_del" value="0" checked> 可以
                                    </label>
                                    <label class="am-radio-inline">
                                        <input type="radio" name="can_del" value="1"> 不可以
                                    </label>
                                </div>
                            </div>

                            <div class="am-form-group">
                                <div class="am-u-sm-4 am-u-sm-push-3">
                                    <button type="submit" class="am-btn am-btn-sm am-btn-success">
                                        添加保存
                                    </button>
                                    <a href="{{ route('fields.index', request('name')) }}" class="am-btn am-btn-sm am-btn-secondary">
                                        返回
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
