<?php
/**
 * Created by PhpStorm.
 * User: bean
 * Date: 16-12-7
 * Time: 下午12:31
 */

namespace App\Traits;


trait FilterParser
{
    public function parser($filter){
        $condition = array();
        $params = array();
        foreach ($filter as $f => $v){
            $fs = explode(' ', $f);
            $opt = $this->getOperator($fs[1]);
            $condition[] = $fs[0] . ' ' . $opt . ' ? ';
            $params[] = $v;
        }
        return ['condition' => $condition, 'params' => $params];
    }

    private function getOperator($opt){
        if($opt == 'like'){
            return ' like ';
        }else if($opt == 'eq'){
            return ' = ';
        }else if($opt == 'le'){
            return ' <= ';
        }else if($opt == 'lt'){
            return ' < ';
        }else if($opt == 'ge'){
            return ' >= ';
        }else if($opt == 'gt'){
            return ' > ';
        }else {
            return ' like ';
        }
    }
}