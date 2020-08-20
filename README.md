更新 2020年 7.8
update:HR发送邮件主题,简历投递者未上传头上则 不显示照片，有上传则显示照片，更改resume页面版式  更改评价页面版式
inster: 简历通过ID 排序 interviewer模块（功能待完善）,简历上传时间及展示

更新 2020年 7.6
创建简历唯一约束，以电话号码为唯一键不能重复提交
下载步骤
1.git clone http://192.168.10.12/root/resume
2.重命名 .env.example 为.env并进行配置
3.composer install or composer update //更新composer依赖包
4.php artisan key:generate //生成密钥