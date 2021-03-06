<html lang="zh-CN">
<head>
	<link rel="stylesheet" type="text/css" href="./tmt2/css/style_v1.css">
	<link rel="stylesheet" type="text/css" href="./css/style.css">
	<link rel="stylesheet" type="text/css" href="./css/mine.css">
	<style type="text/css">
	html
	{
		font-size: 62.5%;
	}
	</style>
	<title>贝塔区块链</title>
</head>
<body class="pc-index">
	<div class="container">
	   <header class="p-header new-header"> 
	    <div class="first-nav"> 
	     <div class="options"> 
	      <a href="/post/new" class="btn btn-x-small orange post-edit">写稿</a>  
	      <div class="dropdown-menu-part"> 
	       <span class="unlogin"> <a href="/login?refer=/index.php" title="登录" rel="nofollow" class="login">登录</a> <span class="line"></span> <a href="/register?refer=/index.php" title="注册" rel="nofollow" class="reg">注册</a> </span> 
	       <div id="user-nav" class="dropdown-menu user-dropdown"> 
	        <div class="common-nav user-nav"> 
	         <ul> 
	          <!-- <li><a href="" title="管理中心"><i class="icon-grid"></i>管理中心</a></li> --> 
	          <li><a href="/home" title="我的主页"><i class="icon-head"></i>我的主页</a></li> 
	          <li><a href="/home/publications" title="我的文章"><i class="icon-paper"></i>我的文章</a></li> 
	          <li><a href="/home/bookmarks" title="我的收藏"><i class="icon-ribbon"></i>我的收藏</a></li> 
	          <li><a href="/home/tag" title="我的订阅"><i class="icon-circle-plus"></i>我的订阅</a></li> 
	          <li><a href="/home/notifications" class="notifications" title="我的通知"><i class="icon-bell2"></i>我的通知</a></li>  
	          <li><a href="/home/setting" title="账号设置"><i class="icon-cog"></i>账号设置</a></li> 
	          <li class="last"><a href="/account/logout" title="退出"><i class="icon-power"></i>退出</a></li> 
	         </ul> 
	        </div> 
	       </div> 
	      </div> 
	     </div> 
	     <div class="left-c"> 
	      <div class="logo-part"> 
	       <a href="http://www.tmtpost.com/" class="logo" title="钛媒体"><img src="" width="" height="35" alt="钛媒体" /></a> 
	      </div> 
	      <nav>  
	      </nav> 
	     </div> 
	    </div> 
	    <div class="second-nav "> 
	     <div class="inner"> 
	      <!-- 阅读页面 --> 
	      <div class="columns fl"> 
	       <ul class="column-list tag-recommend fl">
               @if(isset($menu_tags))
                   @foreach($menu_tags as $tag)
	                <li><a class="" href="<?php echo env('APP_URL');?>/article/list?type=tag&id={{$tag["id"]}}" title="{{$tag["name"]}}">{{$tag["name"]}}<span class="avia-menu-fx"><span class="avia-arrow-wrap"><span class="avia-arrow"></span></span></span></a></li>
                   @endforeach
               @endif
           </ul>
	      </div> 
	     </div> 
	    </div> 
	   </header>  
	</div>
	   <div class="m"> 
    <section class="wrapper"> 
     <section class="index-page center wide-index"> 
      <div class="top_article"> 
       <div class="first">
        <img src="http://7xil86.com2.z0.glb.qiniucdn.com/uploads/images/2017/01/机车大叔.jpg?imageMogr2/thumbnail/980x653/gravity/center/crop/!980x425&amp;ext=.jpg" width="980" height="425" class="bg" /> 
        <div class="inner"> 
         <div class="overlay"></div> 
         <div class="post fl"> 
          <div class="post-cont"> 
           <h3 class="tag"><a href="http://www.tmtpost.com/tag/299258">头条</a></h3> 
           <h2><a href="/2559088.html" target="_blank" class="title" title="这些奢侈品店面的设计者，竟然是个肌肉发达的机车大叔丨钛空人">这些奢侈品店面的设计者，竟然是个肌肉发达的机车大叔丨钛空人</a></h2> 
           <div class="summary">
             以后再逛奢侈品店都能想到他了。 
           </div> 
           <div class="info"> 
            <a target="_blank" href="/user/2519870" title="钛空">钛空</a> 
            <span class="gap-point-large">•</span> 2017-01-15 09:01 
            <span class="gap-point-large">•</span> 
            <a href="http://www.tmtpost.com/tag/299258" target="_blank" title="头条">头条</a> 
           </div> 
           <div class="options"> 
            <!--<a href="#" data-id="2559088" class="like " title="喜欢"> <span class="icon s-like"><i class="icon-Shape9"></i><i class="icon-like-1"></i></span> <span class="num">6</span> </a> -->
            <a href="/2559088.html#comment" class="comment" target="_blank" data-id="2559088"><span class="icon"><i class="icon-flame"></i></span><span class="num">0</span></a> 
           </div> 
          </div> 
         </div> 
         <div class="author fr"> 
          <div class="a-inner">
           <a target="_blank" href="/user/2519870" title="钛空" class="pic"><img alt="钛空" src="http://7xil86.com2.z0.glb.qiniucdn.com/uploads/avatar/2519870_1479957042.jpeg?imageMogr2/thumbnail/80x80&amp;ext=.jpeg" width="80" height="80" /></a>
           <a target="_blank" href="/user/2519870" title="钛空" class="name">钛空</a> 
           <p>一切关于未来生活的奇思妙想</p> 
           <button data-id="2519870" class="btn btn-normal orange btn-bordered follow">关注</button> 
          </div> 
         </div> 
        </div> 
       </div> 
      </div>   
      <div class="main clear" id="lastest-list"> 
       <div class="articles fl"> 
        <div class="mod-tit"> 
         <h3 class="js-new-post current">最新</h3>
         <span class="gapline">|</span> 
         <h3 class="js-hot-post">最热</h3>
         <span class="gapline">|</span>
         <h3 class="js-recom-post">推荐</h3>
        </div> 
        <div class="user-post hide"> 
         <p class="loading">正在加载...</p> 
        </div>
           <div class="newest-post">
               <ul class="mod-article-list">
                   <li>
                       @foreach($articles as $article)
                       <a target="_blank" href="<?php echo env('APP_URL');?>/article?id={{$article["id"]}}" title="{{$article["title"]}}" class="pic">
                           <img alt="{{$article["title"]}}" src="{{$article["face"]}}" width="200" height="150" />
                       </a>
                       <div class="cont">
                           <h4><a target="_blank" href="<?php echo env('APP_URL');?>/article?id={{$article["id"]}}" title="{{$article["title"]}}" class="title"> {{$article["title"]}} </a></h4>
                           <div class="options fr">
                               <a href="<?php echo env('APP_URL');?>/article?id={{$article["id"]}}#comment" class="comment" target="_blank" data-id="2558473"><span class="icon"><i class="icon-flame"></i></span><span class="num">{{$article["hot_num"]}}</span></a>
                           </div>
                           <div class="info">
                               <a title="钛妹儿" target="_blank" href="/user/237026" class="name">{{$article["author"]["username"]}}</a>
                               <span class="gap-point">•</span>{{$article["publish_time"]}}
                           </div>
                           <p class="intro" style="overflow: hidden">{{$article["abstracts"]}}</p>
                           <div class="tag">
                               <i class="icon-tags2"></i>
                               @if(isset($article["tagList"]))
                                   @foreach($article["tagList"] as $tag)
                                        <a target="" data-id="299674" href="article/list?type=tag&id={{$tag["id"]}}" title="钛媒体">{{$tag["name"]}}</a>
                                    @endforeach
                               @endif
                           </div>
                       </div>
                           @endforeach
                   </li>

               </ul>
               <p class="load-more"> <button class="btn btn-normal gray btn-bordered">更多文章</button> </p>
           </div>
        <div class="recommend-post hide">
         <ul class="mod-article-list"> 
          <li><a target="_blank" href="/2558473.html" title="钛媒体在波士顿设立“美东中心”，搭建全球创新最前沿的中美桥梁" class="pic"><img alt="钛媒体在波士顿设立“美东中心”，搭建全球创新最前沿的中美桥梁" src="http://7xil86.com2.z0.glb.qiniucdn.com/uploads/images/2017/01/1852188388.jpg?imageMogr2/thumbnail/200x150&amp;ext=.jpg" width="200" height="150" /></a> 
           <div class="cont"> 
            <h4><a target="_blank" href="/2558473.html" title="钛媒体在波士顿设立“美东中心”，搭建全球创新最前沿的中美桥梁" class="title"> 钛媒体在波士顿设立“美东中心”，搭建全球创新最前沿的中美桥梁 </a></h4> 
            <div class="options fr"> 
             <a href="2558473.html#comment" class="comment" target="_blank" data-id="2558473"><span class="icon"><i class="icon-flame"></i></span><span class="num">15</span></a> 
            </div> 
            <div class="info"> 
             <a title="钛妹儿" target="_blank" href="/user/237026" class="name">钛妹儿</a> 
             <span class="gap-point">•</span>2017-01-13 18:41 
            </div> 
            <p class="intro">波士顿所在的马塞诸塞州，也已经超过加州，成为美国创新第一大州。</p> 
            <div class="tag"> 
             <i class="icon-tags2"></i> 
             <a target="_blank" data-id="299674" href="http://www.tmtpost.com/tag/299674" title="钛媒体">钛媒体</a> 
             <a target="_blank" data-id="299675" href="http://www.tmtpost.com/tag/299675" title="钛媒体公告">钛媒体公告</a> 
             <a target="_blank" data-id="299676" href="http://www.tmtpost.com/tag/299676" title="钛媒体大事记">钛媒体大事记</a> 
            </div> 
           </div> 
           </li> 
          
         </ul> 
         <p class="load-more"> <button class="btn btn-normal gray btn-bordered">更多文章</button> </p> 
        </div>
           <div class="hotest-post hide">
               <ul class="mod-article-list">
                   <li><a target="_blank" href="/2558473.html" title="钛媒体在波士顿设立“美东中心”，搭建全球创新最前沿的中美桥梁" class="pic"><img alt="钛媒体在波士顿设立“美东中心”，搭建全球创新最前沿的中美桥梁" src="http://7xil86.com2.z0.glb.qiniucdn.com/uploads/images/2017/01/1852188388.jpg?imageMogr2/thumbnail/200x150&amp;ext=.jpg" width="200" height="150" /></a>
                       <div class="cont">
                           <h4><a target="_blank" href="/2558473.html" title="钛媒体在波士顿设立“美东中心”，搭建全球创新最前沿的中美桥梁" class="title"> 钛媒体在波士顿设立“美东中心”，搭建全球创新最前沿的中美桥梁 </a></h4>
                           <div class="options fr">
                               <a href="2558473.html#comment" class="comment" target="_blank" data-id="2558473"><span class="icon"><i class="icon-flame"></i></span><span class="num">15</span></a>
                           </div>
                           <div class="info">
                               <a title="钛妹儿" target="_blank" href="/user/237026" class="name">钛妹儿</a>
                               <span class="gap-point">•</span>2017-01-13 18:41
                           </div>
                           <p class="intro">波士顿所在的马塞诸塞州，也已经超过加州，成为美国创新第一大州。</p>
                           <div class="tag">
                               <i class="icon-tags2"></i>
                               <a target="_blank" data-id="299674" href="http://www.tmtpost.com/tag/299674" title="钛媒体">钛媒体</a>
                               <a target="_blank" data-id="299675" href="http://www.tmtpost.com/tag/299675" title="钛媒体公告">钛媒体公告</a>
                               <a target="_blank" data-id="299676" href="http://www.tmtpost.com/tag/299676" title="钛媒体大事记">钛媒体大事记</a>
                           </div>
                       </div>
                   </li>

               </ul>
               <p class="load-more"> <button class="btn btn-normal gray btn-bordered">更多文章</button> </p>
           </div>

       </div> 
       <div class="sidebar fr"> 
        <div class="part"> 
         <div class="mod-tit">
          <span><h3>热门话题</h3></span>
         </div> 
         <div class="tags"> 
          <a class="tag" title="钛媒体公告" target="_blank" href="http://www.tmtpost.com/tag/299675">钛媒体公告</a> 
         </div> 
        </div> 
        <div class="part w3-part"> 

        </div> 
        <div class="part"> 
         <div class="title">
          <span><h3><span class="num">7×24h</span>快讯</h3><!--<a href="/lists/hot_list" target="_blank" class="r btn btn-small orange"> TOP 50<i class="icon-arrow-r"></i></a>--></span>
         </div> 
         <ol class="hot"> 
          <li><a target="_blank" href="/2558782.html" title="【观点】孙宏斌输血150亿元背后，乐视离贱卖只有一步之遥">【观点】孙宏斌输血150亿元背后，乐视离贱卖只有一步之遥</a></li> 
          <li><a target="_blank" href="/2558273.html" title="消费者买假货起诉京东却败诉，京东说“京东自营不是京东商城自营”">消费者买假货起诉京东却败诉，京东说“京东自营不是京东商城自营”</a></li> 
          <li><a target="_blank" href="/2559050.html" title="万达2016年服务业收入占比首超房地产，王健林宣布转型基本成功">万达2016年服务业收入占比首超房地产，王健林宣布转型基本成功</a></li> 
          <li><a target="_blank" href="/2558473.html" title="钛媒体在波士顿设立“美东中心”，搭建全球创新最前沿的中美桥梁">钛媒体在波士顿设立“美东中心”，搭建全球创新最前沿的中美桥梁</a></li> 
          <li><a target="_blank" href="/2558534.html" title="硅谷最火的“竹蜻蜓”无人机公司 Lily…死了">硅谷最火的“竹蜻蜓”无人机公司 Lily…死了</a></li> 
          <li><a target="_blank" href="/2558291.html" title="微信小程序出师不利，谷歌百度或推新Web应用标准抄后路">微信小程序出师不利，谷歌百度或推新Web应用标准抄后路</a></li> 
          <li><a target="_blank" href="/2558701.html" title="终于等到融创的150亿“救命钱”，乐视称将发公告披露细节">终于等到融创的150亿“救命钱”，乐视称将发公告披露细节</a></li> 
          <li><a target="_blank" href="/2558442.html" title="这款奇葩的纸质头盔好用到爆，而且只要5美元">这款奇葩的纸质头盔好用到爆，而且只要5美元</a></li> 
          <li><a target="_blank" href="/2558958.html" title="造个汽车为啥这么难？听听世界顶级工程师是怎么说的">造个汽车为啥这么难？听听世界顶级工程师是怎么说的</a></li> 
          <li><a target="_blank" href="/2558643.html" title="京东官微回应纠纷案：承认子公司的商品都属于自营">京东官微回应纠纷案：承认子公司的商品都属于自营</a></li> 
         </ol> 
        </div> 
        <div class="part w3-part"> 


        </div> 
        <div class="part recommend"> 
         <div class="title"> 
          <h3><span>推荐作者</span></h3> 
          <a target="_blank" href="/authors/verified" rel="nofollow" class="r more">更多</a> 
         </div> 
         <ul class="mod-article-list"> 
          <li><a class="pic"><img alt="tmtpost" width="40" height="40" src="http://7xil86.com2.z0.glb.qiniucdn.com/uploads/avatar/50a672576b393994e0fbbea1f0e4e5e2.jpg?imageMogr2/thumbnail/40x40&amp;ext=.jpg" /></a> 
           <div class="cont"> 
            <h3><a target="_blank" title="tmtpost" href="/user/272622" class="name">tmtpost</a></h3> 
            <p class="intro">Our official account in English/English Ver...</p> 
           </div> </li> 
          <li><a class="pic"><img alt="钛极客" width="40" height="40" src="http://7xil86.com2.z0.glb.qiniucdn.com/uploads/avatar/66007e69b1d050da17a0abecde1ce1ff.jpg?imageMogr2/thumbnail/40x40&amp;ext=.jpg" /></a> 
           <div class="cont"> 
            <h3><a target="_blank" title="钛极客" href="/user/269931" class="name">钛极客</a></h3> 
            <p class="intro">真极客有钛度，脑洞大开黑科技！微信号“钛极客”（TiGeek）</p> 
           </div> </li> 
          <li><a class="pic"><img alt="钛空" width="40" height="40" src="http://7xil86.com2.z0.glb.qiniucdn.com/uploads/avatar/2519870_1479957042.jpeg?imageMogr2/thumbnail/40x40&amp;ext=.jpeg" /></a> 
           <div class="cont"> 
            <h3><a target="_blank" title="钛空" href="/user/2519870" class="name">钛空</a></h3> 
            <p class="intro">一切关于未来生活的奇思妙想</p> 
           </div> </li> 
          <li><a class="pic"><img alt="朱玲玉" width="40" height="40" src="http://7xil86.com2.z0.glb.qiniucdn.com/uploads/avatar/1695202_1467966223.jpeg?imageMogr2/thumbnail/42x40/gravity/center/crop/!40x40&amp;ext=.jpeg" /></a> 
           <div class="cont"> 
            <h3><a target="_blank" title="朱玲玉" href="/user/1695202" class="name">朱玲玉</a></h3> 
            <p class="intro">钛媒体女摄影记者一枚。</p> 
           </div> </li> 
          <li><a class="pic"><img alt="潜在投资家" width="40" height="40" src="http://7xil86.com2.z0.glb.qiniucdn.com/uploads/avatar/19322cd615733a05fab60743e6d8cbe2.jpg?imageMogr2/thumbnail/40x40&amp;ext=.jpg" /></a> 
           <div class="cont"> 
            <h3><a target="_blank" title="潜在投资家" href="/user/1501226" class="name">潜在投资家</a></h3> 
            <p class="intro">潜在投资，「独立、精准、高效」的专业股权投资金融信息平台。微信公众号：潜在投资家（ID...</p> 
           </div> </li> 
          <li><a class="pic"><img alt="韩佩" width="40" height="40" src="http://7xil86.com2.z0.glb.qiniucdn.com/uploads/avatar/276191_1431595817.jpeg?imageMogr2/thumbnail/40x40&amp;ext=.jpeg" /></a> 
           <div class="cont"> 
            <h3><a target="_blank" title="韩佩" href="/user/276191" class="name">韩佩</a></h3> 
            <p class="intro">报告老板，活捉小钛妹一只！peihan@tmtpost.com</p> 
           </div> </li> 
          <li><a class="pic"><img alt="竺道" width="40" height="40" src="http://7xil86.com2.z0.glb.qiniucdn.com/uploads/avatar/1344204_1460771526.jpeg?imageMogr2/thumbnail/40x40&amp;ext=.jpeg" /></a> 
           <div class="cont"> 
            <h3><a target="_blank" title="竺道" href="/user/1344204" class="name">竺道</a></h3> 
            <p class="intro">专业评论和深度分析印度TMT行业动态和投资机会，帮助商业人士更准确和更及时的了解印度商...</p> 
           </div> </li> 
          <li><a class="pic"><img alt="胡勇" width="40" height="40" src="http://7xil86.com2.z0.glb.qiniucdn.com/uploads/avatar/e6592e39e46c7541860ae9859513ad9b.jpg?imageMogr2/thumbnail/64x40/gravity/center/crop/!40x40&amp;ext=.jpg" /></a> 
           <div class="cont"> 
            <h3><a target="_blank" title="胡勇" href="/user/258540" class="name">胡勇</a></h3> 
            <p class="intro">做个好记者</p> 
           </div> </li> 
          <li><a class="pic"><img alt="苏建勋" width="40" height="40" src="http://7xil86.com2.z0.glb.qiniucdn.com/uploads/avatar/2424654_1472541614.jpeg?imageMogr2/thumbnail/40x40&amp;ext=.jpeg" /></a> 
           <div class="cont"> 
            <h3><a target="_blank" title="苏建勋" href="/user/2424654" class="name">苏建勋</a></h3> 
            <p class="intro">复杂世界里，大家都简单一点。钛媒体记者，关注消费升级与企业服务，有料可邮件 jianx...</p> 
           </div> </li> 
         </ul> 
        </div> 
       </div> 

      </div> 
     </section> 
    </section>
           <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.js"></script>
           <script>
            $(function(){
                $(".js-new-post").click
            });
           </script>
</body>
</html>