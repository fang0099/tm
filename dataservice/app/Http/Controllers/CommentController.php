<?php


namespace App\Http\Controllers;


use App\Repositories\CommentRepository;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    private $commentRep;

    public function __construct(CommentRepository $commentRep)
    {
        $this->commentRep = $commentRep;
    }

    public function create(Request $request){
    	return $this->commentRep->create($request);
    }

    public function delete(Request $request){
    	$id = $request->input('id');
    	$operator = $request->input('userid');
    	return $this->commentRep->delete($id, $operator);
    }

    public function up(Request $request){
    	$id = $request->input('id');
    	$operator = $request->input('userid');
    	return $this->commentRep->up($id, $operator);	
    }

    public function cancleUp(Request $request){
    	$id = $request->input('id');
    	$operator = $request->input('userid');
    	return $this->commentRep->cancleUp($id, $operator);		
    }
}