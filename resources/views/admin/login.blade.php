<!doctype html>
<html  class="x-admin-sm">
<head>
         <title>简历投递系统登陆</title>
        @include('admin.public.meta')
        @include('admin.public.styles')
        @include('admin.public.script')
    
    </head>
<body class="login-bg">
    
    <div class="login layui-anim layui-anim-up">
        <div class="message">Sharefamily</div>
        @if (!empty($errors))
          <div class="alert alert-danger">  
            <ul>
              @if(is_object($errors))
                @foreach ($errors -> all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              @else
                <li>{{ $errors }}</li>
              @endif
            </ul>
          </div>
        @endif
        <div id="darkbannerwrap"></div>
         <form method="post" class="layui-form" action="{{url('admin/dologin')}}">
            {{csrf_field()}}
            <input name="username" placeholder="用户名"  type="text" lay-verify="required" class="layui-input" >
            <hr class="hr15">
            <input name="password" lay-verify="required" placeholder="密码"  type="password" class="layui-input">
            <hr class="hr15">
            <input name="captcha" lay-verify="required" placeholder="验证码"  type="text" class="layui-input"
            style="float: left;height: 40px;width: 150px;">
            <img src="{{captcha_src()}}" onclick="this.src='{{captcha_src()}}'+Math.random()"
            style="float: right;">
            <hr class="hr15">
            <input value="登录" lay-submit style="width:100%;" type="submit">
            <hr class="hr20" >
        </form>
    </div>
    
     @include('admin.public.footer')
</body>
</html>