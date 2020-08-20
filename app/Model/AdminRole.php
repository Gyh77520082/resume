<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AdminRole extends Model
{
     //1.关联表
    public $table = "admin_role";
    //    2. 主键
     public $primaryKey =  "id" ;
  
   	//    3. 允许批量操作的字段

	//    public $fillable = ['user_name','user_pass','email','phone'];
    public $guarded = [];

	//    4. 是否维护crated_at 和 updated_at字段

    public $timestamps = false;

    public function permission()
    {
        return $this->belongsToMany('App\Model\AdminPermission','admin_role_permission','role_id','per_id');
    }
}
