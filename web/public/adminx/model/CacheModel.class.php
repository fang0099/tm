<?php
class CacheModel {
	
	private $model;
	private $cache;
	private $cacheConfig;
	
	public function __construct(){
		$this->model = new Model();
		$this->cacheConfig = array('storage'=>'files','path' => ROOT.'cache');
		$this->newCache();
	}
	
	public function __set($key, $value) {
		$this->model->$key = $value;
	}
	public function __get($key) {
		return $this->model->$key;
	}
	
	public function setCacheConfig($key,$value){
		$this->cacheConfig[$key] = $value;
		$this->newCache();
	}
	
	private function newCache(){
		$this->cache = null;
		phpFastCache::setup($this->cacheConfig);
		$this->cache = new phpFastCache();
	}
	
	public function __call($name,$param){
		$this->model->$name($param[0]);
		return $this;
	}
	
	
	/**
	 * sql查询分页
	 * @param int $begin
	 * @param int $size
	 * @author Bean
	 */
	public function limit($begin, $size) {
		$this->model->limit($begin, $size);
		return $this;
	}
	
	
	/**
	 * 暴露出直接sql查询
	 * @param string $query
	 * @param array $param
	 * @author Bean
	 */
	public function select($query,$param=null,$key=null,$time=null) {
		if($key!=null){
			$res = $this->cache->get($key);
			if($res == null){
				$res = $this->model->select($query,$param);
				if($time != null){
					$this->cache->set($key,$res,$time);
				}else {
					$this->cache->set($key,$res);
				}
			}
		}else {
			$res = $this->model->select($query,$param);
		}
		return $res;
	}
	
	/**
	 * 查询所有
	 * @author Bean
	 */
	public function selectAll($key=null,$time=null) {
		if($key!=null){
			$res = $this->cache->get($key);
			if($res == null){
				$res = $this->model->selectAll();
				if($time != null){
					$this->cache->set($key,$res,$time);
				}else {
					$this->cache->set($key,$res);
				}
			}
		}else {
			$res = $this->model->selectAll();
		}
		return $res;
	}
	
	public function getCount($key=null,$time=null){
		if($key!=null){
			$res = $this->cache->get($key);
			if($res == null){
				$res = $this->model->getCount();
				if($time != null){
					$this->cache->set($key,$res,$time);
				}else {
					$this->cache->set($key,$res);
				}
			}
		}else {
			$res = $this->model->getCount();
		}
		return $res;
	}
	
	/**
	 * 根据主键id查询
	 * @author Bean
	 */
	public function selectById($id,$key=null,$time=null) {
		if($key!=null){
			$res = $this->cache->get($key);
			if($res == null){
				$res = $this->model->selectById($id);
				if($time != null){
					$this->cache->set($key,$res,$time);
				}else {
					$this->cache->set($key,$res);
				}
			}
		}else {
			$res = $this->model->selectById($id);
		}
		return $res;
	}
	
	/**
	 * 综合查询
	 * @author Bean
	 */
	public function fetch($key=null,$time=null) {
		if($key!=null){
			$res = $this->cache->get($key);
			if($res == null){
				$res = $this->model->fetch();
				if($time != null){
					$this->cache->set($key,$res,$time);
				}else {
					$this->cache->set($key,$res);
				}
			}
		}else {
			$res = $this->model->fetch();
		}
		return $res;
	}
	
	/**
	 * 插入一条语句
	 * @author Bean
	 */
	public function add(){
		return $this->model->add();
	}
	
	/**
	 * 更新操作
	 * update的时候where条件中的参数放在data的最后
	 * @author Bean
	 */
	public function update(){
		return $this->model->update();
	}
	
	public function updateById(){
		return $this->updateById();
	}
	
	/**
	 * database删除操作
	 * @author Bean
	 */
	public function delete(){
		return $this->model->delete();
	}
	
	/**
	 * database根据id删除
	 * @author Bean
	 */
	public function deleteById($id){
		return $this->model->deleteById($id);
	}
	
	public function set($keyword,$value,$time){
		$this->cache->set($keyword,$value,$time);
	}
	
	public function get($keyword){
		return $this->cache->get($keyword);
	}
	
}

?>