左侧菜单开始 -->
        <div class="left-nav">
            <div id="side-nav">
                <ul id="nav">
                    <li>
                        <a href="javascript:;">
                            <i class="iconfont left-nav-li" lay-tips="管理员管理">&#xe6b8;</i>
                            <cite>管理员管理</cite>
                            <i class="iconfont nav_right">&#xe697;</i></a>
                        <ul class="sub-menu">
                            <li>
                                <a onclick="xadmin.add_tab('管理员列表','{{ url('admin/user') }}')">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>管理员列表</cite></a>
                            </li>
                            <li>
                                <a href="javascript:;">
                                    <i class="iconfont">&#xe70b;</i>
                                    <cite>角色管理</cite>
                                    <i class="iconfont nav_right">&#xe697;</i></a>
                                <ul class="sub-menu">
                                    <li>
                                        <a onclick="xadmin.add_tab('角色列表','{{url('admin/role')}}')">
                                            <i class="iconfont">&#xe6a7;</i>
                                            <cite>角色列表</cite></a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:;">
                                    <i class="iconfont">&#xe70b;</i>
                                    <cite>权限管理</cite>
                                    <i class="iconfont nav_right">&#xe697;</i></a>
                                <ul class="sub-menu">
                                    <li>
                                        <a onclick="xadmin.add_tab('权限列表','{{url('admin/permission')}}')">
                                            <i class="iconfont">&#xe6a7;</i>
                                            <cite>权限列表</cite></a>
                                    </li> 
                                </ul>
                            </li>
                        </ul>
                    </li>
                   <li>
                        <a href="javascript:;">
                            <i class="iconfont left-nav-li" lay-tips="简历管理">&#xe723;</i>
                            <cite>简历管理</cite>
                            <i class="iconfont nav_right">&#xe697;</i></a>
                        <ul class="sub-menu">
                            <li>
                                <a onclick="xadmin.add_tab('简历列表','{{url('admin/resume')}}')">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>简历列表</cite></a>
                            </li>
                            <li>
                                <a onclick="xadmin.add_tab('面试官列表','{{url('admin/interviewer')}}')">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>面试官列表</cite></a>
                            </li>
                            <li>
                                <a onclick="xadmin.add_tab('面试官列表','{{url('admin/post')}}')">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>工作岗位列表</cite></a>
                            </li>
                        </ul>
                    </li> 
            </div>
        </div>
        <!-- <div class="x-slide_left"></div> -->
        <!-- 左侧菜单结束