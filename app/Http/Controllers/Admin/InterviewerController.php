<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Adminuser;
use App\Model\AssSkill;
use App\Model\AssGeneral;
use Illuminate\Support\Facades\Hash;

class InterviewerController extends Controller
{
    //面试官列表
    public function index()
    {
        $eemail =Adminuser::get();
        return view("admin/interviewer/list",compact('eemail'));
    }
   //面试官添加
    public function create()
    {
         return view("admin/interviewer/add");
    }
    //面试官添加操作
    public function store(Request $request)
    {

       //获取所有数据
        $input = $request->all();

        $username=$input['username'];
        $email=$input['email'];
        $password =Hash::make($input['pass']);

        $res=Adminuser::create(['name'=>$username,'password'=>$password,'email'=>$email]);
        if($res){
            $data = [
                'status'=>0,
                'message'=>'添加成功'
            ];

        }else{
            $data = [
                'status'=>1,
                'message'=>'添加失败'
            ];

        }
        return $data;

    }
   //面试官修改页面
    public function edit($id)
    {
        //    
        $eemail = Adminuser::find($id);
        return view('admin.interviewer.edit',compact('eemail'));
    }
   //面试官修改操作
    public function update(Request $request, $id)
    {
        $input = $request->all();
       //        1. 根据id获取要修改的记录
        $user = AdminUser::find($id);
        //        2. 获取要修改成的用户名
            $user->name=$input['name'];
            $email = $input['email'];
            $user->email=$email;
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
    }
   //面试官删除
    public function destroy($id)
    {
         $EndEmail = Adminuser::find($id);
        $res = $EndEmail->delete();
        if($res){
            $data = [
                'status'=>0,
                'message'=>'删除成功'
            ];
        }else{
            $data = [
                'status'=>1,
                'message'=>'删除失败'
            ];
        }
        return $data;
    }
    //查看评价列表
    public function lists($id){
         $users = Adminuser::find($id);
         return view('admin/interviewer/ass_list',compact('users'));
    }

    public function detail_skill($id){
        $resume=AssSkill::find($id);
         return view("admin/interviewer/detail_skill",compact('resume'));
    }
    public function detail_general($id){
        $resume=AssGeneral::find($id);
         return view("admin/interviewer/detail_general",compact('resume'));
    }
}
