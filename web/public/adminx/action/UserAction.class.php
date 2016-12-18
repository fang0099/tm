<?php
class UserAction extends Action{
	
	public function __construct(){
		parent::__construct();
	}
	
	public function reg(){
		$data = $_POST['params'];
		/*
		$checkcode = $_POST['checkcode'];
		if(!checkcode){
			echo json_encode(array('status'=>0, 'message'=>'验证码不正确'));
			exit();
		}
		*/
		if($_POST['pwd'] != $_POST['confirmpwd']){
			echo json_encode(array('status'=>0, 'message'=>'两次密码输入不一致'));
			exit();
		}
		$m = new Model('tvips');
		foreach ($data as $k=>$v){
			if($k == 'email' || $k=='username'){
				if(!$v){
					echo json_encode(array('status'=>0, 'message'=>'必填字段不能为空'));
					exit();
				}else {
					if($k == 'email'){
						$count = $m->select('select count(*) as count from tvips where email=\''.$v.'\'');
						if($count[0]['count'] > 0){
							echo json_encode(array('status'=>0, 'message'=>'此邮箱已被注册'));
							exit();
						}
					}
					if($k == 'username'){
						$count = $m->select('select count(*) as count from tvips where username=\''.$v.'\'');
						if($count[0]['count'] > 0){
							echo json_encode(array('status'=>0, 'message'=>'此用户名已被注册'));
							exit();
						}
					}
				}
			}
			$m->$k = $v;
		}
		if($_POST['pwd']){
			$m->pwd = md5($_POST['pwd']);
		}else {
			echo json_encode(array('status'=>0, 'message'=>'密码不能为空'));
			exit();
		}
		$m->pdate = date("y-m-d h:i:s", time());
		/*
		$housetype = $_POST['housetype'];
		$tmp = '';
		foreach ($housetype as $h){
			$tmp .= $h . ',';
		}
		$m->housetype = $tmp;
		$tmp = '';
		foreach ($_POST['housearea'] as $h){
			$tmp .= $h . ',';
		}
		$m->housearea = $tmp;
		*/
		$id = $m->add();
		$_SESSION['id'] = $id;
		foreach ($data as $k=>$v){
			$_SESSION[$k] = $v;
		}
		echo json_encode(array('status'=>1, 'message'=>'注册成功'));
		exit();
	}
	
	public function login(){
		$pwd = $_POST['pwd'];
		$username = $_POST['username'];
		$m = new Model();
		$user = $m->select('select * from tvips where username=?', array($username));
		if(!$user){
			echo json_encode(array('status'=>0, 'message'=>'没有这个用户'));
			exit();
		}
		$user = $user[0];
		if($user['pwd'] != md5($pwd)){
			echo json_encode(array('status'=>0, 'message'=>'密码不正确'));
			exit();
		}
		foreach ($user as $k=>$v){
			$_SESSION[$k] = $v;
		}
		echo json_encode(array('status'=>1, 'message'=>'登陆成功'));
		exit();
	}
	
	
	public function center(){
		$uid = $_SESSION['id'];
		if(!$uid){
			header("Location:index.php");
			exit();
		}
		$_SESSION['isadmin'] = '0';
		$m = new Model();
		$sales = $m->table('tsales')->selectAll();
		$this->assign('sales', $sales);
		$this->display('admin/sales.html');
	}
	
	
	
	
	public function alpwd(){
		
		$this->display('admin/alter-pwd-form.html');
	}
	
	public function modifypwd(){
		$oldpwd = $_POST['oldpwd'];
		$newpwd = $_POST['pwd'];
		$id = $_SESSION['id'];
		if(!$id){
			echo json_encode(array('status'=>'0', 'message'=>'未登陆'));
			exit();
		}
		if(md5($oldpwd) != $_SESSION['pwd']){
			echo json_encode(array('status'=>'0', 'message'=>'原密码不正确'));
			exit();
		}
		$m = new Model();
		$m->execute("update tvips set pwd='". md5($newpwd) ."' where id=".$id);
		$_SESSION['pwd'] = md5($newpwd);
		echo json_encode(array('status'=>'1', 'message'=>'修改成功'));
		exit();
	}
	
	
	public function logout(){
		$_SESSION = array();
		session_destroy();
		header('Location:index.php');
	}
	
	
	public function messageadd(){
		$data  = $_POST['param'];
		$m = new Model('tmessage');
		foreach ($data as $k=>$v){
			$m->$k = $v;
		}
		$m->pdate = date('Y-m-d');
		$m->add();
		echo json_encode(array('status'=>'1', 'message'=>'添加成功'));
		exit();
	}
	
}

?>