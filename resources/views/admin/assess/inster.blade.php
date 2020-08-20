<!DOCTYPE html>
<html>
<head>
     <title>简历评价</title>
       <meta name="csrf-token" content="{{ csrf_token() }}">
        @include('admin.public.meta')
        @include('admin.public.styles')
        @include('admin.public.script')   
    </head>
      <body>
        <center>
          <form class="layui-form" >
            <span>
               <input name="ass_id" placeholder="ID"  type="hidden" lay-verify="required" value="{{$resume->id}}"  >
                <input name="paass_name" placeholder="ID"  type="hidden" lay-verify="required" value="{{$resume->name}}"  >
            </span>
          <table >
            <tr>
              <td class="td_left">项目</td>
              <td colspan="2" >评价</td>
            </tr>
            <tr>
              <td>综合素养</td>
              <td>依据条件评价，共5级（1很差，2比较差，3一般，4很好，5非常好）</td>
              <td class="td_right">得分</td>
            </tr>
            <tr>
              <td>1.职业修养</td>
              <td>相貌端正、衣着整洁、举止大方得体、个人修养好</td>
              <td id="sum_one">
            <select name="vocationa" lay-verify="required" class="layui-input-block"  >
              <option   value ="0"></option>
              <option   value ="2">很差</option>
              <option   value ="4">比较差</option>
              <option   value ="6">一般</option>
              <option   value ="8">很好</option>
              <option   value ="10">非常好</option>
            </select>
          </td>
            </tr>
        <tr>
          <td>2.责任感</td>
          <td>回答问题诚实、负责，有责任心</td>
          <td id="sum_one" > 
            <select name="duty" lay-verify="required" class="layui-input-block"  >
             <option   value ="0"></option>
              <option   value ="2">很差</option>
              <option   value ="4">比较差</option>
              <option   value ="6">一般</option>
              <option   value ="8">很好</option>
              <option   value ="10">非常好</option>
            </select>
          </td id="sum_one" >
        </tr>
        <tr>
          <td>3.自我认知</td>
          <td>能客观评价自己的优势和不足，对自身有清晰的定位</td>
          <td> 
            <select name="autognosis" lay-verify="required" class="layui-input-block"  >
             <option   value ="0"></option>
              <option   value ="2">很差</option>
              <option   value ="4">比较差</option>
              <option   value ="6">一般</option>
              <option   value ="8">很好</option>
              <option   value ="10">非常好</option>
            </select>
          </td>
        </tr>
        <tr>
          <td>4.工作动力</td>
          <td>强烈的进取精神，心态乐观，积极主动</td>
          <td id="sum_one" > 
            <select name="capacity" lay-verify="required" class="layui-input-block"  >
             <option   value ="0"></option>
              <option   value ="2">很差</option>
              <option   value ="4">比较差</option>
              <option   value ="6">一般</option>
              <option   value ="8">很好</option>
              <option   value ="10">非常好</option>
            </select>
          </td>
        </tr>
        <tr>
          <td>5.逻辑思维</td>
          <td>思路清晰，对事件描述符合逻辑、严密、有条理</td>
          <td id="sum_one" > 
           <select name="thought" lay-verify="required" class="layui-input-block"  >
            <option   value ="0"></option>
              <option   value ="0"></option>
              <option   value ="2">很差</option>
              <option   value ="4">比较差</option>
              <option   value ="6">一般</option>
              <option   value ="8">很好</option>
              <option   value ="10">非常好</option>
            </select>
           </td>
        </tr>
            <tr>
              <td colspan="3">专业技能</td>
            </tr>
        <tr>
          <td>1.网络、安全能力</td>
          <td>是否有网络、安全方面的工作经验</td>
          <td id="sum_one"> 
            <select name="network" lay-verify="required" class="layui-input-block"  >
              <option   value ="0"></option>
              <option   value ="2">很差</option>
              <option   value ="4">比较差</option>
              <option   value ="6">一般</option>
              <option   value ="8">很好</option>
              <option   value ="10">非常好</option>
            </select>
          </td>
        </tr>
        <tr>
          <td>2.主机存储 </td>
          <td>是否有主机和存储方面的工作经验</td>
          <td id="sum_one"> 
            <select name="mainframe" lay-verify="required" class="layui-input-block"  >
              <option   value ="0"></option>
              <option   value ="2">很差</option>
              <option   value ="4">比较差</option>
              <option   value ="6">一般</option>
              <option   value ="8">很好</option>
              <option   value ="10">非常好</option>
            </select>
          </td>
        </tr>
        <tr>
          <td>3.云计算及大数据</td>
          <td>对虚拟化是否接触，是否有实践经验</td>
          <td id="sum_one"> 
            <select name="bigdata" lay-verify="required" class="layui-input-block"  >
             <option   value ="0"></option>
              <option   value ="2">很差</option>
              <option   value ="4">比较差</option>
              <option   value ="6">一般</option>
              <option   value ="8">很好</option>
              <option   value ="10">非常好</option>
            </select>
          </td>
        </tr >
        <tr>
          <td>4.沟通协作</td>
          <td>思维逻辑是否清晰，语言表达能力及沟通的能力，是否有管理经验</td>
          <td id="sum_one"> 
            <select name="collaboration" lay-verify="required" class="layui-input-block"  >
              <option   value ="0"></option>
              <option   value ="2">很差</option>
              <option   value ="4">比较差</option>
              <option   value ="6">一般</option>
              <option   value ="8">很好</option>
              <option   value ="10">非常好</option>
            </select>
          </td>
        </tr>
        <tr>
          <td>5.相关证书（附加分)</td>
          <td> <input type="text" id="certificate" name="certificate"  autocomplete="off" class="layui-input"></td>
          <td id="sum_one"> 
            <select name="certificatescore"  class="layui-input-block"  >
              <option   value ="0">0</option>
              <option   value ="2">2</option>
              <option   value ="4">4</option>
              <option   value ="6">6</option>
              <option   value ="8">8</option>
              <option   value ="10">10</option>
            </select>
          </td>
        </tr>
        <tr>
              <td colspan="3" >其余评价</td>
                          </tr>
            <tr>
              <td colspan="5">
            <textarea name="evaluation" class="layui-textarea"></textarea>
          </td>
            </tr>
        </table>
      
           <table>
                <tr>
              <td>最终结果:</td>
          <td colspan="2">
           <select name="finalresult" lay-verify="required" class="layui-input-block">
              <option   value ="拟录用">拟录用</option>
              <option   value ="淘汰">淘汰</option>
              <option   value ="待定">待定</option>
              <option   value ="进入下轮面试">进入下轮面试</option>
            </select>
          </td>
          <td>评价人：</td>
           <td> <input type="text" id="ass_name" name="ass_name" value="{{session('interviewer.name')}}" autocomplete="off" class="layui-input"
            readonly="readonly"></td>
            
            </tr>
          </table>
           </table>
             <div class="form-group" >
                  <button  class="layui-btn" lay-filter="add" lay-submit="">提交评价</button>
             </div>
             <?php
             echo  date('Y-m-d', time());
             ?>
        </form>
      </center>
    </body>
    <style type="text/css">
    table{border-collapse:collapse;width: 800px;border: 1px solid black;}
    td{border: 1px solid black; }
    .td_left{border: 1px solid black;width: 150px;text-align: center;}
    .td_right{border: 1px solid black;width: 80px;text-align: center;}
    span{text-align: center;}
    </style>

    <script>
    layui.use(['form','layer','upload','element'], function(){
          $ = layui.jquery;
          var form = layui.form
          ,layer = layui.layer;
          var upload = layui.upload;
          var element = layui.element;
         //监听提交
          form.on('submit(add)', function(data){
            //发异步，把数据提交给php
              $.ajax({
                  type:'POST',
                  url:'/interviewer/assess/add',
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
</html>