@extends("front.master_")
    @section("page_level_plugins")
        <link href="<?php echo env('APP_URL');?>/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo env('APP_URL');?>/assets/global/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo env('APP_URL');?>/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />

        @stop
    @section("page_level_style")
        <link href="<?php echo env('APP_URL');?>/assets/pages/css/search.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo env('APP_URL');?>/assets/pages/css/blog.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo env('APP_URL');?>/assets/pages/css/profile.min.css" rel="stylesheet" type="text/css" />

        @stop
    @section("content")
        <div class="blog-page blog-content-2 blog-content-1">
            <div class="row">
                <div class="col-lg-9">
                    @foreach($people as $person)
                    <div class="blog-post-lg bordered blog-container">
                        <div class="blog-post-content">
                            <h2 class="blog-title blog-post-title">
                                <a href="<?php echo env('APP_URL');?>/article?id={{$person["id"]}}">{{ $person['title'] }}</a>
                                <!--<a href="javascript:;">Metronic Blog Post</a>-->
                            </h2>
                            <p class="blog-post-desc"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper
                                suscipit lobortis nisl ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit </p>
                            <div class="blog-post-foot">
                                <ul class="blog-post-tags">
                                    <li class="uppercase">
                                        <a href="javascript:;">Bootstrap</a>
                                    </li>
                                    <li class="uppercase">
                                        <a href="javascript:;">Sass</a>
                                    </li>
                                    <li class="uppercase">
                                        <a href="javascript:;">HTML</a>
                                    </li>
                                </ul>
                                <div class="blog-post-meta">
                                    <i class="icon-calendar font-blue"></i>
                                    <a href="javascript:;">Oct 24, 2015</a>
                                </div>
                                <div class="blog-post-meta">
                                    <i class="icon-bubble font-blue"></i>
                                    <a href="javascript:;">14 Comments</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="col-lg-3">
                    <div class="blog-single-sidebar bordered blog-container">
                        <!-- PORTLET MAIN -->
                        <div class="portlet light profile-sidebar-portlet ">
                            <!-- SIDEBAR USERPIC -->
                            <div class="profile-userpic">
                                <img src="{{$tag["face"]}}" class="img-responsive" alt=""> </div>
                            <!-- END SIDEBAR USERPIC -->
                            <!-- SIDEBAR USER TITLE -->
                            <div class="profile-usertitle">
                                <div class="profile-usertitle-name"> {{$tag["name"]}} </div>

                            </div>
                            <!-- END SIDEBAR USER TITLE -->
                            <!-- SIDEBAR BUTTONS -->
                            <div class="profile-userbuttons">
                                <a href="<?php echo env('APP_URL');?>/tag/subscribe?id={{$tag["id"]}}" class="btn btn-circle green btn-sm">关注</a>
                                <a href="<?php echo env('APP_URL');?>/tag/unsubscribe?id={{$tag["id"]}}" class="btn btn-circle green btn-sm">取消关注</a>
                            </div>
                            <!-- END SIDEBAR BUTTONS -->
                            <!-- SIDEBAR MENU -->
                            <!-- END MENU -->
                        </div>
                        <!-- END PORTLET MAIN -->
                        <!-- PORTLET MAIN -->
                        <div class="portlet light ">
                            <!-- STAT -->
                            <div class="row list-separated profile-stat">
                                <div class="col-md-12 col-sm-12 col-xs-6">
                                    <div class="uppercase profile-stat-title"> {{$tag["fans_num"]}} </div>
                                    <div class="uppercase profile-stat-text"> 粉丝数 </div>
                                </div>
                                <!--
                                <div class="col-md-4 col-sm-4 col-xs-6">
                                    <div class="uppercase profile-stat-title"> 51 </div>
                                    <div class="uppercase profile-stat-text"> Tasks </div>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-6">
                                    <div class="uppercase profile-stat-title"> 61 </div>
                                    <div class="uppercase profile-stat-text"> Uploads </div>
                                </div>-->
                            </div>
                            <!-- END STAT -->
                            <div>
                                <!--<h4 class="profile-desc-title">About Marcus Doe</h4>-->
                                <span class="profile-desc-text"> {{$tag["brief"]}} </span>
                            </div>
                        </div>
                        <!-- END PORTLET MAIN -->
                    </div>
                    <div class="blog-single-sidebar bordered blog-container">
                        <div class="blog-single-sidebar-search">
                            <div class="input-icon right">
                                <i class="icon-magnifier"></i>
                                <input type="text" class="form-control" placeholder="Search Blog"> </div>
                        </div>
                        <div class="blog-single-sidebar-recent">
                            <h3 class="blog-sidebar-title uppercase">Recent Posts</h3>
                            <ul>
                                <li>
                                    <a href="javascript:;">Metronic Admin Progress</a>
                                </li>
                                <li>
                                    <a href="javascript:;">New UI Features</a>
                                </li>
                                <li>
                                    <a href="javascript:;">Lorem Ipsum Dolore Amet</a>
                                </li>
                                <li>
                                    <a href="javascript:;">Userfull Pages Released</a>
                                </li>
                            </ul>
                        </div>
                        <div class="blog-single-sidebar-tags">
                            <h3 class="blog-sidebar-title uppercase">Tags</h3>
                            <ul class="blog-post-tags">
                                <li class="uppercase">
                                    <a href="javascript:;">Bootstrap</a>
                                </li>
                                <li class="uppercase">
                                    <a href="javascript:;">Sass</a>
                                </li>
                                <li class="uppercase">
                                    <a href="javascript:;">HTML</a>
                                </li>
                                <li class="uppercase">
                                    <a href="javascript:;">CSS</a>
                                </li>
                                <li class="uppercase">
                                    <a href="javascript:;">Gulp</a>
                                </li>
                                <li class="uppercase">
                                    <a href="javascript:;">Framework</a>
                                </li>
                                <li class="uppercase">
                                    <a href="javascript:;">Admin Theme</a>
                                </li>
                                <li class="uppercase">
                                    <a href="javascript:;">UI Features</a>
                                </li>
                            </ul>
                        </div>
                        <div class="blog-single-sidebar-links">
                            <h3 class="blog-sidebar-title uppercase">Useful Links</h3>
                            <ul>
                                <li>
                                    <a href="javascript:;">Lorem Ipsum </a>
                                </li>
                                <li>
                                    <a href="javascript:;">Dolore Amet</a>
                                </li>
                                <li>
                                    <a href="javascript:;">Metronic Database</a>
                                </li>
                                <li>
                                    <a href="javascript:;">UI Features</a>
                                </li>
                                <li>
                                    <a href="javascript:;">Advanced Forms</a>
                                </li>
                            </ul>
                        </div>
                        <div class="blog-single-sidebar-ui">
                            <h3 class="blog-sidebar-title uppercase">UI Examples</h3>
                            <div class="row ui-margin">
                                <div class="col-xs-4 ui-padding">
                                    <a href="javascript:;">
                                        <img src="<?php echo env('APP_URL');?>/assets/pages/img/background/1.jpg" />
                                    </a>
                                </div>
                                <div class="col-xs-4 ui-padding">
                                    <a href="javascript:;">
                                        <img src="<?php echo env('APP_URL');?>/assets/pages/img/background/37.jpg" />
                                    </a>
                                </div>
                                <div class="col-xs-4 ui-padding">
                                    <a href="javascript:;">
                                        <img src="<?php echo env('APP_URL');?>/assets/pages/img/background/57.jpg" />
                                    </a>
                                </div>
                                <div class="col-xs-4 ui-padding">
                                    <a href="javascript:;">
                                        <img src="<?php echo env('APP_URL');?>/assets/pages/img/background/53.jpg" />
                                    </a>
                                </div>
                                <div class="col-xs-4 ui-padding">
                                    <a href="javascript:;">
                                        <img src="<?php echo env('APP_URL');?>/assets/pages/img/background/59.jpg" />
                                    </a>
                                </div>
                                <div class="col-xs-4 ui-padding">
                                    <a href="javascript:;">
                                        <img src="<?php echo env('APP_URL');?>/assets/pages/img/background/42.jpg" />
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        @stop
    @section("page_level_plugins_js")
        <script src="<?php echo env('APP_URL');?>/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
        <script src="<?php echo env('APP_URL');?>/assets/global/plugins/fancybox/source/jquery.fancybox.pack.js" type="text/javascript"></script>

        <script src="<?php echo env('APP_URL');?>/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
        <script src="<?php echo env('APP_URL');?>/assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
        @stop
    @section("page_level_js")
        <script src="<?php echo env('APP_URL');?>/assets/pages/scripts/search.min.js" type="text/javascript"></script>

        <script src="<?php echo env('APP_URL');?>/assets/pages/scripts/profile.min.js" type="text/javascript"></script>
        <!--<script src="<?php echo env('APP_URL');?>/assets/pages/scripts/timeline.min.js" type="text/javascript"></script>-->
        @stop
