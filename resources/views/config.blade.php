@extends('layouts.app')

@section('content')
    <div class="tpl-content-wrapper">
        <div class="tpl-content-page-title">
            抽奖配置
        </div>
        <ol class="am-breadcrumb">
            <li><a href="javascript:;" class="am-icon-home">{{ env('title', '自动生成抽奖器') }}</a></li>
            <li class="am-active">抽奖配置</li>
        </ol>
        <div class="tpl-portlet-components">

            @include('layouts.message')

            <div class="tpl-block ">
                <div class="am-g tpl-amazeui-form">
                    <div class="am-u-sm-12 am-u-md-12">
                        @if (empty($config))
                        <form class="am-form am-form-horizontal" action="{{ route('config.store') }}" method="POST">
                        @else
                        <form class="am-form am-form-horizontal" action="{{ route('config.update', $config->id) }}" method="POST">
                            {{ method_field('PUT') }}
                        @endif
                            {{ csrf_field() }}
                            <div class="am-form-group">
                                <label for="project_id" class="am-u-sm-3 am-form-label label-require">项目ID</label>
                                <div class="am-u-sm-4">
                                    @if(!empty($config))
                                        <input type="text" id="project_id" name="project_id" value="{{ $config->project_id }}" placeholder="请填写项目ID (必填)" disabled>
                                    @else
                                        <input type="text" id="project_id" name="project_id" value="{{ old('project_id') }}" placeholder="请填写项目ID (必填)">
                                    @endif
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label for="start_date" class="am-u-sm-3 am-form-label label-require">抽奖开始时间</label>
                                <div class="am-u-sm-4">
                                    @if(!empty($config))
                                        <input type="text" id="start_date" name="start_date" value="{{ $config->start_date }}" placeholder="请选择抽奖开始时间 (必填)"/>
                                    @else
                                        <input type="text" class="am-form-field" name="start_date" value="{{ old('start_date') }}" placeholder="请选择抽奖开始时间 (必填)" id="start_date"/>
                                    @endif
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label for="end_date" class="am-u-sm-3 am-form-label label-require">抽奖结束时间</label>
                                <div class="am-u-sm-4">
                                    @if(!empty($config))
                                        <input type="text" id="end_date" name="end_date" value="{{ $config->end_date }}" placeholder="请选择抽奖结束时间 (必填)">
                                    @else
                                        <input type="text" class="am-form-field" name="end_date" value="{{ old('end_date') }}" placeholder="请选择抽奖结束时间 (必填)" id="end_date"/>

                                    @endif
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label for="prob" class="am-u-sm-3 am-form-label label-require">单次抽奖中奖几率</label>
                                <div class="am-u-sm-4">
                                    @if(!empty($config))
                                        <input type="text" id="prob" name="prob" value="{{ $config->prob }}" placeholder="请填写中奖几率 (必填)">
                                    @else
                                        <input type="text" id="prob" name="prob" value="{{ old('prob') }}" placeholder="请填写中奖几率 (必填)">
                                    @endif
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label for="ip_limit" class="am-u-sm-3 am-form-label">IP中奖数量限制</label>
                                <div class="am-u-sm-4">
                                    @if(!empty($config))
                                        <input type="text" id="ip_limit" name="ip_limit" value="{{ $config->ip_limit }}" placeholder="请填写IP中奖数量限制">
                                    @else
                                        <input type="text" id="ip_limit" name="ip_limit" value="{{ old('ip_limit') }}" placeholder="请填写IP中奖数量限制">
                                    @endif
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label for="times_limit" class="am-u-sm-3 am-form-label">用户中奖次数限制</label>
                                <div class="am-u-sm-4">
                                    @if(!empty($config))
                                        <input type="text" id="times_limit" name="times_limit" value="{{ $config->times_limit }}" placeholder="请填写中奖次数限制">
                                    @else
                                        <input type="text" id="times_limit" name="times_limit" value="{{ old('times_limit') }}" placeholder="请填写中奖次数限制">
                                    @endif
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label for="lottery_times_limit" class="am-u-sm-3 am-form-label">每日抽奖次数限制</label>
                                <div class="am-u-sm-4">
                                    @if(!empty($config))
                                        <input type="text" id="lottery_times_limit" name="lottery_times_limit" value="{{ $config->lottery_times_limit }}" placeholder="请填写每日抽奖次数限制">
                                    @else
                                        <input type="text" id="lottery_times_limit" name="lottery_times_limit" value="{{ old('lottery_times_limit') }}" placeholder="请填写每日抽奖次数限制">
                                    @endif
                                </div>
                            </div>

                            @if(!empty($config))
                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label">创建时间</label>
                                <div class="am-u-sm-4">
                                    <input type="text" name="create_time" value="{{ $config->created_at->diffForHumans() }}" disabled>
                                </div>
                            </div>
                            @endif

                            <div class="am-form-group">
                                <div class="am-u-sm-4 am-u-sm-push-3">
                                    <button type="submit" class="am-btn am-btn-sm am-btn-secondary">
                                        保存配置
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function() {
            var nowTemp = new Date();
            var nowDay = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0).valueOf();
            var nowMoth = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), 1, 0, 0, 0, 0).valueOf();
            var nowYear = new Date(nowTemp.getFullYear(), 0, 1, 0, 0, 0, 0).valueOf();
            var startDate = $('#start_date');

            var checkin = startDate.datepicker({
                onRender: function(date, viewMode) {
                    // 默认 days 视图，与当前日期比较
                    var viewDate = nowDay;

                    switch (viewMode) {
                        // moths 视图，与当前月份比较
                        case 1:
                            viewDate = nowMoth;
                            break;
                        // years 视图，与当前年份比较
                        case 2:
                            viewDate = nowYear;
                            break;
                    }

                    return date.valueOf() < viewDate ? 'am-disabled' : '';
                }
            }).on('changeDate.datepicker.amui', function(ev) {
                if (ev.date.valueOf() > checkout.date.valueOf()) {
                    var newDate = new Date(ev.date)
                    newDate.setDate(newDate.getDate() + 1);
                    checkout.setValue(newDate);
                }
                checkin.close();
                $('#end_date')[0].focus();
            }).data('amui.datepicker');

            var checkout = $('#end_date').datepicker({
                onRender: function(date, viewMode) {
                    var inTime = checkin.date;
                    var inDay = inTime.valueOf();
                    var inMoth = new Date(inTime.getFullYear(), inTime.getMonth(), 1, 0, 0, 0, 0).valueOf();
                    var inYear = new Date(inTime.getFullYear(), 0, 1, 0, 0, 0, 0).valueOf();

                    // 默认 days 视图，与当前日期比较
                    var viewDate = inDay;

                    switch (viewMode) {
                        // moths 视图，与当前月份比较
                        case 1:
                            viewDate = inMoth;
                            break;
                        // years 视图，与当前年份比较
                        case 2:
                            viewDate = inYear;
                            break;
                    }

                    return date.valueOf() <= viewDate ? 'am-disabled' : '';
                }
            }).on('changeDate.datepicker.amui', function(ev) {
                checkout.close();
            }).data('amui.datepicker');
        });
    </script>
@endsection
