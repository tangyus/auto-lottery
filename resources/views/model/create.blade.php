@extends('layouts.app')

@section('content')
    <div class="tpl-content-wrapper">
        <div class="tpl-content-page-title">
            创建模型
        </div>
        <ol class="am-breadcrumb">
            <li><a href="javascript:;" class="am-icon-home">{{ env('title', '自动生成抽奖器') }}</a></li>
            <li><a href="javascript:;">模型管理</a></li>
            <li><a href="{{ route('model.index') }}">模型列表</a></li>
            <li class="am-active">创建模型</li>
        </ol>
        <div class="tpl-portlet-components">

            @include('layouts.message')

            <div class="tpl-block ">
                <div class="am-g tpl-amazeui-form">
                    <div class="am-u-sm-12 am-u-md-12">
                        <form class="am-form am-form-horizontal" action="{{ route('model.store') }}" method="post">
                            {{ csrf_field() }}

                            <div class="am-form-group">
                                <label for="name" class="am-u-sm-3 am-form-label label-require">模型名</label>
                                <div class="am-u-sm-4">
                                    <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="请填写模型名 (必填)">
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label for="alias" class="am-u-sm-3 am-form-label label-require">数据表名</label>
                                <div class="am-u-sm-4">
                                    <input type="text" id="table" name="table" value="{{ old('table') }}" placeholder="请填写数据表名 (必填)">
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label label-require">操作</label>
                                <div class="am-u-sm-4">
                                    <label class="am-radio-inline">
                                        <input type="checkbox" name="operate[]" value="添加" checked> 添加
                                    </label>
                                    <label class="am-radio-inline">
                                        <input type="checkbox" name="operate[]" value="编辑" checked> 编辑
                                    </label>
                                    <label class="am-radio-inline">
                                        <input type="checkbox" name="operate[]" value="删除" checked> 删除
                                    </label>
                                </div>
                            </div>

                            <div class="am-form-group">
                                <div class="am-u-sm-4 am-u-sm-push-3">
                                    <button type="submit" class="am-btn am-btn-sm am-btn-success">
                                        创建
                                    </button>
                                    <a href="{{ route('model.index') }}" class="am-btn am-btn-sm am-btn-secondary">
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
