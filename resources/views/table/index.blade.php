@extends('layouts.app')

@section('content')
<div class="tpl-content-wrapper">
    <div class="tpl-content-page-title">
        数据表
    </div>
    <ol class="am-breadcrumb">
        <li><a href="javascript:;" class="am-icon-home">{{ env('title', '自动生成抽奖器') }}</a></li>
        <li>数据库配置</li>
        <li>数据表</li>
    </ol>
    <div class="tpl-portlet-components">

        @include('layouts.message')

        <div class="tpl-block">
            <div class="am-u-sm-12 am-u-md-4">
                <div class="am-btn-toolbar">
                    <div class="am-btn-group am-btn-group-xs">
                        <a href="{{ route('tables.create') }}" class="am-btn am-btn-default am-btn-success">
                            添加数据表
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
                            <th class="table-title">表名</th>
                            <th class="table-title">名称</th>
                            <th class="table-title">表引擎</th>
                            <th class="table-title">表自增ID</th>
                            <th class="table-title">默认编码</th>
                            <th class="table-type">创建时间</th>
                            <th class="table-set">操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($tables) > 0)
                        @foreach($tables as $key => $item)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->alias }}</td>
                            <td>{{ $item->engine }}</td>
                            <td>{{ $item->auto_increment }}</td>
                            <td>{{ $item->charset }}</td>
                            <td>{{ $item->created_at->diffForHumans() }}</td>
                            <td>
                                <div class="am-btn-toolbar">
                                    <div class="am-btn-group am-btn-group-xs">
                                        <a href="{{ route('tables.edit', ['id' => $item->id]) }}" class="am-btn am-btn-xs am-btn-secondary">
                                            修改
                                        </a>
                                        @if($item->can_del == 0)
                                            <form action="{{ route('tables.destroy', ['id' => $item->id]) }}" method="post" style="display: inline-block;">
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