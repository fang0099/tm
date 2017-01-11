<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\CheckArticleEvent' => [
            'App\Listeners\NotifyArticleCheckedListener',
        ],
        'App\Events\CollectArticleEvent' => [
            'App\Listeners\NotifyArticleCollectListener',
        ],
        'App\Events\LikeArticleEvent' => [
            'App\Listeners\NotifyArticleLikeListener',
        ],
        'App\Events\CommentArticleEvent' => [
            'App\Listeners\NotifyArticleCommentListener',
        ],
        'App\Events\CommentCommentEvent' => [
            'App\Listeners\NotifyCommentCommentListener',
        ],
        'App\Events\SubscribeTagEvent' => [
            'App\Listeners\NotifyTagSubscribedListener',
        ],
        'App\Events\FollowUserEvent' => [
            'App\Listeners\NotifyUserFollowListener',
        ],
        'App\Events\ReadArticleEvent' => [
            'App\Listeners\NotifyArticleReadListener',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
