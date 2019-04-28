@extends('layouts.app')

@section('content')
    <div class="tpl-content-wrapper">
        <div class="tpl-content-page-title">
            添加数据表
        </div>
        <ol class="am-breadcrumb">
            <li><a href="javascript:;" class="am-icon-home">{{ env('title', '自动生成抽奖器') }}</a></li>
            <li><a href="javascript:;">数据库配置</a></li>
            <li><a href="{{ route('tables.index') }}">数据表</a></li>
            <li class="am-active">添加数据表</li>
        </ol>
        <div class="tpl-portlet-components">

            @include('layouts.message')

            <div class="tpl-block ">
                <div class="am-g tpl-amazeui-form">
                    <div class="am-u-sm-12 am-u-md-12">
                        <form class="am-form am-form-horizontal" action="{{ route('tables.store') }}" method="post">
                            {{ csrf_field() }}

                            <div class="am-form-group">
                                <label for="name" class="am-u-sm-3 am-form-label label-require">数据表名</label>
                                <div class="am-u-sm-4">
                                    <input type="text" id="name" name="name" value="{{ request('name') }}" placeholder="请填写数据表名 (必填)">
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label for="alias" class="am-u-sm-3 am-form-label label-require">数据表名称</label>
                                <div class="am-u-sm-4">
                                    <input type="text" id="alias" name="alias" value="{{ request('alias') }}" placeholder="请填写数据表名称 (必填)">
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label label-require">数据引擎</label>
                                <div class="am-u-sm-4">
                                    <select data-am-selected="{btnSize: 'sm', maxHeight: 200}" name="engine" placeholder="请选择数据引擎">
                                        <option value="InnoDB" {{ old('engine') == 'InnoDB' ? 'selected' : '' }}>InnoDB</option>
                                        <option value="MyISAM" {{ old('engine') == 'MyISAM' ? 'selected' : '' }}>MyISAM</option>
                                    </select>
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label">数据表是否可以删除</label>
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
                                    <a href="{{ route('tables.index') }}" class="am-btn am-btn-sm am-btn-secondary">
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
