<!DOCTYPE html>
<html class="x-admin-sm">
    <head> 
        <title>发送邮件</title>
        <meta name="csrf-token" content="{{ csrf_token() }}"> 
        @include('admin.public.meta')
        @include('admin.public.styles')
        @include('admin.public.script')
    </head>
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
                            <button class="layui-btn layui-btn-danger" onclick="doPocket()"><i class="layui-icon"></i>发送邮件</button>
                        </div>
                        <div class="layui-card-body layui-table-body layui-table-main">
                            <table class="layui-table layui-form">
                                <thead>
                                  <tr>
                                    <input type="hidden" name="uid" value="{{ $resume->id }}">
                                    
                                    <th>
                                      <input type="checkbox" lay-filter="checkall" name="" lay-skin="primary">
                                    </th>
                                    <th>ID</th>
                                    <th>用户名</th>
                                    <th>邮箱</th>
                                </thead>
                                <tbody>
                                  @foreach($eemail as $v)
                                  <tr>
                                    <td>
                                     <input type="checkbox" name="{{ $v->id }}" value="{{ $v->id }}" data-id='{{ $v->id }}'  lay-skin="primary">
                                    </td>
                                    <td>{{ $v->id }}</td>
                                    <td>{{ $v->name }}</td>
                                    <td>{{ $v->email }}</td>
                                  </tr>
                                  @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
         @include('admin.public.footer')
    </body>
    <script>
      layui.use(['laydate','form'], function(){var laydate = layui.laydate;var  form = layui.form;
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
      //批量删除
      function doPocket(argument) {
          // 获取到要批量删除的用户的id
          var ids = [];
          var uid = $("input[name='uid']").val();
            $('tbody input').each(function(index, el) {
              if($(this).prop('checked')){
                 ids.push($(this).val())
              }
          });
        layer.confirm('确实要发送邮件吗？',function(index){
              $.post('/admin/resume/dopocket/'+ids+'/'+uid,{'ids':ids,"_token":"{{csrf_token()}}"},function(data){
                 layer.msg('发送邮件提醒成功', {icon: 1});
         
            });
        });
         
      }
    </script>
</html>