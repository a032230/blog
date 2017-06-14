<?php 
namespace Admin\Controller;
use Think\Controller;

//留言列表
class MsgController extends Controller{
	public function lst()
	{
		$model = D('msg');
		
		//调用模型pageList
		$data = $model -> pageList();
		// p($data);die;
		$this -> assign($data);
		$this -> display();
	}

	public function add()
	{	
		$model = D('msg');
		if(IS_POST){
			if(session('auth') === '0')
			{
				$this -> error('你没有操作权限');
				exit;
			}
			if($model -> create(I('post.'),1)){
				if($model -> add()){
					$this -> success('添加成功',U('lst'));
					exit;
				}
			}
			//如果以上执行都失败,从模型中获取错误信息并打印
			$this -> error($model -> getError());
		}

		$this -> display();
	}

	public function del()
	{
		$id = I('get.id');
		$model = M('msg');
		if(IS_GET){
			if(session('auth') === '0')
			{
				$this -> error('你没有操作权限');
				exit;
			}
			if($model -> delete($id)){
				$this -> success('删除成功',U('lst'));
				exit;
			}
		}
		//如果以上执行都失败,从模型中获取错误信息并打印
		$this -> error($model->getError());
	}
}

