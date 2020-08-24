<?php
use Illuminate\Support\Facades\Route;

//简历投递首页
Route::any('test',"TestController@index");

//后台登陆
Route::group(['prefix'=>'admin','namespace'=>'Admin'],function(){
	Route::get('login','LoginController@login'); 	//返回登陆页
	Route::post('dologin','LoginController@dologin');	//登陆验证操作
	// Route::get('encrypt','LoginController@encrypt'); //密码加密
});
//后台页面路由组
Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware'=>['AdminLogin']],function(){
	Route::get('index','LoginController@index');	//首页
	Route::get('welcome','LoginController@welcome');	//欢迎页
	Route::get('loginout','LoginController@loginout'); 	//退出登陆
	//后台用户
	 Route::resource('user','UserController');	//用户路由组
	 Route::post('user/del','UserController@delAll');	//批量删除
	 Route::post('user/ChangeStatus','UserController@ChangeStatus');  //禁用与启用
	 Route::get('user/auth/{id}','UserController@auth'); //授权路由
	 Route::post('user/doauth','UserController@doauth');	//处理授权	
	 //角色路由组
	 Route::resource('role','RoleController'); //角色路由组
	 Route::get('role/auth/{id}','RoleController@auth');
     Route::post('role/doauth','RoleController@doAuth');
	 //权限路由组
	 Route::resource('permission','PermissionController');	
	 //简历后台展示等路由组
	 Route::resource('resume','ResumeController'); //简历路由组
	 Route::post('resume/del','ResumeController@delAll');//批量删简历
	 Route::any('resume/export/{id}','ResumeController@export'); //文件导出word
	 Route::any('resume/dopass/{id}','ResumeController@dopass'); //审核通过路由
	 Route::any('resume/topass/{id}','ResumeController@topass'); //简历有误反馈
	 Route::any('resume/nopass/{id}','ResumeController@nopass'); //简历不通过
	 Route::any('resume/pocket/{id}','ResumeController@pocket'); //群发邮件页面
	 Route::any('resume/dopocket/{ids}/{id}','ResumeController@dopocket'); //群发邮件操作
	 //简历评价
	
	 Route::any('assess/general_detail/{id}','AssessController@general_detail');
	 Route::any('assess/skill_detail/{id}','AssessController@skill_detail');
	 //面试官列表
	 Route::resource('interviewer','InterviewerController');
	 Route::get('interviewer/lists/{id}','InterviewerController@lists');
	 Route::get('interviewer/detail_skill/{id}','InterviewerController@detail_skill');
	 Route::get('interviewer/detail_general/{id}','InterviewerController@detail_general');
	 //工作岗位路由
	 Route::get('post','PostController@index');	//列表页
	 Route::get('post/add','PostController@add');	//添加页面
	 Route::post('post/store','PostController@store'); //添加操作
	 Route::any('post/del/{id}','PostController@del'); //删除
	 Route::get('post/edit/{id}','PostController@edit'); //修改页面	
	 Route::any('post/update/{id}','PostController@update');
});
//前台
Route::group(['namespace'=>'Home'],function(){
	Route::get('/','ResumeController@index');
	Route::post('upload','ResumeController@upload'); //文件上传
 	Route::any('resume/add','ResumeController@add'); //简历添加
 	Route::any('editresumeemail','ResumeController@edit');
 	Route::any('resume/update/{id}','ResumeController@update');
});

//评价 
Route::group(['prefix'=>'interviewer','namespace'=>'Interviewer','middleware'=>['InterLogin']],function(){
	// Route::get('','LoginController@index');//首页
	Route::get('edit','UserController@edit');//返回修改密码页面
	Route::any('update/{id}','UserController@update');//返回修改密码页面
	Route::get('loginout','LoginController@loginout'); 	//退出登陆
	//简历评价列表页
	Route::get('index','IndexContorller@index'); //简历岗位选择进入详情页
	Route::any('list','IndexContorller@list');//列表页
	Route::get('detail/{id}','IndexContorller@detail'); //简历详情页
	//综合评价
	Route::get('ass_general/{id}','AssessController@general'); //返回评价页
	Route::any('ass_general/add','AssessController@add_general');  //评价添加
	Route::any('ass_general_detail/{id}','AssessController@general_detail');  //评价查看
	//技能评价
	Route::get('ass_skill/{id}','AssessController@skill'); //返回评价页
	Route::any('ass_skill/add','AssessController@add_skill');  //评价添加
	Route::any('ass_skill_detail/{id}','AssessController@skill_detail');  //评价添加

});
Route::group(['prefix'=>'interviewer','namespace'=>'Interviewer'],function(){
	Route::get('login','LoginController@login'); 	//返回登陆页
	Route::any('dologin','LoginController@dologin');	//登陆验证操作
	// Route::get('encrypt','LoginController@encrypt'); //密码加密
});
	