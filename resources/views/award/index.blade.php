@extends('layouts.app')

@section('content')
    <div class="tpl-content-wrapper">
        <div class="tpl-content-page-title">
            奖池生成
        </div>
        <ol class="am-breadcrumb">
            <li><a href="javascript:;" class="am-icon-home">{{ env('title', '自动生成抽奖器') }}</a></li>
            <li class="am-active">奖池生成</li>
        </ol>
        <div class="tpl-portlet-components">

            @include('layouts.message')
            <div class="am-alert am-alert-secondary am-u-md-12" data-am-alert>
                <p style="padding: 5px 15px;">生成奖池会直接删除之前已存在的奖池数据，请谨慎操作</p>
            </div>

            <div class="tpl-block ">
                <div class="am-g tpl-amazeui-form">
                    <div class="am-u-sm-12 am-u-md-12">
                        <form class="am-form am-form-horizontal" action="{{ route('award.generate') }}" method="post">
                            {{ csrf_field() }}
                            <div class="am-form-group">
                                <label for="awards" class="am-u-sm-3 am-form-label label-require">奖品名称</label>
                                <div class="am-u-sm-4">
                                    <input type="text" id="awards" name="awards" value="{{ old('awards') }}" placeholder="请填写奖品名称，多个奖品以-隔开，如 足球-球衣">
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label for="num" class="am-u-sm-3 am-form-label label-require">奖品数量</label>
                                <div class="am-u-sm-4">
                                    <input type="text" class="am-form-field" id="num" name="num" value="{{ old('num') }}" placeholder="请输入奖品数量，与奖品名称格式对应，如 10-100"/>
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label for="start" class="am-u-sm-3 am-form-label label-require">奖池生效时间</label>
                                <div class="am-u-sm-4">
                                    <input type="text" class="am-form-field" name="start" value="{{ old('start') }}" placeholder="请选择奖池生效时间" id="start"/>
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label for="end" class="am-u-sm-3 am-form-label label-require">奖池结束时间</label>
                                <div class="am-u-sm-4">
                                    <input type="text" class="am-form-field" name="end" value="{{ old('end') }}" placeholder="请选择奖池结束时间" id="end"/>
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label">奖池发放规则</label>
                                <div class="am-u-sm-4">
                                    <label class="am-radio-inline">
                                        <input type="radio" name="rule" value="1" checked> 先到先得
                                    </label>
                                    <label class="am-radio-inline">
                                        <input type="radio" name="rule" value="2"> 按时间段均分
                                    </label>
                                </div>
                            </div>

                            <div class="am-form-group">
                                <div class="am-u-sm-4 am-u-sm-push-3">
                                    <button type="submit" class="am-btn am-btn-sm am-btn-secondary">
                                        生成奖池
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
            var $startDate = $('#start');

            var checkin = $startDate.datepicker({
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
                $('#end')[0].focus();
            }).data('amui.datepicker');

            var checkout = $('#end').datepicker({
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