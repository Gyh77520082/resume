/*
 Navicat Premium Data Transfer

 Source Server         : 本地连接
 Source Server Type    : MySQL
 Source Server Version : 50726
 Source Host           : localhost:3306
 Source Schema         : resume

 Target Server Type    : MySQL
 Target Server Version : 50726
 File Encoding         : 65001

 Date: 04/08/2020 17:39:36
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admin_permission
-- ----------------------------
DROP TABLE IF EXISTS `admin_permission`;
CREATE TABLE `admin_permission`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `per_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `per_url` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 60 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of admin_permission
-- ----------------------------
INSERT INTO `admin_permission` VALUES (1, '首页权限', 'App\\Http\\Controllers\\Admin\\LoginController@index');
INSERT INTO `admin_permission` VALUES (2, '欢迎页权限', 'App\\Http\\Controllers\\Admin\\LoginController@welcome');
INSERT INTO `admin_permission` VALUES (3, '退出登陆权限', 'App\\Http\\Controllers\\Admin\\LoginController@loginout');
INSERT INTO `admin_permission` VALUES (16, '管理员添加执行', 'App\\Http\\Controllers\\Admin\\UserController@store');
INSERT INTO `admin_permission` VALUES (14, '管理员列表', 'App\\Http\\Controllers\\Admin\\UserController@index');
INSERT INTO `admin_permission` VALUES (17, '管理员修改页面', 'App\\Http\\Controllers\\Admin\\UserController@edit');
INSERT INTO `admin_permission` VALUES (18, '管理员修改执行', 'App\\Http\\Controllers\\Admin\\UserController@update');
INSERT INTO `admin_permission` VALUES (19, '管理员删除', 'App\\Http\\Controllers\\Admin\\UserController@destroy');
INSERT INTO `admin_permission` VALUES (20, '管理员批量删除', 'App\\Http\\Controllers\\Admin\\UserController@delAll');
INSERT INTO `admin_permission` VALUES (21, '管理员状态', 'App\\Http\\Controllers\\Admin\\UserController@ChangeStatus');
INSERT INTO `admin_permission` VALUES (22, '管理员授权页面', 'App\\Http\\Controllers\\Admin\\UserController@auth');
INSERT INTO `admin_permission` VALUES (23, '管理员授权执行', 'App\\Http\\Controllers\\Admin\\UserController@doauth');
INSERT INTO `admin_permission` VALUES (24, '角色列表', 'App\\Http\\Controllers\\Admin\\RoleController@index');
INSERT INTO `admin_permission` VALUES (25, '角色添加页面', 'App\\Http\\Controllers\\Admin\\RoleController@create');
INSERT INTO `admin_permission` VALUES (26, '角色添加执行', 'App\\Http\\Controllers\\Admin\\RoleController@store');
INSERT INTO `admin_permission` VALUES (27, '角色修改页面', 'App\\Http\\Controllers\\Admin\\RoleController@edit');
INSERT INTO `admin_permission` VALUES (28, '角色修改执行', 'App\\Http\\Controllers\\Admin\\RoleController@update');
INSERT INTO `admin_permission` VALUES (29, '角色删除', 'App\\Http\\Controllers\\Admin\\RoleController@destroy');
INSERT INTO `admin_permission` VALUES (30, '角色授权页面', 'App\\Http\\Controllers\\Admin\\RoleController@auth');
INSERT INTO `admin_permission` VALUES (31, '角色授权执行', 'App\\Http\\Controllers\\Admin\\RoleController@doauth');
INSERT INTO `admin_permission` VALUES (32, '权限列表', 'App\\Http\\Controllers\\Admin\\PermissionController@index');
INSERT INTO `admin_permission` VALUES (33, '权限添加页面', 'App\\Http\\Controllers\\Admin\\PermissionController@create');
INSERT INTO `admin_permission` VALUES (34, '权限添加执行', 'App\\Http\\Controllers\\Admin\\PermissionController@store');
INSERT INTO `admin_permission` VALUES (35, '权限修改页面', 'App\\Http\\Controllers\\Admin\\PermissionController@edit');
INSERT INTO `admin_permission` VALUES (36, '权限修改执行', 'App\\Http\\Controllers\\Admin\\PermissionController@update');
INSERT INTO `admin_permission` VALUES (37, '权限删除', 'App\\Http\\Controllers\\Admin\\PermissionController@destroy');
INSERT INTO `admin_permission` VALUES (41, '简历列表页', 'App\\Http\\Controllers\\Admin\\ResumeController@index');
INSERT INTO `admin_permission` VALUES (42, '简历查看', 'App\\Http\\Controllers\\Admin\\ResumeController@edit');
INSERT INTO `admin_permission` VALUES (43, '简历删除', 'App\\Http\\Controllers\\Admin\\ResumeController@destroy');
INSERT INTO `admin_permission` VALUES (44, '简历批量删除', 'App\\Http\\Controllers\\Admin\\ResumeController@delAll');
INSERT INTO `admin_permission` VALUES (45, '文件导出', 'App\\Http\\Controllers\\Admin\\ResumeController@export');
INSERT INTO `admin_permission` VALUES (46, 'HR审核通过', 'App\\Http\\Controllers\\Admin\\ResumeController@dopass');
INSERT INTO `admin_permission` VALUES (47, 'HR审核不通过', 'App\\Http\\Controllers\\Admin\\ResumeController@topass');
INSERT INTO `admin_permission` VALUES (48, '简历开通审核', 'App\\Http\\Controllers\\Admin\\ResumeController@ktpass');
INSERT INTO `admin_permission` VALUES (49, '简历开通人不通过', 'App\\Http\\Controllers\\Admin\\ResumeController@ktnopass');
INSERT INTO `admin_permission` VALUES (50, '简历评价首页', 'App\\Http\\Controllers\\Admin\\AssessController@index');
INSERT INTO `admin_permission` VALUES (51, '评价添加', 'App\\Http\\Controllers\\Admin\\AssessController@add');
INSERT INTO `admin_permission` VALUES (52, '评价展示', 'App\\Http\\Controllers\\Admin\\AssessController@detail');
INSERT INTO `admin_permission` VALUES (53, '开通人邮件发送', 'App\\Http\\Controllers\\Admin\\EmailController@toemail');
INSERT INTO `admin_permission` VALUES (54, '面试官列表', 'App\\Http\\Controllers\\Admin\\InterviewerController@index');
INSERT INTO `admin_permission` VALUES (55, '面试官添加页', 'App\\Http\\Controllers\\Admin\\InterviewerController@add');
INSERT INTO `admin_permission` VALUES (56, '面试官添加操作', 'App\\Http\\Controllers\\Admin\\InterviewerController@store');
INSERT INTO `admin_permission` VALUES (57, '面试官修改页', 'App\\Http\\Controllers\\Admin\\InterviewerController@edit');
INSERT INTO `admin_permission` VALUES (58, '面试官修改操作', 'App\\Http\\Controllers\\Admin\\InterviewerController@update');
INSERT INTO `admin_permission` VALUES (59, '面试官删除', 'App\\Http\\Controllers\\Admin\\InterviewerController@destroy');

-- ----------------------------
-- Table structure for admin_role
-- ----------------------------
DROP TABLE IF EXISTS `admin_role`;
CREATE TABLE `admin_role`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '权限名',
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '详细描述',
  `status` int(11) NULL DEFAULT NULL COMMENT '是否启用',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of admin_role
-- ----------------------------
INSERT INTO `admin_role` VALUES (1, '超级管理员', '所有权限满足', 1);

-- ----------------------------
-- Table structure for admin_role_permission
-- ----------------------------
DROP TABLE IF EXISTS `admin_role_permission`;
CREATE TABLE `admin_role_permission`  (
  `role_id` int(11) NULL DEFAULT NULL,
  `per_id` int(11) NULL DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 125 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Fixed;

-- ----------------------------
-- Records of admin_role_permission
-- ----------------------------
INSERT INTO `admin_role_permission` VALUES (1, 1, 79);
INSERT INTO `admin_role_permission` VALUES (1, 2, 80);
INSERT INTO `admin_role_permission` VALUES (1, 3, 81);
INSERT INTO `admin_role_permission` VALUES (1, 16, 82);
INSERT INTO `admin_role_permission` VALUES (1, 15, 83);
INSERT INTO `admin_role_permission` VALUES (1, 14, 84);
INSERT INTO `admin_role_permission` VALUES (1, 17, 85);
INSERT INTO `admin_role_permission` VALUES (1, 18, 86);
INSERT INTO `admin_role_permission` VALUES (1, 19, 87);
INSERT INTO `admin_role_permission` VALUES (1, 20, 88);
INSERT INTO `admin_role_permission` VALUES (1, 21, 89);
INSERT INTO `admin_role_permission` VALUES (1, 22, 90);
INSERT INTO `admin_role_permission` VALUES (1, 23, 91);
INSERT INTO `admin_role_permission` VALUES (1, 24, 92);
INSERT INTO `admin_role_permission` VALUES (1, 25, 93);
INSERT INTO `admin_role_permission` VALUES (1, 26, 94);
INSERT INTO `admin_role_permission` VALUES (1, 27, 95);
INSERT INTO `admin_role_permission` VALUES (1, 28, 96);
INSERT INTO `admin_role_permission` VALUES (1, 29, 97);
INSERT INTO `admin_role_permission` VALUES (1, 30, 98);
INSERT INTO `admin_role_permission` VALUES (1, 31, 99);
INSERT INTO `admin_role_permission` VALUES (1, 32, 100);
INSERT INTO `admin_role_permission` VALUES (1, 33, 101);
INSERT INTO `admin_role_permission` VALUES (1, 34, 102);
INSERT INTO `admin_role_permission` VALUES (1, 35, 103);
INSERT INTO `admin_role_permission` VALUES (1, 36, 104);
INSERT INTO `admin_role_permission` VALUES (1, 37, 105);
INSERT INTO `admin_role_permission` VALUES (1, 41, 106);
INSERT INTO `admin_role_permission` VALUES (1, 42, 107);
INSERT INTO `admin_role_permission` VALUES (1, 43, 108);
INSERT INTO `admin_role_permission` VALUES (1, 44, 109);
INSERT INTO `admin_role_permission` VALUES (1, 45, 110);
INSERT INTO `admin_role_permission` VALUES (1, 46, 111);
INSERT INTO `admin_role_permission` VALUES (1, 47, 112);
INSERT INTO `admin_role_permission` VALUES (1, 48, 113);
INSERT INTO `admin_role_permission` VALUES (1, 49, 114);
INSERT INTO `admin_role_permission` VALUES (1, 50, 115);
INSERT INTO `admin_role_permission` VALUES (1, 51, 116);
INSERT INTO `admin_role_permission` VALUES (1, 52, 117);
INSERT INTO `admin_role_permission` VALUES (1, 53, 118);
INSERT INTO `admin_role_permission` VALUES (1, 54, 119);
INSERT INTO `admin_role_permission` VALUES (1, 55, 120);
INSERT INTO `admin_role_permission` VALUES (1, 56, 121);
INSERT INTO `admin_role_permission` VALUES (1, 57, 122);
INSERT INTO `admin_role_permission` VALUES (1, 58, 123);
INSERT INTO `admin_role_permission` VALUES (1, 59, 124);

-- ----------------------------
-- Table structure for admin_role_user
-- ----------------------------
DROP TABLE IF EXISTS `admin_role_user`;
CREATE TABLE `admin_role_user`  (
  `user_id` int(11) NULL DEFAULT NULL,
  `role_id` int(11) NULL DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Fixed;

-- ----------------------------
-- Records of admin_role_user
-- ----------------------------
INSERT INTO `admin_role_user` VALUES (1, 1, 3);

-- ----------------------------
-- Table structure for admin_user
-- ----------------------------
DROP TABLE IF EXISTS `admin_user`;
CREATE TABLE `admin_user`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `status` int(255) NULL DEFAULT NULL,
  `create_time` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 14 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of admin_user
-- ----------------------------
INSERT INTO `admin_user` VALUES (1, 'admin', '$2y$10$Y57h5wsJztAThgUrP3T/GOF65KUpspJPoAHSJbV0qJce1lx1E400u', 1, NULL);
INSERT INTO `admin_user` VALUES (2, '李元甲', '$2y$10$82eSEaUfmMdrjX9vB2b30.9b013sdPNBXcv6hL7ofUohRaw0RpH4.', 1, NULL);
INSERT INTO `admin_user` VALUES (3, '许荣泉', '$2y$10$mPuZxyNF1HyKSpmyFkHXeu0mSEQVJS/z4enBUBVWa7Fn5CDv/J27.', 1, NULL);
INSERT INTO `admin_user` VALUES (4, '刘琛', '$2y$10$wHgvd95tmX7xF1T3f6Ebw.9lkKN7UTp/flPDw0nl21kBJzQMk5Rvu', 1, NULL);
INSERT INTO `admin_user` VALUES (5, '钟婷艳', '$2y$10$wuQooeJp0ukI9twmT0armevcAm7OyGUT4sdD/O0SfVqyyFvEQ.U.e', 1, NULL);
INSERT INTO `admin_user` VALUES (6, '陈滔', '$2y$10$xTVMQurOWQjblPI743xp9ubDdaTwj0MSi9dJALyGQ/T.83QPAeFE6', 1, NULL);
INSERT INTO `admin_user` VALUES (8, '刘正怡', '$2y$10$yjj4uBkIK0k4tP6NtLkfz.kwY4WPum7CbGujyHgx0ToSqSv9J9beG', 1, NULL);
INSERT INTO `admin_user` VALUES (9, '林潘钦', '$2y$10$QS3zBvYTcFcS53JF1UZ3u.ue/lwh2YK8wnZbzFKy0OOrLaBWvUj5C', 1, NULL);
INSERT INTO `admin_user` VALUES (10, '黄键威', '$2y$10$OStKyBJQdWr4UpkYb89W1.VA9Nqz6FPuKp0a/KyJdM4Axx79uiagS', 1, NULL);
INSERT INTO `admin_user` VALUES (11, '钟陈斌', '$2y$10$FIIMNvlEDy7DZChrLCUxIuHmy4QVyyYmEgf2fdzms0tyWl4EbeYzK', 1, NULL);
INSERT INTO `admin_user` VALUES (12, '钟陈斌', '$2y$10$ZKsryzbv/go35C.dj2QYLuAGqoRTNid9ijvPsEftkpeIvGkWyp31G', 1, NULL);
INSERT INTO `admin_user` VALUES (13, '陆飞宇', '$2y$10$36S9mGb/CS.Rc4lGWX4j0eKTVm0SdEFVD8op3XFKTVkSRy2xR/ZbC', 1, NULL);

-- ----------------------------
-- Table structure for assess
-- ----------------------------
DROP TABLE IF EXISTS `assess`;
CREATE TABLE `assess`  (
  `a_id` int(11) NOT NULL AUTO_INCREMENT,
  `vocationa` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `duty` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `autognosis` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `capacity` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `thought` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `network` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `mainframe` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `bigdata` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `collaboration` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `certificate` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `certificatescore` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `evaluation` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `finalresult` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ass_id` int(11) NULL DEFAULT NULL,
  `ass_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `paass_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`a_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 37 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of assess
-- ----------------------------
INSERT INTO `assess` VALUES (30, '很差', '很差', '很差', '很差', '很差', '很差', '很差', '很差', '很差', 'DF', '4', 'Test', '待定', 54, '刘琛', '李典');
INSERT INTO `assess` VALUES (31, '很差', '很差', '很差', '很差', '很差', '很差', '很差', '很差', '很差', 'MJ', '0', 'TEST', '进入下轮面试', 54, '李元甲', '李典');
INSERT INTO `assess` VALUES (32, '一般', '很好', '一般', '很好', '很好', '很差', '很差', '很差', '一般', '00', '0', '人在龙岩老家，需要等到8月份考试时候才能来福州，思路较清晰。', '进入下轮面试', 52, '刘琛', '吴舒娟');
INSERT INTO `assess` VALUES (33, '很差', '很差', '很差', '很好', '一般', '很好', '比较差', '比较差', '一般', 'MF', '0', '已找到工作', '淘汰', 55, '刘琛', '施锦浛');
INSERT INTO `assess` VALUES (34, '6', '6', '6', '8', '6', '4', '4', '4', '4', NULL, '0', '有行政、人事工作经验，沟通能力尚可，薪资待遇要求4K左右.', '进入下轮面试', 66, '刘琛', '周晓琳');
INSERT INTO `assess` VALUES (35, '6', '8', '6', '8', '6', '0', '0', '0', '0', NULL, '0', '想要从现有公司跳槽去大公司发展，可能不会考虑初创型公司，稳定性有待考虑，工作范围较广，有相关工作经验，薪资要求4.5K', '进入下轮面试', 82, '刘琛', '龙艳琴');
INSERT INTO `assess` VALUES (36, '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '0', NULL, '淘汰', 83, '刘琛', '兰冬兰');

-- ----------------------------
-- Table structure for cate
-- ----------------------------
DROP TABLE IF EXISTS `cate`;
CREATE TABLE `cate`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for company
-- ----------------------------
DROP TABLE IF EXISTS `company`;
CREATE TABLE `company`  (
  `com_id` int(11) NOT NULL AUTO_INCREMENT,
  `company` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '公司名称',
  `postname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '职位名称',
  `postmin` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '在职时间-开始',
  `postmax` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '在职时间-中止',
  `jobdescription` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '工作描述',
  `rename` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`com_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 30 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of company
-- ----------------------------
INSERT INTO `company` VALUES (1, '55555', '555555555555', '2020-07-10', '2020-07-10', '55555555555555555', '17850859100');
INSERT INTO `company` VALUES (2, '11111', '11111111111', '2020-07-10', '2020-07-07', '11111111111111111', '17575757574');
INSERT INTO `company` VALUES (3, '1', '11111', '2020-07-04', '2020-07-22', '111111111111111111111111', '17575757574');
INSERT INTO `company` VALUES (4, '1', '1111111111', '2020-07-05', '2020-07-17', '11111111111111', '17575757574');
INSERT INTO `company` VALUES (5, '11111', '11111111111', '2020-07-10', '2020-07-07', '11111111111111111', '17575757572');
INSERT INTO `company` VALUES (6, '1', '11111', '2020-07-04', '2020-07-22', '111111111111111111111111', '17575757572');
INSERT INTO `company` VALUES (7, '1', '1111111111', '2020-07-05', '2020-07-17', '11111111111111', '17575757572');
INSERT INTO `company` VALUES (8, '11111', '11111111111', '2020-07-10', '2020-07-07', '11111111111111111', '17575757500');
INSERT INTO `company` VALUES (9, '1', '11111', '2020-07-04', '2020-07-22', '111111111111111111111111', '17575757500');
INSERT INTO `company` VALUES (10, '1', '1111111111', '2020-07-05', '2020-07-17', '11111111111111', '17575757500');
INSERT INTO `company` VALUES (11, '11111', '11111111111', '2020-07-10', '2020-07-07', '11111111111111111', '17575757588');
INSERT INTO `company` VALUES (12, '1', '11111', '2020-07-04', '2020-07-22', '111111111111111111111111', '17575757588');
INSERT INTO `company` VALUES (13, '1', '1111111111', '2020-07-05', '2020-07-17', '11111111111111', '17575757588');
INSERT INTO `company` VALUES (14, '11111', '11111111111', '2020-07-10', '2020-07-07', '11111111111111111', '17575757511');
INSERT INTO `company` VALUES (15, '1', '11111', '2020-07-04', '2020-07-22', '111111111111111111111111', '17575757511');
INSERT INTO `company` VALUES (16, '1', '1111111111', '2020-07-05', '2020-07-17', '11111111111111', '17575757511');
INSERT INTO `company` VALUES (17, '55555', '55555555555', '2020-07-11', '2020-07-10', '5555555555555555', '17545452485');
INSERT INTO `company` VALUES (18, '8888888888888888888', '222', '2020-07-18', '2020-07-11', '22222222222222', '17850859863');
INSERT INTO `company` VALUES (19, '222', '2222222', '2020-07-11', '2020-07-07', '22222222222222222', '17850859863');
INSERT INTO `company` VALUES (20, '222', '2222222222', '2020-07-19', '2020-07-15', '2222222222222222222', '17850859863');
INSERT INTO `company` VALUES (21, '8888888888888888888', '222', '2020-07-18', '2020-07-11', '22222222222222', '17850859860');
INSERT INTO `company` VALUES (22, '222', '2222222', '2020-07-11', '2020-07-07', '22222222222222222', '17850859860');
INSERT INTO `company` VALUES (23, '222', '2222222222', '2020-07-19', '2020-07-15', '2222222222222222222', '17850859860');
INSERT INTO `company` VALUES (24, '8888888888888888888', '222', '2020-07-18', '2020-07-11', '22222222222222', '17850859810');
INSERT INTO `company` VALUES (25, '222', '2222222', '2020-07-11', '2020-07-07', '22222222222222222', '17850859810');
INSERT INTO `company` VALUES (26, '222', '2222222222', '2020-07-19', '2020-07-15', '2222222222222222222', '17850859810');
INSERT INTO `company` VALUES (27, '8888888888888888888', '222', '2020-07-18', '2020-07-11', '22222222222222', '17850859801');
INSERT INTO `company` VALUES (28, '222', '2222222', '2020-07-11', '2020-07-07', '22222222222222222', '17850859801');
INSERT INTO `company` VALUES (29, '222', '2222222222', '2020-07-19', '2020-07-15', '2222222222222222222', '17850859801');

-- ----------------------------
-- Table structure for endemail
-- ----------------------------
DROP TABLE IF EXISTS `endemail`;
CREATE TABLE `endemail`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 22 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of endemail
-- ----------------------------
INSERT INTO `endemail` VALUES (1, '李元甲', 'yuanjia.li@sharefamily.com.cn');
INSERT INTO `endemail` VALUES (3, '许荣泉', 'rongquan.xu@sharefamily.com.cn');
INSERT INTO `endemail` VALUES (4, '陆飞宇', 'feiyu.lu@sharefamily.com.cn');
INSERT INTO `endemail` VALUES (8, '陈海龙', 'hailong.chen@sharefamily.com.cn');
INSERT INTO `endemail` VALUES (10, '钟陈斌', 'chenbin.zhong@sharefamily.com.cn');
INSERT INTO `endemail` VALUES (11, '林潘钦', 'panqin.lin@sharefamily.com.cn');
INSERT INTO `endemail` VALUES (13, '黄键威', 'jianwei.huang@sharefamily.com.cn');
INSERT INTO `endemail` VALUES (16, '刘正怡', 'zhengyi.liu@sharefamily.com.cn');
INSERT INTO `endemail` VALUES (14, '陈滔', 'tao.chen@sharefamily.com.cn');
INSERT INTO `endemail` VALUES (2, '刘琛', 'chen.liu@sharefamily.com.cn');
INSERT INTO `endemail` VALUES (5, '钟婷艳', 'tingyan.zhong@sharefamily.com.cn');

-- ----------------------------
-- Table structure for post
-- ----------------------------
DROP TABLE IF EXISTS `post`;
CREATE TABLE `post`  (
  `post_id` int(255) NOT NULL AUTO_INCREMENT,
  `post_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `post_description` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `post_leader` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`post_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 19 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of post
-- ----------------------------
INSERT INTO `post` VALUES (4, '财务会计实习生', '财务', '刘琛');
INSERT INTO `post` VALUES (1, '行政专员', '行政', '刘琛');
INSERT INTO `post` VALUES (5, '数据库实习工程师', '数据库工程师，岗位负责人：钟婷艳', '钟婷艳');
INSERT INTO `post` VALUES (6, '技术支持实习工程师', '实习生_技术支持工程师，岗位负责人：陈滔', '陈滔');
INSERT INTO `post` VALUES (7, '运维项目经理', '开发项目经理，岗位负责人：许荣泉', '李元甲');
INSERT INTO `post` VALUES (9, '5G核心网运维工程师', '5G核心网运维工程师，岗位负责人：钟婷艳', '钟婷艳');
INSERT INTO `post` VALUES (10, '驻点运维工程师', '驻点运维工程师，岗位负责人：钟婷艳', '钟婷艳');
INSERT INTO `post` VALUES (16, '运维工程师-莆田', '驻点工程师', '陈滔');
INSERT INTO `post` VALUES (17, '驻点运维网络工程师', '发改委', '钟婷艳');
INSERT INTO `post` VALUES (18, '销售助理', '销售辅助岗位', '刘琛');

-- ----------------------------
-- Table structure for project
-- ----------------------------
DROP TABLE IF EXISTS `project`;
CREATE TABLE `project`  (
  `project_id` int(11) NOT NULL AUTO_INCREMENT,
  `projectname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '项目名称',
  `projectbrief` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '项目简介',
  `projectmin` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '项目时间-起点',
  `projectmax` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '项目时间-终点',
  `projectdescription` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '项目描述',
  `rename` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`project_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 14 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of project
-- ----------------------------
INSERT INTO `project` VALUES (1, '1111111', '1111111111111', '2020-07-19', '2020-07-10', '111111111111111111111', '17850859100');
INSERT INTO `project` VALUES (2, '11111111', '111111111111', '2020-07-03', '2020-07-26', '11111111111111111111111111', '17575757574');
INSERT INTO `project` VALUES (3, '111111111111', '11111', NULL, NULL, '11111111111111111', '17575757574');
INSERT INTO `project` VALUES (4, '11111111', '111111111111', '2020-07-03', '2020-07-26', '11111111111111111111111111', '17575757572');
INSERT INTO `project` VALUES (5, '111111111111', '11111', NULL, NULL, '11111111111111111', '17575757572');
INSERT INTO `project` VALUES (6, '11111111', '111111111111', '2020-07-03', '2020-07-26', '11111111111111111111111111', '17575757500');
INSERT INTO `project` VALUES (7, '111111111111', '11111', NULL, NULL, '11111111111111111', '17575757500');
INSERT INTO `project` VALUES (8, '11111111', '111111111111', '2020-07-03', '2020-07-26', '11111111111111111111111111', '17575757588');
INSERT INTO `project` VALUES (9, '111111111111', '11111', NULL, NULL, '11111111111111111', '17575757588');
INSERT INTO `project` VALUES (10, '11111111', '111111111111', '2020-07-03', '2020-07-26', '11111111111111111111111111', '17575757511');
INSERT INTO `project` VALUES (11, '111111111111', '11111', NULL, NULL, '11111111111111111', '17575757511');
INSERT INTO `project` VALUES (12, '5555', '555555555', '2020-07-11', '2020-07-25', '55555555555555', '17545452485');
INSERT INTO `project` VALUES (13, NULL, NULL, NULL, NULL, NULL, '17545452485');

-- ----------------------------
-- Table structure for resume
-- ----------------------------
DROP TABLE IF EXISTS `resume`;
CREATE TABLE `resume`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '姓名',
  `post` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '应聘岗位',
  `payment` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '期望薪酬',
  `photo` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '照片',
  `birthday` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '出生年月',
  `sex` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '性别',
  `arrivaltime` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '最快到岗时间',
  `phone` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '通信电话',
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '邮箱',
  `native` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '生源所在地',
  `approach` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '招聘信息获取途径',
  `politics` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '政治面貌',
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '通信地址',
  `marital` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '婚姻状况',
  `firstschool` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '第一学历毕业院校',
  `maxschool` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '最高学历毕业院校',
  `firsteducation` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '第一学历',
  `firstmajor` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '第一学历专业',
  `maxeducation` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '最高学历',
  `maxmajor` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '最高学历专业',
  `firsttime` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '第一学历毕业时间',
  `maxtime` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '最高学历毕业时间',
  `idtype` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '证书类',
  `credential` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '相关证书叙述',
  `hobbies` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '兴趣爱好',
  `introduce` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '自我介绍',
  `ifpass` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '是否通过',
  `state` int(255) NULL DEFAULT NULL COMMENT '0为可修改 1为不可修改',
  `createtime` datetime(0) NULL DEFAULT NULL COMMENT '创建时间',
  `status` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '状态',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 12 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of resume
-- ----------------------------
INSERT INTO `resume` VALUES (1, '6666', '财务会计实习生', '555555', NULL, '2020-07-17', '男', '随时', '17850859100', '77520082@qq.com', '555555', '校园招聘', '555555555555555555', '55', '未婚', '555555555', '5555555555', '5555555', '5555555555555555', '5555555555555555', '555555', '2020-07-17', '2020-07-16', '暂无', '55555', '5555555555555555', '55555555555', NULL, NULL, '2020-07-29 06:25:45', '未审核');
INSERT INTO `resume` VALUES (2, '66666', '财务会计实习生', '11', NULL, '2020-07-04', '男', '随时', '17575757574', '592358736@qq.cc', '11111111', '校园招聘', '111111111111111', '1111111111', '未婚', '111111111111', NULL, '111111111111111', '111111111111', NULL, '111111', '2020-07-17', NULL, '暂无', '11111111111111111', '11111111111111', '11111111111111111111111111111111', NULL, NULL, '2020-07-29 06:29:34', '未审核');
INSERT INTO `resume` VALUES (3, '66666', '财务会计实习生', '11', NULL, '2020-07-04', '男', '随时', '17575757572', '592358736@qq.cc', '11111111', '校园招聘', '111111111111111', '1111111111', '未婚', '111111111111', NULL, '111111111111111', '111111111111', NULL, '111111', '2020-07-17', NULL, '暂无', '11111111111111111', '11111111111111', '11111111111111111111111111111111', NULL, NULL, '2020-07-29 06:43:03', '未审核');
INSERT INTO `resume` VALUES (4, '66666', '财务会计实习生', '11', NULL, '2020-07-04', '男', '随时', '17575757500', '592358736@qq.cc', '11111111', '校园招聘', '111111111111111', '1111111111', '未婚', '111111111111', NULL, '111111111111111', '111111111111', NULL, '111111', '2020-07-17', NULL, '暂无', '11111111111111111', '11111111111111', '11111111111111111111111111111111', NULL, NULL, '2020-07-29 06:44:31', '未审核');
INSERT INTO `resume` VALUES (5, '66666', '财务会计实习生', '11', NULL, '2020-07-04', '男', '随时', '17575757588', '592358736@qq.cc', '11111111', '校园招聘', '111111111111111', '1111111111', '未婚', '111111111111', NULL, '111111111111111', '111111111111', NULL, '111111', '2020-07-17', NULL, '暂无', '11111111111111111', '11111111111111', '11111111111111111111111111111111', NULL, NULL, '2020-07-29 06:46:40', '未审核');
INSERT INTO `resume` VALUES (6, '66666', '财务会计实习生', '11', NULL, '2020-07-04', '男', '随时', '17575757511', '592358736@qq.cc', '11111111', '校园招聘', '111111111111111', '1111111111', '未婚', '111111111111', NULL, '111111111111111', '111111111111', NULL, '111111', '2020-07-17', NULL, '暂无', '11111111111111111', '11111111111111', '11111111111111111111111111111111', NULL, NULL, '2020-07-29 06:55:34', '未审核');
INSERT INTO `resume` VALUES (7, '5555555', '财务会计实习生', '5555', NULL, '2020-07-12', '男', '随时', '17545452485', '592358736@qq.com', '555555555555', '校园招聘', '555', '55555', '未婚', '55555', '555555555555', '55555', '55555555555555555', '55555555555555', '555555555555', '2020-07-17', '2020-07-16', '暂无', '555555', '55555555555555', '5555555555', NULL, NULL, '2020-07-29 06:56:41', '未审核');
INSERT INTO `resume` VALUES (8, '猪立安', '财务会计实习生', '555', NULL, '2020-07-11', '男', '随时', '17850859863', '59238736@qq.com', '555555555555', '校园招聘', '5', '88888', '未婚', '888', '88888888888', '88888888888888', '8888888888888888', '88888888888888', '888888888888888888', '2020-07-18', '2020-07-10', '暂无', '2222', '222222222222222', '2222222222222', NULL, NULL, '2020-07-29 07:06:45', '未审核');
INSERT INTO `resume` VALUES (9, '猪立安', '财务会计实习生', '555', NULL, '2020-07-11', '男', '随时', '17850859860', '59238736@qq.com', '555555555555', '校园招聘', '5', '88888', '未婚', '888', '88888888888', '88888888888888', '8888888888888888', '88888888888888', '888888888888888888', '2020-07-18', '2020-07-10', '暂无', '2222', '222222222222222', '2222222222222', NULL, NULL, '2020-07-29 07:08:21', '未审核');
INSERT INTO `resume` VALUES (10, '猪立安', '财务会计实习生', '555', NULL, '2020-07-11', '男', '随时', '17850859810', '59238736@qq.com', '555555555555', '校园招聘', '5', '88888', '未婚', '888', '88888888888', '88888888888888', '8888888888888888', '88888888888888', '888888888888888888', '2020-07-18', '2020-07-10', '暂无', '2222', '222222222222222', '2222222222222', NULL, NULL, '2020-07-29 07:09:32', '未审核');
INSERT INTO `resume` VALUES (11, '猪立安', '财务会计实习生', '555', NULL, '2020-07-11', '男', '随时', '17850859801', '59238736@qq.com', '555555555555', '校园招聘', '5', '88888', '未婚', '888', '88888888888', '88888888888888', '8888888888888888', '88888888888888', '888888888888888888', '2020-07-18', '2020-07-10', '暂无', '2222', '222222222222222', '2222222222222', NULL, NULL, '2020-07-29 07:10:14', '未审核');

SET FOREIGN_KEY_CHECKS = 1;
