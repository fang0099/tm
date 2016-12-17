<?php
class AdminUserAction extends Action {
	
	public function __construct(){
		parent::__construct();
	}
	
	public function login(){
		$this->display('admin/login.html');
	}
	
	public function dologin(){
		$email = $_POST['username'];
		$pwd = $_POST['pwd'];
		
		$m = new Model();
		$user = $m->select('select * from users where username=?', array($email));
		if(!$user){
			echo json_encode(array('status'=>0, 'message'=>'没有这个用户'));
			exit();
		}
		$user = $user[0];
		if($user['password'] != md5($pwd)){
			echo json_encode(array('status'=>0, 'message'=>'密码不正确'));
			exit();
		}
		foreach ($user as $k=>$v){
			$_SESSION[$k] = $v;
		}
		$_SESSION['isadmin'] = '1';
		echo json_encode(array('status'=>1, 'message'=>'登陆成功'));
		exit();
	}
	
}

?>