@extends("front/master")
    @section("page_level_plugins")
        @stop
    @section("page_level_style")
        <link rel="stylesheet" type="text/css" href="../simditor/styles/simditor.css" />
        <link rel="stylesheet" type="text/css" href="../simditor/styles/simditor-fullscreen.css" />
        @stop
    @section("content")
        <form action="create" method="post" role="form">
            <div class="form-group">
                <input type="text" class="form-control" name="title" placeholder="标题">
            </div>
            <div class="form-group">
                <textarea id="editor" name="content" placeholder="Balabala" autofocus></textarea>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="提交"/>
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