<?php
/**
 * Created by PhpStorm.
 * User: bean
 * Date: 16-12-3
 * Time: 下午11:30
 */

namespace App\Http\Controllers;


use App\Repositories\KeysRepository;
use App\Traits\FilterParser;
use Illuminate\Http\Request;

class KeyController extends Controller
{
    private $keysRep ;

    public function __construct(KeysRepository $keysRep){
        $this->keysRep = $keysRep;
    }

    public function functionsCount(){
        return $this->keysRep->getByKey(1)->functions->count();
    }
    use FilterParser;
    public function t(Request $request){
        $filter = $this->parser($request->input('filter'));
        $condition = $filter['condition'];
        return implode(' and ', $condition);
    }
}