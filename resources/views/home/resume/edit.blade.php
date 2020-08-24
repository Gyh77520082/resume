@extends('home.layouts.default')
@section('title', '简历修改')
@section('center')
<center>
    <form class="layui-form" id="art_form" >
    	<input type="hidden" name="uid" value="{{$resume->id}}">
        <table >
            <input type="hidden" class="hidden" id="status" name="status"   value="未审核">
            <tr>
                <td  class="td_1"> 姓名</td>
                <td class="td_1" >
                    <input type="text" id="name" name="name" value="{{ $resume->name }}" autocomplete="off" class="layui-input">
                </td>
                <td class="td_1">应聘岗位</td>
                <td class="td_1" >
                    <select name="post" lay-verify="required" class="layui-input-block" >
                    	<option value="{{ $resume->post }}">{{ $resume->post }}</option>
                       @foreach($post as $v)
                        <option value="{{$v->post_id}}">{{$v->post_name}}</option>
                        @endforeach
                    </select>
                </td>
                <td class="td_1">期望薪酬</td>
                <td class="td_1" >
                    <input type="text" id="payment" name="payment" value="{{ $resume->payment }}" autocomplete="off" class="layui-input">
                </td>
                <td class="td_1" rowspan="5" >
                    <input type="hidden" id="img1" class="hidden" name="art_thumb" value="">
                    <button type="button" class="layui-btn" id="test1">
                        <i class="layui-icon">&#xe67c;</i>修改照片
                    </button>
                    <input type="file" name="photo" id="photo_upload" style="display: none;" />
                    <img  id="linshi" src="{{ $resume->photo }}" width="100" height="150">
                </td>
            </tr>
            <tr>
                <td class="td_1">出生年月</td>
                <td class="td_1">
                    <input type="date" id="birthday" name="birthday" value="{{ $resume->birthday }}" autocomplete="off" class="layui-input">
                </td>
                <td class="td_1">性别</td>
                <td class="td_1">
                    <select name="sex" lay-verify="required" class="layui-input-block" >
                    	<option value="{{ $resume->sex }}">{{ $resume->sex }}</option>
                        <option value="男">男</option>
                        <option value="女">女</option>
                    </select>
                </td>
                <td class="td_1">最快到岗时间</td>
                <td class="td_1">
                    <select name="arrivaltime" lay-verify="required" class="layui-input-block" >
                    	<option value="{{ $resume->arrivaltime }}">{{ $resume->arrivaltime }}</option>
                        <option value="随时">随时</option>
                        <option value="一周内">一周内</option>
                        <option value="一周以上一月以内">一月内</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="td_1">通信电话</td>
                <td class="td_1">
                    <input type="phone" id="phone" name="phone" value="{{ $resume->phone }}"autocomplete="off" class="layui-input">
                </td>
                <td class="td_1">邮箱</td>
                <td class="td_1">
                    <input type="email" id="email" name="email" value="{{ $resume->email }}" autocomplete="off" class="layui-input">
                </td>
                <td class="td_1">生源所在地</td>
                <td class="td_1">
                    <input type="text" id="native" name="native" value="{{ $resume->native }}" autocomplete="off" class="layui-input">
                </td>
            </tr>
            <tr>
                <td class="td_1">招聘信息获取途径</td>
                <td class="td_1" colspan="3" >
                    <select name="approach" lay-verify="required" class="layui-input-block" >
                    	 <option value="{{ $resume->approach }}">{{ $resume->approach }}</option>
                        <option value="校园招聘">校园招聘</option>
                        <option value="BOSS直聘">BOSS直聘</option>
                        <option value="智联招聘">智联招聘</option>
                        <option value="其他途径">其他途径</option>
                    </select>
                </td>

                <td class="td_1">政治面貌</td>
                <td class="td_1">
                    <input type="text" id="politics" name="politics" value="{{ $resume->politics }}" autocomplete="off" class="layui-input">
                </td>
            </tr>
            <tr>
                <td class="td_1">通信地址</td>
                <td class="td_1" colspan="3">
                    <input type="text" id="address" name="address" value="{{ $resume->address }}" autocomplete="off" class="layui-input">

                </td>
                <td class="td_1">婚姻状况</td>
                <td class="td_1">
                    <select name="marital" lay-verify="required" class="layui-input-block" >
                    	<option value="{{ $resume->marital }}">{{ $resume->marital }}</option>
                        <option value="未婚">未婚</option>
                        <option value="已婚">已婚</option>
                    </select>
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td class="td_left" rowspan="3">教育背景</td>
                <td class="td_m" colspan="2">第一学历毕业院校</td>
                <td class="td_m" colspan="2">
                    <input type="text" id="firstschool" name="firstschool"  value="{{ $resume->firstschool }}" autocomplete="off" class="layui-input">
                </td>
                <td class="td_m" colspan="2" >最高学历毕业院校</td>
                <td class="td_m" colspan="2">
                    <input type="text" id="maxschool" name="maxschool"   value="{{ $resume->maxschool }}" autocomplete="off" class="layui-input">
                </td>
            </tr>
            <tr>
                <td class="td_m">第一学历</td>
                <td class="td_m">
                    <input type="text" id="firsteducation" name="firsteducation"  value="{{ $resume->firsteducation }}" autocomplete="off" class="layui-input">
                </td>
                <td class="td_m">专业</td>
                <td class="td_m">
                    <input type="text" id="firstmajor" name="firstmajor" value="{{ $resume->firstmajor }}" autocomplete="off" class="layui-input">
                </td>
                <td class="td_m">最高学历</td>

                <td class="td_m">
                    <input type="text" id="maxeducation" name="maxeducation" value="{{ $resume->maxeducation }}"  autocomplete="off" class="layui-input">
                </td>
                 <td class="td_m">专业</td>
                <td class="td_m">
                    <input type="text" id="maxmajor" name="maxmajor"  value="{{ $resume->maxmajor }}" autocomplete="off" class="layui-input">
                </td>
            </tr>
            <tr>
                <td class="td_m" colspan="2">第一学历毕业时间</td>
                <td class="td_m" colspan="2">
                    <input type="date" id="firsttime" name="firsttime"  value="{{ $resume->firsttime }}" autocomplete="off" class="layui-input">
                </td>
                <td class="td_m" colspan="2">最高学历毕业时间</td>
                <td class="td_m" colspan="2">
                    <input type="date" id="maxtime" name="maxtime"  value="{{ $resume->maxtime }}"  autocomplete="off" class="layui-input">
                </td>
            </tr>
        </table>
        @foreach($resume->company as $v)
	  	<table id="company_info">
            <tr>
                <td class="td_left" rowspan="3">工作经验</td>
                <td class="td_m" >公司名称</td>
                <td class="td_m" colspan="5">
                    <input type="text" id="company" name="company[]"  value="{{ $v->company }}" autocomplete="off" class="layui-input" >
                </td>
            </tr>
            <tr>
                <td class="td_m">职位名称</td>
                <td class="td_m">
                    <input type="text"  name="postname[]"  value="{{ $v->postname }}" autocomplete="off" class="layui-input">
                </td>
                <td class="td_m">在职时间</td>
                <td class="td_m">
                    <input type="date"  name="postmin[]"  value="{{ $v->postmin }}" autocomplete="off" class="layui-input">
                </td>
                <td style="width:10px;">至</td>
                <td class="td_m">
                    <input type="date"  name="postmax[]"  value="{{ $v->postmax }}" autocomplete="off" class="layui-input">
                </td>
            </tr>
            <tr>
                <td class="td_m" >工作描述</td>
                <td class="td_m" colspan="5">
                    <textarea name="jobdescription[]"   class="layui-textarea" >{{ $v->jobdescription }}</textarea>
                </td>
            </tr>
        </table >
	  	@endforeach
        <div id="add_com"></div>
        <div onclick="addcompany()" style="width: 100px;background-color: red;">添加工作经历</div>
    
    @foreach($resume->project as $v)
	 <table id="project_info">
            <tr>
                <td  rowspan="3" class="td_left">项目经历</td>
                <td class="td_m">项目名称</td>
                <td class="td_m" colspan="5">
                    <input type="text" id="projectname" name="projectname[]"  value="{{ $v->projectname }}" autocomplete="off" class="layui-input">
                </td>

            </tr>
            <tr>
                <td class="td_m">项目简介</td>
                <td class="td_m">
                    <input type="text" id="projectbrief" name="projectbrief[]" value="{{ $v->projectbrief }}"  autocomplete="off" class="layui-input">
                </td>
                <td class="td_m">项目时间</td>
                <td class="td_m">
                    <input type="date"  name="projectmin[]" value="{{ $v->projectmin }}"  autocomplete="off" class="layui-input">
                </td>
                <td style="width:10px;">至</td>
                <td class="td_m">
                    <input type="date"  name="projectmax[]" value="{{ $v->projectmax }}"  autocomplete="off" class="layui-input">
                </td>
            </tr>
            <tr>
                <td class="td_m" >项目描述</td>
                <td class="td_m" colspan="5">
                    <textarea name="projectdescription[]" class="layui-textarea">{{ $v->projectdescription }}</textarea>
                </td>
            </tr>
        </table>
	  @endforeach
        
     
        <div id="add_pro"></div>
         <div onclick="addproject()" style="width: 100px;background-color: red;">添加项目经历</div>
        <table >
            <tr>
                <td class="td_left" >岗位技能</td>
                <td class="td_m" >相关证书</td>
                <td class="td_m" >
                    <select name="idtype" lay-verify="required"  >
                    	
                    	<option   value ="{{ $resume->idtype }}">{{ $resume->idtype }}</option>
                        <option   value ="暂无">暂无</option>
                        <option   value ="主机类">主机类</option>
                        <option   value ="网络类">网络类</option>
                        <option   value="数据库类">数据库类</option>
                        <option   value="安全类">安全类</option>
                        <option   value="其他类">其他类</option>
                    </select>
                </td>
                <td class="td_m">
                    <textarea name="credential" class="layui-textarea">{{ $resume->credential }}</textarea>
                </td>
                <td class="td_left" >兴趣爱好</td>
                <td class="td_m"     >
                    <textarea name="hobbies" class="layui-textarea">{{ $resume->hobbies }}</textarea>
                </td>
            </tr>
            <tr>
                <td class="td_left">自我评价 &nbsp;</td>
                <td class="td_m" colspan="5">
                    <textarea name="introduce" class="layui-textarea"   >{{ $resume->introduce }}</textarea>
                </td>
            </tr>
        </table>
       
        <div class="form-group" >
            <button  class="layui-btn" lay-filter="edit" lay-submit="">提交修改</button>
        </div>
    </form>
</center>
    <script>
    var num=0;
    //添加工作经历
    function addcompany() {
        var tb1=document.getElementById("company_info");
        var tb2=document.createElement("table");
        num++;
        tb2.id="table"+num;
        tb2.innerHTML=tb1.innerHTML;
        tb2.style=tb1.style;
        tb2.innerHTML=tb2.innerHTML+"<div class='delete_note' onclick=deletetb('table"+num+"')><i class='fa fa-window-close'></i></div></tr>";
        document.getElementById("add_com").appendChild(tb2);
    };
    //添加项目
      function addproject() {
        var tb1=document.getElementById("project_info");
        var tb2=document.createElement("table");
        num++;
        tb2.id="table"+num;
        tb2.innerHTML=tb1.innerHTML;
        tb2.style=tb1.style;
        tb2.innerHTML=tb2.innerHTML+"<div class='delete_note' onclick=deletetb('table"+num+"')><i class='fa fa-window-close'></i></div></tr>";
        document.getElementById("add_pro").appendChild(tb2);
    };
   //删除
    function deletetb(tb_name){
        var tb=document.getElementById(tb_name);
        if(tb){
            tb.parentNode.removeChild(tb);
        }
    }

    layui.use(['form','layer','upload','element'], function(){
        $ = layui.jquery;
        var form = layui.form
            ,layer = layui.layer;
        var upload = layui.upload;
        var element = layui.element;
        //文件上传
        $('#test1').on('click',function () {
            $('#photo_upload').trigger('click');
            $('#photo_upload').on('change',function () {
                var obj = this;
                var formData = new FormData($('#art_form')[0]);
                $.ajax({
                    url: '/upload',
                    type: 'post',
                    data: formData,
                    // 因为data值是FormData对象，不需要对数据做处理
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data){
                        if(data['ServerNo']=='200'){
                            // 如果成功
                            $('#art_thumb_img').attr('src', '/uploads/'+data['ResultData']);
                            $('input[name=art_thumb]').val('/uploads/'+data['ResultData']);
                            document.getElementById("linshi").src ='/uploads/'+data['ResultData'];
                            $(obj).off('change');
                        }else{
                            // 如果失败
                            alert(data['ResultData']);
                        }
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        var number = XMLHttpRequest.status;
                        var info = "错误号"+number+"文件上传失败!";
                        // 将菊花换成原图
                        // $('#pic').attr('src', '/file.png');
                        alert(info);
                    },
                    async: true
                });
            });
        });
        //简历修改
        form.on('submit(edit)', function(data){
            var uid = $("input[name='uid']").val();
            //发异步，把数据提交给php
              $.ajax({
                  type:'PUT',
                  url:'/resume/update/'+uid,
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