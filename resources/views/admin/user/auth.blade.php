<!DOCTYPE html>
<html class="x-admin-sm">
  
  <head>
    <title>授权</title>
   
        @include('admin.public.meta')
        @include('admin.public.styles')
        @include('admin.public.script')
  </head>
  
  <body>
    <div class="layui-fluid">
        <div class="layui-row">
            <form enctype="multipart/form-data" id="art_form" class="layui-form" action="{{ url('admin/user/doauth') }}" method="post">
            {{ csrf_field() }}
                <div class="layui-form-item">
                    <label for="name" class="layui-form-label">
                        <span class="x-red">*</span>用户名称
                    </label>
                    <div class="layui-input-inline">
                        <input type="hidden" name="uid" value="{{$user->id}}">
                         <input type="text" value="{{ $user->name }}" disabled="" name="user_name" required="" lay-verify=""
                           autocomplete="off" class="layui-input">
                    </div>
                </div>
                
                <div class="layui-form-item layui-form-text">
                   <label class="layui-form-label">所有的角色</label>
                    <div class="layui-input-block">
                       @foreach($adminrole as $v)
                          @if(in_array($v->id,$roleids))
                            <input type="checkbox" checked value="{{ $v->id }}" name="role_id[]" lay-skin="primary" title="{{ $v->role_name }}" >
                          @else
                            <input type="checkbox"  value="{{ $v->id }}" name="role_id[]" lay-skin="primary" title="{{ $v->role_name }}" >
                          @endif
                        @endforeach
                    </div>
                    
                </div>
                <div class="layui-form-item">
                <button class="layui-btn" lay-submit="" >授权</button>
              </div>
            </form>
        </div>
    </div>
    <script>
        layui.use(['form','layer'], function(){
            $ = layui.jquery;
          var form = layui.form
          ,layer = layui.layer;
        
          

        
          
        });
    </script>
   @include('admin.public.footer')
  </body>

</html>