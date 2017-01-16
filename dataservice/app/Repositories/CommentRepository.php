<?php
/**
 * Created by PhpStorm.
 * User: bean
 * Date: 16-12-4
 * Time: 下午10:37
 */

namespace App\Repositories;


use App\Model\Comments;
use App\StatusCode;
use Illuminate\Http\Request;
use DB;

class CommentRepository extends BaseRepository
{
    public function __construct(Comments $model)
    {
        $this->model = $model;
    }

    public function list($articleId){
        return $this->model->where('article_id', '=', $articleId)->orderBy('id', 'desc')->where('del_flag','=', '0')->get();
    }

    public function create(Request $request){
		$params = $this->getParams($request);
		$comment =  $this->insertWithId($params);
		return $this->success('', $comment);
    }

    public function delete($id, $operator){
    	$comment = $this->get($id);
    	if($comment != null && $comment->del_flag != 1 && $comment->user_id == $operator){
    		$comment->del_flag = 1;
    		$comment->save();
    	}
    	return $this->success();
    }

    public function up($id, $operator){
    	$comment = $this->get($id);
    	if($comment != null && $comment->del_flag != 1){
    		$count = DB::select('select count(*) as c from  user_comment_opt where user_id = ? and comment_id = ?', [$operator, $id]);
	        if($count[0]->c == 0){
	        	$comment->up = $comment->up + 1;
	        	$comment->save();
	        	DB::update('insert into user_comment_opt (user_id, comment_id, opt) values (?, ?, ?)', [$operator, $id, 1]);
			}
    	}
    	return $this->success();
    }

    public function cancleUp($id, $operator){
		$comment = $this->get($id);
    	if($comment != null && $comment->del_flag != 1){
    		$count = DB::select('select count(*) as c from  user_comment_opt where user_id = ? and comment_id = ?', [$operator, $id]);
	        if($count[0]->c != 0){
	        	$comment->up = $comment->up - 1;
	        	$comment->save();
	        	DB::update('delete from user_comment_opt where user_id = ? and comment_id = ? and opt = ?', [$operator, $id, 1]);
			}
    	}
    	return $this->success();
    }
    /*
    public function down($id){

    }
    */
}