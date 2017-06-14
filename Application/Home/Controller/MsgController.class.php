<?php
namespace Home\Controller;
use Think\Controller;

// 留言控制器
class MsgController extends Controller{

	//显示留言
	public function chat()
	{
		//调用后台pageList方法
		$model = new \Admin\Model\MsgModel();
		$data = $model -> pageList();	

		$this -> assign($data);
		//栏目
	    $catModel = M('cat');
	    $cats = $catModel -> select();

		$this -> assign(array(
			'cats' => $cats
		));

		$this -> display();
	}
}