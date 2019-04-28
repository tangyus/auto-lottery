@extends('layouts.app')

@section('content')
    <div class="tpl-content-wrapper">
        <div class="tpl-content-page-title">
            修改数据表
        </div>
        <ol class="am-breadcrumb">
            <li><a href="javascript:;" class="am-icon-home">{{ env('title', '自动生成抽奖器') }}</a></li>
            <li><a href="javascript:;">数据库配置</a></li>
            <li><a href="{{ route('tables.index') }}">数据表</a></li>
            <li class="am-active">修改数据表</li>
        </ol>
        <div class="tpl-portlet-components">

            @include('layouts.message')

            <div class="tpl-block ">
                <div class="am-g tpl-amazeui-form">
                    <div class="am-u-sm-12 am-u-md-12">
                        <form class="am-form am-form-horizontal" action="{{ route('tables.update', $table->id) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}

                            <div class="am-form-group">
                                <label for="name" class="am-u-sm-3 am-form-label label-require">数据表名</label>
                                <div class="am-u-sm-4">
                                    <input type="text" id="name" name="name" value="{{ $table->name }}" placeholder="请填写数据表名 (必填)">
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label for="alias" class="am-u-sm-3 am-form-label label-require">数据表名称</label>
                                <div class="am-u-sm-4">
                                    <input type="text" id="alias" name="alias" value="{{ $table->alias }}" placeholder="请填写数据表名称 (必填)">
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label label-require">数据引擎</label>
                                <div class="am-u-sm-4">
                                    <select data-am-selected="{btnSize: 'sm', maxHeight: 200}" name="engine" placeholder="请选择数据引擎">
                                        <option value="InnoDB" {{ $table->engine == 'InnoDB' ? 'selected' : '' }}>InnoDB</option>
                                        <option value="MyISAM" {{ $table->engine == 'MyISAM' ? 'selected' : '' }}>MyISAM</option>
                                    </select>
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label">数据表是否可以删除</label>
                                <div class="am-u-sm-4">
                                    <label class="am-radio-inline">
                                        <input type="radio" name="can_del" value="0" {{ $table->can_del == 0 ? 'checked' : '' }}> 可以
                                    </label>
                                    <label class="am-radio-inline">
                                        <input type="radio" name="can_del" value="1" {{ $table->can_del == 1 ? 'checked' : '' }}> 不可以
                                    </label>
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label for="created_at" class="am-u-sm-3 am-form-label">创建时间</label>
                                <div class="am-u-sm-3">
                                    <input type="text" id="created_at" name="created_at" value="{{ $table->created_at->diffForHumans() }}" disabled>
                                </div>
                            </div>

                                <div class="am-form-group">
                                    <label for="updated_at" class="am-u-sm-3 am-form-label">修改时间</label>
                                    <div class="am-u-sm-3">
                                        <input type="text" id="updated_at" name="updated_at" value="{{ $table->updated_at->diffForHumans() }}" disabled>
                                    </div>
                                </div>

                            <div class="am-form-group">
                                <div class="am-u-sm-4 am-u-sm-push-3">
                                    <button type="submit" class="am-btn am-btn-sm am-btn-secondary">
                                        修改保存
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
