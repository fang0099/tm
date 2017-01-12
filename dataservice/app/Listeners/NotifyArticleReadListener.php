<?php

namespace App\Listeners;

use App\Events\ReadArticleEvent;
use App\Repositories\ArticleRepository;
use App\Repositories\UserRepository;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifyArticleReadListener
{
    private $articleRep;
    private $userRep;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(ArticleRepository $articleRep, UserRepository $userRep)
    {
        $this->articleRep = $articleRep;
        $this->userRep = $userRep;
    }

    /**
     * Handle the event.
     *
     * @param  ReadArticleEvent  $event
     * @return void
     */
    public function handle(ReadArticleEvent $event)
    {
        $article = $event->article;
        $uid = $event->uid;

        // add hot num
        $article->hot_num = $article->hot_num + 1;
        $article->save();

    }
}
