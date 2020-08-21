<!DOCTYPE html>
<html class="x-admin-sm">
    
    <head>
     <title>@yield('title','sharefamily后台')</title>
     <meta name="csrf-token" content="{{ csrf_token() }}">
        @include('admin.public.meta')
        @include('admin.public.styles')
        @include('admin.public.script')
        
    </head>
    @yield('center')
    @include('admin.public.footer')
</html>
