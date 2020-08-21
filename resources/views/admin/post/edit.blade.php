@extends('admin.layouts.admin')
@section('title', '岗位修改')
@section('center')
  <body>
     
    <div class="layui-fluid">

        <div class="layui-row">
            <form action="{{url('admin/post/store')}}" method="post" class="layui-form layui-form-pane">
              <input type="hidden" name="uid" value="{{ $post->post_id }}">
                {{ csrf_field() }}
                <div class="layui-form-item">
                    <label for="post_name" class="layui-form-label">
                        <span class="x-red">*</span>岗位名称：
                    </label>
                    <div class="layui-input-inline">
                        <input type="text" id="post_name" name="post_name" value="{{$post->post_name}}" 
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
                       <textarea name="post_description" class="layui-textarea">{{$post->post_description}}</textarea>
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
                  url:'/admin/post/update/'+uid,
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