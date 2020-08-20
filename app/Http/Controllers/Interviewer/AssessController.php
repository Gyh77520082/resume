<?php

namespace App\Http\Controllers\Interviewer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\EndEmail;
use App\Model\Resume;
use App\Model\Assess;
class AssessController extends Controller
{
    // 
    public function index($id)
    { 
      $resume=Resume::find($id);
      $endemail =EndEmail::get();
      return view("admin/assess/inster",compact('resume','endemail'));
        
    }
     public function add(Request $request){
        $input = $request->except('_token');
        $id=$input['ass_id'];
        $resume=Resume::find($id);
        $res=Assess::create($input);
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
}
