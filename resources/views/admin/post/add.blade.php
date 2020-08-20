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
            <form action="{{url('admin/post/store')}}" method="post" class="layui-form layui-form-pane">
                {{ csrf_field() }}
                <div class="layui-form-item">
                    <label for="post_name" class="layui-form-label">
                        <span class="x-red">*</span>岗位名称：
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="post_name" name="post_name" required="" lay-verify="required"
                        autocomplete="off" class="layui-input">
                    </div> 
                </div>
                <div class="layui-form-item">
                   <label for="post_leader" class="layui-form-label">
                        <span class="x-red">*</span>岗位负责人
                    </label>
                    <div class="layui-input-inline">
                        <select name="post_leader" lay-verify="required" class="layui-input-block" >
                        @foreach($endemail as $v)
                        <option value="{{$v->name}}">{{$v->name}}</option>
                        @endforeach
                        </select>
                    </div>
                </div>
                
              <div class="layui-form-item">
                    <label for="post_description" class="layui-form-label">
                        <span class="x-red">*</span>岗位简介：
                    </label>
                    <div class="layui-input-inline">
                       <textarea name="post_description" class="layui-textarea"></textarea>
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
            //发异步，把数据提交给php
              $.ajax({
                  type:'POST',
                  url:'/admin/post/store',
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
    <script>var _hmt = _hmt || []; (function() {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?b393d153aeb26b46e9431fabaf0f6190";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
      })();</script>
  </body>

</html>