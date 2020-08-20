<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Company;
use App\Model\Post;
use App\Model\Resume;

class TestController extends Controller
{   
	public function index(){
        $company=Company::get()->where('rename',17850859801)->toArray();
       foreach ($company as $v) {
           # code...
        
        $companys=Company::find($v['com_id'])->delete();
       }
       var_dump($companys);
		
	}
}
