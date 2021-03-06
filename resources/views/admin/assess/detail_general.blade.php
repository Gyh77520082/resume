@extends('admin.layouts.admin')
@section('title', '查看评价')
@section('center')
      <body>
        <center>
          <form class="layui-form" id="art_form">
            @foreach($resume as $v)
                   <H1>评价人：{{ $v->ass_name }}</H1>
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
                <p>
                  @switch($v->vocationa)
                    @case(0)  很差    @break
                    @case(2)  很差    @break
                    @case(4)  比较差  @break
                    @case(6)  一般    @break
                    @case(8)  很好    @break
                    @case(10) 非常好  @break
                  @endswitch
                </p>
              </td>
            </tr>
            <tr>
              <td>2.责任感</td>
              <td>回答问题诚实、负责，有责任心</td>
              <td> 
                <p>
                  @switch($v->duty)
                    @case(0)  很差    @break
                    @case(2)  很差    @break
                    @case(4)  比较差  @break
                    @case(6)  一般    @break
                    @case(8)  很好    @break
                    @case(10) 非常好  @break
                  @endswitch
                </p>
              </td>
            </tr>
            <tr>
              <td>3.自我认知</td>
              <td>能客观评价自己的优势和不足，对自身有清晰的定位</td>
              <td> 
                <p> 
                  @switch($v->autognosis)
                    @case(0)  很差    @break
                    @case(2)  很差    @break
                    @case(4)  比较差  @break
                    @case(6)  一般    @break
                    @case(8)  很好    @break
                    @case(10) 非常好  @break
                  @endswitch
                </p>
              </td>
            </tr>
            <tr>
              <td>4.工作动力</td>
              <td>强烈的进取精神，心态乐观，积极主动</td>
              <td> 
                <p>
                  @switch($v->capacity)
                    @case(0)  很差    @break
                    @case(2)  很差    @break
                    @case(4)  比较差  @break
                    @case(6)  一般    @break
                    @case(8)  很好    @break
                    @case(10) 非常好  @break
                  @endswitch 
                </p>    
              </td>
            </tr>
            <tr>
              <td>5.逻辑思维</td>
              <td>思路清晰，对事件描述符合逻辑、严密、有条理</td>
              <td> 
                <p>
                  @switch($v->thought)
                    @case(0)  很差    @break
                    @case(2)  很差    @break
                    @case(4)  比较差  @break
                    @case(6)  一般    @break
                    @case(8)  很好    @break
                    @case(10) 非常好  @break
                  @endswitch 
                </p>
              </td>
            </tr>
          
        </table>
        <table>
            <tr>
              <td >其余评价</td>
              <td class="td_right">总分</td>
              <td class="td_right">
                {{$v->certificatescore+$v->collaboration+$v->vocationa+$v->vocationa+$v->autognosis+$v->capacity+$v->thought+$v->network+$v->mainframe+$v->bigdata}}
              </td>
            </tr>
            <tr>
              <td colspan="3">
                <p> {{ $v->evaluation }}</p>   
              </td>
            </tr>
            <tr>
              <td>最终结果:</td>
              <td colspan="2">
                <p> {{ $v->finalresult }}</p>  
              </td>
            </tr>
        </table>
           @endforeach  
        </form>
      </center>
    </body>

    <style type="text/css">
    table{border-collapse:collapse;width:800px;border:1px solid black;}
    td{border:1px solid black;}
    .td_left{border:1px solid black;width:150px;text-align: center;}
    .td_right{border:1px solid black;width:80px;text-align: center;}
    p{text-align: center;}
  </style>
  <script type="text/javascript">
        window.onload=function(){
        var sum_val=parseInt(getTdVal('1'))+parseInt(getTdVal('2'));
        document.getElementById('3').innerText=sum_val;
      }
      function getTdVal(tdId){
        return document.getElementById(tdId).innerText;
      }
      </script>
@stop