@extends("front/master")
    @section("page_level_plugins")
        @stop
    @section("page_level_style")
        <link href="../assets/pages/css/blog.min.css" rel="stylesheet" type="text/css" />
        @stop
    @section("content")
        <div class="blog-page blog-content-2">
            <div class="row">
                <div class="col-lg-9">
                    <div class="blog-single-content bordered blog-container">
                        <div class="blog-single-head">
                            <h1 class="blog-single-head-title">{{ $article["title"] }}</h1>
                            <div class="blog-single-head-date">
                                <i class="icon-calendar font-blue"></i>
                                <a href="javascript:;">{{ $article["publish_time"] }}</a>
                            </div>
                            <a href="<?php echo env('APP_URL');?>/article/edit?id={{$article["id"]}}" class="btn btn-circle green">修改</a>
                            <a href="" class="btn btn-circle yellow">喜欢</a>
                            <a href="<?php echo env('APP_URL');?>/article/delete?id={{$article["id"]}}" class="btn btn-circle red">删除</a>
                        </div>
                        <!--<div class="blog-single-img">
                            <img src="../assets/pages/img/background/4.jpg" /> </div>-->
                        <div class="blog-single-desc">
                            {!! $article["content"] !!}
                        </div>
                        <div class="blog-single-foot">

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

                        </div>
                        <div class="blog-comments">
                            <h3 class="sbold blog-comments-title">评论数(30)</h3>
                            <div class="c-comment-list">
                                <div class="media">
                                    <div class="media-left">
                                        <a href="#">
                                            <img class="media-object" alt="" src="../assets/pages/img/avatars/team1.jpg"> </a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading">
                                            <a href="#">Sean</a> on
                                            <span class="c-date">23 May 2015, 10:40AM</span>
                                        </h4> Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. </div>
                                </div>
                                <div class="media">
                                    <div class="media-left">
                                        <a href="#">
                                            <img class="media-object" alt="" src="../assets/pages/img/avatars/team3.jpg"> </a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading">
                                            <a href="#">Strong Strong</a> on
                                            <span class="c-date">21 May 2015, 11:40AM</span>
                                        </h4> Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.
                                        <div class="media">
                                            <div class="media-left">
                                                <a href="#">
                                                    <img class="media-object" alt="" src="../assets/pages/img/avatars/team4.jpg"> </a>
                                            </div>
                                            <div class="media-body">
                                                <h4 class="media-heading">
                                                    <a href="#">Emma Stone</a> on
                                                    <span class="c-date">30 May 2015, 9:40PM</span>
                                                </h4> Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="media-left">
                                        <a href="#">
                                            <img class="media-object" alt="" src="../assets/pages/img/avatars/team7.jpg"> </a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading">
                                            <a href="#">Nick Nilson</a> on
                                            <span class="c-date">30 May 2015, 9:40PM</span>
                                        </h4> Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. </div>
                                </div>
                            </div>
                            <h3 class="sbold blog-comments-title">评论</h3>
                            <form action="#">
                                <div class="form-group">
                                    <textarea rows="8" name="message" placeholder="写评论 ..." class="form-control c-square"></textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn blue uppercase btn-md sbold btn-block">评论</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="blog-single-sidebar bordered blog-container">
                        <div class="blog-single-sidebar-recent">
                            <h3 class="blog-sidebar-title uppercase">最近文章</h3>
                            <ul>
                                @foreach($recent_article_list as $a)
                                <li>
                                    <a href="<?php echo env('APP_URL');?>/article?id={{$a["id"]}}">{{ $a["title"] }}</a>
                                </li>
                                @endforeach
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
        @stop
    @section("page_level_js")
        @stop