<?php
class Model {
	private $table;
	protected $data = array ();
	protected $fields = array ();
	protected $param = array ();
	protected $condition;
	protected $order;
	protected $union;
	protected $begin;
	protected $size;
	protected $pdoWrap;
	
	
	public function __construct($table='') {
		$this->table = $table;
		$this->condition = "1";
		$this->order = "";
		$this->union = false;
		$this->begin = 0;
		$this->size = 0;
		if(C('driver') == 'pdo'){
			$this->pdoWrap = PDOWrapModel::getInstance ();
		}else if(C('driver') == 'mysql'){
			$this->pdoWrap = MysqlWrapModel::getInstance();
		}
		
	}
	
	public function __destruct(){
		$this->pdoWrap = null;
	}
	
	public function __set($key, $value) {
		$this->data [$key] = $value;
	}
	public function __get($key) {
		return isset ( $this->data [$key] ) ? $this->data [$key] : null;
	}
	public function __isset($key) {
		return isset ( $this->data [$key] );
	}
	/**
	 * 
	 * @param string $table
	 * @return Model
	 * @author Bean
	 */
	public function table($table){
		$this->clean();
		$this->table = $table;
		return $this;
	}
	
	/**
	 * sql查询条件函数
	 * @param string $condition 查询条件（不含where）
	 * @author Bean
	 */
	public function where($condition) {
		$this->condition = $condition;
		return $this;
	}
	
	/**
	 * sql排序规则函数
	 * @param string $order 排序规则（不含order by）
	 * @author Bean
	 */
	public function orderBy($order) {
		$this->order = $order;
		return $this;
	}
	
	/**
	 * sql返回的是否是一行数据,只有在确定的情况下才设置为true
	 * @param bool $bool 
	 * @author Bean
	 */
	public function isUnion($bool) {
		$this->union = $bool;
		return $this;
	}
	
	/**
	 * sql返回的列数
	 * @param array $fields 数据库返回的列数
	 * @author Bean
	 */
	public function fields($fields) {
		$this->fields = $fields;
		return $this;
	}
	
	/**
	 * sql查询where语句中的参数
	 * @param array $param 
	 * @author Bean
	 */
	public function param($param) {
		$this->param = $param;
		return $this;
	}
	
	/**
	 * sql查询分页
	 * @param int $begin
	 * @param int $size
	 * @author Bean
	 */
	public function limit($begin, $size) {
		$this->begin = $begin;
		$this->size = $size;
		return $this;
	}
	
	/**
	 * 查询所有
	 * @author Bean
	 */
	public function selectAll() {
		return $this->pdoWrap->selectAll ( $this->table );
	}
	
	public function getCount(){
		return count($this->fetch());
	}
	
	/**
	 * 根据主键id查询
	 * @author Bean
	 */
	public function selectById($id) {
		return $this->pdoWrap->selectById ( $this->table, $this->fields, $id , $this->order );
	}
	
	/**
	 * 综合查询
	 * @author Bean
	 */
	public function fetch() {
		return $this->pdoWrap->select ( $this->table, $this->fields, $this->condition, $this->param, $this->union, $this->order, $this->begin, $this->size );
	}
	
	/**
	 * 暴露出直接sql查询
	 * @param string $query
	 * @param array $param
	 * @author Bean
	 */
	public function select($query,$param=null) {
		return $res =  $this->pdoWrap->selectRecords ($query,$param);
	}
	
	/**
	 * 插入一条语句
	 * @author Bean
	 */
	public function add(){
		return $this->pdoWrap->insert($this->table,$this->data);
	}
	
	/**
	 * 更新操作
	 * update的时候where条件中的参数放在data的最后
	 * @author Bean
	 */
	public function update(){
		return $this->pdoWrap->update($this->table,$this->condition,$this->data);
	}
	
	public function updateById(){
		$this->where('id='.$this->data['id']);
		return $this->update();
	}
	
	/**
	 * 通过删除操作
	 * @author Bean
	 */
	public function delete(){
		return $this->pdoWrap->delete($this->table,$this->condition,$this->param);
	}
	
	/**
	 * 根据id删除
	 * @author Bean
	 */
	public function deleteById($id){
		return $this->pdoWrap->deleteById($this->table,$id);
	}
	
	
	public function execute($query, $param = NULL){
		return $this->pdoWrap->execute($query, $param);
	}
	
	/**
	 * clean
	 */
	protected function clean(){
		$this->condition = "1";
		$this->order = "";
		$this->union = false;
		$this->begin = 0;
		$this->size = 0;
		$this->data = array();
		$this->fields = array();
		$this->param = array();
	}
	
}

?>