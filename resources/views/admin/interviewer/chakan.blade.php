@extends('admin.layouts.admin')
@section('title', '查看评价')
@section('center')
      <body>
        <center>
          <form class="layui-form" id="art_form">
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
              <td>
             <p> {{$assess->vocationa}} </p>
          </td>
            </tr>
        <tr>
          <td>2.责任感</td>
          <td>回答问题诚实、负责，有责任心</td>
          <td> 
             <p>{{$assess->duty}}</p>
          </td>
        </tr>
        <tr>
          <td>3.自我认知</td>
          <td>能客观评价自己的优势和不足，对自身有清晰的定位</td>
          <td> 
           <p>{{$assess->autognosis}} </p>
          </td>
        </tr>
        <tr>
          <td>4.工作动力</td>
          <td>强烈的进取精神，心态乐观，积极主动</td>
          <td> 
            <p> {{$assess->capacity}}</p>    
          </td>
        </tr>
        <tr>
          <td>5.逻辑思维</td>
          <td>思路清晰，对事件描述符合逻辑、严密、有条理</td>
          <td> 
               <p>{{$assess->thought}} </p>
           </td>
        </tr>
        
            <tr>
              <td colspan="3">专业技能</td>
            </tr>
        <tr>
          <td>1.网络、安全能力</td>
          <td>是否有网络、安全方面的工作经验</td>
          <td> 
               <p> {{$assess->network}} </p>
          </td>
        </tr>
        <tr>
          <td>2.主机存储 </td>
          <td>是否有主机和存储方面的工作经验</td>
          <td> 
              <p> {{$assess->mainframe}} </p>
          </td>
        </tr>
        <tr>
          <td>3.云计算及大数据</td>
          <td>对虚拟化是否接触，是否有实践经验</td>
          <td> 
              <p> {{$assess->bigdata}}</p>
          </td>
        </tr>
        <tr>
          <td>4.沟通协作</td>
          <td>思维逻辑是否清晰，语言表达能力及沟通的能力，是否有管理经验</td>
          <td> 
              <p>  {{$assess->collaboration}} </p> 
          </td>
        </tr>
        <tr>
          <td>5.相关证书（附加分)</td>
          <td> <p>  {{$assess->certificate}} </p> 
          </td>
          <td> 
              <p>  {{$assess->certificatescore}} </p>   
          </td>
        </tr>
        </table>
        <table>
            <tr>
              <td >其余评价</td>
              <td class="td_right">总分</td>
          <td class="td_right"></td>
            </tr>
            <tr>
              <td colspan="3">
             <p>{{$assess->evaluation}}</p>   
          </td>
            </tr>
            <tr>
              <td>最终结果:</td>
          <td colspan="2">
          <p>{{$assess->finalresult}} </p>  
          </td>
            </tr>
          </table>
           </table>  
        </form>
      </center>
    </body>
    <style type="text/css">
    table{border-collapse:collapse;width: 800px;border: 1px solid black;}
    td{border: 1px solid black; }
    .td_left{border: 1px solid black;width: 150px;text-align: center;}
    .td_right{border: 1px solid black;width: 80px;text-align: center;}
    p{text-align: center;}
  </style>
   <script>
    layui.use(['form','layer','upload','element'], function(){
          $ = layui.jquery;
          var form = layui.form
          ,layer = layui.layer;
          var upload = layui.upload;
          var element = layui.element;
    });
  </script>
</html>