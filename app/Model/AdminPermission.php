<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AdminPermission extends Model
{
    //
    public $table ='admin_permission';
    public $primarykey ='id';
    public $guarded=[];
    public $timestamps =false;
}
