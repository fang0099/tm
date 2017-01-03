@extends("front/login_master")
@section("page_level_style")
    <link href="<?php echo env('APP_URL');?>/assets/global/plugins/bootstrap-toastr/toastr.min.css" rel="stylesheet" type="text/css" />
@stop
    @section("content")
        <div class="login-content">
            <h1>登录</h1>
            <p> 网罗天下创新事. 没有账号？<a href="<?php echo env('APP_URL');?>/signup">注册</a></p>
            <form action="<?php echo env("APP_URL")?>/user/signin" class="login-form" method="post">
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
                        <!--<div class="forgot-password">
                            <a href="javascript:;" id="forget-password" class="forget-password">忘记密码?</a>
                        </div>-->
                        <button id="login" class="btn blue" type="submit">登录</button>
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
                            <a href="javascript:;" style="display: none;">
                                <i class="fa fa-weixin" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:;" style="display: none;">
                                <i class="fa fa-weibo" aria-hidden="true"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-xs-8 bs-reset">
                    <div class="login-copyright text-right">
                        <p>版权所有 &copy; 贝塔区块链 2016</p>
                    </div>
                </div>
            </div>
        </div>

    @stop
@section("page_level_js")
    <script src="<?php echo env('APP_URL');?>/assets/global/plugins/bootstrap-toastr/toastr.min.js" type="text/javascript"></script>
    <script src="<?php echo env('APP_URL');?>/assets/pages/scripts/ui-toastr.min.js" type="text/javascript"></script>
    <script src="<?php echo env('APP_URL');?>/assets/global/scripts/jquery.form.js" type="text/javascript"></script>
    <script>

        $(function () {
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "positionClass": "toast-top-right",
                "onclick": null,
                "showDuration": "1000",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };

            $('.login-form input').keypress(function(e) {
                if (e.which == 13) {
                    $("#login").click();
                }
            });

            var options1 = {
                success: function (data) {
                    //toastr.success(eval(data));
                    var obj =  eval('(' + data + ')');

                    if (true == obj.success)
                    {
                        toastr.success("登录成功");
                        setTimeout("window.location.href='/';",3000);
                    }
                    else{
                        toastr.error(obj.message);
                    }
                },
                error: function()
                {
                    toastr.error("server is down");
                }
            };

            // ajaxForm
            $(".login-form").ajaxForm(options1);

            // ajaxSubmit
            //$("#register").click(function () {
            //$(".login-form").ajaxSubmit(options1);
            //});
            $('.forget-form').hide();
            $('#forget-password').click(function(){
                $('.login-form').hide();
                $('.forget-form').show();
            });

            $('#back-btn').click(function(){
                $('.login-form').show();
                $('.forget-form').hide();
            });


        });
    </script>
@stop