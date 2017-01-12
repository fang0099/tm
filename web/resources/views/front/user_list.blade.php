@extends("front/master")
    @section("content")
        <main class="main-container ng-scope" ng-view="">
            <div class="main receptacle column-followers-main ng-scope">
                <h2 class="page-title ng-binding">
                    @if(isset($tag["subscriberCount"]))
                        关注
                    @endif
                    {{$tag["subscriberCount"] or $the_user["followersCount"]}} 人
                    @if(isset($the_user["followersCount"]))
                    关注
                    @endif
                    </h2>
                <div ui-infinite="" data-source="source" class="ui-infinite">
                    <p class="items-empty ng-binding ng-hide" ng-show="!source.pending &amp;&amp; !followers.length">
                        <i class="icon icon-no-article" ng-class="{true: &#39;icon-error-500&#39;, false: &#39;icon-no-article&#39;}[source.error]"></i>还没有关注者</p>

                    <ul class="column-followers clearfix">
                        @foreach($users as $user)
                        <li class="ui-user-item ng-isolate-scope" ng-repeat="user in followers" user="user">
                            <a href="<?php echo env('APP_URL');?>/article/list?id={{$user["id"]}}" target="_blank" class="user-avatar">
                                <img class="avatar avatar-mid" ng-src="https://pic1.zhimg.com/da8e974dc_l.jpg" alt="" src="{{$user["avatar"]}}"></a>
                            <div class="user-intro">
                                <a href="<?php echo env('APP_URL');?>/article/list?id={{$user["id"]}}" target="_blank">
                                    <strong class="ng-binding">{{$user["username"]}}</strong></a>
                                <span ng-if="user.bio" class="bio ng-binding ng-scope">{{$user["brief"]}}</span>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </main>
        @stop