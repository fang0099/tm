@extends("front/master")
    @section("page_level_css")

        <!--<link rel="stylesheet" href="<?php echo env('APP_URL');?>/chosen-master/docsupport/style.css">

        <link rel="stylesheet" href="<?php echo env('APP_URL');?>/chosen-master/docsupport/prism.css">-->

        <link rel="stylesheet" href="<?php echo env('APP_URL');?>/chosen-master/chosen.css">

        <link media="all" rel="stylesheet" type="text/css" href="<?php echo env('APP_URL');?>/zhuanlan/plugins/simditor/styles/font-awesome.css" />
        <link media="all" rel="stylesheet" type="text/css" href="<?php echo env('APP_URL');?>/zhuanlan/plugins/simditor/styles/simditor.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo env('APP_URL');?>/zhuanlan/plugins/simditor/styles/simditor-fullscreen.css" />
        <style>
            #submit
            {
                float:right;
            }
        </style>
        @stop
    @section("content")
        <main class="main-container ng-scope" ng-view="">
            <div class="main post-write ng-scope ng-invalid ng-invalid-required ng-invalid-content-required ng-dirty ng-invalid-word-min" ng-form="postForm" ng-class="{&#39;full-screen-cover&#39;: draft.isTitleImageFullScreen}">
                <form method="post" action="{{isset($article)?'update':'create'}}" enctype="multipart/form-data">
                <section class="receptacle">
                    <div id="js-title-img" class="title-img" ui-droppable="" ng-class="{&#39;has-img&#39;: draft.titleImage}">
                        <div id="preview" onclick="$('#previewImg').click();">
                            <img id="imghead" class="preview" border="0" style="{{isset($article["data"]["face"])?'':'display: none;'}}" src="{{$article["data"]["face"] or ''}}" width="100%" height="100%" >
                            <i class="upload-icon icon-ic_phot_camera_alt" ng-show="!draft.titleImage" style="{{isset($article["data"]["face"])?'display: none;':''}}"></i>
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
                        <!--<select name="tags[]" data-placeholder="选择标签..." class="chosen-select" multiple style="width:350px;" tabindex="4">

                            <option value=""></option>
                            @foreach($tags as $tag)
                                <option value="{{$tag["id"]}}">{{$tag["name"]}}</option>
                            @endforeach
                        </select>-->
                        <p>saving</p>
                        <input type="submit" value="保存草稿" id="submit_script" class="btn btn-green write-btn" style="float: right; margin-left: 15px;"/>
                        <input type="submit" value="提交审核" id="submit" class="btn btn-blue write-btn"/>
                    </section>
                </form>
            </div>
        </main>
    @stop

    @section("page_level_js")
        <script type="text/javascript" src="<?php echo env('APP_URL');?>/zhuanlan/plugins/simditor/scripts/module.js"></script>
        <script type="text/javascript" src="<?php echo env('APP_URL');?>/zhuanlan/plugins/simditor/scripts/uploader.js"></script>
        <script type="text/javascript" src="<?php echo env('APP_URL');?>/zhuanlan/plugins/simditor/scripts/hotkeys.js"></script>
        <script type="text/javascript" src="<?php echo env('APP_URL');?>/zhuanlan/plugins/simditor/scripts/simditor.js"></script>
        <script type="text/javascript" src="<?php echo env('APP_URL');?>/zhuanlan/plugins/simditor/scripts/simditor-dropzone.js"></script>
        <script type="text/javascript" src="<?php echo env('APP_URL');?>/zhuanlan/plugins/simditor/scripts/simditor-fullscreen.js"></script>
        <script src="<?php echo env('APP_URL');?>/chosen-master/chosen.jquery.js" type="text/javascript"></script>
        <script src="<?php echo env('APP_URL');?>/chosen-master/docsupport/prism.js" type="text/javascript" charset="utf-8"></script>
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
    </script>

        @stop