@extends('admin.layouts.admin')
@section('title', '简历列表')
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
                                   <select name="status" class="layui-input-block"  >
                                   <option value="">请输入选择是否审核</option>  
                                   <option value="未审核">未审核</option>
                                   <option value="已审核">已审核</option>
                                   <option value="HR审核通过">HR审核通过</option>  
                                   </select>
                                </div>
                                 <div class="layui-inline layui-show-xs-block">
                                   <select name="ifpass" class="layui-input-block"  >
                                   <option value="">请输入是否通过</option>  
                                   <option value="已通过">已通过</option>
                                   <option value="待面试">待面试</option>
                                   <option value="待修改">待修改</option> 
                                    <option value="不符合条件">不符合条件</option>   
                                   </select>
                                </div>
                                 <div class="layui-inline layui-show-xs-block">
                                   <select name="post"  class="layui-input-block" >
                                    <option value="">请输入岗位</option> 
                                    @foreach($postes as $v)
                                   <option value="{{$v->post_name}}">{{$v->post_name}}</option>
                                    @endforeach
                                </select>
                                </div>
                                
                                <div class="layui-inline layui-show-xs-block">
                                   <input type="text" name="name" value="{{ $request->input('name') }}"  placeholder="请输入姓名" autocomplete="off" class="layui-input">
                                </div>
                                <div class="layui-inline layui-show-xs-block">
                                    <button class="layui-btn"  lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
                                </div>
                            </form>
                        </div>
                        <div class="layui-card-header">
                            <button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon"></i>批量删除</button>共有数据：{{$total}} 条</span>
                            
                        </div>
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
                                      <a title="查看"  onclick="xadmin.open('查看','{{ url('admin/resume/'.$v->id.'/edit') }}')" href="javascript:;">
                                        <i class="layui-icon">&#xe642;</i>
                                      </a>
                                        <a title="群发"  onclick="xadmin.open('群发','{{ url('admin/resume/pocket/'.$v->id) }}')" href="javascript:;">
                                        <i class="layui-icon">群发</i>
                                      </a>
                                      @if($v->ifpass=='已面试')
                                      <a title="查看评价"  onclick="xadmin.open('查看评价','{{ url('admin/assess/detail/'.$v->id) }}')" href="javascript:;">
                                        <i class="layui-icon">查评</i>
                                      </a>
                                      @endif
                                     <a  href="{{ url('admin/resume/export/'.$v->id) }}"   title="导出">
                                        <i class="layui-icon">&#xe6af;</i>
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
                            {{$resume->appends($request->all())->render()}}
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
      //删除
      function member_del(obj,id){
          layer.confirm('确认要删除吗？',function(index){

              $.post('/admin/resume/'+id,{"_method":"delete","_token":"{{csrf_token()}}"},function(data){
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
      //批量删除
      function delAll (argument) {
        var ids = [];
        // 获取选中的id 
        $('tbody input').each(function(index, el) {
            if($(this).prop('checked')){
               ids.push($(this).val())
            }
        });
        layer.confirm('确认要删除吗？',function(index){
            $.post('/admin/resume/del',{'ids':ids,"_token":"{{csrf_token()}}"},function(data){
                 layer.msg('删除成功', {icon: 1});
            $(".layui-form-checked").not('.header').parents('tr').remove();
            });
        });
      }
    </script>
@stop