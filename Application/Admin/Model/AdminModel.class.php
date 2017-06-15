<?php  
namespace Admin\Model;
use Think\Model;

class AdminModel extends Model{
	// 为登录的表单定义一个验证规则 
	public $_login_validate = array(
		array('admin_user', 'require', '用户名不能为空！', 1),
		array('admin_pass', 'require', '密码不能为空！', 1),
	);
	public function _login()
	{
		// 从模型中获取用户名和密码
		$username = I('post.admin_user');
		$password = I('post.admin_pass');
		// 先查询这个用户名是否存在
		$user = $this->where(array(
			'admin_user' => array('eq', $username),
		))->find();
		// p($user);die;
		if($user)
		{
			if($user['admin_pass'] == md5($password))
			{
				// 登录成功存session
				session('id', $user['admin_id']);
				session('auth', $user['admin_auth']);
				session('user', $user['admin_user']);
				session('nick', $user['nick']);
				return TRUE;
			}
			else 
			{
				$this->error = '密码不正确！';
				return FALSE;
			}
		}
		else 
		{
			$this->error = '用户名不存在！';
			return FALSE;
		}
	}


	public function check(){
		// 从模型中获取用户名和密码
		$oldpass = I('post.opass');
		$newpass = I('post.pass');
		$rpass = I('post.rpass');
		$id  = session('id');
		// 先查询这个用户名是否存在
		$pass = $this->where(array(
			'admin_id' => array('eq', $id),
		))->find();
		if($pass){
			//对比数据库密码
			if(!($pass['admin_pass'] == md5($oldpass))){
				$this->error = '原始密码不正确！';
				return false;
			}
			//两次密码对比
			if(!($newpass == $rpass)){
				$this->error = '两次输入的密码不一致!';
				return false;
			}
			// p(md5($newpass));die;
			//对传输
			$data['admin_pass'] = md5($newpass);
			//修改密码
			$this -> where("admin_id=$id") -> save($data);
		}
		
		return true;
	}

}