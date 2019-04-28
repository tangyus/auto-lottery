@extends('layouts.app')

@section('content')
<div class="tpl-content-wrapper">
    <div class="tpl-content-page-title">
        {{ $title }}
    </div>
    <ol class="am-breadcrumb">
        <li><a href="javascript:;" class="am-icon-home">{{ env('title', '自动生成抽奖器') }}</a></li>
        <li><a href="javascript:;">数据库配置</a></li>
        <li class="am-active">{{ $title }}</li>
    </ol>
    <div class="tpl-portlet-components">

        @include('layouts.message')
        <div class="am-alert am-alert-secondary am-u-md-12" data-am-alert>
            <p style="padding: 5px 15px;">生成 {{ $title }} 会自动为字段加上前缀(表名首字母缩写加下划线：如 user_award 表，将自动加上前缀 ua_)，并删除之前存在的对应数据表及数据，请谨慎操作！</p>
        </div>

        <div class="tpl-block">
            <div class="am-u-sm-12 am-u-md-4">
                <div class="am-btn-toolbar">
                    <div class="am-btn-group am-btn-group-xs">
                        <a href="{{ route('fields.create', ['name' => request('name')]) }}" class="am-btn am-btn-default am-btn-success">
                            添加{{ $title }}字段
                        </a>
                        <a href="{{ route('fields.generate', ['name' => request('name')]) }}" class="am-btn am-btn-default am-btn-danger">
                            生成{{ $title }}
                        </a>
                    </div>
                </div>
            </div>

            <div class="am-g">
                <div class="am-u-sm-12">
                    <table class="am-table am-table-striped am-table-hover table-main">
                        <thead>
                        <tr>
                            <th class="table-id">序号</th>
                            <th class="table-title">字段名</th>
                            <th class="table-title">字段类型</th>
                            <th class="table-title">字段长度</th>
                            <th class="table-title">默认值</th>
                            <th class="table-title">索引类型</th>
                            <th class="table-type">注释说明</th>
                            <th class="table-type">创建时间</th>
                            <th class="table-set">操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($fields) > 0)
                        @foreach($fields as $key => $item)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->type }}</td>
                            <td>{{ $item->length }}</td>
                            <td>{{ $item->default }}</td>
                            @if($item->indexes == 'normal')
                                <td><a class="am-badge am-badge-secondary am-radius">普通索引</a></td>
                            @elseif($item->indexes == 'unique')
                                <td><a class="am-badge am-badge-secondary am-radius">唯一索引</a></td>
                            @elseif($item->indexes == 'full_text')
                                <td><a class="am-badge am-badge-secondary am-radius">全文索引</a></td>
                            @else
                                <td>无</td>
                            @endif
                            <td>{{ $item->comment }}</td>
                            <td>{{ $item->created_at->diffForHumans() }}</td>
                            <td>
                                <div class="am-btn-toolbar">
                                    <div class="am-btn-group am-btn-group-xs">
                                        <a href="{{ route('fields.edit', ['name' => request('name'), 'id' => $item->id]) }}" class="am-btn am-btn-xs am-btn-secondary">
                                            修改
                                        </a>
                                        @if($item->can_del == 0)
                                            <form action="{{ route('fields.destroy', ['name' => $item->name, 'id' => $item->id]) }}" method="post" style="display: inline-block;">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="am-btn am-btn-xs am-btn-danger">
                                                    删除
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection