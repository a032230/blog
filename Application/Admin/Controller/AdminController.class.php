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
      public function pass()
      {
         $id = session('id');
            $model = D('admin');
            if(IS_POST){
               if(session('auth') === '0'){
                  $this -> error('你没有操作权限！');
                  exit;
               }
               // 调用Admin模型的check方法
               if($data = $model -> check()){
                  session(null);
                  $this -> success('密码修改成功,请重新登陆',U('login'));
                  exit;
               }  
            
            $this->error($model->getError());
         }
            $this -> display();
      }

   //退出
   public function logout()
   {
      session(null);
      $this -> success('退出成功',U('login'));
      exit;
   }
	
}