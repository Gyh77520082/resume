<!DOCTYPE html>
<html>
         
<head>
    <title>@yield('title','简历')</title>
       <meta name="csrf-token" content="{{ csrf_token() }}">
        @include('admin.public.meta')
        @include('admin.public.styles')
        @include('admin.public.script') 
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="shortcut icon" href="http://www.sharefamily.com.cn/favicon.ico" type="image/x-icon">
        <script src="http://www.sharefamily.com.cn/template/sharefamily/js/jquery-1.12.4.min.js"></script>
</head>
<script type="text/javascript">
    $(function () {
        $(".nav-ul>li").hover(function () {
            $(this).children('ul').stop(true, true).show(300);
        }, function () {
            $(this).children('ul').stop(true, true).hide(300);
        })
    })
</script>
<body>
    @include('home.layouts._header') 
    @yield('center')
    @include('home.layouts._footer') 
</body>
</html>