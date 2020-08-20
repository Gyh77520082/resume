<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Resume;
use App\Model\Assess;
use App\Model\EndEmail;


class AssessController extends Controller
{
   
    public function detail($id){
        $resume=Resume::find($id)->assess;
        return view("admin/assess/detail",compact('resume'));
    }
}