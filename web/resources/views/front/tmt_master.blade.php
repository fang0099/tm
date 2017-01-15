<html>
    <head>
        <link rel="stylesheet" href="./tmt/css/style_v1.css" />
        <link rel="stylesheet" href="./tmt/css/style.css" />
        @yield("page_level_css")
        <title>贝塔区块链</title>
    </head>
    <body class="pc-index">
        <div class="container">
            <header class="p-header new-header">
                <div class="first-nav">
                    <div class="options">
                        <div class="nav-search"></div>
                        <a href="#" class="btn btn-x-small orange post-edit">写稿</a>
                    </div>
                    <div class="left-c">
                        <div class="logo-part">
                            <a href="" class="logo" title="贝塔区块链">
                                <img src="/public/css/img/tmt_logo.png" width="" height="35" alt="贝塔区块链">
                            </a>
                        </div>
                        <nav>
                        </nav>
                    </div>
                </div>
                <div class="second-nav">
                    <div class="inner">
                        <div class="columns fl">
                            <ul class="column-list tag-recommend fl">
                                <li>
                                    <a href="#" class="">
                                        商业价值杂志
                                        <span class="avia-menu-fx">
                                            <span class="avia-arrow-wrap">
                                                <span class="avia-arrow">

                                                </span>
                                            </span>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="current">
                                        商业价值杂志
                                        <span class="avia-menu-fx">
                                            <span class="avia-arrow-wrap">
                                                <span class="avia-arrow">

                                                </span>
                                            </span>
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </header>
            <div class="m">
                <section class="wrapper">
                    <section class="index-page center wide-index">
                        @yield("content")
                    </section>
                </section>
            </div>
        </div>
    </body>
    <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.js"></script>
    @yield("page_level_js")
</html>