<?php

namespace App\Http\Controllers\Interviewer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Resume;
use App\Model\EndEmail;
use App\Model\Post;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Model\AdminUser;


class LoginController extends Controller
{   
    public function index(){
        return view('interviewer/index');
    }
    //
    public function login(){
        $endemail=EndEmail::get();
        return view('interviewer/login',compact('endemail'));
    }
     public function dologin(Request $request){
        // 获取除了token 的所有内容
        $input = $request->all();
         // 进行表单验证
         $rule =[
            'username'=>'required',
            'password'=>'required',
            'captcha'=>'Captcha',
         ];
         $msg =[
            'username.required'=>'用户名不能为空',
           
            'password.required'=>'密码必须输入',
            'captcha.captcha'=>'验证码错误',
         ];
         $validator =Validator::make($input,$rule,$msg);
         //验证失败 输出错误
         if($validator->fails()){
            return redirect('interviewer/login')
                ->withErrors($validator)
                ->withInput();

         }
         //验证成功进行数据库验证
         // $username
        $user =AdminUser::where('name',$input['username'])->first();
        if(!$user){
                return redirect('interviewer/login')->with('errors','用户名错误');
        }else{
            if(Hash::check($input['password'],$user ->password)){
                 //4.保存到seesion会话中
                if($user->status == 1){
                     session()->put('interviewer',$user);
                   
                    return redirect('interviewer/index'); 
                }else{
                    return redirect('interviewer/login')->with('errors','该用户已被禁用');
                }
                
            }else{
                return redirect('interviewer/login')->with('errors','密码错误');
            }
        }
    }
     //退出登陆
    public function loginout(){
         // 清空session中的用户信息
        session()->flush();
        // 跳转到登录页面
        return redirect('interviewer/login');
    }
}