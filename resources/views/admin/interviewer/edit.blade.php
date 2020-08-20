<!DOCTYPE html>
<html class="x-admin-sm">
  <head>
    <title>添加</title>
     <meta name="csrf-token" content="{{ csrf_token() }}">   
        @include('admin.public.meta')
        @include('admin.public.styles')
        @include('admin.public.script')
  </head>
  <body>
    <div class="layui-fluid">
        <div class="layui-row">
            <form  class="layui-form layui-form-pane">
                <div class="layui-form-item">
                    <label for="name" class="layui-form-label">
                        <span class="x-red">*</span>姓名
                    </label>
                    <div class="layui-input-inline">
                       <input type="hidden" name="uid" value="{{$eemail->id}}">
                        <input type="text" id="name" name="name" required="" value="{{ $eemail->name }}" lay-verify="required"
                        autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label for="name" class="layui-form-label">
                        <span class="x-red">*</span>邮箱
                    </label>
                    <div class="layui-input-inline">
                        <input type="email" id="email" name="email" required="" value="{{ $eemail->email }}" lay-verify="required"
                        autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                <button class="layui-btn" lay-submit="" lay-filter="edit">修改</button>
              </div>
            </form>
        </div>
    </div>
    <script>
        layui.use(['form','layer'], function(){
            $ = layui.jquery;
          var form = layui.form
          ,layer = layui.layer;
          //监听提交
          form.on('submit(edit)', function(data){
             var uid = $("input[name='uid']").val();
            //发异步，把数据提交给php
              $.ajax({
                  type:'PUT',
                  url:'/admin/interviewer/'+uid,
                  dataType:'json',
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                  data:data.field,
                  success:function(data){
                      // 弹层提示添加成功，并刷新父页面
                      // console.log(data);
                      if(data.status == 0){
                          layer.alert(data.message,{icon:6},function(){
                              parent.location.reload(true);
                          });
                      }else{
                          layer.alert(data.message,{icon:5});
                      }
                  },
                  error:function(){
                      //错误信息
                  }
              });
            return false;
          });
        });
    </script>
   @include('admin.public.footer')
  </body>
</html>