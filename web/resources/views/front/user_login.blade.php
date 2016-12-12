@extends("front/login_master")
    @section("content")
        <div class="login-content">
            <h1>登录</h1>
            <p> 网罗天下创新事. </p>
            <form action="javascript:;" class="login-form" method="post">
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
                        <div class="rem-password">
                            <p>记住密码
                                <input type="checkbox" class="rem-checkbox" />
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-8 text-right">
                        <div class="forgot-password">
                            <a href="javascript:;" id="forget-password" class="forget-password">忘记密码?</a>
                        </div>
                        <button class="btn blue" type="submit">登录</button>
                    </div>
                </div>
            </form>
            <!-- BEGIN FORGOT PASSWORD FORM -->
            <form class="forget-form" action="javascript:;" method="post">
                <h3 class="font-green">Forgot Password ?</h3>
                <p> Enter your e-mail address below to reset your password. </p>
                <div class="form-group">
                    <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email" /> </div>
                <div class="form-actions">
                    <button type="button" id="back-btn" class="btn grey btn-default">Back</button>
                    <button type="submit" class="btn blue btn-success uppercase pull-right">Submit</button>
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
                                <!--<i class="icon-social-facebook"></i>-->
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