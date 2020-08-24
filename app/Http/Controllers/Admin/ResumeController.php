<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;
use App\Model\Resume;
use App\Model\AdminUser;
use App\Model\Post;
use Illuminate\Support\Facades\URL;
use Mail;
use DB;
class ResumeController extends Controller
{
    //返回简历列表页+排序
    public function index(Request $request)
    {
        $resume = Resume::orderBy('id','desc')
            ->where(function($query) use($request){
            $name=$request->input('name');
            $status=$request->input('status');
            $posts=$request->input('post');
            $ifpass=$request->input('ifpass');
            if(!empty($name)){
                $query->where('name','like','%'.$name.'%');
            }
            if(!empty($status)){
                $query->where('status','like','%'.$status.'%');
            }
            if(!empty($posts)){
                $query->where('post','like','%'.$posts.'%');
            }
            if(!empty($ifpass)){
                $query->where('ifpass','like','%'.$ifpass.'%');
            }})->paginate($request->input('num')?$request->input('num'):5);
        $total =Resume::count(); 
        $postes =Post::get();      
        return view('admin/resume/list',compact('resume','total','request','postes'));
    }
    //查看简历
    public function edit($id)
    {
        $resume = Resume::find($id);
        return view('admin.resume.detail',compact('resume'));
    }
   //简历删除
    public function destroy($id)
    {
        $resume = Resume::find($id);
        $res = $resume->delete();
        if($res){
            $data = [
                'status'=>0,
                'message'=>'删除成功'
            ];
        }else{
            $data = [
                'status'=>1,
                'message'=>'删除失败'
            ];
        }
        return $data;
    }
    //批量删除
     public function delAll(Request $request)
    {
        $input = $_POST['ids'];     
        $res = Resume::destroy($input);
    }
    //导出
    public function export($id){
        $resume = Resume::find($id);
        $phpword = new PHPWord();               //实例化phpword类
        $fontStyle2 = array('align'=>'center');  //整体样式
        $section = $phpword->addSection();      //整体页面
        $phpword->addTitleStyle(1, ['bold' => true, 'color' => '000', 'size' => 17, 'name' => '宋体'],$fontStyle2);    //设置title样式
        $section->addTitle("$resume->name"."的简历");  //添加标题 
        $section->addText("编号：$resume->id  创建日期：$resume->createtime");  //添加文本
        $styleTable = [
            'borderColor' => '006699',
            'borderSize' => 6,
            'cellMargin' => 50,
        ]; //设置表格样式
        $cellRowSpan = array('vMerge' => 'restart', 'valign' => 'center'); // 设置可跨行，且文字在居中
        $cellRowContinue = array('vMerge' => 'continue'); //使行连接，且无边框线
        $cellColSpan = array('newt_grid_simple_window(text, middle, buttons)an' => 3, 'valign' => 'center'); //设置跨列
        $cellColSpans = array('gridSpan' => 3, 'valign' => 'center'); //设置跨行
        $cellColSpans1 = array('gridSpan' => 2, 'valign' => 'center'); //设置跨行
        $cellColSpans2 = array('gridSpan' => 5, 'valign' => 'center'); //设置跨行
        $cellColSpans3 = array('gridSpan' => 4, 'valign' => 'center'); //设置跨行
        $cellColSpans4 = array('gridSpan' => 6, 'valign' => 'center'); //设置跨行
        $imageStyle = ['width' => 100, 'height' => 100, 'align' => 'center'];
        $cellHCentered = array('align' => 'center'); //居中
        $cellVCentered = array('valign' => 'center'); //居中
        $styleFoun = array('name' => '宋体','size'=> 10);
        $styleFouns = array('name' => '黑体','size'=> 10);
        $phpword->addTableStyle('myTable', $styleTable);
        $table = $section->addTable('myTable');//第一行
        $table->addRow(500);  //添加一行
        $table->addCell(5000,$cellVCentered)->addText("姓名",$styleFoun,$cellHCentered);
        $table->addCell(5000,$cellVCentered)->addText("$resume->name",$styleFouns,$cellHCentered);
        $table->addCell(5000,$cellVCentered)->addText("应聘岗位",$styleFoun,$cellHCentered);
        $table->addCell(5000,$cellVCentered)->addText("$resume->post",$styleFouns,$cellHCentered);
        $table->addCell(5000,$cellVCentered)->addText("期望薪酬",$styleFoun,$cellHCentered);
        $table->addCell(5000,$cellVCentered)->addText("$resume->payment",$styleFouns,$cellHCentered);
        if($resume->file==null){
            $table->addCell(5000, $cellRowSpan)->addText( "未上传图片",$styleFouns,$cellHCentered); //设置该列可以跨行，且样式居中
        }else{
            $table->addCell(5000, $cellRowSpan)->addImage( 'http://'.$_SERVER['HTTP_HOST']."$resume->file",$imageStyle ); //设置该列可以跨行，且样式居中
        };
        $table->addRow(500); //第二行
        $table->addCell(5000,$cellVCentered)->addText("出生年月",$styleFoun,$cellHCentered);
        $table->addCell(5000,$cellColSpan)->addText("$resume->birthday",$styleFouns,$cellHCentered);
        $table->addCell(5000,$cellVCentered)->addText('性别',$styleFoun,$cellHCentered);
        $table->addCell(5000,$cellVCentered)->addText("$resume->sex",$styleFouns,$cellHCentered);
        $table->addCell(5000,$cellVCentered)->addText('最快到岗时间',$styleFoun,$cellHCentered);
        $table->addCell(5000,$cellVCentered)->addText("$resume->arrivaltime",$styleFouns,$cellHCentered);
        $table->addCell(null, $cellRowContinue);
        $table->addRow(500); //第三行
        $table->addCell(5000,$cellVCentered)->addText("通信电话",$styleFoun,$cellHCentered);
        $table->addCell(5000,$cellColSpan)->addText("$resume->phone",$styleFouns,$cellHCentered);
        $table->addCell(5000,$cellVCentered)->addText('邮箱',$styleFoun,$cellHCentered);
        $table->addCell(5000,$cellVCentered)->addText("$resume->email",$styleFouns,$cellHCentered);
        $table->addCell(5000,$cellVCentered)->addText('生源所在地',$styleFoun,$cellHCentered);
        $table->addCell(5000,$cellVCentered)->addText("$resume->native",$styleFouns,$cellHCentered);
        $table->addCell(null, $cellRowContinue);
        $table->addRow(500); //第四行
        $table->addCell(5000,$cellVCentered)->addText("招聘信息获取途径",$styleFoun,$cellHCentered);
        $table->addCell(5000,$cellColSpans)->addText("$resume->approach",$styleFouns,$cellHCentered);
        $table->addCell(5000,$cellVCentered)->addText('政治面貌',$styleFoun,$cellHCentered);
        $table->addCell(5000,$cellVCentered)->addText("$resume->politics",$styleFouns,$cellHCentered);
        $table->addCell(null, $cellRowContinue);
        $table->addRow(500); //第五行
        $table->addCell(5000,$cellVCentered)->addText("通讯地址",$styleFoun,$cellHCentered);
        $table->addCell(5000,$cellColSpans)->addText("$resume->address",$styleFouns,$cellHCentered);
        $table->addCell(5000,$cellVCentered)->addText('婚姻状况',$styleFoun,$cellHCentered);
        $table->addCell(5000,$cellVCentered)->addText("$resume->marital",$styleFouns,$cellHCentered);
        $table->addCell(null, $cellRowContinue);
        $table->addRow(); //第六行
        $table->addCell(5000, $cellRowSpan)->addText('教育背景',$styleFoun, $cellHCentered); //设置该列可以跨行，且样式居中
        $table->addCell(5000,$cellVCentered)->addText("第一学历毕业院校",$styleFoun,$cellHCentered);
        $table->addCell(5000, $cellColSpans1)->addText("$resume->firstschool",$styleFouns,$cellHCentered);
        $table->addCell(5000,$cellVCentered)->addText('最高学历毕业院校',$styleFoun,$cellHCentered);
        $table->addCell(5000, $cellColSpans1)->addText("$resume->maxschool",$styleFouns,$cellHCentered);
        $table->addRow(); //第七行
        $table->addCell(null, $cellRowContinue);
        $table->addCell(5000,$cellVCentered)->addText("第一学历专业",$styleFoun,$cellHCentered);
        $table->addCell(5000, $cellColSpans1)->addText("$resume->firstdegree",$styleFouns,$cellHCentered);
        $table->addCell(5000,$cellVCentered)->addText('最高学历专业',$styleFoun,$cellHCentered);
        $table->addCell(5000, $cellColSpans1)->addText("$resume->maxdegree",$styleFouns,$cellHCentered);
        $table->addRow(); //第8行
        $table->addCell(null, $cellRowContinue);
        $table->addCell(5000,$cellVCentered)->addText("第一学历毕业时间",$styleFoun,$cellHCentered);
        $table->addCell(5000, $cellColSpans1)->addText("$resume->firstime",$styleFouns,$cellHCentered);
        $table->addCell(5000,$cellVCentered)->addText('最高学历毕业时间',$styleFoun,$cellHCentered);
        $table->addCell(5000, $cellColSpans1)->addText("$resume->maxtime",$styleFouns,$cellHCentered);
        $table->addRow(); //第9行
        $table->addCell(5000, $cellRowSpan)->addText('工作经验',$styleFoun, $cellHCentered); //
        $table->addCell(5000,$cellVCentered)->addText("公司名称",$styleFoun,$cellHCentered);
        $table->addCell(5000, $cellColSpans2)->addText("$resume->company",$styleFouns,$cellHCentered);
        $table->addRow(); //第10行
        $table->addCell(null, $cellRowContinue);
        $table->addCell(5000,$cellVCentered)->addText("职位名称",$styleFoun,$cellHCentered);
        $table->addCell(5000, $cellColSpans1)->addText("$resume->postname",$styleFouns,$cellHCentered);
        $table->addCell(5000,$cellVCentered)->addText('在职时间',$styleFoun,$cellHCentered);
        $table->addCell(5000, $cellColSpans1)->addText("$resume->posttime_min",$styleFouns,$cellHCentered);
        $table->addCell(5000, $cellColSpans1)->addText("$resume->posttime_max",$styleFouns,$cellHCentered);
        $table->addRow(); //第11行
        $table->addCell(null, $cellRowContinue);
        $table->addCell(5000,$cellVCentered)->addText("工作描述",$styleFoun,$cellHCentered);
        $table->addCell(5000, $cellColSpans2)->addText("$resume->jobdescription",$styleFouns,$cellHCentered);
        $table->addRow(); //第12行
        $table->addCell(5000, $cellRowSpan)->addText('项目经历',$styleFoun, $cellHCentered); //
        $table->addCell(5000,$cellVCentered)->addText("项目名称",$styleFoun,$cellHCentered);
        $table->addCell(5000, $cellColSpans2)->addText("$resume->projectname",$styleFouns,$cellHCentered);
        $table->addRow(); //第13行
        $table->addCell(null, $cellRowContinue);
        $table->addCell(5000,$cellVCentered)->addText("职位简介",$styleFoun,$cellHCentered);
        $table->addCell(5000, $cellColSpans1)->addText("$resume->projectbrief",$styleFouns,$cellHCentered);
        $table->addCell(5000,$cellVCentered)->addText('项目时间',$styleFoun,$cellHCentered);
        $table->addCell(5000, $cellColSpans1)->addText("$resume->projecttime_min",$styleFouns,$cellHCentered);
         $table->addCell(5000, $cellColSpans1)->addText("$resume->projecttime_max",$styleFouns,$cellHCentered);
        $table->addRow(); //第14行
        $table->addCell(null, $cellRowContinue);
        $table->addCell(5000,$cellVCentered)->addText("项目描述",$styleFoun,$cellHCentered);
        $table->addCell(5000, $cellColSpans2)->addText("$resume->projectdescription",$styleFouns,$cellHCentered);
        $table->addRow(); //第15行
        $table->addCell(5000, $cellRowSpan)->addText('岗位技能',$styleFoun, $cellHCentered); //
        $table->addCell(5000,$cellVCentered)->addText("项目证书",$styleFoun,$cellHCentered);
        $table->addCell(5000,$cellVCentered)->addText("$resume->idtype",$styleFoun,$cellHCentered);
        $table->addCell(5000, $cellColSpans3)->addText("$resume->credential",$styleFouns,$cellHCentered);
        $table->addRow(); //第14行
        $table->addCell(5000,$cellVCentered)->addText("自我评价",$styleFoun,$cellHCentered);
        $table->addCell(5000, $cellColSpans4)->addText("$resume->introduce",$styleFouns,$cellHCentered);// 保存文件.date("YmdHis")时间
        $writer = IOFactory::createWriter($phpword, 'Word2007');
        $writer->save("$resume->name" . "的简历" .".docx");
        $files = base_path().'/public/' ."$resume->name" ."的简历".".docx";
        $name = basename($files);
        return response()->download($files, $name,$headers = ['Content-Type'=>'application/zip;charset=utf-8']);
    }
    //HR审核路由
    public function dopass($id){
        $resume =Resume::find($id);
        $resume->status="HR审核通过";
        $resume->ifpass="待面试";
        
       
        if($resume->state==1){
            
             $data = [
                'status'=>1,
                'message'=>'已通过审核请勿重复提交'   
            ];
        }else{
                $resume->state=1;
                $res = $resume->save();
            if($res){
                    $postname=$resume->post;
                    $posts=Post::get()->where('post_name','=',$postname)->toArray();
                    foreach ($posts as $v) {
                        $postid=$v['post_id'];
                    }
                    $post=Post::find($postid)->toemail;
                    $email=$post->email;
                    $name=$resume->name;
                    $post=$resume->post;
                    $url = 'http://'.$_SERVER['HTTP_HOST'];

                    Mail::send('admin.email.remindemail',['resume'=>$resume,'url'=>$url],function($message) use($email,$name,$post){
                   $message ->to($email)->subject('姓名:'.$name.'岗位：'.$post.'的简历，请注意查收');
                });
                    $data = [
                        'status'=>0,
                        'message'=>'审核成功且邮件通知成功'   
                    ];
            }else{
                    $data = [
                        'status'=>2,
                        'message'=>'审核失败'
                    ];
            }
        }
    
        return $data;
    }
    //简历有误回馈
    public function topass($id)  {
        $resume =Resume::find($id);
        $resume->status="已审核";
        $resume->ifpass="待修改";
        $resume->state=1;
        $res = $resume->save();
        $email=$resume->email;
        $url =$_SERVER['HTTP_HOST'];
        Mail::send('admin.email.editresumeemail',['resume'=>$resume,'url'=>$url],function($message) use($email){
        $message ->to($email)->subject('您的简历填写有误请注意查收');
        });
        if($res){
            $data = [
                'status'=>0,
                'message'=>'发送成功'
            ];
        }else{
            $data = [
                'status'=>1,
                'message'=>'审核失败'
            ];
        }
        return $data;
    }
    //群发邮件页面
    public function pocket($id){
        $resume =Resume::find($id);
        $eemail =AdminUser::get();
        return view('admin.email.endemail',compact('resume','eemail'));
    }
    //邮件群发操作
    public function dopocket($ids,$id){
        $resume=Resume::find($id);
        $data= str_split($ids);
        foreach ($data as $v) { 
            if($v==','){    
            }else{
                $EndEmail=AdminUser::find($v);
                $email =$EndEmail->email;
                $imgPath = 'http://'.$_SERVER['HTTP_HOST'].$resume->file;
                Mail::send('admin.email.remindemail',['resume'=>$resume,'imgPath'=>$imgPath],function($message) use($email){
                $to =$email;
                $message ->to($to)->subject('请注意查收');
                });
            }
        }
    }
    //简历不通过
    public function nopass($id){
         $resume =Resume::find($id);
        $resume->status="已审核";
        $resume->ifpass="不符合条件";
        $resume->state=0;
        $res = $resume->save();
        if($res){
            $data = [
                'status'=>0,
                'message'=>'审核成功'
            ];
        }else{
            $data = [
                'status'=>1,
                'message'=>'审核失败'
            ];
        }
        return $data;
    }
}
