<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\EndEmail;
use App\Model\Assess;

class InterviewerController extends Controller
{
    //面试官列表
    public function index()
    {
        $eemail =EndEmail::get();
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
        $name=$input['name'];
        $email =$input['email'];
        $res=EndEmail::create(['name'=>$name,'email'=>$email]);
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
        $eemail = EndEmail::find($id);
        return view('admin.interviewer.edit',compact('eemail'));
    }
   //面试官修改操作
    public function update(Request $request, $id)
    {
        $input =$request->all();
        $eemail = EndEmail::find($id);
        $name=$input['name'];
        $email=$input['email'];
        $eemail->name=$name;
        $eemail->email=$email;
        $res=$eemail->save();
        if($res){
            $data=[
                'status'=>0,
                'message'=>'修改成功'
            ];
        }else{
            $data = [
                'status' =>1,
                'message' => '修改失败'
            ];
        };
        return $data;
    }
   //面试官删除
    public function destroy($id)
    {
         $EndEmail = EndEmail::find($id);
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

    public function detail($id){
        $EndEmail=EndEmail::find($id)->assess;
         return view("admin/interviewer/detail",compact('EndEmail'));
    }
    public function chakan($id){
        $assess=Assess::find($id);
         return view("admin/interviewer/chakan",compact('assess'));
    }
}
