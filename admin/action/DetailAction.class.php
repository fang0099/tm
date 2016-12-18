<?php
class DetailAction extends Action{
	
	public function __construct(){
		parent::__construct();
	}
	
	public function shop(){
		$id = $this->getNumber('id');
		$m = new Model();
		$shopDetail = $m->table('tshop')->selectById($id);
		$shopPics = $m->select("select * from tpics where pid='$id' and tname='tshop'");
		if(!$shopDetail){
			$this->_display('404.html');
		} else {
			$this->assign('shopDetail', $shopDetail);
			$this->assign('shopPics', $shopPics);
			$this->_display('detail.html');
		}
	}
	
	public function jt(){
		$id = $this->getNumber('id');
		$m = new Model();
		$jtDetail = $m->table('tjt')->selectById($id);
		$jtPics = $m->select('select * from tpics where pid="'.$id.'" and tname="tjt"');
		if(!$jtDetail){
			$this->_display('404.html');
		} else {
			$this->assign('jtDetail', $jtDetail);
			$this->assign('jtPics', $jtPics);
			$this->_display('detail.html');
		}
	}

	public function lyitem(){
		$id = $this->getNumber('id');
		$m = new Model();
		$lyitemDetail = $m->table('tlyitem')->selectById($id);
		$lyitemPics = $m->select("select * from tpics where pid='$id' and tname='tlyitem'");
		if(!$lyitemDetail){
			$this->_display('404.html');
		} else {
			$this->assign('lyitemDetail', $lyitemDetail);
			$this->assign('lyitemPics', $lyitemPics);
			$this->_display('detail.html');
		}
	}
	
	public function house(){
		$id = $this->getNumber('id');
		$m = new Model();
		$houseDetail = $m->table('thouse')->selectById($id);
		$housePics = $m->select("select * from tpics where pid=$id and tname='thouse'");
		if(!$houseDetail){
			$this->_display('404.html');
		} else {
			//var_dump($housePics);
			$this->assign('houseDetail', $houseDetail);
			$this->assign('housePics', $housePics);
			$this->_display('detail.html');
		}
	}
	
	public function lycity(){
		$id = $this->getNumber('id');
		$m = new Model();
		$lycityDetail = $m->table('tlycity')->selectById($id);
		$lycityPics = $m->select("select * from tpics where pid='$id' and tname='tlycity'");
		if(!$lycityDetail){
			$this->_display('404.html');
		} else {
			$this->assign('lycityDetail', $lycityDetail);
			$this->assign('lycityPics', $lycityPics);
			$this->_display('detail.html');
		}
	}
}

?>