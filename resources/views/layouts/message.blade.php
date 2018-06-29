@if(!empty(session('success')))
    <div class="am-alert am-alert-success am-u-md-12" data-am-alert>
        <button type="button" class="am-close">&times;</button>
        <p style="padding: 5px 15px;">{{session('success')}}</p>
    </div>
@endif

@if(!empty(session('warning')))
<div class="am-alert am-alert-warning am-u-md-12" data-am-alert>
    <button type="button" class="am-close">&times;</button>
    <p style="padding: 5px 15px;">{{session('warning')}}</p>
</div>
@endif

@if(!empty(session('message')))
<div class="am-alert am-alert-secondary am-u-md-12" data-am-alert>
    <button type="button" class="am-close">&times;</button>
    @if(is_array(session('message')))
    @foreach(session('message') as $value)
        {{$value}}
    @endforeach
    @else
    <p>{{session('message')}}</p>
    @endif
</div>
@endif

@if(!empty($alert))
<div class="am-alert am-alert-success am-u-md-12" data-am-alert>
    <p style="padding: 5px 15px;">{{$alert}}</p>
</div>
@endif

<style type="text/css">
    .am-alert-secondary {
        color: #a94442;
        background-color: #f2dede;
        border-color: #f2dede;
        border-radius: 4px;
    }
    .am-alert-success {
        color: #3c763d;
        background-color: #dff0d8;
        border-color: #dff0d8;
        border-radius: 4px;
    }
    .am-alert-warning {
        color: #e6a23c;
        background-color: #fdf6ec;
        border-color: #fdf6ec;
        border-radius: 4px;
    }
</style>