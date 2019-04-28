@extends('layouts.app')

@section('content')
    <div class="tpl-content-wrapper">
        <div class="tpl-content-page-title">
            奖池列表
        </div>
        <ol class="am-breadcrumb">
            <li><a href="javascript:;" class="am-icon-home">{{ env('title', '自动生成抽奖器') }}</a></li>
            <li><a href="javascript:;">奖池配置</a></li>
            <li class="am-active">奖池列表</li>
        </ol>
        <div class="tpl-portlet-components">

            @include('layouts.message')

            <div class="tpl-block">
                <div class="am-g" style="padding: 5px 0">
                    <form action="{{ route('award.list') }}" method="get" style="padding: 0 1.5rem;">
                        @if(count($awardIds) > 0)
                        <div class="am-u-sm-12 am-u-md-2" style="display: inline-block; float: none; width: 240px;">
                            <div class="am-form-group" >
                                <select data-am-selected="{btnSize: 'sm', maxHeight: 200}" name="award_id">
                                    <option value="-1">全部奖品类型</option>
                                    @foreach($awardIds as $value)
                                        <option value="{{ $value->a_award_id }}" {{ request()->award_id == $value->a_award_id ? 'selected' : '' }}>{{ $value->a_award_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        @endif
                        <div class="am-u-sm-12 am-u-md-2" style="display: inline-block; float: none; width: 240px;">
                            <div class="am-form-group">
                                <select data-am-selected="{btnSize: 'sm', maxHeight: 200}" name="got">
                                    <option value="-1">全部抽取状态</option>
                                    <option value="0" {{ request()->got == 0 ? 'selected' : '' }}>未抽取</option>
                                    <option value="1" {{ request()->got == 1 ? 'selected' : '' }}>已抽取</option>
                                </select>
                            </div>
                        </div>

                        <div class="tpl-portlet-input tpl-fz-ml" style="padding: 0; float: none; margin-left: 0;">
                            <div class="portlet-input input-small input-inline" style="width: 260px;">
                                <div class="input-icon right am-input-group">
                                    <button class="am-btn am-btn-xs am-btn-secondary" type="submit">
                                        <span class="am-icon-search"></span> 查询
                                    </button>
                                    <a href="{{ route('award.list') }}" class="am-btn am-btn-xs am-btn-secondary" style="margin-left: 5px;">
                                        <span class="am-icon-refresh"></span> 重置
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>

                    <div class="am-u-sm-12">
                        <table class="am-table am-table-striped am-table-hover table-main">
                            <thead>
                            <tr>
                                <th class="table-id">序号</th>
                                <th class="table-title">奖品类型</th>
                                <th class="table-title">奖品名称</th>
                                <th class="table-title">抽取状态</th>
                                <th class="table-title">奖品数量</th>
                                <th class="table-type">奖品兑奖码</th>
                                <th class="table-type">发放时间</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($awards) > 0)
                                @foreach($awards as $key => $item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $item->a_award_id }}</td>
                                        <td>{{ $item->a_award_name }}</td>
                                        @if($item->a_got == 0)
                                        <td><a class="am-badge am-badge-secondary am-radius">未抽取</a></td>
                                        @else
                                        <td><a class="am-badge am-badge-secondary am-radius">已抽取</a></td>
                                        @endif
                                        <td>{{ $item->a_num }}</td>
                                        <td>{{ $item->a_only_key }}</td>
                                        <td>{{ date('Y-m-d H:i:s', $item->a_send_time) }}</td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>

                        @if(is_object($awards))
                        {{ $awards->appends(['got' => request()->got, 'award_id' => request()->award_id])->links() }}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<style type="text/css">
    .tpl-block {
        font-size: 12px !important;
    }
</style>