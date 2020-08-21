@extends('admin.layouts.admin')
@section('title','管理员列表')
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
                        <div class="layui-card-body ">
                            <form class="layui-form layui-col-space5">
                                <div class="layui-input-inline">
                                  <select name="num" lay-filter="aihao">
                                    <option value="3" @if($request->input('num')==3) selected    @endif>3</option>
                                    <option value="5" @if($request->input('num')==5) selected    @endif>5</option>
                                  </select>
                                </div>
                                <div class="layui-inline layui-show-xs-block">
                                   <input type="text" name="username" value="{{ $request->input('username') }}"  placeholder="请输入用户名" autocomplete="off" class="layui-input">
                                </div>
                                <div class="layui-inline layui-show-xs-block">
                                    <button class="layui-btn"  lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
                                </div>
                            </form>
                        </div>
                        <div class="layui-card-header">
                            <button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon"></i>批量删除</button>
                            <button class="layui-btn" onclick="xadmin.open('添加用户','{{url('admin/user/create')}}',600,400)"><i class="layui-icon"></i>添加</button>
                        <span class="x-right" style="line-height:40px">共有数据：{{$total}} 条</span>
                           
                        </div>
                        <div class="layui-card-body layui-table-body layui-table-main">
                            <table class="layui-table layui-form">
                                <thead>
                                  <tr>
                                    <th>
                                      <input type="checkbox" lay-filter="checkall" name="" lay-skin="primary">
                                    </th>
                                    <th>ID</th>
                                    <th>用户名</th>
                                    <th>邮箱</th>
                                    <th>状态</th>
                                    <th>操作</th></tr>
                                </thead>
                                <tbody>
                                  @foreach($user as $v)
                                  <tr>
                                    <td>
                                     <input type="checkbox" name="{{ $v->id }}" value="{{ $v->id }}" data-id='{{ $v->id }}'  lay-skin="primary">
                                    </td>
                                    <td>{{ $v->id }}</td>
                                    <td>{{ $v->name }}</td>
                                    <td>{{ $v->email }}</td>
                                    <td class="td-status">
                                      @if($v->status == 1)
                                    <span class="layui-btn layui-btn-normal layui-btn-mini">已启用</span></td>
                                     @elseif($v->status == 0)
                                    <span class="layui-btn layui-btn-normal layui-btn-mini layui-btn-disabled">已停用</span></td>
                                      @endif
                                     
                                    <td class="td-manage">
                                      <a onclick="member_stop(this,{{ $v->id }})" href="javascript:;" status="{{ $v->status }}"  title="启用">
                                        <i class="layui-icon">&#xe601;</i>
                                      </a>
                                       <a  href="{{ url('admin/user/auth/'.$v->id) }}"   title="授权">
                                        <i class="layui-icon">&#xe6af;</i>
                                      </a>
                                      <a onclick="xadmin.open('修改密码','{{ url('admin/user/'.$v->id.'/edit') }}',600,400)" title="修改密码" href="javascript:;">
                                        <i class="layui-icon">&#xe631;</i>
                                      </a>
                                      <a title="删除" onclick="member_del(this,{{ $v->id }})" href="javascript:;">
                                        <i class="layui-icon">&#xe640;</i>
                                      </a>
                                    </td>
                                  </tr>
                                  @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="layui-card-body ">
                            <div class="page">
                            {{$user->appends($request->all())->render()}}
                            </div>
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
              $.post("/admin/user/ChangeStatus", { 'status': status,'userid':id,"_token":"{{csrf_token()}}" }, function(data){
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

              $.post('/admin/user/'+id,{"_method":"delete","_token":"{{csrf_token()}}"},function(data){
                  // console.log(data);
                  if(data.status == 0){
                      $(obj).parents("tr").remove();
                      layer.msg(data.message,{icon:6,time:1000});
                  }else{
                      layer.msg(data.message,{icon:5,time:1000});
                  }
              })
              //发异步删除数据
          });
      }
      
      //批量删除
      function delAll(argument) {
          // 获取到要批量删除的用户的id
          var ids = [];

          $('tbody input').each(function(index, el) {
            if($(this).prop('checked')){
               ids.push($(this).val())
            }
        });

        layer.confirm('确认要删除吗？',function(index){


            $.post('/admin/user/del',{'ids':ids,"_token":"{{csrf_token()}}"},function(data){
                 layer.msg('删除成功', {icon: 1});
            $(".layui-form-checked").not('.header').parents('tr').remove();
            });
        });
      }
    </script>
@stop