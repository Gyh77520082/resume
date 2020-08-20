<!DOCTYPE html>
<html class="x-admin-sm">
    
    <head>
     <title>管理员添加</title>
     <meta name="csrf-token" content="{{ csrf_token() }}">
        @include('admin.public.meta')
        @include('admin.public.styles')
        @include('admin.public.script')
        
    </head>
    <body>
        <div class="layui-fluid">
            <div class="layui-row">
                <form class="layui-form">
                   <div class="layui-form-item">
                        <label for="L_username" class="layui-form-label">用户名</label>
                        <div class="layui-input-inline">
                            <input type="text" id="L_username" name="username" disabled="" value="{{session('interviewer.name')}}" class="layui-input"></div>
                    </div>
                  <div class="layui-form-item">
                      <label for="oldpass" class="layui-form-label">
                          <span class="x-red">*</span>旧密码
                      </label>
                      <div class="layui-input-inline">
                          <input type="password" id="oldpass" name="oldpass" required="" lay-verify="oldpass"
                          autocomplete="off" class="layui-input">
                      </div>
                     
                  </div>
                  <div class="layui-form-item">
                      <label for="L_pass" class="layui-form-label">
                          <span class="x-red">*</span>新密码
                      </label>
                      <div class="layui-input-inline">
                           <input type="hidden" name="uid" value="{{session('interviewer.id')}}">
                          <input type="password" id="L_pass" name="pass" required="" lay-verify="pass"
                          autocomplete="off" class="layui-input">
                      </div>
                     
                  </div>
                  <div class="layui-form-item">
                      <label for="L_repass" class="layui-form-label">
                          <span class="x-red">*</span>确认密码
                      </label>
                      <div class="layui-input-inline">
                          <input type="password" id="L_repass" name="repass" required="" lay-verify="repass"
                          autocomplete="off" class="layui-input">
                      </div>
                  </div>
                  <div class="layui-form-item">
                      <label for="L_repass" class="layui-form-label">
                      </label>
                      <button  class="layui-btn" lay-filter="edit" lay-submit="">
                          修改
                      </button>
                  </div>
              </form>
            </div>
        </div>
        <script>layui.use(['form', 'layer'],
            function() {
                $ = layui.jquery;
                var form = layui.form,
                layer = layui.layer;
                //自定义验证规则
                form.verify({
                    pass: [/(.+){4,18}$/, '密码必须6到12位'],
                    repass: function(value) {
                        if ($('#L_pass').val() != $('#L_repass').val()) {
                            return '两次密码不一致';
                        }
                    }
                });

              form.on('submit(edit)', function(data){
            var uid = $("input[name='uid']").val();
            //发异步，把数据提交给php
              $.ajax({
                  type:'PUT',
                  url:'/interviewer/update/'+uid,
                  dataType:'json',
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                  data:data.field,
                  success:function(data){
                      // 弹层提示添加成功，并刷新父页面
                      console.log(data);
                      if(data.status == 0){
                          layer.alert(data.message,{icon:6},function(){
                              parent.location.reload(true);
                          });
                      }else if(data.status == 1){
                          layer.alert(data.message,{icon:5});
                      }else{
                        layer.alert(data.message,{icon:7});
                      }
                  },
                  error:function(){
                      //错误信息
                  }

              });






            // layer.alert("增加成功", {icon: 6},function () {
            //     // 获得frame索引
            //     var index = parent.layer.getFrameIndex(window.name);
            //     //关闭当前frame
            //     parent.layer.close(index);
            // });
            return false;
          });
            });
          </script>
       @include('admin.public.footer')
    </body>

</html>
