<?php

namespace App\Http\Controllers\Interviewer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Resume;
use App\Model\Post;
class IndexContorller extends Controller
{     
      //简历评价首页
      public function index(){
      	$insterviewername=session('interviewer.name');
      	$posts=Post::get()->where('post_leader',$insterviewername)->toArray();
        return view('interviewer/index',compact('posts'));
    }


    
    //评价列表页
     public function list(Request $request){
      $postname=$request['post'];
      $resume=Resume::where('post',$postname)->get();
      return view('interviewer/list',compact('resume'));
    }
    //查看简历详情
   public function detail($id)
    { 
      $resume=Resume::find($id);
      return view("interviewer/detail",compact('resume'));
    }
}
