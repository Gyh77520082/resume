<?php

namespace App\Http\Controllers\Interviewer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\AdminUser;
use App\Model\Resume;
use App\Model\AssGeneral;
use App\Model\AssSkill;
class AssessController extends Controller
{
    // 
    public function index($id)
    { 
      $resume=Resume::find($id);
      $users =AdminUser::get();
      return view("admin/assess/inster",compact('resume','users'));
        
    }

    
     public function add(Request $request){
        $input = $request->except('_token');
        $id=$input['ass_id'];
        $resume=Resume::find($id);
        $res=AssGeneral::create($input);
        if($res){
             $resume->ifpass='已面试';
             $resume->save();
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

    public function general($id){
      $resume=Resume::find($id);
      return view("admin/assess/inster_general",compact('resume'));
    }

    public function add_general(Request $request){
       $input = $request->except('_token');
        $id=$input['ass_id'];
        $resume=Resume::find($id);
        $res=AssGeneral::create($input);
        if($res){
             $resume->ifpass='已面试';
             $resume->save();
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
    public function skill($id){
      $resume=Resume::find($id);
      return view("admin/assess/inster_skill",compact('resume'));
    }

    public function add_skill(Request $request){
       $input = $request->except('_token');
        $id=$input['ass_id'];
        $resume=Resume::find($id);
        $res=AssSkill::create($input);
        if($res){
             $resume->ifpass='已面试';
             $resume->save();
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



    public function skill_detail($id){
     $resume=Resume::find($id)->assskill;
     return view('admin.assess.detail_skill',compact('resume'));
    }

    public function general_detail($id){
     $resume=Resume::find($id)->assgeneral;
     return view('admin.assess.detail_general',compact('resume'));
    }








}
