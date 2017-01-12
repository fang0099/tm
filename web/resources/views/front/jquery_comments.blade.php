<!doctype html>
<html>
<head>
    <meta charset=utf-8>
    <meta name=description content="">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <title>Jquery Comments Plugin</title>

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="<?php echo env('APP_URL');?>/css/jquery-comments.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <!-- Data -->
    <script type="text/javascript" src="<?php echo env('APP_URL');?>/jquery_comments/data/comments-data.js"></script>

    <!-- Libraries -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.textcomplete/1.8.0/jquery.textcomplete.js"></script>
    <script type="text/javascript" src="<?php echo env('APP_URL');?>/jquery_comments/js/jquery-comments.js"></script>

    <style type="text/css">
        body {
            padding: 20px;
            margin: 0px;
            font-size: 14px;
            font-family: "Arial", Georgia, Serif;
        }
    </style>

    <!-- Init jquery-comments -->
    <script type="text/javascript">
        $(function() {
            var saveComment = function(data) {

                // Convert pings to human readable format
                $(data.pings).each(function(index, id) {
                    var user = usersArray.filter(function(user){return user.id == id})[0];
                    data.content = data.content.replace('@' + id, '@' + user.fullname);
                });

                return data;
            }
            $('#comments-container').comments({
                profilePictureURL: 'https://viima-app.s3.amazonaws.com/media/user_profiles/user-icon.png',
                currentUserId: 1,
                roundProfilePictures: true,
                textareaRows: 1,
                enableAttachments: false,
                enableHashtags: true,
                enablePinging: true,
                getUsers: function(success, error) {
                    setTimeout(function() {
                        success(usersArray);
                    }, 500);
                },
                getComments: function(success, error) {
                    setTimeout(function() {
                        success(commentsArray);
                    }, 500);
                },
                postComment: function(data, success, error) {
                    setTimeout(function() {
                        success(saveComment(data));
                    }, 500);
                },
                putComment: function(data, success, error) {
                    setTimeout(function() {
                        success(saveComment(data));
                    }, 500);
                },
                deleteComment: function(data, success, error) {
                    setTimeout(function() {
                        success();
                    }, 500);
                },
                upvoteComment: function(data, success, error) {
                    setTimeout(function() {
                        success(data);
                    }, 500);
                },
                uploadAttachments: function(dataArray, success, error) {
                    setTimeout(function() {
                        success(dataArray);
                    }, 500);
                },
            });
        });
    </script>

</head>
<body>
<div id="comments-container"></div>
</body>
</html>