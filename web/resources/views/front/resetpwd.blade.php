<!DOCTYPE html>
<html>
<head>
    <title>重置密码</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" type="text/css" href="/usercenter/css/style.css">
    <link rel="stylesheet" type="text/css" href="/usercenter/css/responsive.css">
    <link rel="stylesheet" type="text/css" href="/usercenter/css/login.css">
    <style>
        html { font-size: 62.5%; }
        .form .form-control {
             margin-bottom: 0px;
        }
    </style>
</head>
<body>

<div class="container">
    <header class="p-header new-header p-header-show">
        <div class="first-nav">
            <div class="options">
                <!--
                <div class="nav-search">
                    <form action="/search" method="get" accept-charset="utf-8">
                        <input type="text" name="q" value="">
                        <button class="search"><i class="icon-search"></i></button>
                    </form>
                </div>

                <a href="/account#login" id="login-a" title="登录" rel="nofollow" class="btn-login btn btn-x-small orange btn-bordered ">登录</a>
                <a href="account#reg" id="reg-a" class="btn btn-x-small btn-bordered orange" style="color:#666666">注册</a>
                -->
            </div>
            <div class="left-c">
                <nav>
                    <ul>

                        <li class=""><a href="/" title="首页">首页</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <!-- body -->
    <div id="main-body" style="margin-top:80px">

        <div class="form common-form common-wide-form">
            <legend>
                <h2 class="ng-scope title">重置密码</h2>
            </legend>

            <div class="reg">
                <!--第一步：填写注册信息-->
                <div class="reg-div reg-info">
                    <form action="user/create" method="post" id='reg-form' role="form" name="RegisterForm" class="">
                        <div class="form-group">
                            <label class="icon-envelop"></label>
                            <input type="email" class="form-control" name="email" placeholder="请输入注册邮箱" required="">
                            <div class="error hide email-error" >
                                <span class="ng-scope">请输入合法的邮箱地址</span>
                            </div>
                        </div>
                        <button type="submit"  class="btn btn-primary " id='step1'>下一步</button>
                        <div class="form-group">
                            <a href="/account#login"  class="left">使用已有账号登录</a>
                        </div>
                    </form>
                </div><!-- end ngIf: emailRegStep==1 -->

                <div class="login login-div hide">
                    <div class="reg-info ng-scope">
                        <form action="user/signin" id='login-form' method="post" role="form" class="">
                            <div class="error-wrapper icon-circle-with-minus ng-scope hide login-error" >
                                <i></i>
                                <div class="error">
                                    <span class="ng-binding ng-scope">账户输入有误</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="icon-envelop"></label>
                                <input type="email" class="form-control" name="email" placeholder="请输入邮箱" required="">
                                <div class="error hide email-error" >
                                        <span class="ng-scope">请输入合法的邮箱地址</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="icon-lock"></label>
                                <input type="password" class="form-control" name="password" ng-model="formData.password" minlength="6" maxlength="16" required="" placeholder="密码">
                            </div>

                            <div class="form-group hide captcha-div">
                                <input type="text" class="form-control" name="captcha" placeholder="请输入验证码" style='width:160px;display: inline;margin-right:10px'>
                                <img src='' id='captcha-img' width="120">
                            </div>
                            <input type="submit" class="btn btn-primary" id='confirm-login' value='登录'></input>
                            <div class="form-group">
                            <a href="javascript:void(0)"  class="left change-reg">注册账号</a>
                        </div>
                        </form>
                    </div>
                </div>

                <div class="verify-code verify-div hide">
                    <form action="user/check-mail" method="post" role="form" class="" id='verify-form'>
                        <div class="error-wrapper icon-circle-with-minus ng-scope hide verify-error" >
                                <i></i>
                                <div class="error">
                                    <span class="ng-binding ng-scope">验证失败</span>
                                </div>
                        </div>
                        <div class="normal-tip">
                            <div class="desc">
                                一封包含有验证码的邮件已经发送至邮箱：
                                <div class="mail ng-binding"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="icon-eye"></label>
                            <div class="actions col-actions ng-scope">
                                <a href="javascript:void(0)" class="wide" id="re-send-email">重新发送</a>
                            </div>
                            <div class="col-input">
                                <input type="text" class="form-control" name="verifyCode"  placeholder="验证码" required="">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" id="step2">下一步</button>
                        <div class="form-group">
                            <a href="/account#login"  class="left change-login">使用已有账号登录</a>
                        </div>
                    </form>
                </div>
            </div>

            

        </div>

    </div>

    <!-- body end -->


</div>



<script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
<script src="/usercenter/js/sea.js"></script>
<script type="text/javascript">
    seajs.use('modules/login');
</script>
</body>
</html>