<!DOCTYPE html>
<html>
<head>
     <title>查看简历</title>
       <meta name="csrf-token" content="{{ csrf_token() }}">
        @include('admin.public.meta')
        @include('admin.public.styles')
        @include('admin.public.script')
        
    </head>
<body>
	<center>
	 <form class="layui-form" id="art_form" >
	 	 <input type="hidden" name="uid" value="{{$resume->id}}">
	  <table >
	    <tr>
			<td  class="td_1"> 姓名</td>
			<td class="td_1" >
				<p>{{ $resume->name }}</p>
			</td>
			<td class="td_1">应聘岗位</td>
			<td class="td_1" >
				<p>{{ $resume->post }}</p>
			<td class="td_1">期望薪酬</td>
			<td class="td_1" >
				<p>{{ $resume->payment }}</p>	
			</td>
			@if($resume->photo==null)
				<td class="td_1" rowspan="5" >
					<P>未上传头像</P>
				</td> 
			@else
				<td class="td_1" rowspan="5" >
					<img  src="{{ $resume->photo }}" width="100" height="150">
				</td> 
			@endif           
		</tr>
		<tr>
			<td class="td_1">出生年月</td>
			<td class="td_1"> 
				<p>{{ $resume->birthday }}</p>
			</td>
			<td class="td_1">性别</td>
			<td class="td_1">
     			<p>{{ $resume->sex }}</p>
			</td>
			<td class="td_1">最快到岗时间</td>
			<td class="td_1">
				<p>{{ $resume->arrivaltime }}</p>
			</td>
		</tr>
		<tr>
			<td class="td_1">通信电话</td>
			<td class="td_1"> 
				<p>{{ $resume->phone }}</p>	
			</td>
			<td class="td_1">邮箱</td>
			<td class="td_1">
				<p>{{ $resume->email }}</p>
			</td>
			<td class="td_1">生源所在地</td>	
			<td class="td_1">
				<p>{{ $resume->native }}</p>
			</td>
		</tr>
		<tr>
			<td class="td_1">招聘信息获取途径</td>
			<td class="td_1"  colspan="3" >
				<p>{{ $resume->approach }}</p>
			</td>
				
			<td class="td_1">政治面貌</td>
			<td class="td_1"> 
				<p>{{ $resume->politics }}</p>
			</td>
		</tr>
		<tr>
			<td class="td_1">通信地址</td>
			<td class="td_1" colspan="3">
				<p>{{ $resume->address }}</p>
			</td>
			<td class="td_1">婚姻状况</td>
			<td class="td_1">	
				<p>{{ $resume->marital }}</p>
      		</td>
		</tr> 
	  </table>
	  <table>
		<tr>
			<td class="td_left" rowspan="3">教育背景</td>
			<td class="td_m" colspan="2">第一学历毕业院校</td>
			<td class="td_m" colspan="2">
				<p>{{ $resume->firstschool }}</p>
			</td>
			<td class="td_m" colspan="2">最高学历毕业院校</td>
			<td class="td_m" colspan="2">
				<p>{{ $resume->maxschool }}</p>
			</td> 
		</tr>
		<tr>
			<td class="td_m">第一学历</td>
                <td class="td_m">
                   <p>{{ $resume->firsteducation }}</p>
                </td>
                <td class="td_m"><span >*</span>专业</td>
                <td class="td_m">
                	<p>{{ $resume->firstmajor }}</p>
                   
                </td>
                <td class="td_m">最高学历</td>

                <td class="td_m">
                	<p>{{ $resume->maxeducation }}</p>
                    
                </td>
                <td class="td_m">专业</td>
                <td class="td_m">
                	<p>{{ $resume->maxmajor }}</p>
                </td>
		</tr>
		<tr>
			<td class="td_m" colspan="2">第一学历毕业时间</td>
			<td class="td_m" colspan="2">
				<p>{{ $resume->firsttime }}</p>
			</td>
			<td class="td_m" colspan="2">最高学历毕业时间</td>
			<td class="td_m" colspan="2">
				<p>{{ $resume->maxtime }}</p>
			</td> 
		</tr>
	  </table>
	  @foreach($resume->company as $v)
	  <table >
	  	<tr>
			<td class="td_left" rowspan="3">工作经验</td>
			<td class="td_m" >公司名称</td>
			<td class="td_m" colspan="5">
				<p>{{ $v->company }}</p>
			</td>
			
	  	</tr>
	  	<tr>
	  		<td class="td_m">职位名称</td>
			<td class="td_m">
				<p>{{ $v->postname }}</p>
			</td> 
			<td class="td_m">在职时间</td>
			<td class="td_m">
				<p>{{ $v->postmin }}</p>
			</td> 	
			<td style="width:10px;">至</td>
			<td class="td_m">
				<p>{{  $v->postmax }}</p>
			</td> 
	  	</tr>
		<tr>
			<td class="td_m" >工作描述</td>
	  		<td class="td_m" colspan="5">
	  			<p>{{ $v->jobdescription }}</p>
			</td>  
		</tr>
	  </table>
	  @endforeach
	  @foreach($resume->project as $v)
	  <table  >
	  	<tr>
			<td  rowspan="3" class="td_left">项目经历</td>
			<td class="td_m">项目名称</td>
			<td class="td_m" colspan="5"> 
				<p>{{ $v->projectname }}</p>
			</td>
	  	</tr>
	  	<tr>
	  		<td class="td_m">项目简介</td>
			<td class="td_m">
				<p>{{ $v->projectbrief }}</p>
			</td>
				
			<td class="td_m">项目时间</td>
			<td class="td_m">
				<p>{{ $v->projectmin }}</p>
			</td>  
			<td style="width:10px;">至</td>
			<td class="td_m">
				<p>{{ $v->projectmax }}</p>
			</td> 
	  	</tr>
	  	<tr>
	  		<td class="td_m" >项目描述</td>
	  		<td class="td_m" colspan="5">
				<p>{{ $v->projectdescription }}</p>
			</td>  
	  	</tr>
	  </table>
	  @endforeach
	  <table >
		<tr>
			<td class="td_left" >岗位技能</td>
			<td class="td_m" >相关证书</td>
			<td class="td_m" >
				<p>{{ $resume->idtype }}</p>
			</td>
			<td class="td_m" >
				<p>{{ $resume->credential }}</p>
			</td> 
			<td class="td_left" >兴趣爱好</td>
			<td class="td_m"	 >
				<p>{{ $resume->hobbies }}</p>
			</td> 
		</tr>
		<tr>
	  		<td class="td_left">自我评价</td>
	  		<td class="td_m" colspan="5">
	  			<p>{{ $resume->introduce }}</p>
			</td> 
	  	</tr>
	  </table>
	  
		<table>
	  	<tr>
	  		<td class="td_footer">
	  			<div class="layui-form-item">
                <button  class="layui-btn" lay-filter="pass" lay-submit="">通过</button>
            </div>
	  		</td>
	  		<td class="td_footer">
	  			<div class="layui-form-item">
                <button  class="layui-btn" lay-filter="topass" lay-submit="">简历有误</button>
            </div>
	  		</td>
	  		<td class="td_footer">
	  			<div class="layui-form-item">
                <button  class="layui-btn" lay-filter="nopass" lay-submit="">淘汰</button>
            </div>
	  		</td>
	  	</tr>
	  	</table>

	 </form>
	</center>
	</body>

	<style type="text/css">
		table{border-collapse:collapse;width: 1000px;border: 1px solid bla}
		.td_1{border: 1px solid black;width: 120px;height: 40px;text-align: center;}
		.td_left{border: 1px solid black;width: 10px;height: 10px;text-align: cen}
		.td_m{border: 1px solid black;width: 150px;height: 40px;text-align: cen}
		.td_foot{border: 1px solid black;width: 150px;text-align: center;}
		.td_footer{text-align: center;}
	</style>
	 <script>
	 	layui.use(['form','layer'], function(){
            $ = layui.jquery;
          var form = layui.form
          ,layer = layui.layer;
          //HR审核通过请求
          form.on('submit(pass)', function(data){
            var uid = $("input[name='uid']").val();
            //发异步，把数据提交给php
              $.ajax({
                  type:'PUT',
                  url:'/admin/resume/dopass/'+uid,
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
                  error:function(){    //错误信息
                  }
              });
            return false;
          });
          //简历有误回馈
         form.on('submit(topass)', function(data){
         	 var str = "<div><h4>发送邮件给简历投递人</h4><p>邮箱：{{ $resume->email }}</p></div>";
   			 layer.confirm(str, {btn: ['确定', '取消'], title: "错误返回"}, function () {
  
          	 var uid = $("input[name='uid']").val();
            //发异步，把数据提交给php
              $.ajax({
                  type:'PUT',
                  url:'/admin/resume/topass/'+uid,
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
                  error:function(){    //错误信息
                  }
              });
             });
            return false;
          });
         //不通过
         form.on('submit(nopass)', function(data){
            var uid = $("input[name='uid']").val();
            //发异步，把数据提交给php
              $.ajax({
                  type:'PUT',
                  url:'/admin/resume/nopass/'+uid,
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
                  error:function(){    //错误信息
                  }
              });
            return false;
          });

        });
          </script>

</html>