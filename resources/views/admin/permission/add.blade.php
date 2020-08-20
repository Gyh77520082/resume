<!DOCTYPE html>
<html class="x-admin-sm">
  
  <head>
    
    <title>权限添加</title>
     <meta name="csrf-token" content="{{ csrf_token() }}">
        @include('admin.public.meta')
        @include('admin.public.styles')
        @include('admin.public.script')
  </head>
  
  <body>
     
    <div class="layui-fluid">

        <div class="layui-row">
            <form action="{{url('admin/permission')}}" method="post" class="layui-form layui-form-pane">
                {{ csrf_field() }}
                <div class="layui-form-item">
                    <label for="per_name" class="layui-form-label">
                        <span class="x-red">*</span>权限名称
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="per_name" name="per_name" required="" lay-verify="required"
                        autocomplete="off" class="layui-input">
                    </div>
                </div>
              <div class="layui-form-item">
                    <label for="per_url" class="layui-form-label">
                        <span class="x-red">*</span>权限路由
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="per_url" name="per_url" value="App\Http\Controllers\Admin\" required="" lay-verify="required"
                        autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                <button class="layui-btn" lay-submit="" lay-filter="add">增加</button>
              </div>
            </form>
        </div>
    </div>
    <script>
        layui.use(['form','layer'], function(){
            $ = layui.jquery;
          var form = layui.form
          ,layer = layui.layer;
        
         
           
          });

          //监听提交
          form.on('submit(add)', function(data){
            
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

            return false;
          });


        form.on('checkbox(father)', function(data){

            if(data.elem.checked){
                $(data.elem).parent().siblings('td').find('input').prop("checked", true);
                form.render(); 
            }else{
               $(data.elem).parent().siblings('td').find('input').prop("checked", false);
                form.render();  
            }
        });
          
          
        });
    </script>
    <script>var _hmt = _hmt || []; (function() {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?b393d153aeb26b46e9431fabaf0f6190";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
      })();</script>
  </body>

</html>