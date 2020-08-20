<!-- 导航栏 -->
<style>
    .nav-head{
        padding-left: 14px;
        padding-right: 14px;
        padding-top: 7px;
        padding-bottom: 7px;
        width: 100%;
        height: 57px;
        position: fixed;
        top: 0;
        right: 0;
        left: 0;
        z-index: 1030;
        display: flex;
        box-shadow: 0 .125rem .25rem rgba(0,0,0,.075)!important;
        background-color: #f8f9fa!important;
        align-items: center;
    }
    .container_head{
        width: 100%;
        padding-right: 15px;
        padding-left: 15px;
        margin-right: auto;
        margin-left: auto;
    }
    .nav-ul{
        flex-direction: row;
        list-style: none;
        height: 40px;
        width: 1200px;
        margin: 0 auto;
        background-color: #f7fcf2;
        padding-left: 0;
        display: flex;
        flex-wrap: wrap;
        margin-block-start: 1em;
        margin-block-end: 1em;
        margin-inline-start: 0px;
        margin-inline-end: 0px;
        padding-inline-start: 40px;
        box-sizing: border-box;
    }
    .nav-ul li{
        position: relative;
        margin-left: 25px;
        margin-right: 25px;
        list-style: none;
        display: list-item;
        text-align: center;
        line-height: 50px;
        width: 100px;

    }
    .sub-nav{
        display: none;
        position: absolute;
        top: 39px;
        left: -1px;
        list-style: none;
        background-color: #f7fcf2;
        display: none;
        margin: 0px;
        width: 150px;
    }
    .sub-nav li{
        width: 150px;
        margin: 0px;
    }
    .nav-link{
        padding-right: 1.2rem;
        padding-left: 1.2rem;
        font-size: 14px;
        color: rgba(0,0,0,.5);
        display: block;
        padding: .5rem 1rem;
        list-style: none;
    }
</style>
<nav class="nav-head">
    <div class="container_head">
        <ul id="navbar" class="nav-ul">
                <li style="margin-right: 100px">
                    <a href="http://www.sharefamily.com.cn"><img src="http://www.sharefamily.com.cn/static/upload/image/20200429/1588140747498777.png" width="200px" heignt="50px"></a>
                </li>
                <li>
                    <a href="http://www.sharefamily.com.cn/">首页</a>
                </li>
                <li>
                    <a href="http://www.sharefamily.com.cn/?product.html">产品及解决方案</a>
                    <ul id="subnav1" class="sub-nav">
                        <li><a href="http://www.sharefamily.com.cn/?products_2.html">应急解决方案</a></li>
                        <li><a href="http://www.sharefamily.com.cn/?products_3.html">政务解决方案</a></li>
                        <li><a href="http://www.sharefamily.com.cn/?products_4.html">云解决方案</a></li>
                        <li><a href="http://www.sharefamily.com.cn/?products_5.html">融媒体解决方案</a></li>
                    </ul>
                </li>
                <li>
                    <a href="http://www.sharefamily.com.cn/?pages_6.html">业务领域</a>
                    <ul id="subnav2" class="sub-nav">
                        <li><a href="http://www.sharefamily.com.cn/?pages_7.html">主机维护</a></li>
                        <li><a href="http://www.sharefamily.com.cn/?pages_8.html">开源系统</a></li>
                        <li><a href="http://www.sharefamily.com.cn/?pages_9.html">网络运维</a></li>
                        <li><a href="http://www.sharefamily.com.cn/?pages_10.html">数据库运维</a></li>
                        <li><a href="http://www.sharefamily.com.cn/?pages_11.html">云计算技术支持</a></li>
                    </ul>
                </li>
                <li>
                    <a href="http://www.sharefamily.com.cn/?jobs_13.html">招贤纳士</a>
                    <ul id="subnav3" class="sub-nav">
                        <li><a href="http://www.sharefamily.com.cn/?pages_22.html">加入我们</a></li>
                        <li><a href="http://resume.sharefamily.com.cn">投递简历</a></li>
                        <li><a href="http://www.sharefamily.com.cn/?pages_21.html">人才开发与培训</a></li>
                        <li><a href="http://www.sharefamily.com.cn/?pages_24.html">领先薪酬</a></li>
                        <li><a href="http://www.sharefamily.com.cn/?pages_25.html">福利保障</a></li>
                    </ul>
                </li>
                <li>
                    <a href="http://www.sharefamily.com.cn/?pages_14.html">走进众享家</a>
                    <ul id="subnav4" class="sub-nav">
                        <li><a href="http://www.sharefamily.com.cn/?pages_15.html">公司简介</a></li>
                        <li><a href="http://www.sharefamily.com.cn/?pages_16.html">企业文化</a></li>
                        <li><a href="http://www.sharefamily.com.cn/?pages_17.html">客户群体</a></li>
                        <li><a href="http://www.sharefamily.com.cn/?pages_18.html">联系我们</a></li>
                        <li><a href="http://www.sharefamily.com.cn/?news_19.html">公司新闻</a></li>
                    </ul>
                </li>
                <li>
                    <a href="">帮助中心</a>
                    <ul id="subnav5" class="sub-nav">
                        <li><a href="http://www.sharefamily.com.cn/?Message_20.html">在线留言</a></li>
                        <li><a href="">意见建议</a></li>
                    </ul>
                </li>
                {{--<li>--}}
                    {{--<a href="http://www.sharefamily.com.cn/">教育网站</a>--}}
                {{--</li>--}}
        </ul>
    </div>
</nav>
<!-- 头部大屏 -->
<header>
    <div  style="padding-top:77px;margin-bottom:50px;height:183px;background: url('http://www.sharefamily.com.cn/static/upload/image/20180412/1523501459462835.jpg')">
        <h1>@yield('title','简历')</h1>
    </div>
</header>
