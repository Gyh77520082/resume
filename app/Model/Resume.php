<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    
     //1.关联表
    public $table = "resume";
    //    2. 主键
     public $primaryKey =  "id" ;
  
   	//    3. 允许批量操作的字段

	//    public $fillable = ['user_name','user_pass','email','phone'];
    public $guarded = [];

	//    4. 是否维护crated_at 和 updated_at字段

    public $timestamps = false;
    public function assess(){
    	return $this->hasMany('App\Model\Assess','ass_id','id');
    }
    public function resumes(){
        return $this->hasMany('App\Model\Post','post_name','post');
    }
    public function company(){
        return $this->hasMany('App\Model\Company','rename','phone');
    }
     public function project(){
        return $this->hasMany('App\Model\Project','rename','phone');
    }
}
