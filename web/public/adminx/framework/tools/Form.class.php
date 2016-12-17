<?php
class Form extends Control {
	function __construct() {
	}
	
	public $model;
	private $data;
	
	public function getData(){
		if($this->data != null){
			return $this->data;
		}
		$mapping = file_get_contents(ROOT.'framework/mapping-data/' . $this->model . '.json');
		$this->data = json_decode($mapping, true);
		//var_dump($this->data);
		return $this->data;
	}
	
	public function render() {
		$data = $this->getData();
		if($data['attribute']){
			foreach ($data['attribute'] as $k => $v){
				if(!$this->attribute[$k]){
					$this->attribute[$k] = $v;
				}
			}
		}
		if(!$this->attribute['class']){
			$class = 'form-horizontal';
		}else {
			$class = $this->attribute['class'];
		}
		$form = "<form method='post' role='form' class='$class' ";
		$hasAction = false;
		foreach ($this->attribute as $key => $val){
			if($key == 'class'){
				continue;
			}
			if($key == 'action'){
				$hasAction = true;
			}
			$form .= $key . "='" . $val . "' ";
		}
		if(!$hasAction){
			$form .= "action=index.php?a=adminDo&m=update ";
		}
		$form .= ">";
		
		
		$form .= $this->genFormContent();
		$form .= "<div class='clearfix form-actions'>";
		$form .= "<div class='col-md-offset-3 col-md-9'>";
		$form .= "<button class='btn btn-info' type='submit'>";
		$form .= "提交";
		$form .= "</button>";
		$form .= "&nbsp;&nbsp;&nbsp;&nbsp;";
		$form .= "<button class='btn' type='reset'>";
		$form .= "重置";
		$form .= "</button>";
		$action = $data['operations'];
		if(in_array('back', $action)){
			$form .= "&nbsp;&nbsp;&nbsp;&nbsp;";
			$form .= "<a class='btn' href='index.php?a=adminIndex&m=ls&model=". $this->model ."&type=form'>";
			$form .= "返回";
			$form .= "</a>";
		}
		$form .= "</div>";
		$form .= "</div>";
		$form .= "</form>";
		return $form;
	}
	
	public function genFormContent(){
		$data = $this->getData();
		$primaryKeys = $data['primaryKey'];
		$table = $data['table'];
		$columns = $data['columns'];
		$content = "";
		foreach ($columns as $column){
			$content .= $this->genFormGroup($primaryKeys, $column);
		}
		$input = new Input();
		$input->attribute['name'] = 'model';
		$input->attribute['hidden'] = 'hidden';
		$input->attribute['value'] = $this->model;
		$content .= $input->render();
		return $content;
	}
	
	private function genFormGroup($primaryKeys, $column){
		if($column['type'] == 'hidden'){
			$input = new Input();
			$input->attribute['name'] = $column['controlName'];
			$input->attribute['type'] = 'hidden';
			if(is_array($column['attribute'])){
				foreach ($column['attribute'] as $k => $v){
					if($v[0] == '!'){
						$v = substr($v, 1);
						$v = eval($v);
					}
					$input->attribute[$k] = $v;
				}
			}
			return $input->render();
		}
		$group = "<div class='form-group'>";
		$label = new Label();
		$label->attribute['class'] = "col-sm-3 control-label no-padding-right";
		$label->attribute['for'] = $column['column'];
		$label->name = $column['columnName'];
		$group .= $label->render();
		$group .= "<div class='col-sm-9'>";
		$group .= $this->genColumn($column);
		$group .= "</div>";
		$group .= "</div>";
		return $group;
	}
	
	private function genColumn($column){
		$type = $column['type'];
		$control = null;
		if($type == 'text' || $type == 'password' || $type == 'hidden'){
			$control  = new Input();
			$control->attribute['type'] = $type;
			if($type == 'text'){
				$control->attribute['placeholder'] = $column['columnName'];
			}
		}else if ($type == 'textarea' || $type == 'richtext'){
			$control = new TextArea();
			if($type == 'richtext'){
				$control->attribute['class'] = 'richtext ';
			}
		}else if ($type == 'select'){
			$control = new Select();
			if(is_array($column['data'])){
				$dataProvider = new ArrayDataProvider();
			}else {
				$dataProvider = new SqlDataProvider();
			}
			$dataProvider->param = $column['data'];
			$control->dataProvider = $dataProvider;
		}else if ($type == 'date'){
			$control  = new Input();
			$control->attribute['type'] = 'text';
			$control->attribute['placeholder'] = $column['columnName'];
			$control->attribute['class'] = 'date ';
		} else if ($type == 'file'){
			$control = new Input();
			$control->attribute['type'] = 'file';
			$control->attribute['class'] = 'bean-file ';
		} else if ($type == 'dropzone'){
			$html = "<div id='dropzone'><form action='index.php?a=adminDo&m=upload' class='dropzone'>";
			$html .= "<div class='fallback'><input type='file' name='". $column['column'] ."'/></div>";
			$html .= "</form></div>";
			return $html;
		} else if ($type == 'preview'){
			$width = $column['attribute']['width'];
			if(!$width){
				$width = 100;
			}
			$preview = $column['preview'];
			$html = "<div class='preview'>";
			$html .= "<img src='' preview='$preview'  width='$width'/>";
			$html .= "</div>";
			return $html;
		}
		$control->attribute['class'] .= 'col-xs-10 col-sm-5';
		if(is_array($column['attribute'])){
			foreach ($column['attribute'] as $k => $v){
				if($v[0] == '!'){
					$v = substr($v, 1);
					echo $v;
					$v = eval($v);
				}
				$control->attribute[$k] = $v;
			}
		}
		$control->attribute['name'] = $column['controlName'] ;
		$control->attribute['id'] = $column['column'];
		return $control->render();
	}
}

?>