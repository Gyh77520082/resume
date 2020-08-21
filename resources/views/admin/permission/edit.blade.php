@extends('admin.layouts.admin')
@section('title', '权限添加')
@section('center')
  <body>
     
    <div class="layui-fluid">

        <div class="layui-row">
            <form class="layui-form layui-form-pane">
                {{ csrf_field() }}
                <div class="layui-form-item">
                    <label for="per_name" class="layui-form-label">
                        <span class="x-red">*</span>权限名称
                    </label>
                    <div class="layui-input-inline">
                        <input type="hidden" name="uid" value="{{ $permission->id }}">
                        <input type="text" id="per_name" name="per_name" value="{{ $permission->per_name }}" required="" lay-verify="required"
                        autocomplete="off" class="layui-input">
                    </div>
                </div>
              <div class="layui-form-item">
                    <label for="per_url" class="layui-form-label">
                        <span class="x-red">*</span>权限路由
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="per_url" name="per_url" value="{{ $permission->per_url }}" required="" lay-verify="required"
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
                  url:'/admin/permission/'+uid,
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

  </body>
@stop