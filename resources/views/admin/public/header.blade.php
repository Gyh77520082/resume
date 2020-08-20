 <body class="index">
        <!-- 顶部开始 -->
        <div class="container">
            <div class="logo">
                <a href="admin/index">sharefamily后台管理系统</a></div>
            <div class="left_open">
                <a><i title="展开左侧栏" class="iconfont">&#xe699;</i></a>
            </div>
            <ul class="layui-nav left fast-add" lay-filter="">
                <li class="layui-nav-item">
                    <a href="javascript:;">+新增</a>
                    <dl class="layui-nav-child">
                        <!-- 二级菜单 -->
                        <dd>
                            <a onclick="xadmin.open('最大化','http://www.baidu.com','','',true)">
                                <i class="iconfont">&#xe6a2;</i>弹出最大化</a></dd>
                        <dd>
                            <a onclick="xadmin.open('弹出自动宽高','http://www.baidu.com')">
                                <i class="iconfont">&#xe6a8;</i>弹出自动宽高</a></dd>
                        <dd>
                            <a onclick="xadmin.open('弹出指定宽高','http://www.baidu.com',500,300)">
                                <i class="iconfont">&#xe6a8;</i>弹出指定宽高</a></dd>
                        <dd>
                            <a onclick="xadmin.add_tab('在tab打开','member-list.html')">
                                <i class="iconfont">&#xe6b8;</i>在tab打开</a></dd>
                        <dd>
                            <a onclick="xadmin.add_tab('在tab打开刷新','member-del.html',true)">
                                <i class="iconfont">&#xe6b8;</i>在tab打开刷新</a></dd>
                    </dl>
                </li>
            </ul>
            <ul class="layui-nav right" lay-filter="">
                <li class="layui-nav-item">
                    <a href="javascript:;">{{session('user.name')}}</a>
                    <dl class="layui-nav-child">
                        <!-- 二级菜单 -->
                        <!-- <dd>
                            <a onclick="xadmin.open('个人信息','http://www.baidu.com')">个人信息</a></dd>
                        <dd>
                            <a onclick="xadmin.open('切换帐号','http://www.baidu.com')">切换帐号</a></dd> -->
                        <dd>
                            <a href="{{ url('admin/loginout') }}">退出</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item to-index">
                    <a href="/">前台首页</a></li>
            </ul>
        </div>
        <!-- 顶部结束 -->
            <footer>
        <div class="footer-l">
            <h5>福州众享家信息科技有限公司</h5>
            <ul>
                <li>营业执照：</li>
                <li><a href="">备案号码：闽ICP备17024915号-1</a></li>
                <li>地址：福建省福州市高新区海西园科技东路10号中青大厦14层1409室</li>
            </ul>
        </div>
        <div class="footer-r">
            <div class="footer-r-l">
            <h5>联系我们</h5>
            <ul>
                <li>电话：0591-3835 2026 </li>
                <li>邮箱：kf@sharefamily.com.cn</li>
                <li>Q  Q：871323093</li>
            </ul>
            </div>
            <div class="footer-r-r">
                <img src="admin/images/二维码1.png">
                <p>扫一扫 手机访问</p>
                
            </div>
            
        </div>
        <div class="Copyright">Copyright © 2018-2020 Sharefamily All Rights Reserved. </div>
                    
    </footer>