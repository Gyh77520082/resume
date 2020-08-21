@extends('admin.layouts.admin')
@section('title', '权限列表')
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
                                    <option value="5" @if($request->input('num')==5) selected    @endif>5</option>
                                    <option value="10" @if($request->input('num')==10) selected    @endif>10</option>
                                  </select>
                                </div>
                                <div class="layui-inline layui-show-xs-block">
                                   <input type="text" name="per_name" value="{{ $request->input('per_name') }}"  placeholder="请输入权限名" autocomplete="off" class="layui-input">
                                </div>
                                <div class="layui-inline layui-show-xs-block">
                                    <button class="layui-btn"  lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
                                </div>
                            </form>
                        </div>
                        <div class="layui-card-header">
                            <button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon"></i>批量删除</button>
                            <button class="layui-btn" onclick="xadmin.open('添加权限','{{url('admin/permission/create')}}',600,400)"><i class="layui-icon"></i>添加</button>
                            <span>共有数据：{{$total}} 条</span>
                        </div>
                        <div class="layui-card-body ">
                            <table class="layui-table layui-form">
                              <thead>
                                <tr>
                                  <th>
                                    <input type="checkbox" name=""  lay-skin="primary">
                                  </th>
                                  <th>ID</th>
                                  <th>权限名</th>
                                  <th>权限路由</th>

                                 
                                  <th>操作</th>
                              </thead>
                              <tbody>
                                @foreach($permission as $v)
                                <tr>
                                  <td>
                                    <input type="checkbox" name=""  lay-skin="primary">
                                  </td>
                                  <td>{{ $v->id }}</td>
                                  <td>{{ $v->per_name }}</td>
                                  <td>{{ $v->per_url }}</td>
                                  <td class="td-manage">
                                    
                                    <a title="编辑"  onclick="xadmin.open('编辑','{{ url('admin/permission/'.$v->id.'/edit') }}',600,400)" href="javascript:;">
                                      <i class="layui-icon">&#xe642;</i>
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
                            {{$permission->appends($request->all())->render()}}
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
        var form = layui.form;
        
        //执行一个laydate实例
        laydate.render({
          elem: '#start' //指定元素
        });

        //执行一个laydate实例
        laydate.render({
          elem: '#end' //指定元素
        });
      });

     
      /*用户-删除*/
      function member_del(obj,id){
          layer.confirm('确认要删除吗？',function(index){
              //发异步删除数据

              $.post('/admin/permission/'+id,{"_method":"delete","_token":"{{csrf_token()}}"},function(data){
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