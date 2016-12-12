<?php

class KeepEntity{
	public $table;
	public $primaryKey;
	public $dataRow;
	public $lastUpdateTime;
	public $updateInterval;
	
	public function __construct(){
		$this->updateInterval = 6 * 10;
	}
	
	public function needUpdate(){
		return ($this->lastUpdateTime + $this->updateInterval) < time() ? true : false; 
	}
	
	public function update(){
		$this->lastUpdateTime = time();
	}
}


class KeepModel {
	private $data = array();
	public  $cacheModel;
	private static $instance;
	
	private function __construct(){
	}
	/*
	public static function getInstance(){
		if(self::$instance != null){
			return self::$instance;
		}else {
			self::$instance = new KeepModel();
			return self::$instance;
		}
	}
	*/
	public function setCacheConfig($key,$value){
		$this->cacheModel->setCacheConfig($key, $value);
	}
	
	public function keep(){
		$this->cacheModel->set('__keepmodel__', $this, 3600 * 100);
	}
	
	public static function getInstance($cacheType=null){
		if(self::$instance == null){
			$cache = new CacheModel();
			if($cacheType != null){
				$cache->setCacheConfig('storage', $cacheType);
			}
			$km = $cache->get('__keepmodel__');
			if($km == null){
				$km = new KeepModel();
				$km->cacheModel = $cache;
				$cache->set('__keepmodel__', $km, 3600 * 100);
			}
			self::$instance = $km;
		}
		return self::$instance;
	}
	
	public function getAllData(){
		return $this->data;
	}
	
	public function setData($table,$primaryKey,$key,$dataRow,$updateInterval=null){
		$keepEntity = $this->data[$key];
		if($keepEntity != null){
			$keepEntity->dataRow = $dataRow;
		}else {
			$keepEntity = new KeepEntity();
			$keepEntity->dataRow = $dataRow;
			$keepEntity->lastUpdateTime = time();
		}
		if($updateInterval != null){
			$keepEntity->updateInterval = $updateInterval;
		}
		$keepEntity->table = $table;
		$keepEntity->primaryKey = $primaryKey;
		$this->data[$key] = $keepEntity;
		$this->keep();
	}
	
	public function getData($key){
		echo '<pre>';
		var_dump($this->data);
		echo '</pre>';
		return $this->data[$key]->dataRow;
	}
	
	public function update($key=null){
		if($key == null){
			foreach ($this->data as $keepEntity){
				if($keepEntity->needUpdate()){
					$dataRow = $keepEntity->dataRow;
					$this->cacheModel->table($keepEntity->table);
					foreach ($dataRow as $k=>$v){
						$this->cacheModel->$k = $v;
					}
					$this->cacheModel->where("$keepEntity->primaryKey='".$dataRow[$keepEntity->primaryKey]."'")->update();
					$keepEntity->update();
					$this->data[$key] = $keepEntity;
				}
			}
		}else {
			$keepEntity = $this->data[$key];
			if($keepEntity->needUpdate()){
				$dataRow = $keepEntity->dataRow;
				$this->cacheModel->table($keepEntity->table);
				foreach ($dataRow as $k=>$v){
					$this->cacheModel->$k = $v;
				}
				$this->cacheModel->where("$keepEntity->primaryKey='".$dataRow[$keepEntity->primaryKey]."'")->update();
				$keepEntity->update();
				$this->data[$key] = $keepEntity;
			}
		}		
		$this->keep();
	}
	
	/**
	 * 
	 * @param string $key
	 * @param array $data array(column=>value)
	 * @author Bean
	 */
	public function columnAdd($key,$data){
		$dataRow = $this->data[$key]->dataRow;
		foreach ($data as $column=>$value){
			$dataRow[$column] += $value;
		}
		$this->data[$key]->dataRow = $dataRow;
		$this->keep(); 
	}
	
	
	
	
	
	
	
	
	
}

?>