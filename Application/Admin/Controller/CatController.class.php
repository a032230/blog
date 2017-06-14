<?php  
namespace Admin\Controller;
use Think\Controller;

class CatController extends InitController{

	// select
	public function lst(){
		$catModel = M('cat');
		$data = $catModel -> select();
		$this -> assign('data',$data);
		$this -> display();
	}

	// add
	public function add(){
		if(IS_POST){
			// var_dump(session('auth'));die;
			//验证权限
			if(session('auth') === '0'){
				$this->error('您没有操作权限');
				exit;
			}
			$catMolde = D('cat');
			// p($_POST);exit;
			//数据验证并保存到模型
			if($catMolde -> create(I('post.'),1))
			{	
				if($catMolde -> add())
				{
					$this -> success('添加成功',U('lst'));
					exit;
				}
			}
			//如果以上操作失败则打印错误
			$this -> error($catMolde -> getError());
		}

		$this -> display();
	}

	public function edit(){
		$id = I('get.cat_id');
		$catModel = D('cat');
		if(IS_POST)
		{
			//验证权限
			if(session('auth') === '0'){
				$this->error('您没有操作权限');
				exit;
			}
			// p($_POST);die;
			if($catModel -> create(I('post.'),2))
			{
				if( $catModel -> where("cat_id =".$id )-> save() !==  FALSE)
				{
					$this -> success('修改成功',U('lst'));
					exit;
				}
			}
			
			//以上执行都失败则打印错误信息
			// $catMolde -> getLastSql();exit;
			$this -> error($catModel -> getError());
		}

		$data = $catModel -> Field('catname,hover') ->find($id);
      	
      	$this -> assign('data',$data);
		$this -> display();
	}


	// delete
	
	public function del()
	{
		if(IS_GET)
		{
			//验证权限
			if(session('auth') === '0'){
				$this->error('您没有操作权限');
				exit;
			}
			$catModel = D('cat');

			if($catModel ->del() !== FALSE){
				$this -> success('删除成功',U('lst'));
				exit;
			}
			$this->error($catModel->getError());
		}
		$this -> display();
	}
}