<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\AdminPermission;


class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $total = AdminPermission::count();
        $permission =AdminPermission::orderBy('id','asc')
                    ->where(function($query) use($request){
                $pername = $request->input('per_name');
                if(!empty($pername)){
                    $query->where('per_name','like','%'.$pername.'%');
                }
                })
                ->paginate($request->input('num')?$request->input('num'):5);

       return view('admin/permission/list',compact('total','permission','request'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin/permission/add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $input = $request->except('_token');

        $per_name=$input['per_name'];
        $per_url=$input['per_url'];

        $res =AdminPermission::create(['per_name'=>$per_name,'per_url'=>$per_url]);
        if($res){
            return '添加成功';
        }else{
            return back();
        }
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
        //
        $permission = Adminpermission::find($id);
        return view('admin/permission/edit',compact('permission'));
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
        $permission = AdminPermission::find($id);

        $pername=$input['per_name'];
        $per_url=$input['per_url'];
        $permission->per_name=$pername;
        $permission->per_url=$per_url;
        $res=$permission->save();
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
         $Permission = AdminPermission::find($id);
        $res = $Permission->delete();
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
