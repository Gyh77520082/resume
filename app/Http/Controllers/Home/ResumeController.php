<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Resume;
use App\Model\Project;
use App\Model\Company;
use App\Model\Post;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Image;
use Mail;

class ResumeController extends Controller
{
    public function index(){
        $post=Post::get();
        return view('home/resume/index',compact('post'));
    }
    //图片上传
    public function upload(Request $request){
        //获取上传文件
        $file = $request->file('photo');
        //判断上传文件是否成功
        if(!$file->isValid()){
            return response()->json(['ServerNo'=>'400','ResultData'=>'无效的上传文件']);
        }
        //获取原文件的扩展名
        $ext = $file->getClientOriginalExtension();    //文件拓展名
        //新文件名
        $newfile = time().rand(1000,9999).'.'.$ext;
        //文件上传的指定路径
        $path = public_path('uploads');
        //将文件从临时目录移动到本地指定目录
        if(! $file->move($path,$newfile)){
            return response()->json(['ServerNo'=>'400','ResultData'=>'保存文件失败']);
        }
        return response()->json(['ServerNo'=>'200','ResultData'=>$newfile]);
    }
    //添加
  //添加
     public function add(Request $request){
        $input = $request->all();
        $phone=$input['phone'];
        $resumes=Resume::get()->where('phone','=',$phone)->toArray();
        $name=$input['name'];
        $post=$input['post'];
        $companys=$input['company'];
        $postname=$input['postname'];
        $postmin=$input['postmin'];
        $postmax=$input['postmax'];
        $jobdescription=$input['jobdescription'];
        $projectname=$input['projectname'];
        $projectbrief=$input['projectbrief'];
        $projectmin=$input['projectmin'];
        $projectmax=$input['projectmax'];
        $projectdescription=$input['projectdescription'];
        $comlong=count($companys);
        $prolong=count($projectname);
        if($resumes==null){
            $resume=Resume::create([
                'name'=>$name,                                              //姓名
                'post'=>$post,                                              //岗位
                'payment'=>$input['payment'],                               //薪酬
                'photo'=>$input['art_thumb'],                               //照片
                'birthday'=>$input['birthday'],                             //生日
                'sex'=>$input['sex'],                                       //性别
                'arrivaltime'=>$input['arrivaltime'],                       //最快到岗时间
                'phone'=>$phone,                                            //通信电话
                'email'=>$input['email'],                                   //邮箱
                'native'=>$input['native'],                                 //生源所在地
                'approach'=>$input['approach'],                             //招聘信息获取途径
                'politics'=>$input['politics'],                             //政治面貌
                'address'=>$input['address'],                               //通信地址
                'marital'=>$input['marital'],                               //婚姻状况
                'firstschool'=>$input['firstschool'],                       //第一学历毕业院校
                'maxschool'=>$input['maxschool'],                           //最高学历毕业院校
                'firsteducation'=>$input['firsteducation'],                 //第一学历
                'firstmajor'=>$input['firstmajor'],                         //第一学历专业
                'maxeducation'=>$input['maxeducation'],                     //最高学历
                'maxmajor'=>$input['maxmajor'],                             //最高学历专业
                'firsttime'=>$input['firsttime'],                           //第一学历毕业时间
                'maxtime'=>$input['maxtime'],                               //最高学历毕业时间
                'idtype'=>$input['idtype'],                                 //证书类
                'credential'=>$input['credential'],                         //相关证书叙述
                'hobbies'=>$input['hobbies'],                               //兴趣爱好
                'introduce'=>$input['introduce'],                           //自我介绍
                'status'=>$input['status'],                                 //审核状态
                'createtime'=>date('Y-m-d h:i:s', time()) ,                 //简历添加时间 
                'token'=>hash::make($phone)      
            ]);
            for($i=0;$i<$comlong;$i++){
                $company=Company::create([
                    'company'=>$companys[$i],
                    'postname'=>$postname[$i],
                    'postmin'=>$postmin[$i],
                    'postmax'=>$postmax[$i],
                    'jobdescription'=>$jobdescription[$i],
                    'rename'=>$phone
                ]);
            }
            for($i=0;$i<$prolong;$i++){
                    $project=Project::create([
                        'projectname'=>$projectname[$i],
                        'projectbrief'=>$projectbrief[$i],
                        'projectmin'=>$projectmin[$i],
                        'projectmax'=>$projectmax[$i],
                        'projectdescription'=>$projectdescription[$i],
                        'rename'=>$phone
                    ]);
                }
           Mail::raw('前往官网：resume.sharefamily.com.cn/admin/login',function($message) use($name,$post){
                $email='chen.liu@sharefamily.com.cn';
                $e1='xiaojie.liang@sharefamily.com.cn';
                $message ->to($email)->subject('姓名:'.$name.'岗位：'.$post.'的简历，请注意查收');
                $message ->to($e1)->subject('姓名:'.$name.'岗位：'.$post.'的简历，请注意查收');
                });
                $data = [
                    'status'=>0,
                    'message'=>'简历提交成功'
                ];
          
        }else{
            $data = [
                'status'=>1,
                'message'=>'您已提交过简历，请勿重复提交'
            ];
        }

        return $data;    
    }

    public function edit(Request $request){
        $token=$request->token;
        $id=$request->resumeid;
        $resume=Resume::find($id);
        if($token==$resume->token){
            $post=Post::get();
            return view("home/resume/edit",compact('resume','post'));
        }else{
            return view('home/resume/message');
        }   
    }
    public function update(Request $request,$id){
         $input = $request->all();
        $phone =$input['phone'];                                //通信电话
        $name=$input['name'];
        $post=$input['post'];
        $companys=$input['company'];
        $postname=$input['postname'];
        $postmin=$input['postmin'];
        $postmax=$input['postmax'];
        $jobdescription=$input['jobdescription'];
        $projectname=$input['projectname'];
        $projectbrief=$input['projectbrief'];
        $projectmin=$input['projectmin'];
        $projectmax=$input['projectmax'];
        $projectdescription=$input['projectdescription'];
        $payment=$input['payment'];                              //薪酬
        $photo=$input['art_thumb'];                              //照片
        $birthday=$input['birthday'];                           //生日
        $sex=$input['sex'];                                      //性别
        $arrivaltime=$input['arrivaltime'];                      //最快到岗时间                                              
        $email=$input['email'];                                  //邮箱
        $native=$input['native'];                                 //生源所在地
        $approach=$input['approach'];                            //招聘信息获取途径
        $politics=$input['politics'];                            //政治面貌
        $address=$input['address'];                              //通信地址
        $marital=$input['marital'];                              //婚姻状况
        $firstschool=$input['firstschool'];                      //第一学历毕业院校
        $maxschool=$input['maxschool'];                         //最高学历毕业院校
        $firsteducation=$input['firsteducation'];               //第一学历
        $firstmajor=$input['firstmajor'];                         //第一学历专业
        $maxeducation=$input['maxeducation'];                    //最高学历
        $maxmajor=$input['maxmajor'];                            //最高学历专业
        $firsttime=$input['firsttime'];                          //第一学历毕业时间
        $maxtime=$input['maxtime'];                              //最高学历毕业时间
        $idtype=$input['idtype'];                                //证书类
        $credential=$input['credential'];                       //相关证书叙述
        $hobbies=$input['hobbies'];                               //兴趣爱好
        $introduce=$input['introduce'];                          //自我介绍
        $status=$input['status'];                               //审核状态 
        $comlong=count($companys);
        $prolong=count($projectname);
        $resume=Resume::find($id);
        if($resume->state==1){
            $resume->name=$name;
            $resume->post=$post;
            $resume->photo=$photo;
            $resume->payment=$payment;
            $resume->birthday=$birthday;
            $resume->sex=$sex;
            $resume->arrivaltime=$arrivaltime;
            $resume->phone=$phone;
            $resume->email=$email;
            $resume->native=$native;         
            $resume->politics=$politics;
            $resume->address=$address;
            $resume->marital=$marital;
            $resume->firstschool=$firstschool;
            $resume->maxschool=$maxschool;
            $resume->firsteducation=$firsteducation;
            $resume->firstmajor=$firstmajor;
            $resume->maxeducation=$maxeducation;
            $resume->maxmajor=$maxmajor;
            $resume->firsttime=$firsttime;
            $resume->maxtime=$maxtime;
            $resume->idtype=$idtype;
            $resume->credential=$credential;
            $resume->introduce=$introduce;
            $resume->approach=$approach;
            $resume->hobbies=$hobbies;
            $resume->state=0;
            $res=$resume->save();
        $company=Company::get()->where('rename',$phone)->toArray();
        foreach ($company as $v) {
        $companys=Company::find($v['com_id'])->delete();
       }
         $project=Project::get()->where('rename',$phone)->toArray();
         foreach ($project as $v) {
        $projects=Project::find($v['project_id'])->delete();
       }
         for($i=0;$i<$comlong;$i++){
                $company=Company::create([
                    'company'=>$companys[$i],
                    'postname'=>$postname[$i],
                    'postmin'=>$postmin[$i],
                    'postmax'=>$postmax[$i],
                    'jobdescription'=>$jobdescription[$i],
                    'rename'=>$phone
                ]);
            }
            for($i=0;$i<$prolong;$i++){
                    $project=Project::create([
                        'projectname'=>$projectname[$i],
                        'projectbrief'=>$projectbrief[$i],
                        'projectmin'=>$projectmin[$i],
                        'projectmax'=>$projectmax[$i],
                        'projectdescription'=>$projectdescription[$i],
                        'rename'=>$phone
                    ]);
                }
         $data=[
                    'status'=>0,
                    'message'=>'修改成功'
                ];
        }else{
             $data = [
                    'status' =>2,
                    'message' => '您无权修改'
                ];
        }
        return $data;
        
    }

























}
