@extends('admin.layouts.admin')
@section('title', '权限添加')
@section('center')
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
   
  </body>
@stop