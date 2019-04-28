<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ env('title', '自动生成API接口') }}</title>
    <meta name="description" content="{{ env('description', '基于H5自动生成抽奖器，及对应基本数据表和API') }}">
    <meta name="keywords" content="{{ env('keywords', '自动生成|API|抽奖器') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <link rel="stylesheet" href="{{ asset('/assets/css/amazeui.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('/assets/css/admin.css') }}"/>
    <link rel="stylesheet" href="{{ asset('/assets/css/app.css') }}"/>
    <link rel="stylesheet" href="{{ asset('/assets/css/bootstrap.css') }}"/>

    <script src="{{ asset('/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('/assets/js/echarts.min.js') }}"></script>
    <script src="{{ asset('/assets/js/amazeui.min.js') }}"></script>
</head>
<style type="text/css">
    [class*=am-u-]+[class*=am-u-]:last-child {
        float: left;
    }
    .tpl-portlet-components {
        min-height: 400px;
        border-radius: 10px;
    }
    .am-btn {
        border-radius: 4px !important;
    }
    a.am-btn, td button.am-btn {
        margin-left: 5px !important;
    }
    .am-btn-toolbar .am-btn-group {
        float: none;
    }
    tr th, tr td{
        text-align: center;
    }
    .am-ucheck-icons {
        top: 7px;
    }
    .label-require:after {
        content: '*';
        color: red;
        font-size: 16px;
        margin-left: 5px;
    }
</style>
<body data-type="index" style="background: #e9ecf3">

@include('layouts.header')
@include('layouts.sidebar')

@yield('content')

<script src="{{ asset('/assets/js/app.js') }}"></script>
</body>
</html>