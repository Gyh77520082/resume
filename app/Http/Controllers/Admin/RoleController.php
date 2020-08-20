<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\AdminRole;
use App\Model\AdminPermission;
use DB;

class RoleController extends Controller
{

    public function auth($id){
         $role =AdminRole::find($id);
         $adminpermission =AdminPermission::get();

            //获取当前用户已被授权的角色
            
            $permissions = $role->permission;

            //当前用户拥有的角色的ID列表
            $permissionids = [];
            foreach ($permissions as $s){
                $permissionids[] = $s ->id;
            }
             return view('admin.role.auth',compact('role','adminpermission','permissionids'));
    }

    public function doauth(Request $request){
        $input =$request ->all();
          DB::beginTransaction();
         try{
            //删除当前权限
            DB::table('admin_role_permission')->delete();
           if(!empty($input['role_id'])){
                //将提交的数据添加到 角色权限关联表
                foreach ($input['role_id'] as $v){
                    DB::table('admin_role_permission')->insert([
                        'role_id'=>$input['uid'],
                        'per_id'=>$v
                    ]);
                }
            }
            DB::commit();

            return redirect('admin/role');

         }catch(Exception $e){
            DB::rollBack();
            return redirect()->back()
                ->withErrors(['error' => $e->getMessage()]);
        }

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $role = AdminRole::get();
        $total = AdminRole::count();
        return view('admin/role/list',compact('role','total'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin/role/add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $input = $request->all();

        $rolename= $input['role_name'];
        $description = $input['desc'];

        $res=AdminRole::create(['role_name'=>$rolename,'description'=>$description]);
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = AdminRole::find($id);
        return view('admin/role/edit',compact('role'));
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
        //
        $input =$request->all();
        $role = AdminRole::find($id);
        $rolename=$input['role_name'];
        $desc=$input['desc'];
        $role->role_name=$rolename;
        $role->description=$desc;
        $res=$role->save();
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        //
        $role = AdminRole::find($id);
        $res = $role->delete();
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
}
