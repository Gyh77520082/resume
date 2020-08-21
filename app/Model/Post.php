<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
     public $table = "post";
    //    2. 主键
     public $primaryKey =  "post_id" ;
  
   	//    3. 允许批量操作的字段

	//    public $fillable = ['user_name','user_pass','email','phone'];
    public $guarded = [];

	//    4. 是否维护crated_at 和 updated_at字段

    public $timestamps = false;

    public function toemail(){
    	return $this->belongsTo('App\Model\AdminUser','post_leader','name');
    } 
    public function resumes(){
        return $this->belongsTo('App\Model\Resume','post_name','post');
    }
}
