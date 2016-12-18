<?php
class MysqlWrapModel {
	private $prefix;
	private $link;
	private static $instance;
	
	private function __construct(){
		$this->prefix = C('prefix');
		$dbuser = C('user');
		$pwd = C('pwd');
		$dbname = C('dbname');
		$host = C('host');
		
		$this->link = mysql_connect($host,$dbuser,$pwd);
		if(!$this->link){
			$this->getError();
		}
		$flag = mysql_select_db($dbname);
		if(!$flag){
			$this->getError();
		}
		mysql_query('set names utf8');
	}
	
	public static function getInstance(){
		if(self::$instance == null){
			self::$instance = new MysqlWrapModel();
		}
		return self::$instance;
	}
	
	public function selectRecords($query){
		$result = array();
		$res = mysql_query($query,$this->link) or $this->getError();
		$this->debugInfo($query);
		while($r = mysql_fetch_assoc($res)){
			$result[] = $r; 
		}
		$this->free($res);
		if(!empty($result)){
			return $result;
		}else {
			return null;
		}
	}
	
	/**
	 * @param array $keys
	 * @author Bean
	 */
	private function makeSelectSql($table,$keys,$condition='',$order='',$begin=0,$size=0){
		if((count($keys) == 1 && $keys[0] == "*") || empty($keys)){
			$query = "select * from ".$this->prefix.$table;
		}else {
			$v = implode(",", $keys);
			$query = "select ".$v." from ".$this->prefix.$table;
		}
		if($condition==''){
			;
		}else {
			$query .= " where ".$condition;
		}
		if($order == ''){
			;
		}else {
			$query .= " order by ".$order;
		}
		if($begin==0 && $size == 0){
			;
		}else {
			$query .= " limit ".$begin." , ".$size;
		}
		return $query;
	}
	
	public function selectAll($table){
		$query = $this->makeSelectSql($table, array("*"));
		return $this->selectRecords($query);
	}
	
	public function selectById($table,$keys,$id,$order=''){
		$query = $this->makeSelectSql($table, $keys,"id=".$id,$order);
		$return = $this->selectRecords($query);
		if($return != null)
			return $return[0];
		else
			return null;
	
	}
	
	public function select($table,$keys,$condition,$param,$union=false,$order='',$begin=0,$size=0){
		$query = $this->makeSelectSql($table, $keys,$condition,$order,$begin,$size);
		$res = $this->selectRecords($query);
		if($union){
			return $res[0];
		}else {
			return $res;
		}
	}
	
	
	/*
	 * delete
	*/
	public function deleteRecord($query) {
		return $this->execute($query);
	}
	
	public function deleteById($table,$id){
		$query = "delete from ".$this->prefix.$table." where id=".$id;
		return $this->deleteRecord($query);
	}
	
	public function delete($table,$condition,$param){
		$query = "delete from ".$this->prefix.$table." where ".$condition;
		return $this->deleteRecord($query);
	}
	
	
	/*
	 * update
	*/
	public function updateRecordFromArray($query, $arrayParam = null) {
		return $this->execute($query);
	}
	
	public function update($table,$condition,$param){
		$query = "update ".$this->prefix.$table." set ";
		foreach($param as $key=>$value){
			$query .= $key."='$value' ,";
		}
		$query = substr($query,0,strlen($query)-2)." where ".$condition;
		return $this->updateRecordFromArray($query);
	}
	
	
	/*
	 * insert
	*/
	
	private function insertRecordFromArray($query) {
		$flag = $this->execute($query);
		if($flag){
			return mysql_insert_id($this->link);
		}else {
			return 0;
		}
	}
	
	public function insert($table,$associateParam){
		$param = array();
		$query = "insert into ".$this->prefix.$table." (";
		foreach($associateParam as $key=>$value){
			$query .= $key." , ";
		}
		$query = substr($query, 0,strlen($query)-2).") values (";
		foreach($associateParam as $value){
			$query .= "'$value' , ";
			
		}
		$query = substr($query,0,strlen($query)-2).")";
		return $this->insertRecordFromArray($query);
	}
	
	
	
	
	public function execute($query, $param=NULL){
		$this->debugInfo($query);
		$flag = mysql_query($query,$this->link) or $this->getError();
		return $flag;
	}
	
	public function __destruct(){
		mysql_close();
	}
	
	private function free($res){
		mysql_free_result($res);
	}
	
	private function getError(){
		if(defined('DEBUG') && DEBUG){
			LibLogUtils::rememberLog(mysql_error(),'mysql_error');
		}
		LibLogUtils::writeLog(mysql_error());
	}
	
	private function debugInfo($query){
		if(defined('DEBUG') && DEBUG){
			LibLogUtils::rememberLog($query,'ExecuteSQL');
			LibLogUtils::writeLog($query);
		}
	}
	
}

?>