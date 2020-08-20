<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class EndEmail extends Model
{
    //
    public $table='endemail';

     public $primaryKey =  "id" ;
  
   	//    3. 允许批量操作的字段

	//    public $fillable = ['user_name','user_pass','email','phone'];
    public $guarded = [];

	//    4. 是否维护crated_at 和 updated_at字段

    public $timestamps = false;
    
    public function assess(){
    	return $this->hasMany('App\Model\Assess','ass_name','name');
    }
    public function posts(){
        return $this->hasMany('App\Model\Post','post_leader','name');
    }
  
}
