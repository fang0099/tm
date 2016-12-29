$.windowbox = {  
    scrollDirect: function (fn) {
      var beforeScrollTop = document.body.scrollTop;
      fn = fn || function () {
      };
      window.addEventListener("scroll", function (event) {
          event = event || window.event;

          var afterScrollTop = document.body.scrollTop;
          delta = afterScrollTop - beforeScrollTop;
          beforeScrollTop = afterScrollTop;

          var scrollTop = $(this).scrollTop();
          var scrollHeight = $(document).height();
          var windowHeight = $(this).height();
          if (scrollTop + windowHeight > scrollHeight - 10) {  //滚动到底部执行事件

              fn('down');
              return;
          }
          if (afterScrollTop < 10 || afterScrollTop > $(document.body).height - 10) {
              fn('up');
          } else {
              if (Math.abs(delta) < 10) {
                  return false;
              }
              fn(delta > 0 ? "down" : "up");
          }
        }, false);
    } 
  }
  $(document).ready(function(){
    $(window).scroll(function()
      {
         var upflag=1;
         var  downflag= 1;
        //scroll滑动,上滑和下滑只执行一次！
          $.windowbox.scrollDirect(function (direction) {
                  if (direction == "down") {
                      if (downflag) {
                         upflag = 1;
                         $("#header").removeClass("sbfixed-show");
                         downflag = 1;
                      }
                  }
                  else if (direction == "up") {
                      if (upflag) {
                          $("#header").addClass("sbfixed");
                          $("#header").addClass("sbfixed-show");
                         downflag = 1;
                          upflag = 0;
                      }
                  }
           });
      }
    );

    $("#navbar_menu_btn").click(function(){

      if ($("#navbar_menu").parent().hasClass("open"))
      {
        $("#navbar_menu").parent().removeClass("open");
          $("#navbar_menu").parent().addClass("close");
      }
      else
      {
        $("#navbar_menu").parent().removeClass("close");
          $("#navbar_menu").parent().addClass("open");
      }
    });
    
    $("#comment_editor").focus(function () {
        if(!$("#comment-form").hasClass("expanded"))
        {
            $("#comment-form").addClass("expanded");
        }
        
    });

      $("#comment_editor").bind('input propertychange',function () {
          var $s = $("#comment_editor").text();
          console.log($s);

      });



    
  });