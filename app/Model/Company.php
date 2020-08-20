<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
     //1.关联表
    public $table = "company";
    //    2. 主键
     public $primaryKey =  "com_id" ;
  
   	//    3. 允许批量操作的字段

	//    public $fillable = ['user_name','user_pass','email','phone'];
    public $guarded = [];

	//    4. 是否维护crated_at 和 updated_at字段

    public $timestamps = false;
  
}
