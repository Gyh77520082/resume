@extends('home.layouts.default')
@section('title', '简历投递')
@section('center')
<meta charset="UTF-8">
<style>
    .hover-1{
        cursor:pointer;
    }
    .custom-btn {
        width: 130px;
        height: 40px;
        /*padding: 10px 25px;*/
        border: 2px solid #000;
        font-family: 'Lato', sans-serif;
        font-weight: 500;
        line-height: 40px;
        background: transparent;
        cursor: pointer;
        transition: all 0.3s ease;
        position: relative;
        display: inline-block;
    }
    .btn-10 {
        transition: all 0.3s ease;
        overflow: hidden;
    }
    .btn-10:after {
        position: absolute;
        content: " ";
        top: 0;
        left: 0;
        z-index: -1;
        width: 100%;
        height: 100%;
        transition: all 0.3s ease;
        -webkit-transform: scale(.1);
        transform: scale(.1);
    }
    .btn-10:hover {
        color: #fff;
    }
    .btn-10:hover:after {
        background: #000;
        -webkit-transform: scale(1);
        transform: scale(1);
    }
</style>
<center>
    <form class="layui-form" id="art_form" style="padding-top: 110px;">
        <table >
            <input type="hidden" class="hidden" id="status" name="status"   value="未审核">
            <tr>
                <td  class="td_1"> <span >*</span>姓名</td>
                <td class="td_1" >
                    <input type="text" id="name" name="name" required="" lay-verify="required" autocomplete="off" class="layui-input">
                </td>
                <td class="td_1"><span >*</span>应聘岗位</td>
                <td class="td_1" >
                    <select name="post" lay-verify="required" class="layui-input-block" >
                        @foreach($post as $v)
                        <option value="{{$v->post_id}}">{{$v->post_name}}</option>
                        @endforeach
                    </select>
                </td>
                <td class="td_1"><span >*</span>期望薪酬</td>
                <td class="td_1" >
                    <input type="text" id="payment" name="payment" required="" lay-verify="required" autocomplete="off" class="layui-input">
                </td>
                <td class="td_1" rowspan="5" >
                    <input type="hidden" id="img1" class="hidden" name="art_thumb" value="">
                    <button type="button" class="layui-btn" id="test1">
                        <i class="layui-icon">&#xe67c;</i>上传照片
                    </button>
                    <input type="file" name="photo" id="photo_upload" style="display: none;" />
                    <img id="linshi" src="" width="100" height="100">
                </td>
            </tr>
            <tr>
                <td class="td_1"><span >*</span>出生年月</td>
                <td class="td_1">
                    <input type="date" id="birthday" name="birthday" required="" lay-verify="required" autocomplete="off" class="layui-input">
                </td>
                <td class="td_1"><span >*</span>性别</td>
                <td class="td_1">
                    <select name="sex" lay-verify="required" class="layui-input-block" >
                        <option value="男">男</option>
                        <option value="女">女</option>
                    </select>
                </td>
                <td class="td_1"><span >*</span>最快到岗时间</td>
                <td class="td_1">
                    <select name="arrivaltime" lay-verify="required" class="layui-input-block" >
                        <option value="随时">随时</option>
                        <option value="一周内">一周内</option>
                        <option value="一周以上一月以内">一月内</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="td_1"><span >*</span>通信电话</td>
                <td class="td_1">
                    <input type="phone" id="phone" name="phone" required="" lay-verify="phone" autocomplete="off" class="layui-input">
                </td>
                <td class="td_1"><span >*</span>邮箱</td>
                <td class="td_1">
                    <input type="email" id="email" name="email" required="" lay-verify="email" autocomplete="off" class="layui-input">
                </td>
                <td class="td_1"><span >*</span>生源所在地</td>
                <td class="td_1">
                    <input type="text" id="native" name="native" required="" lay-verify="required" autocomplete="off" class="layui-input">
                </td>
            </tr>
            <tr>
                <td class="td_1"><span >*</span>招聘信息获取途径</td>
                <td class="td_1" colspan="3" >
                    <select name="approach" lay-verify="required" class="layui-input-block" >
                        <option value="校园招聘">校园招聘</option>
                        <option value="BOSS直聘">BOSS直聘</option>
                        <option value="智联招聘">智联招聘</option>
                        <option value="其他途径">其他途径</option>
                    </select>
                </td>

                <td class="td_1">政治面貌</td>
                <td class="td_1">
                    <input type="text" id="politics" name="politics"  autocomplete="off" class="layui-input">
                </td>
            </tr>
            <tr>
                <td class="td_1"><span >*</span>通信地址</td>
                <td class="td_1" colspan="3">
                    <input type="text" id="address" name="address" required="" lay-verify="required" autocomplete="off" class="layui-input">

                </td>
                <td class="td_1">婚姻状况</td>
                <td class="td_1">
                    <select name="marital" lay-verify="required" class="layui-input-block" >
                        <option value="未婚">未婚</option>
                        <option value="已婚">已婚</option>
                    </select>
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td class="td_left" rowspan="3">教育背景</td>
                <td class="td_m" colspan="2"><span >*</span>第一学历毕业院校</td>
                <td class="td_m" colspan="2">
                    <input type="text" id="firstschool" name="firstschool" required="" lay-verify="required" autocomplete="off" class="layui-input">
                </td>
                <td class="td_m" colspan="2" >最高学历毕业院校</td>
                <td class="td_m" colspan="2">
                    <input type="text" id="maxschool" name="maxschool"  autocomplete="off" class="layui-input">
                </td>
            </tr>
            <tr>
                <td class="td_m"><span >*</span>第一学历</td>
                <td class="td_m">
                    <input type="text" id="firsteducation" name="firsteducation" required="" lay-verify="required" autocomplete="off" class="layui-input">
                </td>
                <td class="td_m"><span >*</span>专业</td>
                <td class="td_m">
                    <input type="text" id="firstmajor" name="firstmajor" required="" lay-verify="required" autocomplete="off" class="layui-input">
                </td>
                <td class="td_m">最高学历</td>

                <td class="td_m">
                    <input type="text" id="maxeducation" name="maxeducation"   autocomplete="off" class="layui-input">
                </td>
                <td class="td_m">专业</td>
                <td class="td_m">
                    <input type="text" id="maxmajor" name="maxmajor"  autocomplete="off" class="layui-input">
                </td>
            </tr>
            <tr>
                <td class="td_m" colspan="2"><span >*</span>第一学历毕业时间</td>
                <td class="td_m" colspan="2">
                    <input type="date" id="firsttime" name="firsttime"  required="" lay-verify="required" autocomplete="off" class="layui-input">
                </td>
                <td class="td_m" colspan="2">最高学历毕业时间</td>
                <td class="td_m" colspan="2">
                    <input type="date" id="maxtime" name="maxtime"   autocomplete="off" class="layui-input">
                </td>
            </tr>
        </table>
        <table id="company_info">
            <tr>
                <td class="td_left" rowspan="3">工作经验</td>
                <td class="td_m" ><span >*</span>公司名称</td>
                <td class="td_m" colspan="5">
                    <input type="text" id="company" name="company[]" required="" lay-verify="required" autocomplete="off" class="layui-input" >
                </td>
            </tr>
            <tr>
                <td class="td_m"><span >*</span>职位名称</td>
                <td class="td_m">
                    <input type="text"  name="postname[]" required="" lay-verify="required" autocomplete="off" class="layui-input">
                </td>
                <td class="td_m"><span >*</span>在职时间</td>
                <td class="td_m">
                    <input type="date"  name="postmin[]" required="" lay-verify="required" autocomplete="off" class="layui-input">
                </td>
                <td style="width:10px;">至</td>
                <td class="td_m">
                    <input type="date"  name="postmax[]" required="" lay-verify="required" autocomplete="off" class="layui-input">
                </td>
            </tr>
            <tr>
                <td class="td_m" ><span >*</span>工作描述</td>
                <td class="td_m" colspan="5">
                    <textarea name="jobdescription[]" class="layui-textarea" required="" lay-verify="required"></textarea>
                </td>
            </tr>
        </table >
        <div id="add_com"></div>
        <div onclick="addcompany()" class="btn-10 custom-btn">添加工作经历</div>

        <table id="project_info">

            <tr>
                <td  rowspan="3" class="td_left"><span >*</span>项目经历</td>
                <td class="td_m"><span >*</span>项目名称</td>
                <td class="td_m" colspan="5">
                    <input type="text" id="projectname" name="projectname[]" required="" lay-verify="required" autocomplete="off" class="layui-input">
                </td>

            </tr>
            <tr>
                <td class="td_m"><span >*</span>项目简介</td>
                <td class="td_m">
                    <input type="text" id="projectbrief" name="projectbrief[]" required="" lay-verify="required" autocomplete="off" class="layui-input">
                </td>
                <td class="td_m"><span >*</span>项目时间</td>
                <td class="td_m">
                    <input type="date"  name="projectmin[]" required="" lay-verify="required" autocomplete="off" class="layui-input">
                </td>
                <td style="width:10px;">至</td>
                <td class="td_m">
                    <input type="date"  name="projectmax[]" required="" lay-verify="required" autocomplete="off" class="layui-input">
                </td>
            </tr>
            <tr>
                <td class="td_m" ><span >*</span>项目描述</td>
                <td class="td_m" colspan="5">
                    <textarea name="projectdescription[]" required="" lay-verify="required" class="layui-textarea"></textarea>
                </td>
            </tr>
        </table>
        </table >
        <div id="add_pro"></div>
        <div onclick="addproject()" class="btn-10 custom-btn">添加项目经历</div>
        <table >
            <tr>
                <td class="td_left" >岗位技能</td>
                <td class="td_m" >相关证书</td>
                <td class="td_m" >
                    <select name="idtype" lay-verify="required"  >
                        <option   value ="暂无">暂无</option>
                        <option   value ="主机类">主机类</option>
                        <option   value ="网络类">网络类</option>
                        <option   value="数据库类">数据库类</option>
                        <option   value="安全类">安全类</option>
                        <option   value="其他类">其他类</option>
                    </select>
                </td>
                <td class="td_m">
                    <textarea name="credential" class="layui-textarea"></textarea>
                </td>
                <td class="td_left" >兴趣爱好</td>
                <td class="td_m"     >
                    <textarea name="hobbies" class="layui-textarea"></textarea>
                </td>
            </tr>
            <tr>
                <td class="td_left"><span >*</span>自我评价</td>
                <td class="td_m" colspan="5">
                    <textarea name="introduce" class="layui-textarea"  required="" lay-verify="required" ></textarea>
                </td>
            </tr>
        </table>
        <div>
            <a style="margin-right:400px;" >注：<span>*</span>为必填项 如有多个工作经历则填写工作时间最长或者于当前工作最为接近的工作填写</a>
        </div>
        <div class="form-group" >
            <button  class="layui-btn" lay-filter="add" lay-submit="">提交简历</button>
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
        tb2.innerHTML=tb2.innerHTML+"<div class='delete_note' onclick=deletetb('table"+num+"')><i class='fa fa-window-close hover-1'></i></div></tr>";
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
        tb2.innerHTML=tb2.innerHTML+"<div class='delete_note' onclick=deletetb('table"+num+"')><i class='fa fa-window-close hover-1'></i></div></tr>";
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
        //简历添加
        form.on('submit(add)', function(data){
            //发异步，把数据提交给php
            $.ajax({
                type:'POST',
                url:'/resume/add',
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
                error:function(){
                    //错误信息
                }
            });
            return false;
        });
    });
</script>
@stop
