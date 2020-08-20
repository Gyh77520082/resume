@extends('home.layouts.default')
@section('title', '简历列表')
@section('center')
    <body>
      
       
        <div class="layui-fluid">
            <div class="layui-row layui-col-space15">
                <div class="layui-col-md12">
                    <div class="layui-card">
                        <div class="layui-card-body layui-table-body layui-table-main">
                            <table class="layui-table layui-form">
                                <thead>
                                  <tr>
                                    <th>
                                      <input type="checkbox" lay-filter="checkall" name="" lay-skin="primary">ID
                                    </th>
                                    <th>姓名</th>
                                    <th>提交时间</th>
                                    <th>应聘岗位</th>
                                    <th>期望薪酬</th>
                                    <th>状态</th>
                                    <th>是否通过</th>
                                    <th>操作</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach($resume as $v)
                                  
                                  <tr>
                                    <td>
                                      <input type="checkbox" name="{{ $v->id }}" data-id='{{ $v->id }}' value="{{ $v->id }}" lay-skin="primary"> {{$v->id}}
                                    </td>
                                    <td>{{$v->name}}</td>
                                    <td>{{$v->createtime}}</td>
                                    <td>{{$v->post}}</td>
                                    <td>{{$v->payment}}</td>
                                    <td>{{$v->status}}</td> 
                                    <td>{{$v->ifpass}}</td>   
                                    <td class="td-manage">
                                      <a title="查看"  onclick="xadmin.open('查看','{{ url('interviewer/detail/'.$v->id) }}')" href="javascript:;">
                                        <i class="layui-icon">&#xe642;</i>
                                      </a>
                                       <a title="评价"  onclick="xadmin.open('评价','{{ url('interviewer/assess/'.$v->id) }}')" href="javascript:;">
                                        <i class="layui-icon">评</i>
                                      </a>                   
                                    </td>
                                  </tr>
                                 
                                   @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="layui-card-body ">
                            <div class="page">
                           
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
    
      
    </script>
@stop