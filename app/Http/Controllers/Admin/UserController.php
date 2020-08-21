<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\AdminUser;
use App\Model\AdminRole;
use Illuminate\Support\Facades\Hash;
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *  返回首页
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request )
    { 
        //
        $user = AdminUser::orderBy('id','asc')
                ->where(function($query) use($request){
                    $username = $request->input('username');
                if(!empty($username)){
                    $query->where('name','like','%'.$username.'%');
                }
                })
                ->paginate($request->input('num')?$request->input('num'):3);
        $total = AdminUser::count();
        return view("admin/user/list",compact('user','total','request'));
        
    }
    //授权
     public function auth($id)
     {  
        $user =AdminUser::find($id);

        $adminrole =AdminRole::get();

        //获取当前用户已被授权的角色
        
        $roles = $user->role;

        //当前用户拥有的角色的ID列表
        $roleids = [];
        foreach ($roles as $s){
            $roleids[] = $s ->id;
        }
         return view('admin.user.auth',compact('user','adminrole','roleids'));
     }

     //接收授权
     public function doauth(Request $request){
         $input = $request->all();
       // dd($input);
         DB::beginTransaction();
         try{
            //删除当前权限
            DB::table('admin_role_user')->delete();
           if(!empty($input['role_id'])){
                //将提交的数据添加到 角色权限关联表
                foreach ($input['role_id'] as $v){
                    DB::table('admin_role_user')->insert([
                        'user_id'=>$input['uid'],
                        'role_id'=>$v
                    ]);
                }
            }
            DB::commit();
            return redirect('admin/user');
         }catch(Exception $e){
            DB::rollBack();
            return redirect()->back()
                ->withErrors(['error' => $e->getMessage()]);
        }

     }

    /**
     * Show the form for creating a new resource.
     *  获取添加页面
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin/user/add");
    }

    /**
     * Store a newly created resource in storage.
     *  执行添加
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

   
    public function edit($id)
    {
        //
         $user = Adminuser::find($id);

        return view('admin.user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
        }else{
            $data =[
                'status'=>2,
                'message'=>'请输入正确的旧密码'
            ];
            return $data;
        }
    }

   
    public function destroy($id)
    {
        $user = AdminUser::find($id);
        $res = $user->delete();
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

    //批量删除
    public function delAll(Request $request)
    {
       
        $input = $_POST['ids'];     
        $res = AdminUser::destroy($input);
    }

    //更改状态
    public function ChangeStatus(Request $request){

         $status = $request->input('status');
         $userid = $request->input('userid');

        $user = AdminUser::find($userid);

        if($user->status ==1){
             $res = $user->update(['status' => 0]);
        }else{
             $res = $user->update(['status' => 1]);
        }
        if($res){
           return 1111;
            $data = [
                'status'=>0,
                'msg'=>'修改成功'
            ];
        }else{
           return 2222;
            $data = [
                'status'=>1,
                'msg'=>'修改失败'
            ];
        }
        return $data;
    }
}
