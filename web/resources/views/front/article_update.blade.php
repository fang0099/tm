@extends("front.master_")
    @section("page_level_plugins")
        @stop
    @section("page_level_style")
        <link rel="stylesheet" type="text/css" href="../simditor/styles/simditor.css" />
        <link rel="stylesheet" type="text/css" href="../simditor/styles/simditor-fullscreen.css" />
        @stop
    @section("content")
        <form action="update" class="form-horizontal" method="post">
            <div class="form-body">
                <div class="form-group form-md-line-input">

                    <div class="col-md-12">
                        <input type="text" class="form-control" id="form_control_1" placeholder="标题" value="{{ $article["title"] }}">
                        <div class="form-control-focus"> </div>
                    </div>
                </div>

            <input type="text" class="form-control" name="id" placeholder="Default Input" value="{{ $article["id"] }}" style="display:none;">
            <textarea id="editor" name="content" placeholder="Balabala" autofocus>{!! $article["content"] !!}</textarea>
            </div>
            <!--<input type="submit" class="btn btn-primary" value="保存"/>-->
            <div class="form-actions">
                <div class="row">
                    <div class="col-md-10">
                        <button type="submit" class="btn blue">提交</button>
                    </div>
                </div>
            </div>
        </form>
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
                placeholder: '这里输入文字...',
                pasteImage: true,
                toolbar: ['title', 'bold', 'italic', 'image', 'link'],
                upload: {
                    url: '/upload'
                },
            });
        </script>
        @stop