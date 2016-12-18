<!DOCTYPE html>
<!--[if IE 8]> <html lang="zh-cn" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="zh-cn" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="zh-cn">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title>链媒体_网罗天下创新事</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />

        @yield("outer")
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <!--<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />-->
        <link href="../assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        @yield("page_level_plugins")
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->

        <link href="../assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="../assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        @yield("page_level_style")
        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="../assets/layouts/layout3/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/layouts/layout3/css/themes/default.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="../assets/layouts/layout3/css/custom.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> </head>
    <!-- END HEAD -->

    <body class="page-container-bg-solid page-boxed page-header-menu-fixed">
        <!-- BEGIN HEADER -->

        <div class="page-header">
            <!-- BEGIN HEADER TOP -->
            <div class="page-header-top">
                <div class="container">
                    <!-- BEGIN LOGO -->
                    <div class="page-logo">
                        <a href="<?php echo env('APP_URL');?>/index">
                            <img src="../assets/layouts/layout3/img/logo-default.jpg" alt="logo" class="logo-default">
                        </a>
                    </div>
                    <!-- END LOGO -->
                    <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                    <a href="javascript:;" class="menu-toggler"></a>
                    <!-- END RESPONSIVE MENU TOGGLER -->
                    <!-- BEGIN TOP NAVIGATION MENU -->
                    <div class="top-menu">
                        <ul class="nav navbar-nav pull-right">
                            <!-- BEGIN NOTIFICATION DROPDOWN -->
                            <!-- END NOTIFICATION DROPDOWN -->
                            <!-- BEGIN TODO DROPDOWN -->
                            <li class="dropdown dropdown-extended dropdown-tasks dropdown-light" id="header_task_bar">
                                <a href="<?php echo env('APP_URL');?>/article/write" class="btn btn-circle green"> 写稿
                                    <i class="fa fa-edit"></i>
                                </a>
                            </li>
                            <!-- END TODO DROPDOWN -->
                            <li class="droddown dropdown-separator">
                                <span class="separator"></span>
                            </li>
                            <!-- BEGIN INBOX DROPDOWN -->
                            <!-- END INBOX DROPDOWN -->
                            <!-- BEGIN USER LOGIN DROPDOWN -->

                            @if( session("username")!=null)
                            <li class="dropdown dropdown-user dropdown-light">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <img alt="" class="img-circle" src="{{session("avatar")}}">
                                    <span class="username username-hide-mobile">{{session("username")}}</span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-default">
                                    <li>
                                        <a href="<?php echo env('APP_URL');?>/user/profile">
                                            <i class="icon-user"></i> 我的主页 </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo env('APP_URL');?>/tag/add">
                                            <i class="icon-calendar"></i> 创建标签 </a>
                                    </li>
                                    <li>
                                        <a href="app_calendar.html">
                                            <i class="icon-calendar"></i> 我的收藏 </a>
                                    </li>
                                    <li>
                                        <a href="app_calendar.html">
                                            <i class="icon-calendar"></i> 我的订阅 </a>
                                    </li>
                                    <li>
                                        <a href="app_calendar.html">
                                            <i class="icon-calendar"></i> 账号设置 </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo env('APP_URL');?>/user/logout">
                                            <i class="icon-key"></i> 退出 </a>
                                    </li>
                                </ul>
                            </li>
                            @else
                            <li class="dropdown dropdown-user dropdown-light">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <img alt="" class="img-circle" src="/tm/web/resources/assets/img/user.png">
                                    <span class="username username-hide-mobile">未登录</span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-default">
                                    <li>
                                        <a href="<?php echo env('APP_URL');?>/login">
                                            <i class="icon-user"></i> 登录 </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo env('APP_URL');?>/signup">
                                            <i class="icon-calendar"></i> 注册 </a>
                                    </li>
                                </ul>
                            </li>
                            @endif
                            <!-- END USER LOGIN DROPDOWN -->
                            <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                            <!-- END QUICK SIDEBAR TOGGLER -->
                        </ul>
                    </div>
                    <!-- END TOP NAVIGATION MENU -->
                </div>
            </div>
            <!-- END HEADER TOP -->
            <!-- BEGIN HEADER MENU -->
            <div class="page-header-menu">
                <div class="container">
                    <!-- BEGIN HEADER SEARCH BOX -->
                    <form class="search-form" action="page_general_search.html" method="GET">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="搜索" name="query">
                            <span class="input-group-btn">
                                <a href="javascript:;" class="btn submit">
                                    <i class="icon-magnifier"></i>
                                </a>
                            </span>
                        </div>
                    </form>
                    <!-- END HEADER SEARCH BOX -->
                    <!-- BEGIN MEGA MENU -->
                    <!-- DOC: Apply "hor-menu-light" class after the "hor-menu" class below to have a horizontal menu with white background -->
                    <!-- DOC: Remove data-hover="dropdown" and data-close-others="true" attributes below to disable the dropdown opening on mouse hover -->
                    <div class="hor-menu  ">
                        <ul class="nav navbar-nav">

                            <li class="menu-dropdown classic-menu-dropdown ">
                                <a href="<?php echo env('APP_URL');?>/tag/index?id=1}">tag1
                                    <span class="arrow"></span>
                                </a>
                            </li>
                            <li class="menu-dropdown classic-menu-dropdown ">
                                <a href="<?php echo env('APP_URL');?>/tag/index?id=1}">tag2
                                    <span class="arrow"></span>
                                </a>
                            </li>

                            <li class="menu-dropdown classic-menu-dropdown ">
                                <a href="<?php echo env('APP_URL');?>/tag/index?id=1}">tag3
                                    <span class="arrow"></span>
                                </a>
                            </li>

                            <li class="menu-dropdown classic-menu-dropdown ">
                                <a href="<?php echo env('APP_URL');?>/tag/index?id=1}">tag4
                                    <span class="arrow"></span>
                                </a>
                            </li>


                        </ul>
                    </div>
                    <!-- END MEGA MENU -->
                </div>
            </div>
            <!-- END HEADER MENU -->
        </div>
        <!-- END HEADER -->
        <div class="row">
            @yield("slider")
        </div>
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <!-- BEGIN PAGE HEAD-->
                <!-- END PAGE HEAD-->
                <!-- BEGIN PAGE CONTENT BODY -->

                <div class="page-content">
                    <div class="container">
                        <!-- BEGIN PAGE CONTENT INNER -->
                        <div class="page-content-inner">
                            @yield("content")
                        </div>
                        <!-- END PAGE CONTENT INNER -->
                    </div>
                </div>
                <!-- END PAGE CONTENT BODY -->
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
            <!-- BEGIN QUICK SIDEBAR -->
            <!-- END QUICK SIDEBAR -->
        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
        <!-- BEGIN INNER FOOTER -->
        <div class="page-footer">
            <div class="container"> 2016 &copy; 链媒体.
                <a href="http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes" title="" target="_blank"></a>
            </div>
        </div>
        <div class="scroll-to-top">
            <i class="icon-arrow-up"></i>
        </div>
        <!-- END INNER FOOTER -->
        <!-- END FOOTER -->
        <!--[if lt IE 9]>
<script src="../assets/global/plugins/respond.min.js"></script>
<script src="../assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="../assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        @yield("page_level_plugins_js")
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="../assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        @yield("page_level_js")
        <!-- END PAGE LEVEL SCRIPTS -->

                        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="../assets/layouts/layout3/scripts/layout.min.js" type="text/javascript"></script>
        <script src="../assets/layouts/layout3/scripts/demo.min.js" type="text/javascript"></script>
        <script src="../assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->
    </body>

</html>