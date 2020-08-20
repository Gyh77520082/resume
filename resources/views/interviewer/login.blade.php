<!DOCTYPE html>
<html>
<head>
     <title>简历投递</title>
       <meta name="csrf-token" content="{{ csrf_token() }}">
        @include('admin.public.meta')
        @include('admin.public.styles')
        @include('admin.public.script')
    </head>
<body style="width: 300px;margin: auto; padding-top: 200px;">
  <center  >
   <form class="layui-form" method="POST" action="/interviewer/dologin" >
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
              <div>
                <select name="username" lay-verify="required" class="layui-input-block" >
                @foreach($endemail as $v)
                <option value="{{$v->name}}">{{$v->name}}</option>
                 @endforeach
                </select>
            </div>
            <hr class="hr15">
            <input name="password" lay-verify="required" placeholder="密码"  type="password" class="layui-input">
            <hr class="hr15">
            <input name="captcha" lay-verify="required" placeholder="验证码"  type="text" class="layui-input"
            style="float: left;height: 40px;width: 150px;">
            <img src="{{captcha_src()}}" onclick="this.src='{{captcha_src()}}'+Math.random()"
            style="float: right;">
            <hr class="hr15">
             <div class="form-group" >
                  <button  class="layui-btn"  lay-submit="">登录</button>
             </div>
            {{csrf_field()}}
   </form>
  </center>
  </body>
  <style type="text/css">
    table{border-collapse:collapse;width: 100px;border: 1px solid black;}
    .td_1{border: 1px solid black;width: 120px;height: 40px;text-align: center}
    .td_left{border: 1px solid black;width: 10px;height: 10px;text-align: center;}
    .td_m{border: 1px solid black;width: 150px;height: 40px;text-align: center;}
    .td_foot{border: 1px solid black;width: 150px;text-align: center;}
    span{color: red;}
  </style>
   <script>
    layui.use(['form','layer','upload','element'], function(){
          $ = layui.jquery;
          var form = layui.form
          ,layer = layui.layer;
          var upload = layui.upload;
          var element = layui.element;
      });
    </script>

</html>