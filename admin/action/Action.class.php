<?php
class Action extends MySmarty{
	
	protected $cache;
	
	public function __construct(){
		parent::__construct();
		$this->setCache();
		$this->cache = new phpFastCache();
		
	}
	
	public function __call($name,$param){
		die('非法请求');
	}
	
	
	protected function setWebSetting($title=''){
		$model = new Model();
		$webSetting = $this->getWebSetting();
		if($title != ''){
			$web_title = $title.'_'.$webSetting['title'];
		}else {
			$web_title = $webSetting['title'];
		}
		$this->assign('web_title', $web_title);
		$this->assign('web_logo', $webSetting['logo']);
		$this->setFlink();
	}
	
	private function setFlink(){
		$m = new Model();
		$flinks = $m->table('tflink')->selectAll();
		$this->assign('flinks',$flinks);
	}
	
	protected function setMainNavigation(){
		$model = new Model();
		$navigations = $model->table('categories')->fetch();
		$this->assign('navigations',$navigations);
	}
	
	protected function setCache(){
		phpFastCache::setup(C('cache_config'));
	}
	
	protected function setPagination($baseUrl,$allCount,$page,$size){
		$allPages = ceil($allCount/$size);
		$currentPage = $page;
		$prePage = ($page - 1) < 1 ? 1 : ($page-1);
		$nextPage = ($page + 1) > $allPages ? $allPages : ($page+1);
		$leftIndex = ($currentPage - 2) > 0 ? ($currentPage - 2) : 1;
		$rightIndex = ($currentPage + 3) > $allPages ? $allPages : ($currentPage + 3);
		$this->assign('BASE_URL',$baseUrl);
		$this->assign('current_page',$currentPage);
		$this->assign('pre_page',$prePage);
		$this->assign('next_page',$nextPage);
		$this->assign('left_index',$leftIndex);
		$this->assign('right_index',$rightIndex);
		$this->assign('all_page',$allPages);
		$this->assign('allCount',$allCount);
	}
	
	public  function error($message,$url=''){
		if($url == ''){
			$url = $_SERVER['HTTP_REFERER'];
		}
		$this->setWebSetting();
		$this->setMainNavigation();
		$this->assign('message',$message);
		$this->assign('goto',$url);
		$this->display('error.html');
	}
	
	protected function success($message,$url=''){
		if($url == ''){
			$url = $_SERVER['HTTP_REFERER'];
		}
		$this->setWebSetting();
		$this->setMainNavigation();
		$this->assign('message',$message);
		$this->assign('goto',$url);
		$this->display('success.html');
	}
	
	protected function getNumber($k){
		$value = isset($_GET[$k]) ? $_GET[$k] : $_POST[$k];
		return intval($value);
	}
	
	protected function getWebSetting(){
		$model = new Model();
		$webSetting = $model->table('twebinfo')->fields(array('*'))->isUnion(true)->fetch();
		return $webSetting;
	}
	
	//日本旅游项目加入代码
	public function webinfo(){
		$m = new Model();
		$webinfo = $m->select('select * from twebinfo limit 0,1');
		$this->assign('webinfo', $webinfo[0]);
	}
	
	//日本旅游项目加入代码
	public function flink(){
		$m = new Model();
		$flinks = $m->table('tflink')->selectAll();
		$this->assign('flinks', $flinks);
	}
	
	//日本旅游项目加入代码
	public function ads(){
		$m = new Model();
		$ads = $m->select('select * from tads where position = 0 order by sortby desc limit 0,6');
		$this->assign('ads', $ads);
	}
	
	protected function _display($template){
		$this->webinfo();
		$this->flink();
		$this->ads();
		$mobile = $_GET['mobile'];
		if($mobile){
			$this->display('mobile/'.$template);
		}else {
			$this->display('front/'.$template);
		}
	}
	
	public function checkAdmin(){
		if(!$_SESSION['id']){
			header('Location:index.php');
			exit();
		}else {
			if($_SESSION['isadmin'] != '1'){
				header('Location:index.php');
				exit();
			}
		}
	}
	
	protected function getModelData($model){
		$data = file_get_contents(ROOT.'framework/mapping-data/' .$model . '.json');
		$data = json_decode($data, true);
		return $data;
	}
	
}
