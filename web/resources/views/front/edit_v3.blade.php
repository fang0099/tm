<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>{{ $title or '贝塔区块链 - 随心写作，自由表达' }}</title>
    <meta name="description" content="贝塔区块链">
    <!--[if lt IE 9]>
    <script src="/zhuanlan/js/es5-shim.js"></script>
    <script src="/zhuanlan/js/html5shiv.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="/chosen-master/chosen.css">
    <link media="all" rel="stylesheet" type="text/css" href="/zhuanlan/plugins/simditor/styles/font-awesome.css" />
    <link media="all" rel="stylesheet" type="text/css" href="/zhuanlan/plugins/simditor/styles/simditor.css" />
    <link media="all" rel="stylesheet" type="text/css" href="/usercenter/css/style.css" />
    <link rel="stylesheet" type="text/css" href="/zhuanlan/plugins/simditor/styles/simditor-fullscreen.css" />
    <link href="/assets/global/plugins/bootstrap-toastr/toastr.min.css" rel="stylesheet" type="text/css" />
    <style>
        #submit
        {
            float:right;
        }
    </style>
    <link rel="stylesheet" href="/zhuanlan/css/main.css">
    <link rel="stylesheet" href="/zhuanlan/css/mine.css">
    <link rel="stylesheet" href="/simple_grid/simplegrid.css">
    <link media="all" rel="stylesheet" type="text/css" href="/usercenter/css/style.css" />
    <link rel="stylesheet" href="/zhuanlan/css/icomoon.css">
</head>
<body>
<div id="header-holder" style="height: 150px">
    <header class="p-header new-header p-header-show">
        <div class="first-nav">
            <div class="options">
                <a href="/article/edit" class="btn btn-x-small orange post-edit">写稿</a>
                @if(isset($username))
                <div class="dropdown-menu-part">
		                <span class="setting">
		                    <a title="{{ $username }}" href="javascript:void(0)" class="avatar" id="user-avatar">
		                        <img width="34" height="34" alt="{{$username}}" src="{{ session('avatar') }}">
		                    </a>
		                </span>
                    <!-- user login info -->
                    <div id="user-nav" class="dropdown-menu user-dropdown">
                        <div class="common-nav user-nav">
                            <ul>
                                <li><a href="/uc#article" title="我的文章"><i class="icon-paper"></i>我的文章</a></li>
                                <li><a href="/uc#collect" title="我的收藏"><i class="icon-ribbon"></i>我的收藏</a></li>
                                <li><a href="/uc#subscribe" title="我的订阅"><i class="icon-circle-plus"></i>我的订阅</a></li>
                                <li><a href="/uc#notice" class="notifications" title="我的通知"><i class="icon-bell2"></i>我的通知</a></li>
                                <li><a href="/uc#setting" title="账号设置"><i class="icon-cog"></i>账号设置</a></li>
                                <li class="last"><a href="/logout" title="退出"><i class="icon-power"></i>退出</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- user login info end -->
                </div>
                @else
                    <a class="navbar-login btn btn-blue btn-72_32 ng-scope" href="/account#login">登录</a>
                @endif
            </div>
            <div class="left-c">
                <div class="logo-part">
                </div>
                <nav>
                    <ul>

                        <li class=""><a href="/" title="首页">首页</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="second-nav second-nav-large">
            <div class="inner">
                <!-- 投稿页面 -->
                <div class="columns fl">
                    <a href="/uc#article" target="_blank" class="draft pop-close orange">草稿<span class="num">(<strong>{{session('draftCount')}}</strong>)</span></a>
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

<main class="main-container ng-scope">
    <div class="main post-write">
        <form id="post" method="post" action="/article/post">
            <section class="receptacle">
                <div id="js-title-img" class="title-img" >
                    <div id="preview" style="cursor: pointer">
                        @if(isset($article['face']))
                            <img id="imghead" class="preview" border="0"  src="{{$article["face"]}}" width="100%" height="100%" >
                        @else
                            <img id="imghead" class="preview" border="0" style="display:none"  src="" width="100%" height="100%" >
                            <i class="icon-camera-outline" id="face-icon" ></i>
                        @endif
                    </div>
                </div>

                <div class="title-input-container">
                    <textarea id="js-textarea" ui-textarea-autogrow="" required="" name="title" class="title" word-min="2" word-max="50" placeholder="请输入标题" style="height: 46px;">{{ $article["title"] or '' }}</textarea>
                </div>
            </section>
            <div class="editable-container post-write">
                <textarea id="editor" name="content">{!!  $article["content"] or '' !!}</textarea>
            </div>
            <section class="receptacle">
                <select name="tags[]" data-placeholder="选择标签..." class="chosen-select" multiple style="width:350px;" tabindex="4">
                    <option value=""></option>
                    @foreach($tags as $tag)
                        <option value="{{$tag["id"]}}">{{$tag["name"]}}</option>
                    @endforeach
                </select>
                <input type="hidden" value="{{$article["id"] or ''}}" name="id"/>
                <input type="hidden" value="{{ $type or '' }}" name="type">
                <input type='hidden' name="abstracts" id="abstracts" value="{{$article['abstracts'] or ''}}"/>
                <input type='hidden' name="face" value="{{$article['face'] or ''}}"/>
                <input type="hidden" name="original" id="original" value='{{$article['original'] or ''}}'>
                <input type="hidden" name="draftId" >
            </section>
        </form>
    </div>
</main>

<input type="file" id="face-file" style="display:none">

<div id="confrim-post" class="hide">
  <div class="reminder-cont center-block universal-container">
    <h1 class="txt">确认提交审核？</h1>
    <p class="info">点击提交审核之后，将无法修改文章</p>
    <!-- <p class="info status"></p> -->
    <div class="error_msg" style="display: inline-block; margin-top: 30px; height:38px; overflow:hidden"></div>
    <div class="reset_password_form">
        <div class="m-bg">
          <div class="input-part clear">
              <input type="text" name="title" placeholder="请输入标题" class="input_decoration" id="modal-title">
              <input type="text" name="summary" placeholder="请输入摘要" class="input_decoration digest" id='digest'>
              <div class="btn-part clear">
                <label for="first" class="fl first">
                    <input type="checkbox" name="is_first_publish" id="first"> 首发贝塔区块链
                </label>
                <div class="btns fr">
                    <span class="status"></span>
                    <button class="btn btn-bordered btn-normal gray confrim-post_close">取消</button>
                    <button id="confrim-btn" class="btn btn-bordered btn-normal red ">提交</button>
                </div>
              </div>
          </div>
        </div>
    </div>
  </div>
</div>
<script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.js"></script>
<script type="text/javascript" src="/jquery.pin/jquery.pin.js"></script>
<script type="text/javascript" src="/zhuanlan/plugins/simditor/scripts/module.js"></script>
<script type="text/javascript" src="/zhuanlan/plugins/simditor/scripts/uploader.js"></script>
<script type="text/javascript" src="/zhuanlan/plugins/simditor/scripts/hotkeys.js"></script>
<script type="text/javascript" src="/zhuanlan/plugins/simditor/scripts/simditor.js"></script>
<script type="text/javascript" src="/zhuanlan/plugins/simditor/scripts/simditor-dropzone.js"></script>
<script type="text/javascript" src="/zhuanlan/plugins/simditor/scripts/simditor-fullscreen.js"></script>
<script src="/chosen-master/chosen.jquery.js" type="text/javascript"></script>
<script src="/chosen-master/docsupport/prism.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" src="/jquery-wznav/js.js"></script>
<script type="text/javascript" src="/zhuanlan/js/main.js"></script>
<script src="/assets/global/plugins/bootstrap-toastr/toastr.min.js" type="text/javascript"></script>
<script src="/assets/pages/scripts/ui-toastr.min.js" type="text/javascript"></script>
<script src="/assets/global/scripts/jquery.form.js" type="text/javascript"></script>
<script src="/usercenter/js/vendor/jquery.popupoverlay.js"></script>
<script src="/usercenter/js/vendor/jquery.iframe-transport.js" type="text/javascript"></script>
<script src="/usercenter/js/vendor/jquery.ui.widget.js" type="text/javascript"></script>
<script src="/usercenter/js/vendor/jquery.fileupload.js" type="text/javascript"></script>
<script>
    $(function(){

        var isAutoSave = true;

        var config = {
            '.chosen-select'           : {},
            '.chosen-select-deselect'  : {allow_single_deselect:true},
            '.chosen-select-no-single' : {disable_search_threshold:10},
            '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
            '.chosen-select-width'     : {width:"95%"}
        };
        for (var selector in config) {
            $(selector).chosen(config[selector]);
        }
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
                url: '/upload_img',
                fileKey: 'img_name',
                params: null,
                connectionCount: 3,
            },
        });
        $(".simditor").addClass("receptacle");

        var $nav = $('#user-nav');
        $('#user-avatar').click(function(){
            if($nav.hasClass('visible')){
                $nav.removeClass('visible');
            }else {
                $nav.addClass('visible');
            }

        });

        $form = $('#post');
        // ajax file upload
        var $faceIcon = $('#face-icon');
        var uploadUrl = "/uc/upload";
        $('#face-file').fileupload({
            dataType: 'json',
            url : uploadUrl,
            add: function (e, data) {
                $faceIcon.attr('class', 'icon-spinner6');
                data.submit();
            },
            done: function (e, data) {
                //console.log(data);
                if(data.result.success){
                    $faceIcon.css('display', 'none');
                    var path = data.result.path;
                    $('.preview').attr('src', path);
                    $('.preview').fadeIn();
                    $form.find('[name=face]').val(path);
                }else {
                    toastr.error('上传文件出错');
                }
            }
        });
        $('#preview').click(function(){
            $('#face-file').click();
        });
        // post article or draft
        var options = {
            beforeSubmit : function(){
                var face = $form.find('[name=face]').val();
                if(face == ''){
                    toastr.error('请上传文章封面图片');
                    return false;
                }
                var content = $form.find('[name=content]').val();
                if(content == ''){
                    toastr.error('文章内容不能为空');
                    return false;
                }
                return true;
            },
            success: function (data) {
                var obj =  eval('(' + data + ')');
                console.log(obj);
                if (true == obj.success)
                {
                    if(obj.type == 'article'){
                        setTimeout("window.location.href='/uc#article';",2000);
                    }else {
                        if(!isAutoSave){
                            toastr.success("保存成功");
                        }
                    }
                    var id = obj.data.id;
                    $form.find('[name=id]').val(id);
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
        $form.ajaxForm(options);

        // auto save draft
        var saveSeconds = 10 * 1000;
        var saveDraftInterval = setInterval(function(){
            // if has title ?
            var title = $('#js-textarea').val();
            var face = $form.find('[name=face]').val();
            var content = $form.find('[name=content]').val();
            if(title && face && content){
                isAutoSave = true;
                $form.submit();
                //show status
                var d = new Date();
                $('.autosave').html('saved ' + d.getHours() + ":" + d.getMinutes());
            }
        }, saveSeconds);
        var $confirmPost = $('#confrim-post');
        $confirmPost.popup({
            color: 'white',
            opacity: 1,
            transition: '0.3s',
            scrolllock: true
        });
        $('.confrim-post_close').click(function(){
            $confirmPost.popup('hide');
        });

        $('#confrim-btn').click(function(){
            if($('#first').prop('checked')){
                $('#original').val(1);
            }
            $('#abstracts').val($('#digest').val());
            var abstracts = $form.find('[name=abstracts]').val();
            if(abstracts == ''){
                toastr.error('请填写文章摘要');
                return false;
            }
            isAutoSave = false;
            clearInterval(saveDraftInterval);

            $form.find('[name=type]').val('article');
            $form.find('[name=title]').val($('#modal-title').val());
            var $id = $form.find('[name=id]');
            $form.find('[name=draftId]').val($id.val());
            $id.val('');
            $form.submit();
        });

        var $saveDraft = $('#savedraft');
        $saveDraft.click(function(){
            isAutoSave = false;
            $form.submit();
        });
        var $saveArticle = $('#savearticle');
        $saveArticle.click(function(){
            console.log($('#js-textarea').val());
            $('#modal-title').val($('#js-textarea').val());
            $confirmPost.popup('show');
        });
    });
</script>
</body>

</html>
