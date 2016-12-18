@extends("front/master")
    @section("outer")
        @stop
    @section("page_level_plugins")
        <link href="../assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet" type="text/css" />

        <link href="../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
        @stop
    @section("page_level_style")
        <link href="../assets/pages/css/search.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/pages/css/blog.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/pages/css/profile.min.css" rel="stylesheet" type="text/css" />
        @stop
    @section("slider")
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->

            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>

            <div class="carousel-inner">
                @foreach($slider_article_list as $index=>$slider_article)
                <div class="item @if ($index == 0) active @endif">
                    <img src="img/1.jpg" style="width:100%" data-src=" " alt="First slide">
                    <div class="container">
                        <div class="carousel-caption">
                            <img class="img-circle" src="../resources/assets/img/user2.jpeg" style="width: 100px;height:100px;">
                            <h1>{{$slider_article["title"]}}</h1>
                            <p>{{$slider_article["abstracts"]}}</p>
                            <p><a class="btn btn-lg btn-primary" href="#" role="button">阅读</a></p>
                        </div>
                    </div>
                </div>
                    @endforeach
            </div>
            <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
        </div>
        @stop
    @section("content")
        <div class="row">
            @foreach($second_article_list as $a)
            <div class="col-md-4">
                <h2>{{$a["title"]}}</h2>
                <p>{{$a["abstracts"]}}</p>
                <p><a class="btn" href="#">View details »</a></p>
            </div>
                @endforeach
        </div>

        <div class="blog-page blog-content-2 blog-content-1">
            <div class="row">
                <div class="col-lg-9">
                    @foreach($articles as $article)
                        <div class="blog-post-lg bordered blog-container">
                            <!--<div class="blog-img-thumb">
                                <a href="javascript:;">
                                    <img src="../assets/pages/img/page_general_search/5.jpg" />
                                </a>
                            </div>-->
                            <div class="blog-post-content">
                                <h2 class="blog-title blog-post-title">
                                    <a href="/tm/web/public/article?id={{$article["id"]}}">{{ $article['title'] }}</a>
                                </h2>
                                <p class="blog-post-desc">{{$article["abstracts"]}}</p>
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
                                        <a href="javascript:;">{{$article["publish_time"]}}</a>
                                    </div>
                                    <div class="blog-post-meta">
                                        <i class="icon-bubble font-blue"></i>
                                        <a href="javascript:;">{{$article["comment_num"]}} 条评论</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="col-lg-3">
                    <div class="blog-single-sidebar bordered blog-container">
                        <div class="blog-single-sidebar-tags">
                            <h3 class="blog-sidebar-title uppercase">热门标签</h3>
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
                        <div class="blog-single-sidebar-ui">
                            <h3 class="blog-sidebar-title uppercase">热门人物</h3>
                            <div class="row ui-margin">
                                <div class="col-xs-4 ui-padding">
                                    <a href="javascript:;">
                                        <img src="../assets/pages/img/background/1.jpg" />
                                    </a>
                                </div>
                                <div class="col-xs-4 ui-padding">
                                    <a href="javascript:;">
                                        <img src="../assets/pages/img/background/37.jpg" />
                                    </a>
                                </div>
                                <div class="col-xs-4 ui-padding">
                                    <a href="javascript:;">
                                        <img src="../assets/pages/img/background/57.jpg" />
                                    </a>
                                </div>
                                <div class="col-xs-4 ui-padding">
                                    <a href="javascript:;">
                                        <img src="../assets/pages/img/background/53.jpg" />
                                    </a>
                                </div>
                                <div class="col-xs-4 ui-padding">
                                    <a href="javascript:;">
                                        <img src="../assets/pages/img/background/59.jpg" />
                                    </a>
                                </div>
                                <div class="col-xs-4 ui-padding">
                                    <a href="javascript:;">
                                        <img src="../assets/pages/img/background/42.jpg" />
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