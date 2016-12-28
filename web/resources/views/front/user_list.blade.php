@extends("front/master")
    @section("content")
        <main class="main-container ng-scope" ng-view="">
            <div class="main receptacle column-followers-main ng-scope">
                <h2 class="page-title ng-binding">54 人关注该专栏</h2>
                <div ui-infinite="" data-source="source" class="ui-infinite">
                    <p class="items-empty ng-binding ng-hide" ng-show="!source.pending &amp;&amp; !followers.length">
                        <i class="icon icon-no-article" ng-class="{true: &#39;icon-error-500&#39;, false: &#39;icon-no-article&#39;}[source.error]"></i>还没有关注者</p>

                    <ul class="column-followers clearfix">
                        @foreach($users as $user)
                        <li class="ui-user-item ng-isolate-scope" ng-repeat="user in followers" user="user">
                            <a href="https://www.zhihu.com/people/wo-shi-lai-xue-xi-de-74-63" target="_blank" class="user-avatar">
                                <img class="avatar avatar-mid" ng-src="https://pic1.zhimg.com/da8e974dc_l.jpg" alt="" src="{{$user["avatar"]}}"></a>
                            <div class="user-intro">
                                <a href="article/list?id={{$user["id"]}}" target="_blank">
                                    <strong class="ng-binding">{{$user["username"]}}</strong></a>
                                <span ng-if="user.bio" class="bio ng-binding ng-scope">管理</span>
                                <a href="article/list?id={{$user["id"]}}" target="_blank" style="display: block;" class="bio btn ng-binding ng-scope">
                                    <strong class="ng-binding">{{$user["username"]}}</strong></a>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </main>
        @stop