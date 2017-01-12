<?php
/**
 * Created by PhpStorm.
 * User: bean
 * Date: 16-12-13
 * Time: 上午12:34
 */

namespace App\Http\Controllers\UI;


class Modal extends Control
{
    function __construct() {
    }

    public $model;

    public function render() {
        $modal = "<div role='dialog' class='modal fade' aria-hidden='false' id='". $this->model . "Modal' >";
        $modal .= "<div class='modal-dialog'>";

        $modal .= "<div class='modal-content'>";

        $modal .= "<div class='modal-header'>";
        $modal .= "<button data-dismiss='modal' class='close' type='button'>×</button>";
        $modal .= "<h4 class='blue bigger' role='modal-title' ></h4>";
        $modal .= "</div>";
        $form = new Form();
        $form->model = $this->model;
        $modal .= "<form method='post' class='form-horizontal' ";
        $hasAction = false;
        $d = $form->getData();
        if(is_array($d['attribute'])){
            foreach ($d['attribute'] as $key => $val){
                if($key == 'class'){
                    continue;
                }
                if($key == 'action'){
                    $hasAction = true;
                }
                $modal .= $key . "='" . $val . "' ";
            }
        }
        if(!$hasAction){
            $modal .= "action=index.php?a=adminDo&m=update ";
        }
        $modal .= ">";

        $modal .= "<div class='modal-body'>";
        $modal .= $form->genFormContent();
        $modal .= "</div>";
        $modal .= "<div class='modal-footer'>";
        $modal .= "<button type='submit' class='btn btn-primary'>确认</button>";
        $modal .= "<button type='reset' class='btn' data-dismiss='modal'>关闭</button>";
        $modal .= "</div>";
        $modal .= "</form>";
        $modal .= "</div>";
        $modal .= "</div>";
        $modal .= "</div>";
        return $modal;
    }
}