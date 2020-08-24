<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Post;
use App\Model\AdminUser;


class PostController extends Controller
{
    //列表页
    public function index (){
    	$post= Post::get();
    	return view('admin/post/list',compact('post'));
    }
    //添加页
    public function add(){
        $endemail=AdminUser::get();
    	return view('admin/post/add',compact('endemail'));
    }
    //添加操作
    public function store(Request $request){
    	$input = $request->except('_token');
    	$res= Post::create($input);
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
    //删除
    public function del($id){
        $post =Post::find($id);
        $res = $post->delete();
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
    //修改页面
    public function edit($id){
        $post= Post::find($id);
        $endemail=AdminUser::get();
        return view('admin/post/edit',compact('post','endemail'));
    }
    public function update(Request $request,$id){
        $input =$request->all();
        $post = Post::find($id);
        $postname=$input['post_name'];
        $postdescription=$input['post_description'];
        $postleader=$input['post_leader'];
        $postcategory=$input['post_category'];
        $post->post_name=$postname;
        $post->post_description=$postdescription;
        $post->post_leader=$postleader;
         $post->post_category=$postcategory;
        $res=$post->save();
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
    //更改状态
    public function ChangeStatus(Request $request){

         $status = $request->input('status');
         $id = $request->input('id');
         $post = Post::find($id);
        if($post->post_status ==1){
             $res = $post->update(['post_status' => 0]);
        }else{
             $res = $post->update(['post_status' => 1]);
        }
        if($res){
            $data = [
                'status'=>0,
                'msg'=>'修改成功'
            ];
        }else{
           
            $data = [
                'status'=>1,
                'msg'=>'修改失败'
            ];
        }
        return $data;
    }
}
