<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>Metronic | Dashboard</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <!--
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        -->
        <link href="../../assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="../../assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="../../assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../../assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
        <link href="../../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="../../assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="../../assets/global/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
        <link href="../../assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
        
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="../../assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="../../assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="../../assets/layouts/layout/css/layout.css" rel="stylesheet" type="text/css" />
        <link href="../../assets/layouts/layout/css/themes/darkblue.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="../../assets/layouts/layout/css/custom.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> 
        <style type="text/css">
            .page-content {
                color : #fff;
                padding: 0px !important
            }
        </style>
    </head>
    <!-- END HEAD -->

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
        <!-- BEGIN HEADER -->
        <div class="page-header navbar navbar-fixed-top">
            <!-- BEGIN HEADER INNER -->
            <div class="page-header-inner ">
                <!-- BEGIN LOGO -->
                <div class="page-logo">
                    <a href="#">
                        <!--
                        <img src="../../assets/layouts/layout/img/logo.png" alt="logo" class="logo-default" />
                         -->
                        <h4 style="color: #fff">后台管理</h4>
                    </a>
                    <div class="menu-toggler sidebar-toggler"> </div>
                </div>
                <!-- END LOGO -->
                <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
                <!-- END RESPONSIVE MENU TOGGLER -->
                <!-- BEGIN TOP NAVIGATION MENU -->
                <div class="top-menu">
                    <ul class="nav navbar-nav pull-right">

                        <!-- END TODO DROPDOWN -->
                        <!-- BEGIN USER LOGIN DROPDOWN -->
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                        <li class="dropdown dropdown-user">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <img alt="" class="img-circle" src="<?php echo session('avatar') ?>" />
                                <span class="username username-hide-on-mobile"><?php echo session('username') ?></span>
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-default">
                                <li>
                                    <a href="<?php echo env('APP_URL');?>">
                                         返回前台 </a>
                                </li>
                                <li>
                                    <a href="<?php echo env('APP_URL');?>/logout">
                                         退出 </a>
                                </li>
                            </ul>
                        </li>
                        <!-- END USER LOGIN DROPDOWN -->
                        <!-- END QUICK SIDEBAR TOGGLER -->
                    </ul>
                </div>
                <!-- END TOP NAVIGATION MENU -->
            </div>
            <!-- END HEADER INNER -->
        </div>
        <!-- END HEADER -->
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN SIDEBAR -->
            <div class="page-sidebar-wrapper">
                <!-- BEGIN SIDEBAR -->
                <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                <div class="page-sidebar navbar-collapse collapse">
                    
                    <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" >
                        
                        <li class="sidebar-toggler-wrapper hide">
                            <div class="sidebar-toggler"> </div>
                        </li>

                        @if(session('is_admin'))
                        <li class="nav-item start active open">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-home"></i>
                                <span class="title">网站基础数据</span>
                                <span class="selected"></span>
                                <span class="arrow open"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item start active open">
                                    <a href="javascript:;" data="form?model=webinfo"  class="nav-link link">
                                        <i class="icon-bar-chart"></i>
                                        <span class="title">网站设置</span>
                                        <span class="selected"></span>
                                    </a>
                                </li>
                                <li class="nav-item start ">
                                    <a href = "javascript:;" data="list?model=flink"  class="nav-link link">
                                        <i class="icon-bulb"></i>
                                        <span class="title">友情链接管理</span>
                                    </a>
                                </li>
                                <li class="nav-item start ">
                                    <a href="javascript:;" data="list?model=sponsor" class="nav-link link">
                                        <i class="icon-graph"></i>
                                        <span class="title"> 赞助商管理 </span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        
                        <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-diamond"></i>
                                <span class="title">网站数据管理</span>
                                <span class="arrow"></span>
                                <span class="selected"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">
                                    <a href="javascript:;" data="list?model=sliders" class="nav-link link">
                                        <span class="title"> 首页幻灯管理 </span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="javascript:;" data="list?model=newsflash" class="nav-link link">
                                        <span class="title"> 快讯管理 </span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="javascript:;" data="list?model=article" class="nav-link link">
                                        <span class="title"> 文章管理 </span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="javascript:;" data="list?model=tag" class="nav-link link">
                                        <span class="title"> 标签管理 </span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="javascript:;" data="list?model=user" class="nav-link link">
                                        <span class="title"> 用户管理 </span>
                                    </a>
                                </li>
                            </ul>

                        </li>
                        @else
                            <li class="nav-item start active open">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="icon-diamond"></i>
                                    <span class="title">个人中心</span>
                                    <span class="arrow"></span>
                                    <span class="selected"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item  ">
                                        <a href="javascript:;" data="form?model=muser&id=<?php echo session('id')?>" class="nav-link link">
                                            <span class="title"> 个人信息管理 </span>
                                        </a>
                                    </li>
                                </ul>

                            </li>
                        @endif
                    </ul>
                    <!-- END SIDEBAR MENU -->
                    <!-- END SIDEBAR MENU -->
                </div>
                <!-- END SIDEBAR -->
            </div>
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">

                <!-- BEGIN CONTENT BODY -->
                <div class="page-content" style="">
                    <iframe src="welcome" name="main" frameborder="0" height="1000px" scrolling="no" >
                    </iframe>
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
            
        </div>
        <!-- END CONTAINER -->

        <!-- right slider bar -->
         <div class="page-quick-sidebar-wrapper" data-close-on-body-click="true">
                <div class="page-quick-sidebar">
                    <ul class="nav nav-tabs">
                        <li>
                            <a href="javascript:;" class="page-quick-sidebar-back-to-list">
                                <i class="icon-arrow-left"></i>Back
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <iframe src="form" name="sidebar" frameborder="0" height="100%" width="720px" scrolling="yes" >
                            
                        </iframe>
                       
                    </div>
                </div>
            </div>   
        <!-- BEGIN FOOTER -->
        <div class="page-footer">
            <div class="page-footer-inner"> 2014 &copy; Metronic by keenthemes.
                
            </div>
            <div class="scroll-to-top">
                <i class="icon-arrow-up"></i>
            </div>
        </div>
        <!-- END FOOTER -->
        <!--[if lt IE 9]>
<script src="../../assets/global/plugins/respond.min.js"></script>
<script src="../../assets/global/plugins/excanvas.min.js"></script>
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="../../assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="../../assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../../assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="../../assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="../../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="../../assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="../../assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
        <script src="../../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->        
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="../../assets/global/scripts/app.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="../../assets/layouts/layout/scripts/layout.min.js" type="text/javascript"></script>
        <script src="../../assets/layouts/global/scripts/quick-sidebar.js" type="text/javascript"></script>
        <script src="../../assets/layouts/global/scripts/underscore.js" type="text/javascript"></script>
        <script src="../../assets/layouts/global/scripts/tm.js" type="text/javascript"></script>
        <script src="../../assets/layouts/global/scripts/tm-utils.js" type="text/javascript"></script>
        <script src="../../assets/layouts/global/scripts/components/tm-iframe.js" type="text/javascript"></script>
        <script src="../../assets/layouts/global/scripts/components/tm-slider-bar.js" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->
        <script type="text/javascript">
            $(document).ready(function(){
                __.utils.fixMainIframeSize();  
                __.components.sliderbar.init();  
                window.onresize = function(){
                    console.log('windows resize');
                    __.utils.fixMainIframeSize()
                };

            });
        </script>
    </body>

</html>