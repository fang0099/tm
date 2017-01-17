<?php
/**
 * Created by PhpStorm.
 * User: bean
 * Date: 16-12-5
 * Time: 下午6:12
 */

namespace App\Http\Controllers;


use App\Repositories\ArticleRepository;
use App\Repositories\DraftRepository;
use App\Repositories\NoticeRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $userRep;
    private $articleRep;
    private $draftRep;
    private $noticeRep;

    public function __construct(UserRepository $userRep, ArticleRepository $articleRep,
                                DraftRepository $draftRep, NoticeRepository $noticeRep)
    {
        $this->userRep = $userRep;
        $this->articleRep = $articleRep;
        $this->draftRep = $draftRep;
        $this->noticeRep = $noticeRep;
    }

    public function get(Request $request){
        $id = $request->input('id');
        return $this->userRep->findById($id);
    }

    public function getByUsername(Request $request){
        $username = $request->input('username');
        return $this->userRep->findByUsername($username);
    }

    public function getByEmail(Request $request){
        $email = $request->input('email');
        return $this->userRep->findByEmail($email);
    }

    public function create(Request $request){
        return $this->userRep->create($request);
    }

    public function update(Request $request){
        return $this->userRep->update($request);
    }

    public function delete(Request $request){
        $ids = $request->input('ids');
        return $this->userRep->delete($ids);
    }

    public function list(Request $request){
        return $this->userRep->list($request);
    }

    public function page(Request $request){
        return $this->userRep->page($request);
    }

    public function followers(Request $request){
        $id = $request->input('id');
        $page = $request->input('page', 1);
        $pageSize = $request->input('pageSize', 15);
        return $this->userRep->followers($id, $page, $pageSize);
    }

    public function follows(Request $request){
        $id = $request->input('id');
        $page = $request->input('page', 1);
        $pageSize = $request->input('pageSize', 15);
        return $this->userRep->follows($id, $page, $pageSize);
    }

    public function follow(Request $request){
        $id = $request->input('id');
        $follower = $request->input('follower');
        return $this->userRep->follow($id, $follower);
    }

    public function unfollow(Request $request){
        $id = $request->input('id');
        $follower = $request->input('follower');
        return $this->userRep->unfollow($id, $follower);
    }

    public function lastedArticles(Request $request){
        return $this->userRep->articles('publish_time', $request);
    }

    public function hotestArticles(Request $request){
        return $this->userRep->articles('hot_num', $request);
    }

    public function notice(Request $request){
        $type = $request->input('type');
        $status = $request->input('status', '-1');
        $userid = $request->input('userid');
        $page = $request->input('page', 1);
        $pageSize = $request->input('pageSize', 15);
        return $this->userRep->notice($status, $type, $userid, $page, $pageSize);
    }

    public function activities(Request $request){
        $userId = $request->input('userid');
        $page = $request->input('page', 1);
        $pageSize = $request->input('pageSize', 15);
        return $this->userRep->activities($userId, $page, $pageSize);
    }

    public function optLog(Request $request){
        $type = $request->input('type');
        $userid = $request->input('userid');
        $page = $request->input('page', 1);
        $pageSize = $request->input('pageSize', 15);
        return $this->userRep->optLog($type, $userid, $page, $pageSize);
    }

    public function tags(Request $request){
        $id = $request->input('id');
        $page = $request->input('page', 1);
        return $this->userRep->tags($id, $page);
    }

    public function hasFollower(Request $request){
        $id = $request->input("id");
        $userid = $request->input("userid");
        return $this->userRep->hasFollower($id, $userid);
    }

    public function hasLike(Request $request){
        $id = $request->input("id");
        $articleid = $request->input("articleid");
        return $this->userRep->hasLike($id, $articleid);
    }

    public function hasCollect(Request $request){
        $id = $request->input("id");
        $articleid = $request->input("articleid");
        return $this->userRep->hasCollect($id, $articleid);
    }

    public function collectArticles(Request $request){
        $id = $request->input('id');
        $page = $request->input('page', 1);
        $sort = $request->input('sort');
        return $this->userRep->collectArticles($id, $page, $sort);
    }

    public function tagArticles(Request $request){
        $id = $request->input('id');
        $page = $request->input('page', 1);
        return $this->userRep->tagArticles($id, $page);
    }

    public function followerArticles(Request $request){
        $id = $request->input('id');
        $page = $request->input('page', 1);
        return $this->userRep->followersArticle($id, $page);
    }


    public function recommend(Request $request){
        $uid = $request->input('id');
        $page = $request->input('page', 1);
        $pageSize = $request->input('pageSize', 10);
        return $this->userRep->recommend($uid, $page, $pageSize);
    }

    public function draft(Request $request){
        $id = $request->input('id');
        $page = $request->input('page', 1);
        $pageSize = $request->input('pageSize', 10);
        return $this->userRep->draft($id, $page, $pageSize);
    }
    public function checking(Request $request){
        $id = $request->input('id');
        $page = $request->input('page', 1);
        $pageSize = $request->input('pageSize', 10);
        return $this->articleRep->page2($page, $pageSize,
            [
                "author_id eq " => $id,
                "has_checked eq " => "0"
            ],
            "publish_time desc");
    }

    public function reject(Request $request){
        $id = $request->input('id');
        $page = $request->input('page', 1);
        $pageSize = $request->input('pageSize', 10);
        return $this->articleRep->page2($page, $pageSize,
            [
                "author_id eq " => $id,
                "has_checked eq " => "-1"
            ],
            "publish_time desc");
    }

    public function saveDraft(Request $request){
        return $this->draftRep->insert($request);
    }

    public function getDraft(Request $request){
        return $this->draftRep->findById($request->input('id'));
    }

    public function deleteDraft(Request $request){
        $id = $request->input('id');
        $uid = $request->input('userid');
        return $this->draftRep->deleteByUid($id, $uid);
    }

    public function deleteArticle(Request $request){
        $id = $request->input('id');
        $uid = $request->input('userid');
        return $this->articleRep->deleteByUid($id, $uid);
    }

    public function deleteNotice(Request $request){
        $id = $request->input('id');
        $uid = $request->input('userid');
        return $this->noticeRep->deleteByUid($id, $uid);
    }
}