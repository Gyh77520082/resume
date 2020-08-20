<?php

namespace App\Http\Controllers\Interviewer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\AdminUser;
use App\Model\AdminRole;
use Illuminate\Support\Facades\Hash;
use DB;


class UserController extends Controller
{
    //返回修改页面
    public function edit()
    {
       return view('interviewer.user.edit');
    }
    //执行修改
     public function update(Request $request, $id)
    {
        $input = $request->all();
       //        1. 根据id获取要修改的记录
        $user = AdminUser::find($id);
//        2. 获取要修改成的用户名
        $old = Hash::check($input['oldpass'],$user ->password);
        if($old){
            $password =$input['pass'];
            $pass=Hash::make($password);
            $user->password=$pass;
            $res = $user->save();
            if($res){
                $data = [
                    'status'=>0,
                    'message'=>'修改成功'
                ];
            }else{
                $data = [
                    'status'=>1,
                    'message'=>'修改失败'
                ];
            }
                return $data;
        }else{
            $data =[
                'status'=>2,
                'message'=>'请输入正确的旧密码'
            ];
            return $data;
        }
    }

}
