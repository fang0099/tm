@extends("front/login_master")
    @section("content")
        <div class="login-content">
            <h1>链媒体注册</h1>
            <p> 网罗天下创新事 </p>
            <form action="user/create" class="login-form" method="post">
                <div class="row">
                    <div class="col-xs-6">
                        <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="用户名/手机号/邮箱" name="username" required/> </div>
                    <div class="col-xs-6">
                        <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="密码" name="password" required/> </div>
                </div>
                <div class="alert alert-danger display-hide">
                    <button class="close" data-close="alert"></button>
                    <span>用户名和密码不能为空. </span>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                    </div>
                    <div class="col-sm-8 text-right">
                        <div class="forgot-password">
                            <a href="/tm/web/public/login" id="forget-password" class="forget-password">登录</a>
                        </div>
                        <button class="btn blue" type="submit">注册</button>
                    </div>
                </div>
            </form>
            <!-- BEGIN FORGOT PASSWORD FORM -->
            <form class="forget-form" action="javascript:;" method="post">
                <h3 class="font-green">忘记密码 ?</h3>
                <p> 输入你的注册邮箱来重置密码. </p>
                <div class="form-group">
                    <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email" /> </div>
                <div class="form-actions">
                    <button type="button" id="back-btn" class="btn grey btn-default">返回</button>
                    <button type="submit" class="btn blue btn-success uppercase pull-right">提交</button>
                </div>
            </form>
            <!-- END FORGOT PASSWORD FORM -->
        </div>
        <div class="login-footer">
            <div class="row bs-reset">
                <div class="col-xs-4 bs-reset">
                    <ul class="login-social">
                        <li>
                            <a href="javascript:;">
                                <i class="fa fa-weixin" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:;">
                                <i class="fa fa-weibo" aria-hidden="true"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-xs-8 bs-reset">
                    <div class="login-copyright text-right">
                        <p>版权所有 &copy; 钛媒体 2016</p>
                    </div>
                </div>
            </div>
        </div>

    @stop