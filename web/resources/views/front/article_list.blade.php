@extends("front/master")
    @section("page_level_plugins")
        <link href="../assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet" type="text/css" />

        <link href="../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />

        @stop
    @section("page_level_style")
        <link href="../assets/pages/css/search.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/pages/css/profile.min.css" rel="stylesheet" type="text/css" />
        @stop
    @section("content")
        <div class="search-page search-content-1">
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN PROFILE SIDEBAR -->
                    <div class="profile-sidebar">
                        <!-- PORTLET MAIN -->
                        <div class="portlet light profile-sidebar-portlet ">
                            <!-- SIDEBAR USERPIC -->
                            <div class="profile-userpic">
                                <img src="../assets/pages/media/profile/profile_user.jpg" class="img-responsive" alt="">
                            </div>
                            <!-- END SIDEBAR USERPIC -->
                            <!-- SIDEBAR USER TITLE -->
                            <div class="profile-usertitle">
                                <div class="profile-usertitle-name"> tag1 </div>
                                <div class="profile-usertitle-job"> Developer </div>
                            </div>
                            <!-- END SIDEBAR USER TITLE -->
                            <!-- SIDEBAR BUTTONS -->
                            <div class="profile-userbuttons">
                                <button type="button" class="btn btn-circle green btn-sm">Follow</button>
                            </div>
                            <div class="portlet light ">
                                <!-- STAT -->
                                <div class="row list-separated profile-stat">
                                    <div class="col-md-4 col-sm-4 col-xs-6">
                                        <div class="uppercase profile-stat-title"> 37 </div>
                                        <div class="uppercase profile-stat-text"> Projects </div>
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-6">
                                        <div class="uppercase profile-stat-title"> 51 </div>
                                        <div class="uppercase profile-stat-text"> Tasks </div>
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-6">
                                        <div class="uppercase profile-stat-title"> 61 </div>
                                        <div class="uppercase profile-stat-text"> Uploads </div>
                                    </div>
                                </div>
                                <!-- END STAT -->
                            </div>
                            <!-- END SIDEBAR BUTTONS -->
                            <!-- SIDEBAR MENU -->
                            <!-- END MENU -->
                        </div>
                        <!-- END PORTLET MAIN -->
                        <!-- PORTLET MAIN -->

                        <!-- END PORTLET MAIN -->
                    </div>
                    <!-- END BEGIN PROFILE SIDEBAR -->
                    <div class="profile-content">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="search-container ">
                                    <ul>
                                        @foreach($people as $person)
                                            <li class="search-item clearfix">
                                                <a href="javascriptt:;">
                                                    <img src="../assets/pages/img/page_general_search/01.jpg" />
                                                </a>
                                                <div class="search-content">
                                                    <h2 class="search-title">
                                                        <a href="/tm/web/public/article?id={{$person["id"]}}">{{ $person['title'] }}</a>
                                                    </h2>
                                                    <p class="search-desc"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec efficitur pellentesque auctor. Morbi lobortis, leo in tristique scelerisque, mauris quam volutpat nunc </p>

                                                </div>
                                            </li>
                                        @endforeach

                                    </ul>
                                    <div class="search-pagination">
                                        <ul class="pagination">
                                            <li class="page-active">
                                                <a href="javascriptt:;"> 1 </a>
                                            </li>
                                            <li>
                                                <a href="javascriptt:;"> 2 </a>
                                            </li>
                                            <li>
                                                <a href="javascriptt:;"> 3 </a>
                                            </li>
                                            <li>
                                                <a href="javascriptt:;"> 4 </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @stop
    @section("page_level_plugins_js")
        <script src="../assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/fancybox/source/jquery.fancybox.pack.js" type="text/javascript"></script>

        <script src="../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
        @stop
    @section("page_level_js")
        <script src="../assets/pages/scripts/search.min.js" type="text/javascript"></script>

        <script src="../assets/pages/scripts/profile.min.js" type="text/javascript"></script>
        <!--<script src="../assets/pages/scripts/timeline.min.js" type="text/javascript"></script>-->
        @stop
