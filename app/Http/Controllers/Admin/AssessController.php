<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Resume;
use App\Model\AssGeneral;
use App\Model\AssSkill;



class AssessController extends Controller
{
   
    public function skill_detail($id){
     $resume=Resume::find($id)->assskill;
     return view('admin.assess.detail_skill',compact('resume'));
    }

    public function general_detail($id){
     $resume=Resume::find($id)->assgeneral;
     return view('admin.assess.detail_general',compact('resume'));
    }
}