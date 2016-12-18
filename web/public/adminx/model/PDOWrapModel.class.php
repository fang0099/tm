<?php
class PDOWrapModel {

	private $dsn = NULL;
	private $pdo = NULL;
	public $prefix = NULL;
	
	private static $pdoWrap = NULL;
	
	/**
	 * construct
	 * @author Bean
	 */
	private function __construct() {
		$this->prefix = C('prefix');
		$this->dsn = C('dbms') . ":host=" . C('host') . ";dbname=" . C('dbname');
		try {
			$this->pdo = new PDO ( $this->dsn, C('user'), C('pwd'), array (
					PDO::ATTR_CASE => PDO::CASE_LOWER,
					PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES'utf8';" ,
					PDO::ATTR_EMULATE_PREPARES => false,//sql inject
			) );
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch ( PDOException $e ) {
			LibLogUtils::writeLog( "Error in " . $e->getLine () . ",Message:" . $e->getMessage ());
		}
	}

	public function __destruct(){
		$this->pdo = null;
	}

	public static function getInstance() {
		if (self::$pdoWrap == NULL) {
			self::$pdoWrap = new PDOWrapModel ();
		} 
		return self::$pdoWrap;
	}

	/**
	 * select records
	 */
	public function selectRecords($query, $param = NULL, $type = PDO::FETCH_ASSOC) {
		$instance = $this->pdo;
		try {
			if (defined('DEBUG') && DEBUG){
				LibLogUtils::writeLog("SQL=>".$query."\tParam=>".var_export($param,true));
				LibLogUtils::rememberLog($query."\tParam:".var_export($param,true),"ExecuteSQL");
			}
			$pre = $instance->prepare ( $query );
			$pre->execute ( $param );
			switch ($type) {
				case PDO::FETCH_ASSOC :
					$result = $pre->fetchAll ( PDO::FETCH_ASSOC );
					break;
				case PDO::FETCH_NUM :
					$result = $pre->fetchAll ( PDO::FETCH_NUM );
					break;
				case PDO::FETCH_OBJ :
					$result = $pre->fetchAll ( PDO::FETCH_OBJ );
					break;
				default :
					$result = $pre->fetchAll ( PDO::FETCH_BOTH );
					break;
			}
		} catch ( PDOException $e ) {
			LibLogUtils::writeLog( $query.":Error in " . $e->getLine () . ",Message:" . $e->getMessage ());
		}
		if(isset($result))
		{
			return $result;
		}
		else
		{
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
		$query = $this->makeSelectSql($table, $keys,"id=?",$order);
		$return = $this->selectRecords($query,array($id));
		if($return != null)
			return $return[0];
		else
			return null;

	}

	public function select($table,$keys,$condition,$param,$union=false,$order='',$begin=0,$size=0){
		$query = $this->makeSelectSql($table, $keys,$condition,$order,$begin,$size);
		$res = $this->selectRecords($query,$param);
		if($union){
			return $res[0];
		}else {
			return $res;
		}
	}


	/*
	 * insert
	 */

	private function insertRecordFromArray($query, $arrayParam) {
		$instance = $this->pdo;

		try {
			if (defined('DEBUG') && DEBUG){
				LibLogUtils::writeLog("SQL=>".$query."\tParam=>".var_export($arrayParam,true));
				LibLogUtils::rememberLog($query."\tParam:".var_export($arrayParam,true),"ExecuteSQL");
			}
			$pre = $instance->prepare ( $query );
			$i = $pre->execute ( $arrayParam );
			$id = $instance->lastInsertId();
			if($id == 0 ){
				return $i;
			}else {
				return $id;
			}
		} catch ( PDOException $e ) {
			LibLogUtils::writeLog( $query.":Error in " . $e->getLine () . ",Message:" . $e->getMessage ());
		}
	}

	public function insert($table,$associateParam){
		$param = array();
		$query = "insert into ".$this->prefix.$table." (";
		foreach($associateParam as $key=>$value){
			$query .= $key." , ";
			$param[] = $value;
		}
		$query = substr($query, 0,strlen($query)-2).") values (";
		foreach($associateParam as $value){
			$query .= "? , ";
		}
		$query = substr($query,0,strlen($query)-2).")";
		return $this->insertRecordFromArray($query, $param);
	}

	/*
	 * update
	 */
	public function updateRecordFromArray($query, $arrayParam = null) {
		$instance = $this->pdo;
		try {
			if (defined('DEBUG') && DEBUG){
				LibLogUtils::writeLog("SQL=>".$query."\tParam=>".var_export($arrayParam,true));
				LibLogUtils::rememberLog($query."\tParam:".var_export($arrayParam,true),"ExecuteSQL");
			}
			$pre = $instance->prepare ( $query );
			return $pre->execute ( $arrayParam );
		} catch ( PDOException $e ) {
			LibLogUtils::writeLog( $query.":Error in " . $e->getLine () . ",Message:" . $e->getMessage ());
		}
	}



	public function update($table,$condition,$param){
		$query = "update ".$this->prefix.$table." set ";
		$p = array();
		foreach($param as $key=>$value){
			$query .= $key."=? ,";
			$p[] = $value;
		}
		$query = substr($query,0,strlen($query)-2)." where ".$condition;
		return $this->updateRecordFromArray($query,$p);
	}

	/*
	 * delete
	 */
	public function deleteRecord($query, $param) {
		$instance = $this->pdo;
		try {
			if (defined('DEBUG') && DEBUG){
				LibLogUtils::writeLog("SQL=>".$query."\tParam=>".var_export($param,true));
				LibLogUtils::rememberLog($query."\tParam:".var_export($param,true),"ExecuteSQL");
			}
			$pre = $instance->prepare ( $query );
			return $pre->execute ( $param );
		} catch ( PDOException $e ) {
			LibLogUtils::writeLog( $query."Error in " . $e->getLine () . ",Message:" . $e->getMessage ());
		}
	}

	public function deleteById($table,$id){
		$instance = $this->pdo;
		$query = "delete from ".$this->prefix.$table." where id=?";
		return $this->deleteRecord($query, array($id));
	}

	public function delete($table,$condition,$param){
		$query = "delete from ".$this->prefix.$table." where ".$condition;
		return $this->deleteRecord($query, $param);
	}

	public function execute($query, $param = null){
		$instance = $this->pdo;
		try {
			if (defined('DEBUG') && DEBUG){
				LibLogUtils::writeLog("SQL=>".$query."\tParam=>".var_export($param,true));
				LibLogUtils::rememberLog($query."\tParam:".var_export($param,true),"ExecuteSQL");
			}
			$pre = $instance->prepare ( $query );
			return $pre->execute ($param);
		}catch (PDOException $e){
			LibLogUtils::writeLog( $query.":Error in " . $e->getLine () . ",Message:" . $e->getMessage ());
		}
	}

}

?>