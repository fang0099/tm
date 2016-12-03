<?php
/**
 * Created by PhpStorm.
 * User: bean
 * Date: 16-12-3
 * Time: 下午11:30
 */

namespace App\Http\Controllers;


use App\Repositories\KeysRepository;

class KeyController extends Controller
{
    private $keysRep ;

    public function __construct(KeysRepository $keysRep){
        $this->keysRep = $keysRep;
    }

    public function functionsCount(){
        return $this->keysRep->getByKey(1)->functions->count();
    }
}