$(function() {
    var navTop = `<div class="nav-top" id="myexample">
                <ul class="nav-top-left fl">
                    <li class="nav-top-left-li1">
                        <a href="javascript:" class="shen "><i class="layui-icon layui-icon-spread-left"></i></a>
                        <a href="javascript:" class="suo yin"><i class="layui-icon layui-icon-shrink-right"></i></a>
                    </li>
                    <li>
                        <a href="index.html"><i class="layui-icon layui-icon-website"></i></a>
                    </li>
                    <li>
                        <a href=""><i class="layui-icon layui-icon-refresh-3"></i></a>
                    </li>
                    <li>
                        <input type="text" placeholder="搜索...">
                    </li>
                </ul>
                <ul class="nav-top-right fr">
                    <li>
                        <a href=""><i class="layui-icon layui-icon-notice"></i></a>
                    </li>
                    <li>
                        <a href=""><i class="layui-icon layui-icon-theme"></i></a>
                    </li>
                    <li>
                        <a href=""><i class="layui-icon layui-icon-note"></i></a>
                    </li>
                    <li>
                        <a href=""><i class="layui-icon layui-icon-screen-full"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="javascript:;" class="login dropdown-toggle" data-toggle="dropdown">
                            <div id="username">dsad</div>
                            <span class="layui-nav-more"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a id="quit" href="javascript:;">退出</a>
                            </li>
                            <li>
                                <a href="#">基本资料</a>
                            </li>
                            <li>
                                <a href="edituser.html">修改密码</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href=""><i class="layui-icon layui-icon-more-vertical"></i></a>
                    </li>
                </ul>
            </div>`;

    $('.top').html(navTop);
    $('#quit').click(function () {
                console.log('a');
                removeCookie('email', '/')
                alert('管理员退出成功');
                location.href = 'login.html';
            })
            if(getCookie('username')){
                $('#username').html(getCookie('username'));
            }else{
                $('#username').html('请重新登陆');
            }
    var sideBar = `<div class="panel panel-default left-div1">
                <div>
                    功能菜单
                </div>
            </div>
            <div class="changtiao"></div>
            <div class="panel panel-default left-div2">
                <div class="panel-heading dianji">
                    <div class="panel-title">
                        <div data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                            <a href="">系统设置
                                <i class="layui-icon layui-icon-home"></i>
                                <span class="layui-nav-more"></span>
                            </a>
                        </div>
                    </div>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in">
                    <div class="panel-body panel-body-box">
                        <ul class="">
                            <li><a href="">基本设置</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="panel panel-default left-div2">
                <div class="panel-heading dianji">
                    <div class="panel-title">
                        <div data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                            <a href="">信息管理
                                <i class="layui-icon layui-icon-component"></i>
                                <span class="layui-nav-more"></span>
                            </a>
                        </div>
                    </div>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse in">
                    <div class="panel-body panel-body-box">
                        <ul class="">
                            <li><a href="newslist.html">信息列表</a></li>
                            <li><a href="addnew.html">添加信息</a></li>
                            <li><a href="">信息分类</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="panel panel-default left-div2">
                <div class="panel-heading dianji">
                    <div class="panel-title">
                        <div data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                            <a href="">用户管理
                                <i class="layui-icon layui-icon-template"></i>
                                <span class="layui-nav-more"></span>
                            </a>
                        </div>
                    </div>
                </div>
                <div id="collapseThree" class="panel-collapse collapse in">
                    <div class="panel-body panel-body-box">
                        <ul class="">
                            <li><a href="adduser.html">添加管理员</a></li>
                            <li><a href="userlist.html">管理员列表</a></li>
                            <li><a href="">普通用户</a></li>
                        </ul>
                    </div>
                </div>
            </div>`;
    $('#accordion').html(sideBar);
})