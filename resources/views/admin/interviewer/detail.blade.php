
@extends('admin.layouts.admin')
@section('title', '面试官列表')
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
                        </div>
                        <div class="layui-card-body layui-table-body layui-table-main">
                            <table class="layui-table layui-form">

                                <thead>
                                  <tr>
                                    <th>
                                      <input type="checkbox" lay-filter="checkall" name="" lay-skin="primary">
                                    </th>
                                    <th>ID</th>
                                    <th>姓名</th>
                                    <th>面试结果</th>
                                    <th>操作</th>
                                  </tr>
                                </thead>
                                <tbody>
                                   @foreach($EndEmail as $v)
                                  <tr>
                                    <td>
                                      <input type="checkbox" name="id" value="1"   lay-skin="primary"> 
                                    </td>
                                    <td>{{$v->a_id}}</td>
                                    <td>{{$v->paass_name}}</td>
                                    <td>{{$v->finalresult}}</td>
                                    <td>
                                      <a title="查看详情"  onclick="xadmin.open('查看详情','{{ url('admin/interviewer/chakan/'.$v->a_id) }}',600,400)" href="javascript:;">
                                    <i class="layui-icon">查看详情</i>
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
      /*用户-删除*/
      function member_del(obj,id){
          layer.confirm('确认要删除吗？',function(index){

              $.post('/admin/interviewer/'+id,{"_method":"delete","_token":"{{csrf_token()}}"},function(data){
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

    </script>
@stop