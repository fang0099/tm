<?php
/**
 * Created by PhpStorm.
 * User: bean
 * Date: 16-12-3
 * Time: 上午9:08
 */

namespace App\Repositories;


use App\StatusCode;
use App\Traits\FilterParser;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Log;

abstract class BaseRepository
{

    use FilterParser;

    protected $model;

    public function get($primaryKey)
    {

        Log::debug('get by primary key. table is ' .
            $this->model->getTable() .
            '. primary key is ' . $this->getPrimaryKey() . ' : ' . $primaryKey);

        return $this->model->find($primaryKey);
    }

    protected function getExcludeDelete($id){
        $m = $this->get($id);
        if($m == null || $m->del_flag == 1){
            return $this->fail(StatusCode::SELECT_ERROR_RESULT_NULL, ' id not exist', $id);
        }else {
            return $m;
        }
    }

    public function getById($id)
    {
        $tmp = $this->get($id);
        if ($tmp == null) {
            return $this->fail(StatusCode::SELECT_ERROR_RESULT_NULL, 'result is null');
        } else {
            return $this->success('', $tmp);
        }
    }

    public function batchDeleteInternal(array $ids)
    {
        foreach ($ids as $id) {
            if(ctype_digit($id)){
                $this->deleteById($id);
            }
        }
        return $this->success();
    }

    public function deleteById($id)
    {
        $tmp = $this->get($id);
        if ($tmp != null) {
            //$tmp->delete();
            $tmp->del_flag = 1;
            $tmp->save();
            return $this->success();
        }
    }

    public function getBusinessLine()
    {
        return StatusCode::BUSINESS_LINE[$this->model->getTable()];
    }

    public function getPrimaryKey()
    {
        return $this->model->getKeyName();
    }

    protected function insertWithId($params)
    {
        if (!$params || empty($params)) {
            return null;
        }
        $M = $this->fillParams($params);
        $M->save();
        return $M;
    }

    public function insertInternal($params)
    {

        Log::debug('insert internal for ' . $this->model->getTable() . '. params is ' . var_export($params, true));

        if (!$params || empty($params)) {
            return $this->fail(StatusCode::PARAMS_ERROR_EMPTY, 'params are null or empty');
        }
        $M = $this->fillParams($params);
        $M->save();
        return $this->success('', $M);
    }


    protected function updateWithId($params){
        if(!$params || empty($params)){
            return null;
        }
        $primaryKey = $this->getPrimaryKey();
        if(isset($params[$primaryKey])) {
            $M = $this->get($params[$primaryKey]);
            unset($params[$primaryKey]);
            foreach ($params as $k => $v) {
                $M->$k = $v;
            }
            $M->save();
            return $M;
        }
        return null;
    }

    protected function updateInternal($params){

        Log::debug('update internal for ' . $this->model->getTable() . '. params is ' . var_export($params, true));

        if(!$params || empty($params)){
            return $this->fail(StatusCode::PARAMS_ERROR_EMPTY, 'params are null or empty');
        }
        $primaryKey = $this->getPrimaryKey();
        if(isset($params[$primaryKey])){
            $M = $this->get($params[$primaryKey]);
            unset($params[$primaryKey]);
            foreach ($params as $k => $v){
                if($k == 'password'){
                    $v = md5($v);
                }
                $M->$k = $v;
            }
            $M->save();
            return $this->success('', $M);
        }else {
            return $this->fail(StatusCode::UPDATE_ERROR_NO_PRIMARY_KEY, '没有主键');
        }
    }

    private function fillParams($params){
        $M = new $this->model;
        foreach ($params as $k => $v){
            if($k != 'id'){
                $M->$k = $v;
            }
        }
        return $M;
    }

    protected function insertOrUpdate($params){
        $primaryKey = $this->getPrimaryKey();
        if(isset($params[$primaryKey]) && $params[$primaryKey]){
            return $this->updateInternal($params);
        }else {
            return $this->insertInternal($params);
        }
    }

    protected function getParams(Request $request){
        return $request->input('params');
    }

    public function page2($page, $pageSize, $filter, $order){
        $builder = $this->model->where('del_flag', '=', 0);
        if(!empty($filter)){
            $condition = $this->parser($filter);
            if(!empty($condition)){
                $condition = $condition['raw'];
            }
            foreach ($condition as $con){
                $builder = $builder->where($con['field'], $con['opt'], $con['param']);
            }
        }
        if(strlen($order) != 0){
            $od = explode(' ', $order);
            if(count($od) > 1){
                $builder->orderBy($od[0], $od[1]);
            }else {
                $builder->orderBy($od[0]);
            }
        }
        $count = $builder->count();
        $offset = ($page - 1) * $pageSize;
        $ls = $builder->offset($offset)->limit($pageSize)->get();
        foreach ($ls as $l){
            $this->invokeMyMagicMethod($l);
        }
        return [
            'success' => 'true',
            'count' => $count,
            'current_page' => $page,
            'page_size' => $pageSize,
            'filter' => $filter,
            'list' => $ls
        ];
    }

    public function page(Request $request){
        $page = $request->input('page', 1);
        $pageSize = $request->input('pageSize', 20);
        $filter = $request->input('filter', array());
        $order = $request->input('order', '');
        return $this->page2($page, $pageSize, $filter, $order);
    }

    public function select(Request $request){
        $from = ' from ' . $this->model->getTable();
        $page = $request->input('page', 1);
        $pageSize = $request->input('pageSize', 20);
        $filter = $request->input('filter', array());
        $order = $request->input('order', '');
        $where = ' where del_flag = 0';
        $condition = '';
        $p = array();
        if(!empty($filter)){
            $filterArr = $this->parser($filter);
            $p = $filterArr['params'];
            $conditionArr = $filterArr['condition'];
            $condition = implode(' and ', $conditionArr);
            $condition = ' and ' . $condition;
        }

        $orderBy = '';
        if(strlen($order) != 0){
            $orderBy = ' order by ' . $order;
        }
        $countSql = 'select count(*) as c ' . $from . $where . $condition;
        $count = DB::select($countSql, $p)[0]->c;
        $begin = ($page - 1) * $pageSize;
        $limit = ' limit ' . $begin . ', ' . $pageSize;
        $listSql = 'select * '  . $from . $where . $condition . $orderBy . $limit;
        $list = DB::select($listSql, $p);
        $res = [
            'success' => 'true',
            'count' => $count,
            'current_page' => $page,
            'page_size' => $pageSize,
            'filter' => $filter,
            'list' => $list,
        ];
        //return $this->success('', $res);
        return $res;
    }

    public function success($message = '操作成功', $data = []){
        if($data instanceof Model){
            $this->invokeMyMagicMethod($data);
        }else if ($data instanceof Collection){
            foreach ($data as $d){
                $this->invokeMyMagicMethod($d);
            }
        }
        return json_result($this->getBusinessLine(), StatusCode::OPERATE_SUCCESS, $message, $data);
    }

    public function fail($code, $message = '操作失败', $data = []){
        return json_result($this->getBusinessLine(), $code, $message, $data);
    }

    protected function invokeMyMagicMethod($m){
        $clazzName = get_class($m);
        $methods = get_class_methods($clazzName);
        foreach ($methods as $method){
            $f = substr($method, 0, 1);
            $s = substr($method, 1, 1);
            if($f == '_' && $s != '_'){
                $field = substr($method, 1);
                $m->$field = $m->$method();
            }
        }
    }

}