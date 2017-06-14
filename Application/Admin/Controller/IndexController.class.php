<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends InitController {
    public function index(){
        $this->display();
    }

    public function info(){
    	$this -> display();

    }
}