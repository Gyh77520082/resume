@extends('admin.layouts.admin')
@section('title', '岗位列表')
@section('center')
    <body>
        <div class="x-nav">
         
          <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" onclick="location.reload()" title="刷新">
            <i class="layui-icon layui-icon-refresh" style="line-height:30px"></i></a>
        </div>
        <div class="layui-fluid">
            <div class="layui-row layui-col-space15">
                <div class="layui-col-md12">
                    <div class="layui-card">
                        
                        <div class="layui-card-header">
                            <button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon"></i>批量删除</button>
                            <button class="layui-btn" onclick="xadmin.open('添加岗位','{{url('admin/post/add')}}',600,400)"><i class="layui-icon"></i>添加</button>
                           
                        </div>
                        <div class="layui-card-body ">
                            <table class="layui-table layui-form">
                              <thead>
                                <tr>
                                  <th>
                                    <input type="checkbox" name=""  lay-skin="primary">
                                  </th>
                                  <th>ID</th>
                                  <th>岗位名称</th>
                                  <th>岗位简介</th>
                                  <th>岗位负责人</th>
                                  <th>状态</th>
                                  <th>操作</th>
                              </thead>
                              <tbody>
                                @foreach($post as $v)
                                <tr>
                                  <td>
                                    <input type="checkbox" name=""  lay-skin="primary">
                                  </td>
                                  <td>{{ $v->post_id }}</td>
                                  <td>{{ $v->post_name }}</td>
                                  <td>{{ $v->post_description }}</td>
                                  <td>
                                   @if($v->post_status == 1)
                                    <span class="layui-btn layui-btn-normal layui-btn-mini">{{$title='启用'}}</span>
                                    </td>
                                     @else
                                    <span class="layui-btn layui-btn-normal layui-btn-mini layui-btn-disabled">{{$title='停用'}}</span>
                                  </td>
                                   @endif
                                  <td>{{ $v->post_leader }}</td>
                                  <td class="td-manage">
                                      <a onclick="member_stop(this,{{ $v->post_id }})" href="javascript:;" status="{{ $v->post_status }}"  title="{{$title}}">
                                        <i class="layui-icon">&#xe601;</i>
                                      </a>
                                    <a title="编辑"  onclick="xadmin.open('编辑','{{ url('admin/post/edit/'.$v->post_id.'') }}',600,400)" href="javascript:;">
                                      <i class="layui-icon">&#xe642;</i>
                                    </a>
                                    <a title="删除" onclick="member_del(this,{{ $v->post_id }})" href="javascript:;">
                                      <i class="layui-icon">&#xe640;</i>
                                    </a>
                                  </td>
                                </tr>
                                @endforeach
                              </tbody>
                            </table>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div> 
    </body>
    <script>
        layui.use(['laydate','form'], function(){
        var laydate = layui.laydate;
        var  form = layui.form;
        // 监听全选
        form.on('checkbox(checkall)', function(data){
          if(data.elem.checked){
            $('tbody input').prop('checked',true);
          }else{
            $('tbody input').prop('checked',false);
          }
          form.render('checkbox');
        }); 
        //执行一个laydate实例
        laydate.render({
          elem: '#start' //指定元素
        });
        //执行一个laydate实例
        laydate.render({
          elem: '#end' //指定元素
        });
      });

       /*用户-停用*/
        function member_stop(obj,id){
          layer.confirm('确认要更改状态吗？',function(index){
              var status = $(obj).attr('status');
              $.post("/admin/post/ChangeStatus", { 'status': status,'id':id,"_token":"{{csrf_token()}}" }, function(data){
              console.log($(obj).attr('status'));
              if($(obj).attr('title')=='启用'){
                //发异步把用户状态进行更改
                $(obj).attr('title','停用')
                $(obj).find('i').html('&#xe62f;');

                $(obj).parents("tr").find(".td-status").find('span').addClass('layui-btn-disabled').html('已停用');
                layer.msg('已停用!',{icon: 5,time:1000});
              }else{
                $(obj).attr('title','启用')
                $(obj).find('i').html('&#xe601;');

                $(obj).parents("tr").find(".td-status").find('span').removeClass('layui-btn-disabled').html('已启用');
                layer.msg('已启用!',{icon: 5,time:1000});
              }
              }); 
          });
      }
      /*用户-删除*/
      function member_del(obj,id){
          layer.confirm('确认要删除吗？',function(index){
              //发异步删除数据
              $.post('/admin/post/del/'+id,{"_method":"delete","_token":"{{csrf_token()}}"},function(data){
                  // console.log(data);
                  if(data.status == 0){
                      $(obj).parents("tr").remove();
                      layer.msg(data.message,{icon:6,time:1000});
                  }else{
                      layer.msg(data.message,{icon:5,time:1000});
                  }
              })
          });
      }



      function delAll (argument) {
        var data = tableCheck.getData();
        layer.confirm('确认要删除吗？'+data,function(index){
            //捉到所有被选中的，发异步进行删除
            layer.msg('删除成功', {icon: 1});
            $(".layui-form-checked").not('.header').parents('tr').remove();
        });
      }
    </script>
   @stop