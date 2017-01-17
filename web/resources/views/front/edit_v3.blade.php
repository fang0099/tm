<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <style type="text/css">
        /* @charset "UTF-8";*/
        [ng\:cloak],[ng-cloak],[data-ng-cloak],[x-ng-cloak],.ng-cloak,.x-ng-cloak,.ng-hide {
            display: none !important;
        }

        ng\:form {
            display: block;
        }
        .ng-animate-block-transitions {
            transition: 0s all!important;
            -webkit-transition: 0s all!important;
        }

        .ng-hide-add-active,.ng-hide-remove {
            display: block!important;
        }
    </style>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>{{ $title or '贝塔区块链 - 随心写作，自由表达' }}</title>
    <base href=".">
    <meta name="fragment" content="!">
    <meta name="description" content="贝塔区块链">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="format-detection" content="telephone=no">
    <meta name="format-detection" content="address=no">
    <!--[if lt IE 9]>
    <script src="<?php echo env('APP_URL');?>/zhuanlan/js/es5-shim.js"></script>
    <script src="<?php echo env('APP_URL');?>/zhuanlan/js/html5shiv.js"></script>
    <![endif]-->
    <!--[if lt IE 8]>
    <script src="<?php echo env('APP_URL');?>/zhuanlan/js/json3.min.js"></script>
    <![endif]-->
    <script>document.documentElement.className += ('ontouchstart' in window) ? ' touch': ' no-touch'</script>
<!--<link rel="stylesheet" href="<?php echo env('APP_URL');?>/chosen-master/docsupport/style.css">

        <link rel="stylesheet" href="<?php echo env('APP_URL');?>/chosen-master/docsupport/prism.css">-->

    <link rel="stylesheet" href="<?php echo env('APP_URL');?>/chosen-master/chosen.css">

    <link media="all" rel="stylesheet" type="text/css" href="<?php echo env('APP_URL');?>/zhuanlan/plugins/simditor/styles/font-awesome.css" />
    <link media="all" rel="stylesheet" type="text/css" href="<?php echo env('APP_URL');?>/zhuanlan/plugins/simditor/styles/simditor.css" />
    <link media="all" rel="stylesheet" type="text/css" href="<?php echo env('APP_URL');?>/usercenter/css/style.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo env('APP_URL');?>/zhuanlan/plugins/simditor/styles/simditor-fullscreen.css" />
    <link href="<?php echo env('APP_URL');?>/assets/global/plugins/bootstrap-toastr/toastr.min.css" rel="stylesheet" type="text/css" />
    <style>
        #submit
        {
            float:right;
        }
    </style>
    <link rel="stylesheet" href="<?php echo env('APP_URL');?>/jquery-wznav/css.css">

    <link rel="stylesheet" href="<?php echo env('APP_URL');?>/zhuanlan/css/main.css">
    <link rel="stylesheet" href="<?php echo env('APP_URL');?>/zhuanlan/css/mine.css">
    <link rel="stylesheet" href="<?php echo env('APP_URL');?>/simple_grid/simplegrid.css">
<!--<link rel="stylesheet" href="<?php echo env('APP_URL');?>/zhuanlan/css/icomoon.css">-->
    <link media="all" rel="stylesheet" type="text/css" href="<?php echo env('APP_URL');?>/usercenter/css/style.css" />
    <link rel="stylesheet" href="<?php echo env('APP_URL');?>/zhuanlan/css/icomoon.css">
</head>
<body ng-app="columnWebApp" ng-controller="AppCtrl" ng-class="pageClass" class="ng-scope {{$page_class}}">
<!--[if lt IE 8]>
<p class="browsehappy">你正在使用一个
    <strong>过时</strong>的浏览器。请
    <a class="link" href="http://browsehappy.com">升级你的浏览器</a>以查看此页面。</p></p>
<![endif]-->
<div id="header-holder">

    <header class="p-header new-header p-header-show">
        <div class="first-nav">
            <div class="options">
                <a href="<?php echo env('APP_URL');?>/article/edit" class="btn btn-x-small orange post-edit">写稿</a>
                @if(isset($username))
                <div class="dropdown-menu-part">
		                <span class="setting">
		                    <a title="{{ $username }}" href="javascript:void(0)" class="avatar" id="user-avatar">
		                        <img width="34" height="34" alt="{{$username}}" src="http://tm.paososo.com/{{ session('avatar') }}">
		                    </a>
		                </span>
                    <!-- user login info -->
                    <div id="user-nav" class="dropdown-menu user-dropdown">
                        <div class="common-nav user-nav">
                            <ul>
                                <li><a href="<?php echo env('APP_URL');?>/uc#article" title="我的文章"><i class="icon-paper"></i>我的文章</a></li>
                                <li><a href="<?php echo env('APP_URL');?>/uc#collect" title="我的收藏"><i class="icon-ribbon"></i>我的收藏</a></li>
                                <li><a href="<?php echo env('APP_URL');?>/uc#subscribe" title="我的订阅"><i class="icon-circle-plus"></i>我的订阅</a></li>
                                <li><a href="<?php echo env('APP_URL');?>/uc#notice" class="notifications" title="我的通知"><i class="icon-bell2"></i>我的通知</a></li>
                                <li><a href="<?php echo env('APP_URL');?>/uc#setting" title="账号设置"><i class="icon-cog"></i>账号设置</a></li>
                                <li class="last"><a href="<?php echo env('APP_URL');?>/logout" title="退出"><i class="icon-power"></i>退出</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- user login info end -->
                </div>
                @else
                    <a class="navbar-login btn btn-blue btn-72_32 ng-scope" href="<?php echo env('APP_URL');?>/login">登录</a>
                @endif
            </div>
            <div class="left-c">
                <div class="logo-part">
                    <!--
                    <a href="index.php" class="logo" title="首页">
                        首页
                    </a>
                    -->
                </div>
                <nav>
                    <ul>

                        <li class=""><a href="index.php" title="首页">首页</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="second-nav second-nav-large">
            <div class="inner">
                <!-- 投稿页面 -->
                <div class="columns fl">
                    <!-- <span class="column-icon fl"><i class="icon-comment icon-Shape2"></i></span> -->
                    <!-- <div class="column-title fl">写稿</div> -->
                    <a href="<?php echo env('APP_URL');?>/uc#article" target="_blank" class="draft pop-close orange">草稿<span class="num">(<strong>{{session('draftCount')}}</strong>)</span></a>
                </div>
                <div class="options">
                    <span class="autosave"></span>
                    <a href="javascript:;" id="savedraft" class="btn btn-small gray btn-bordered save-post">保存草稿</a> 
                    <a href="javascript:;" id="savearticle" class="btn btn-small orange btn-bordered confrim-post_open" data-popup-ordinal="0" id="open_77949845">提交审核</a>
                </div>
            </div>
        </div>
    </header>


    </div>

</div>
<div class="ui-alertbar info ng-hide" ng-show="show" ui-alertbar="" data-alert="globalAlert" ui-sticky="" data-align="bottom" data-target="#header-holder">
    <i class="icon-ic_prompt_done ng-scope" ng-if="alert.type == &#39;info&#39;"></i>
</div>

        <main class="main-container ng-scope" ng-view="">
            <div class="main post-write ng-scope ng-invalid ng-invalid-required ng-invalid-content-required ng-dirty ng-invalid-word-min" ng-form="postForm" ng-class="{&#39;full-screen-cover&#39;: draft.isTitleImageFullScreen}">
                <form id="post_article" method="post" action="{{isset($article)?'update':'create'}}" enctype="multipart/form-data">
                <section class="receptacle">
                    <div id="js-title-img" class="title-img" ui-droppable="" ng-class="{&#39;has-img&#39;: draft.titleImage}">
                        <div id="preview" onclick="$('#previewImg').click();">
                            <img id="imghead" class="preview" border="0" style="{{isset($article["data"]["face"])?'':'display: none;'}}" src="{{$article["data"]["face"] or ''}}" width="100%" height="100%" >
                            <i class="icon-camera-outline" ng-show="!draft.titleImage" style="{{isset($article["data"]["face"])?'display: none;':''}}"></i>
                        </div>
                        <input type="file" onchange="previewImage(this)" name="face" style="display: none;" id="previewImg">
                    </div>
                    <input type="text" value="{{$article["data"]["id"] or ''}}" name="id" style="display: none;"/>
                    <div class="title-input-container">
                        <textarea id="js-textarea" ui-textarea-autogrow="" required="" ng-model="draft.title" name="title" class="title ng-pristine ng-invalid ng-invalid-required" ui-placeholder="请输入标题" ui-tab-trigger="" autofocus="" word-min="2" word-max="50" placeholder="请输入标题" style="height: 46px;">{{ $article["data"]["title"] or '' }}</textarea>
                    </div>
                </section>
                <div class="editable-container post-write">
                    <textarea id="editor" name="content">{!!  $article["data"]["content"] or '' !!}</textarea>
                </div>
                    <section class="receptacle">
                        <select name="tags[]" data-placeholder="选择标签..." class="chosen-select" multiple style="width:350px;" tabindex="4">

                            <option value=""></option>
                            @foreach($tags as $tag)
                                <option value="{{$tag["id"]}}">{{$tag["name"]}}</option>
                            @endforeach
                        </select>
                        <!--<input type="button" name="提交审核" class="btn btn-green write-btn" style="float: right; margin-left: 15px;" value="修改" onClick="form[this].action='{{isset($article)?'update':'create'}}';form[this].submit();">
                        <input type="button" name="保存草稿" class="btn btn-green write-btn" style="float: right; margin-left: 15px;" value="修改" onClick="form[this].action='{{isset($article)?'update2':'create2'}}';form[this].submit();">-->

                            <!--<div class="status" ng-if="status" ng-class="status.type">saving</div>-->
                        <input type="submit" value="保存草稿" id="submit_script" class="btn btn-small gray btn-bordered save-post" style="float: right; margin-left: 15px;"/>
                        <input type="submit" value="提交审核" id="submit" class="btn btn-small orange btn-bordered confrim-post_open write-btn"/>
                    </section>
                </form>
            </div>
        </main>



        <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.js"></script>
        <script type="text/javascript" src="<?php echo env('APP_URL');?>/jquery.pin/jquery.pin.js"></script>
        <script type="text/javascript" src="<?php echo env('APP_URL');?>/zhuanlan/plugins/simditor/scripts/module.js"></script>
        <script type="text/javascript" src="<?php echo env('APP_URL');?>/zhuanlan/plugins/simditor/scripts/uploader.js"></script>
        <script type="text/javascript" src="<?php echo env('APP_URL');?>/zhuanlan/plugins/simditor/scripts/hotkeys.js"></script>
        <script type="text/javascript" src="<?php echo env('APP_URL');?>/zhuanlan/plugins/simditor/scripts/simditor.js"></script>
        <script type="text/javascript" src="<?php echo env('APP_URL');?>/zhuanlan/plugins/simditor/scripts/simditor-dropzone.js"></script>
        <script type="text/javascript" src="<?php echo env('APP_URL');?>/zhuanlan/plugins/simditor/scripts/simditor-fullscreen.js"></script>
        <script src="<?php echo env('APP_URL');?>/chosen-master/chosen.jquery.js" type="text/javascript"></script>
        <script src="<?php echo env('APP_URL');?>/chosen-master/docsupport/prism.js" type="text/javascript" charset="utf-8"></script>
        <script type="text/javascript">
            function aa(oForm){
                oForm.action="http://bbs.51js.com";
                oForm.target="fA"
                oForm.submit();
                oForm.action="http://www.iecn.net/bbs/";
                oForm.target="fB"
                oForm.submit();
                return false;
            }
        </script>

        <script type="text/javascript">

            var config = {

                '.chosen-select'           : {},

                '.chosen-select-deselect'  : {allow_single_deselect:true},

                '.chosen-select-no-single' : {disable_search_threshold:10},

                '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},

                '.chosen-select-width'     : {width:"95%"}

            }

            for (var selector in config) {

                $(selector).chosen(config[selector]);

            }

        </script>
        <script>
            var editor = new Simditor({
                textarea: $('#editor'),
                placeholder: '正文...',
                pasteImage: true,
                toolbar: [
                    'title',
                    'bold',
                    'italic',
                    'underline',
                    'strikethrough',
                    'fontScale',
                    'color',
                    'ol',
                    'ul',
                    'blockquote',
                    'code',
                    'table',
                    'link',
                    'image',
                    'hr',
                    'indent',
                    'outdent',
                    'alignment',
                    'fullscreen',
                ],
                upload: {
                    url: '<?php echo env('APP_URL');?>/upload_img',
                    fileKey: 'img_name',
                    params: null,
                    connectionCount: 3,
                },
            });

            $(".simditor").addClass("receptacle");

        </script>

    <script>
        //图片上传预览    IE是用了滤镜。
        function previewImage(file)
        {
            var MAXWIDTH  = 90;
            var MAXHEIGHT = 90;
            var div = document.getElementById('preview');
            if (file.files && file.files[0])
            {
                div.innerHTML ='<img id=imghead onclick=$("#previewImg").click()>';
                var img = document.getElementById('imghead');
                img.onload = function(){
                    var rect = clacImgZoomParam(MAXWIDTH, MAXHEIGHT, img.offsetWidth, img.offsetHeight);
                    img.style= "display:block";
                    //img.width  =  rect.width;
                    //img.height =  rect.height;
//                 img.style.marginLeft = rect.left+'px';
                    //img.style.marginTop = rect.top+'px';
                }
                var reader = new FileReader();
                reader.onload = function(evt){img.src = evt.target.result;}
                reader.readAsDataURL(file.files[0]);
            }
            else //兼容IE
            {
                var sFilter='filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale,src="';
                file.select();
                var src = document.selection.createRange().text;
                div.innerHTML = '<img id=imghead>';
                var img = document.getElementById('imghead');
                img.filters.item('DXImageTransform.Microsoft.AlphaImageLoader').src = src;
                var rect = clacImgZoomParam(MAXWIDTH, MAXHEIGHT, img.offsetWidth, img.offsetHeight);
                status =('rect:'+rect.top+','+rect.left+','+rect.width+','+rect.height);
                //div.innerHTML = "<div id=divhead style='width:"+rect.width+"px;height:"+rect.height+"px;margin-top:"+rect.top+"px;"+sFilter+src+"\"'></div>";
                div.innerHTML = "<div id=divhead style='width:100%;height:100%;margin-top:"+rect.top+"px;"+sFilter+src+"\"'></div>";

            }
        }
        function clacImgZoomParam( maxWidth, maxHeight, width, height ){
            var param = {top:0, left:0, width:width, height:height};
            if( width>maxWidth || height>maxHeight ){
                rateWidth = width / maxWidth;
                rateHeight = height / maxHeight;

                if( rateWidth > rateHeight ){
                    param.width =  maxWidth;
                    param.height = Math.round(height / rateWidth);
                }else{
                    param.width = Math.round(width / rateHeight);
                    param.height = maxHeight;
                }
            }
            param.left = Math.round((maxWidth - param.width) / 2);
            param.top = Math.round((maxHeight - param.height) / 2);
            return param;
        }
        // nav bar
        var $nav = $('#user-nav');
        $('#user-avatar').click(function(){
            if($nav.hasClass('visible')){
                $nav.removeClass('visible');
            }else {
                $nav.addClass('visible');
            }

        });
    </script>
<script type="text/javascript" src="<?php echo env('APP_URL');?>/jquery-wznav/js.js"></script>
<script type="text/javascript" src="<?php echo env('APP_URL');?>/zhuanlan/js/main.js"></script>
<script src="<?php echo env('APP_URL');?>/assets/global/plugins/bootstrap-toastr/toastr.min.js" type="text/javascript"></script>
<script src="<?php echo env('APP_URL');?>/assets/pages/scripts/ui-toastr.min.js" type="text/javascript"></script>
<script src="<?php echo env('APP_URL');?>/assets/global/scripts/jquery.form.js" type="text/javascript"></script>
<script>
    $(function()
    {
        var options1 = {
            success: function (data) {
                //toastr.success(eval(data));
                var obj =  eval('(' + data + ')');

                if (true == obj.success)
                {
                    toastr.success("发布成功");
                    //setTimeout("window.location.href='/';",3000);
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
        $("#post_article").ajaxForm(options1);
    });
</script>
</body>

</html>
