<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{env('title', '自动生成抽奖器')}}</title>
    <meta name="description" content="{{env('description', '基于H5自动生成抽奖器，及对应基本数据表和API')}}">
    <meta name="keywords" content="{{env('keywords', '自动生成|API|抽奖器')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <meta name="apple-mobile-web-app-title" content="Repair System"/>
    <link rel="stylesheet" href="{{asset('/assets/css/amazeui.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('/assets/css/admin.css')}}"/>
    <link rel="stylesheet" href="{{asset('/assets/css/app.css')}}"/>
    <link rel="stylesheet" href="{{asset('/assets/css/bootstrap.css')}}"/>

    <script src="{{asset('/assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('/assets/js/echarts.min.js')}}"></script>
    <script src="{{asset('/assets/js/amazeui.min.js')}}"></script>
</head>
<body data-type="index" style="background: #e9ecf3">

@include('layouts.sidebar')
@include('layouts.header')

<div class="container">
    @include('layouts.message')

    @yield('content')
</div>

<script src="{{asset('/assets/js/iscroll.js')}}"></script>
<script src="{{asset('/assets/js/app.js')}}"></script>
</body>
</html>