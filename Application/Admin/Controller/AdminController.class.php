<?php  
namespace Admin\Controller;
use Think\Controller;
class AdminController extends Controller{

	//登陆
	public function login(){
			$model = D('admin');
			// $a = $model -> admin_user;
			// p($a);exit;
		if(IS_POST){
		// 接收表单并且验证表单
   			if($model->validate($model->_login_validate)->create())
   			{
   				if($model->_login())
   				{
   					$this->success('登录成功!', U('Index/index'));
   					exit;
   				}
   			}
   			$this->error($model->getError());
			
   			
   		}
         $this->display();
      }
      //修改密码
      public function editpass()
      {

      }

   //退出
   public function logout()
   {
      session(null);
      $this -> success('退出成功',U('login'));
      exit;
   }
	
}