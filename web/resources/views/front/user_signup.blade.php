@extends("front/login_master")
    @section("page_level_style")
        <link href="<?php echo env('APP_URL');?>/assets/global/plugins/bootstrap-toastr/toastr.min.css" rel="stylesheet" type="text/css" />
        @stop
    @section("content")
        <div class="login-content">
            <h1>链媒体注册</h1>
            <p> 网罗天下创新事. 已有账号？<a href="login">登录</a></p>
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
                        <button id="register" class="btn blue" type="submit">注册</button>

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
                        $("#register").click();
                    }
                });

                    var options1 = {
                        success: function (data) {
                            //toastr.success(data.toString());
                            var obj =  eval('(' + data + ')');
                            if (true == obj.success)
                            {
                                toastr.success("注册成功");
                                setTimeout("window.location.href='/login';",3000);
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