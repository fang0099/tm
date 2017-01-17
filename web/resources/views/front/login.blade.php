<!DOCTYPE html>
<html>
<head>
    <title>账号中心</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="usercenter/css/style.css">
    <link rel="stylesheet" type="text/css" href="usercenter/css/login.css">
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
                -->
                <a href="/article/edit" class="btn btn-x-small btn-bordered gray" style="color:#666666">登录</a>
                <a href="/article/edit" class="btn btn-x-small btn-bordered orange" style="color:#666666">注册</a>
            </div>
            <div class="left-c">
                <nav>
                    <ul>

                        <li class=""><a href="index.php" title="首页">首页</a>
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
                <h2 class="ng-scope">注册贝塔区块链</h2>
            </legend>

            <div class="reg">
                <!--第一步：填写注册信息-->
                <!--<div class="reg-info">-->
                <!-- ngIf: emailRegStep==1 -->
                <div class="reg-info ng-scope">
                    <form action="" method="post" role="form" name="RegisterForm" class="">
                        <div class="form-group">
                            <label class="icon-envelop"></label>
                            <input type="email" class="form-control" name="username" placeholder="请输入邮箱" required="">
                        </div>

                        <div class="form-group">
                            <label class="icon-lock"></label>
                            <input type="password" class="form-control" name="password" ng-model="formData.password" minlength="6" maxlength="16" required="" placeholder="密码">
                        </div>

                        <div class="form-group">
                            <label class="icon-lock"></label>
                            <input type="password" class="form-control ng-pristine ng-untouched ng-isolate-scope ng-invalid ng-invalid-compare-to" name="passwordConfirm" ng-model="formData.passwordConfirm" compare-to="formData.password" placeholder="确认密码">

                            <!-- ngIf: RegisterForm.passwordConfirm.$invalid && RegisterForm.passwordConfirm.$dirty -->
                        </div>

                        <button type="button" ng-click="submitEmailFirstStepForm($event)" class="btn btn-primary">注册账号</button>
                        <div class="form-group">
                            <a href="javascript:void(0)"  class="left change-login">使用已有账号登录</a>
                        </div>
                    </form>
                </div><!-- end ngIf: emailRegStep==1 -->
                <!--第二步：发送验证码-->
            </div>
            <div class="login hide">
                <div class="reg-info ng-scope">
                    <form action="" method="post" role="form" name="RegisterForm" class="">
                        <div class="form-group">
                            <label class="icon-envelop"></label>
                            <input type="email" class="form-control" name="username" placeholder="请输入邮箱" required="">
                        </div>

                        <div class="form-group">
                            <label class="icon-lock"></label>
                            <input type="password" class="form-control" name="password" ng-model="formData.password" minlength="6" maxlength="16" required="" placeholder="密码">
                        </div>

                        <div class="form-group">
                            <label class="icon-lock"></label>
                            <input type="password" class="form-control" name="passwordConfirm" ng-model="formData.passwordConfirm" compare-to="formData.password" placeholder="确认密码">
                        </div>
                        <button type="button" class="btn btn-primary">注册账号</button>
                    </form>
                </div>
            </div>

            <div class="verify-code hide">
                <form action="" method="post" role="form" name="RegisterForm" ng-submit="submitRegForm($event)" class="ng-pristine ng-invalid ng-invalid-required">
                    <div class="normal-tip">
                        <p>为了账号安全，需要验证邮箱有效性</p>

                        <div class="desc">
                            一封包含有验证码的邮件已经发送至邮箱：
                            <div class="mail ng-binding">234616116@qq.com</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="icon-eye"></label>
                        <div class="actions col-actions ng-scope">
                            <a href="javascript:void(0)" class="wide" id="re-send-email">重新发送</a>
                        </div>

                        <div class="col-input">
                            <input type="text" class="form-control ng-pristine ng-untouched ng-invalid ng-invalid-required" name="verifyCode" ng-model="formData.verifyCode" placeholder="验证码" required="">
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary" id="confirm-verify">确定</button>
                    <div class="form-group">
                        <a href="javascript:void(0)"  class="left change-login">使用已有账号登录</a>
                    </div>
                </form>
            </div>

        </div>

    </div>

    <!-- body end -->


</div>




<script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
<script src="usercenter/js/sea.js"></script>
<script src="usercenter/js/modules/login.js"></script>
</body>
</html>