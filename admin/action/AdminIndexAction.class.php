<?php
class AdminIndexAction extends Action {
	public function __construct() {
		parent::__construct ();
		$this->checkAdmin();
	}
	
	public function index(){
		$this->display('admin/index.html');
	}
	
	public function ls(){
		$model = $_GET['model'];
		$data = file_get_contents(ROOT.'framework/mapping-data/' .$model . '.json');
		$data = json_decode($data, true);
		$type = $_GET['type'];
		if($type == 'modal'){
			$modal = new Modal();
			$modal->model = $model;
			$modalHtml = $modal->render();
			$this->assign('modal', $modalHtml);
		}
		$sort = $data['sort'] ? $data['sort'] : 'id';
		$query = "select " ;
		$aoColumns = "";
		$selectColumns = array();
		foreach( $data['columns'] as $column){
			if($column['showInTable'] == 'yes'){
				$query .= $column['column'] . ", ";
				$aoColumns .= 'null ,';
				if($column['type'] == 'select'){
					$selectColumns[] = $column;
				}
			}
		}
		$query .= " id from " . $data['table'] ;
		if($data['filter']){
			$query .= ' where ' . $data['filter'];
		}
		$query .= ' order by ' . $sort . ' desc ';
		$m = new Model();
		$list = $m->select($query);
		$resList = array();
		if(!empty($selectColumns)){
			foreach($selectColumns as $column){
				$sdata = $column['data'];
				$tableColumn = $column['tableColumn'];
				$columnName = $column['column'];
				if(!tableColumn){
					continue;
				}
				if(is_array($sdata)){
					foreach ($list as $l){
						foreach ($sdata as $d){
							foreach ($d as $k => $v){
								if($k == $l[$columnName]){
									$l[$tableColumn] = $v;
								}
							}
						}
						$resList[] = $l;
					}
				}else {
					$dataProvider = new SqlDataProvider();
					$dataProvider->param = $sdata;
					$sdata = $dataProvider->getData();
					foreach ($list as $l){
						foreach ($sdata as  $k => $v){
							if ($v == $l [$columnName]) {
								$l[$tableColumn] = $k;
							}
						}
						$resList[] = $l;
					}
				}
			}
		}else {
			$resList = $list;
		}
		$this->assign('list', $resList);
		$this->assign('aoColumns', $aoColumns);
		$this->assign('data', $data);
		$this->assign('model', $model);
		$this->display('admin/list.html');
	}
	
	public function form(){
		$model = $_GET['model'];
		$data = file_get_contents(ROOT.'framework/mapping-data/' .$model . '.json');
		$data = json_decode($data, true);
		$table = $data['table'];
		$action = '添加' . $data['name'];
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$m = new Model($table);
			$res = $m->selectById($id);
			$action = '修改' . $data['name'];
			$this->assign('res_json', json_encode($res));
		}
		$form = new Form();
		$form->model = $model;
		$formHtml = $form->render();

		$this->assign('action', $action);
		$this->assign('form', $formHtml);
		$this->display('admin/form.html');
	} 
	
	public function getData(){
		$id = $_GET['id'];
		$model = $_GET['model'];
		$data = file_get_contents(ROOT.'framework/mapping-data/' .$model . '.json');
		$data = json_decode($data, true);
		$query = "select ";
		foreach($data['columns'] as $column){
			if($column['column'] == 'pwd'){
				continue;
			}
			$query .= $column['column'] . " as `" . $column['controlName'] . '`, ';
		}
		$query = substr($query, 0, -2);
		$query .= " from " . $data['table'];
		$query .= " where id=?";
		$m = new Model();
		$res = $m->select($query, array($id));
		$res = $res[0];
		if($model == 'user'){
			$res['params[pwd]'] = '#NO_SET_PWD#';
		}
		echo json_encode($res);
		exit();
	}
	
	public function lsl(){
		$model = $_GET['model'];
		$data = file_get_contents(ROOT.'framework/mapping-data/' .$model . '.json');
		$data = json_decode($data, true);
		$type = $_GET['type'];
		if($type == 'modal'){
			$modal = new Modal();
			$modal->model = $model;
			$modalHtml = $modal->render();
			$this->assign('modal', $modalHtml);
		}
		$sort = $data['sort'] ? $data['sort'] : 'id';
		$query = "select " ;
		$aoColumns = "";
		$selectColumns = array();
		foreach( $data['columns'] as $column){
			if($column['showInTable'] == 'yes'){
				$query .= $column['column'] . ", ";
				$aoColumns .= 'null ,';
				if($column['type'] == 'select'){
					$selectColumns[] = $column;
				}
			}
		}
		$query .= " id from " . $data['table'] ;
		if($data['filter']){
			$query .= ' where ' . $data['filter'];
		}
		$query .= ' order by ' . $sort . ' desc ';
		$m = new Model();
		$list = $m->select($query);
		$resList = array();
		if(!empty($selectColumns)){
			foreach($selectColumns as $column){
				$sdata = $column['data'];
				$tableColumn = $column['tableColumn'];
				$columnName = $column['column'];
				if(!tableColumn){
					continue;
				}
				if(is_array($sdata)){
					foreach ($list as $l){
						foreach ($sdata as $d){
							foreach ($d as $k => $v){
								if($k == $l[$columnName]){
									$l[$tableColumn] = $v;
								}
							}
						}
						$resList[] = $l;
					}
				}else {
					$dataProvider = new SqlDataProvider();
					$dataProvider->param = $sdata;
					$sdata = $dataProvider->getData();
					foreach ($list as $l){
						foreach ($sdata as  $k => $v){
							if ($v == $l [$columnName]) {
								$l[$tableColumn] = $k;
							}
						}
						$resList[] = $l;
					}
				}
			}
		}else {
			$resList = $list;
		}
		$this->assign('list', $resList);
		$this->assign('aoColumns', $aoColumns);
		$this->assign('data', $data);
		$this->assign('model', $model);
		$this->display('admin/list2.html');
	}
	
	public function formf(){
		$model = $_GET['model'];
		$m = new Model();
		$citys = $m->table('tcity')->selectAll();
		$this->assign('citys', $citys);
		$mdata = $this->getModelData($model);
		$table = $mdata['table'];
		$id = $this->getNumber('id');
		if($id){
			$data = $m->table($table)->selectById($id);
			$pics = $m->select("select * from tpics where pid=$id and tname='$table'");
			$data['pics'] = $pics;
			$this->assign('json', json_encode($data));
		}
		$this->display('admin/'. $model . '-form.html');
	}
	
	public function get(){
		$model = $_GET['model'];
		$mdata = $this->getModelData($model);
		$table = $mdata['table'];
		$id = $this->getNumber('id');
		$m = new Model();
		$res = $m->table($table)->selectById($id);
		$pics = $m->select("select * from tpics where pid=$id and tname='$table'");
		$res['pics'] = $pics;
		echo json_encode($res);
		exit();
	}
	
	public function messagels(){
		$m = new Model();
		$query = "select tmessage.* , tmcategory.name as mcname from tmessage ".
					" left join tmcategory on tmessage.mcategory=tmcategory.id ";
		$messages = $m->select($query);
		$this->assign('list', $messages);
		$this->display('admin/message-list.html');
	}
	
	
	public function showmessage(){
		$id = $this->getNumber('id');
		$m = new Model();
		$message = $m->table('tmessage')->selectById($id);
		$this->assign('message', json_encode($message));
		
		$mcategory = $m->table('tmcategory')->selectAll();
		$budge = $m->table('tbudge')->selectAll();
		$area = $m->select('select * from tarea where pid>1');
		$category = $m->table('tcategory')->selectAll();
		$refer = $m->table('trefer')->selectAll();
		
		$this->assign('mcategory', $mcategory);
		$this->assign('budge', $budge);
		$this->assign('area', $area);
		$this->assign('category', $category);
		$this->assign('refer', $refer);
		
		$this->display('admin/message-detail.html');
	}
}

?>