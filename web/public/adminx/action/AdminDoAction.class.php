<?php
class AdminDoAction extends Action {
	
	public function __construct() {
		parent::__construct ();
		$this->checkAdmin();
	}
	
	public function update(){
		$model = $_POST['model'];
		$modelData = $this->getModelData($model);
		$table = $modelData['table'];
		$primaryKeys = $modelData['primaryKey'];
		$unescape = $modelData['unescape'] ?$modelData['unescape'] : array() ;
		$data = $_POST['params'];
		//check
		$check = $modelData['check'];
		if($check){
			foreach ($check as $k => $v){
				$columnName = '';
				foreach ($modelData['columns'] as $column){
					if($column['column'] == $k){
						$columnName = $column['columnName'];
						break;
					}
				}
				$pass = $this->$v($table, $k, $columnName, $data[$k], $data['id']);
				if($pass['status'] == '0'){
					echo json_encode($pass); 
					exit();
				}
			}
		}
		$isAdd = true;
		foreach ($primaryKeys as $pk){
			if(isset($data, $pk) && $data[$pk]){
				$isAdd = false;
			}
		}
		$m = new Model($table);
		if($isAdd){
			foreach ($data as $k => $v){
				if(in_array($k, $primaryKeys) || !$v){
					continue;
				}
				if(in_array($k, $unescape)){
					$v = unescape($v);
				}
				$m->$k = $v;
			}
			/*
			//处理文件上传
			if($_FILES){
				foreach ($_FILES as $key=>$value){
					if ((($value ["type"] == "image/gif") || ($value ["type"] == "image/jpeg") || ($value  ["type"] == "image/pjpeg") || ($value  ["type"] == "image/png") || ($value  ["type"] == "image/x-png"))) {
						if ($value ["error"] > 0) {
						} else {
							$pos = strrpos ( $value ['name'], "." );
							$prefix = substr ( $value ["name"], $pos + 1 );
								
							$img_name = date ( "YmdHis" ) . "." . $prefix;
							$url = "upload/" . $img_name;
							$src = ROOT."upload/" . $img_name;
							move_uploaded_file ( $value ["tmp_name"], $src );
						}
					} else {
						$url = "upload/" . 'default.jpg';
					}
					$m->$key = $url;
				}
			}
			*/
			$m->add();
		}else {
			$query = "update " . $table . " set ";
			/*
			 * 由前台一步上传处理
			//处理文件上传
			if($_FILES){
				foreach ($_FILES as $key=>$value){
					if ((($value ["type"] == "image/gif") || ($value ["type"] == "image/jpeg") || ($value  ["type"] == "image/pjpeg") || ($value  ["type"] == "image/png") || ($value  ["type"] == "image/x-png"))) {
						if ($value ["error"] > 0) {
						} else {
							$pos = strrpos ( $value ['name'], "." );
							$prefix = substr ( $value ["name"], $pos + 1 );
								
							$img_name = date ( "YmdHis" ) . "." . $prefix;
							$url = "upload/" . $img_name;
							$src = ROOT."upload/" . $img_name;
							move_uploaded_file ( $value ["tmp_name"], $src );
						}
					} else {
						$url = "upload/" . 'default.jpg';
					}
					$query .= $key . "='$url'";
				}
			}
			*/
			$params = array();
			foreach ($data as $k => $v){
				if(in_array($k, $primaryKeys) || !$v){
					continue;
				}
				if(in_array($k, $unescape)){
					$v = unescape($v);
				}
				//$query .= $k . "='" . $v . "' , ";
				if($k == 'pwd' && $v == '#NO_SET_PWD#'){
					continue;
				}
				$query .= $k . "=? , ";
				$params[] = $v;
			}
			$query = substr($query, 0 , -2);
			$where = " where ";
			foreach( $primaryKeys as $p){
				$where .= $p . "='" .$data[$p] . "' and ";
			}
			$where = substr($where, 0, -5);
			$query .= $where;
			$m->execute($query, $params);
		}
		echo json_encode(array('status'=>1, 'message' => '操作成功'));
		exit();
	}
	
	public function updateu(){
		$params = $_POST['params'];
		$model = $_POST['model'];
		$mdata = $this->getModelData($model);
		$table = $mdata['table'];
		$pics = $_POST['pics'];
		if($params['id']){
			//修改
			if(!$params['face']){
				$params['face'] = $_POST['pics'][0];
			}
			$m = new Model();
			$m->table($table);
			foreach ($params as $k => $v){
				if($v){
					$m->$k = $v;
				}
			}
			$m->updateById();
			$id = $m->id;
			$m->execute('delete from tpics where tname=? and pid=?', array($table, $m->id));
			foreach ($pics as $pic){
				$m->table('tpics');
				$m->tname = $table;
				$m->pic = $pic;
				$m->pid = $id;
				$m->add();
			}
		}else {
			//添加
			if(!$params['face']){
				$params['face'] = $_POST['pics'][0];
			}
			$m = new Model();
			$m->table($table);
			foreach ($params as $k => $v){
				if($v){
					$m->$k = $v;
				}
			}
			$id = $m->add();
			foreach ($pics as $pic){
				$m->table('tpics');
				$m->tname = $table;
				$m->pic = $pic;
				$m->pid = $id;
				$m->add();
			}
		}
	}
	
	public function test(){
		$name = '';
		$url = '';
		foreach ( $_FILES as $key => $value ) {
			$name = $key;
			if ((($value ["type"] == "image/gif") || ($value ["type"] == "image/jpeg") || ($value ["type"] == "image/pjpeg") || ($value ["type"] == "image/png") || ($value ["type"] == "image/x-png") || ($value['type'] == "application/pdf"))) {
				if ($value ["error"] > 0) {
				} else {
					$pos = strrpos ( $value ['name'], "." );
					$prefix = substr ( $value ["name"], $pos + 1 );
					
					$img_name = date ( "YmdHis" ) . "." . $prefix;
					$url = "upload/" . $img_name;
					$src = ROOT . "upload/" . $img_name;
					$tmp = dirname(ROOT) . '/upload/' . $img_name;
					move_uploaded_file ( $value ["tmp_name"], $src );
					copy($src, $tmp);
				}
			} else {
				$url = "upload/" . 'default.jpg';
			}
		}
		echo json_encode(array('name'=>$name, 'path' => $url));
		exit();
	}
	
	public function batchDelete(){
		$ids = $_GET['ids'];
		$model = $_GET['model'];
		$data = $this->getModelData($model);
		$ids .= '0';
		$table = $data['table'];
		$query = "delete from " . $table . " where id in (" . $ids . ")";
		$m = new Model();
		$m->execute($query);
		echo json_encode(array('status'=>1));
		exit();
	}
	
	
	public function houseadd(){
		$m = new Model('thouse');
		$data = $_POST['params'];
		$id = '';
		foreach ($data as $k=>$v){
			if($k == 'id' && $v){
				$id = $v;
			}
			if($k == 'cdate'){
				$v .= '-00'; 
			}
			$m->$k = $v;
		}
		$m->updatedate = date("Y-m-d");
		if($id){
			$m->updateById();
		}else {
			$id = $m->add();
		}
		$m->execute("delete from thousepic where houseid=".$id);
		$pics = $_POST['pics'];
		foreach ($pics as $p){
			$m->table('thousepic');
			$m->houseid = $id;
			$m->pic = $p;
			$m->add();
		}
		echo json_encode(array('status'=>1, 'message'=>'操作成功'));
	}
	
	public function adminalterpwd(){
		$id = $_POST['id'];
		$pwd = $_POST['pwd'];
		if(!$pwd){
			echo json_encode(array('status'=>0, 'message'=>'新密码不能为空'));
			exit();
		}
		$m = new Model();
		$m->execute("update tusers set pwd='" . md5($pwd) . "' where id=".$id);
		echo json_encode(array('status'=>1, 'message'=>'操作成功'));
		exit();
	}
	
	public function deletevip(){
		$id = $this->getNumber('id');
		$m = new Model();
		$user = $m->table('tusers')->selectById($id);
		if($user['isadmin'] != '1'){
			$m->execute('delete from tusers where id='.$id);
		}
		echo json_encode(array('status'=>1, 'message'=>'操作成功'));
		exit();
	}
	
	
	private function checkUnique($table, $column, $columnName, $value, $id){
		$params = array();
		$params[] = $value;
		$query = "select count(*) as count from " . $table . " where " . $column . "=?";
		if($id){
			$query .= " and id<>?" ;
			$params[] = $id; 
		}
		$m = new Model();
		$count = $m->select($query, $params);
		if($count[0]['count'] == 0){
			return array('status'=>'1', 'message'=>'');
		}
		return array('status'=>'0', 'message'=> $columnName . '已存在');
	}
	
}

?>