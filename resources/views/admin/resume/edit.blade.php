@extends('admin.layouts.admin')
@section('title', '简历修改')
@section('center')
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
			</td>
			<td class="td_1">期望薪酬</td>
			<td class="td_1" >
				<p>{{ $resume->payment }}</p>	
			</td>
			<td class="td_1" rowspan="5" >
				<img  src="{{ $resume->file }}" width="100" height="150">
			</td>        
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
			<td class="td_m">第一学历毕业院校</td>
			<td class="td_m">
				<p>{{ $resume->firstschool }}</p>
			</td>
			<td class="td_m">最高学历毕业院校</td>
			<td class="td_m">
				<p>{{ $resume->maxschool }}</p>
			</td> 
		</tr>
		<tr>
			<td class="td_m">第一学历专业</td>
			<td class="td_m">
				<p>{{ $resume->firstdegree }}</p>
			</td>
			<td class="td_m">最高学历专业</td>
			<td class="td_m">
				<p>{{ $resume->maxdegree }}</p>
			</td> 
		</tr>
		<tr>
			<td class="td_m">第一学历毕业时间</td>
			<td class="td_m">
				<p>{{ $resume->firsttime }}</p>
			</td>
			<td class="td_m">最高学历毕业时间</td>
			<td class="td_m">
				<p>{{ $resume->maxtime }}</p>
			</td> 
		</tr>
	  </table>
	  <table >
	  	<tr>
			<td class="td_left" rowspan="3">工作经验</td>
			<td class="td_m" >公司名称</td>
			<td class="td_m" colspan="3">
				<p>{{ $resume->company }}</p>
			</td>
			
	  	</tr>
	  	<tr>
	  		<td class="td_m">职位名称</td>
			<td class="td_m">
				<p>{{ $resume->postname }}</p>
			</td> 
			<td class="td_m">在职时间</td>
			<td class="td_m">
				<p>{{ $resume->posttime }}</p>
			</td> 	
	  	</tr>
		<tr>
			<td class="td_m" >工作描述</td>
	  		<td class="td_m" colspan="3">
	  			<p>{{ $resume->jobdescription }}</p>
			</td>  
		
		</tr>
	  </table>
	  <table  >
	  	<tr>
			<td  rowspan="3" class="td_left">项目经历</td>
			<td class="td_m">项目名称</td>
			<td class="td_m" colspan="3"> 
				<p>{{ $resume->projectname }}</p>
			</td>
			
	  	</tr>
	  	<tr>
	  		<td class="td_m">项目简介</td>
			<td class="td_m">
				<p>{{ $resume->projectbrief }}</p>
			</td>
				
			<td class="td_m">项目时间</td>
			<td class="td_m">
				<p>{{ $resume->projecttime }}</p>
			</td>  
	  	</tr>
	  	<tr>
	  		<td class="td_m" >项目描述</td>
	  		<td class="td_m" colspan="5">
				<p>{{ $resume->projectdescription }}</p>
			</td>  
	  	</tr>
	  </table>
	  <table >
		<tr>
			<td class="td_left" >岗位技能</td>
			<td class="td_m" >相关证书</td>
			<td class="td_m" >
				<p>{{ $resume->idtype }}</p>
			</td>
			<td class="td_m"	 colspan="3">
				<p>{{ $resume->credential }}</p>
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
                <button  class="layui-btn" lay-filter="nopass" lay-submit="">未通过</button>
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
          //HR审核不通过
         form.on('submit(nopass)', function(data){
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
         form.on('submit(ktnopass)', function(data){
            var uid = $("input[name='uid']").val();
            //发异步，把数据提交给php
              $.ajax({
                  type:'PUT',
                  url:'/admin/resume/ktnopass/'+uid,
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
@stop