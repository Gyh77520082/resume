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
		              <td colspan="3">专业技能</td>
		            </tr>
		            <tr>
		              <td>1.网络、安全能力</td>
		              <td>是否有网络、安全方面的工作经验</td>
		              <td> 
		                <p> 
		                  @switch($v->network)
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
		              <td>2.主机存储 </td>
		              <td>是否有主机和存储方面的工作经验</td>
		              <td> 
		                <p>
		                  @switch($v->mainframe)
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
		              <td>3.云计算及大数据</td>
		              <td>对虚拟化是否接触，是否有实践经验</td>
		              <td> 
		                <p>
		                  @switch($v->bigdata)
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
		              <td>4.沟通协作</td>
		              <td>思维逻辑是否清晰，语言表达能力及沟通的能力，是否有管理经验</td>
		              <td> 
		                <p>
		                  @switch($v->collaboration)
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
		              <td>5.相关证书（附加分)</td>
		              <td> 
		                <p> {{ $v->certificate }}</p> 
		              </td>
		              <td> 
		                <p>
		                 {{$v->certificatescore}}
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