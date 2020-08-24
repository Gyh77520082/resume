<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AdminUser extends Model
{
    //1.关联表
    public $table = "admin_user";
    //    2. 主键
     public $primaryKey =  "id" ;
  
   	//    3. 允许批量操作的字段

	//    public $fillable = ['user_name','user_pass','email','phone'];
    public $guarded = [];

	//    4. 是否维护crated_at 和 updated_at字段

    public $timestamps = false;
    //5.创建权限关联表
    public function role()
    {
        return $this->belongsToMany('App\Model\AdminRole','admin_role_user','user_id','role_id');
    }
    public function postes(){
        return $this->hasMany('App\Model\Post','post_leader','name');
    }

   public function askill(){
       return $this->hasMany('App\Model\AssSkill','ass_name','name');
    }

    public function ageneral(){
        return $this->hasMany('App\Model\AssGeneral','ass_name','name');
    }
    public function posts(){
        return $this->hasMany('App\Model\Post','post_leader','name');
    }
}
