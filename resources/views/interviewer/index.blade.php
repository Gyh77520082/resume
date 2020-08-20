@extends('home.layouts.default')
@section('title', '简历选择')
@section('center')
    <body >
      
        <center style="width: 300px;margin: auto; padding-top: 200px;" >
            <p>选择你要查看的岗位的简历</p>
            <form class="layui-form" method="POST" action="/interviewer/list" >
                {{csrf_field()}}
                <div>
                <select name="post" lay-verify="required" class="layui-input-block" >
                @foreach($posts as $v)
                <option value="{{$v['post_name']}}">{{$v['post_name']}}</option>
                @endforeach
                </select>
                </div>
                <div class="form-group" >
                  <button  class="layui-btn"  lay-submit="">选择</button>
                </div>
            </form>
        </center>
        
    </body>   
    <script>
    layui.use(['form','layer','upload','element'], function(){
        $ = layui.jquery;
        var form = layui.form
        ,layer = layui.layer;
        var upload = layui.upload;
        var element = layui.element;
        });
    </script>
@stop