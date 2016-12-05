<?php
/**
 * Created by PhpStorm.
 * User: bean
 * Date: 16-12-3
 * Time: 上午9:08
 */

namespace App\Repositories;


use App\StatusCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Log;

abstract class BaseRepository
{

    protected $model;

    protected function get($primaryKey)
    {

        Log::debug('get by primary key. table is ' .
            $this->model->getTable() .
            '. primary key is ' . $this->getPrimaryKey() . ' : ' . $primaryKey);

        return $this->model->find($primaryKey);
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
            $this->deleteById($id);
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

    protected function insertInternal($params)
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
                $M->$k = $v;
            }
            $M->save();
            return $this->success();
        }else {
            return $this->fail(StatusCode::UPDATE_ERROR_NO_PRIMARY_KEY, '没有主键');
        }
    }

    private function fillParams($params){
        $M = new $this->model;
        foreach ($params as $k => $v){
            $M->$k = $v;
        }
        return $M;
    }

    protected function insertOrUpdate($params){
        $primaryKey = $this->getPrimaryKey();
        if(isset($params[$primaryKey])){
            return $this->updateInternal($params);
        }else {
            return $this->insertInternal($params);
        }
    }

    protected function getParams(Request $request){
        return $request->input('params');
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
        if($filter != null && !empty($filter)){
            foreach ($filter as $k => $v){
                $condition .= ' and ' . $k . " like ? ";
                $p[] = '%'. $v . '%';
            }
        }
        /*
        if(strlen($condition) > 0){
            $condition = substr($condition, 4);
        }
        */
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
            'count' => $count,
            'current_page' => $page,
            'page_size' => $pageSize,
            'filter' => $filter,
            'list' => $list,
        ];
        return $this->success('', $res);
    }

    public function success($message = '操作成功', $data = []){
        return json_result($this->getBusinessLine(), StatusCode::OPERATE_SUCCESS, $message, $data);
    }

    public function fail($code, $message = '操作失败', $data = []){
        return json_result($this->getBusinessLine(), $code, $message, $data);
    }

}