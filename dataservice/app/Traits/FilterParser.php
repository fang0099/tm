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
        $raw = array();
        $condition = array();
        $params = array();
        foreach ($filter as $f => $v){
            $fs = explode(' ', $f);
            $opt = $this->getOperator($fs[1]);
            $condition[] = $fs[0] . ' ' . $opt . ' ? ';
            $raw[] = [
                'field' => $fs[0],
                'opt' => $opt,
                'param' => $v
            ];
            $params[] = $v;
        }
        return ['condition' => $condition, 'params' => $params, 'raw' => $raw];
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