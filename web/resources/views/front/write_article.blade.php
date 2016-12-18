@extends("front/master")
    @section("page_level_plugins")
        @stop
    @section("page_level_style")
        <link rel="stylesheet" type="text/css" href="../simditor/styles/simditor.css" />
        <link rel="stylesheet" type="text/css" href="../simditor/styles/simditor-fullscreen.css" />
        @stop
    @section("content")
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN SAMPLE FORM PORTLET-->
                <div class="portlet light ">
                    <div class="portlet-title">
                        <div class="caption font-green-haze">
                            <i class="icon-settings font-green-haze"></i>
                            <span class="caption-subject bold uppercase"> 写稿</span>
                        </div>
                        <div class="actions">
                            <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;" data-original-title="" title=""> </a>
                        </div>
                    </div>
                    <div class="portlet-body form">


        <form action="create" method="post" role="form" class="form-horizontal" >
            <div class="form-body">
                <div class="form-group form-md-line-input">

                    <div class="col-md-12">
                        <input type="text" class="form-control" id="form_control_1" placeholder="标题" name="title">
                        <div class="form-control-focus"> </div>
                    </div>
                </div>
                <div class="form-group form-md-line-input">
                    <div class="col-md-12">
                    <textarea id="editor" name="content" placeholder="Balabala" autofocus></textarea>
                    </div>
                </div>
            </div>
            <div class="form-action">
                <div class="form-group form-md-line-input">
                    <div class="col-md-12">
                    <input type="submit" class="btn btn-primary" value="提交"/>
                    </div>
                </div>
            </div>
        </form>

                    </div>
                </div>
            </div>
        </div>
        @stop
    @section("page_level_plugins_js")
        @stop
    @section("page_level_js")

       <!-- <script type="text/javascript" src="[script path]/jquery.min.js"></script>-->
        <script type="text/javascript" src="../simditor/scripts/module.js"></script>
        <script type="text/javascript" src="../simditor/scripts/hotkeys.js"></script>
        <!--<script type="text/javascript" src="../simditor/scripts/uploader.js"></script>-->
       <script type="text/javascript" src="../simditor/scripts/uploader.js"></script>
        <script type="text/javascript" src="../simditor/scripts/simditor.js"></script>
       <script type="text/javascript" src="../simditor/scripts/simditor-dropzone.js"></script>
       <script type="text/javascript" src="../simditor/scripts/simditor-fullscreen.js"></script>
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
                    url: '/upload'
                },
            });
        </script>
        @stop