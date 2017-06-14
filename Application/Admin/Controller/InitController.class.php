<?php  
namespace Admin\Controller;
use Think\Controller;

class InitController extends Controller
{
	public function __construct()
	{	
		//继承父类控制器
		parent::__construct();

		
		if(!session('id')){
			$this -> error('请先登陆',U('Admin/login'));
			exit;
		}
		
	}

}