<?php  
namespace Admin\Controller;
use Think\Controller;

class ArtController extends InitController{

	//列表页
	public function lst()
	{
		$model = D('art');
		$data = $model -> search();
		$this -> assign($data);
		$this -> display();
	}

	//添加
	public function add()
	{	
		
		if(IS_POST){
			// p($_POST);exit;
			if(session('auth') === '0'){
				$this->error('您没有操作权限');
				exit;
			}
			$model = D('art');
			if($model -> create(I('post.'),1)){
				if($model -> add()){
					$this -> success('添加成功',U('lst'));
					exit;
				}
			}
			//如果以上执行失败
			$this -> error($model -> getError());
		}
		//获取分类数据
		$catModel = M('cat');
		$data = $catModel -> select();
		// p($data);
		$this -> assign('data',$data);
		$this -> display();
	}


	//编辑
	public function edit()
	{	
		$id = I('get.art_id');
		$model = D('art');

		if(IS_POST){
			if(session('auth') === '0'){
				$this->error('您没有操作权限');
				exit;
			}
			if($model -> create(I('post.'),2)){
				if($model ->where("art_id=$id") -> save() !== FALSE){
					$this -> success('修改成功',U('lst'));
					exit;
				}
			}
			//以上执行失败
			$this->error($model -> getError());
		}

		$data = $model -> field('art_id,cat_id,title,content') ->where("art_id = $id") -> find();
		$catModel = M('cat');
		$cats = $catModel ->field('cat_id,catname') -> select();
		$this -> assign(array(
			'data' => $data,
			'cats' => $cats,
			));
		$this -> display();
	}

	//删除
	public function del()
	{
		$id = I('get.art_id');
		// echo $id;exit;
		if(IS_GET)
		{	
			if(session('auth') === '0'){
				$this->error('您没有操作权限');
				exit;
			}
			// p($_GET);die;
			$model = M('art');
			if($model -> delete($id) !== false){
				$this -> success('删除成功',U('lst'));
				exit;
			}
			$this -> error($model -> getError());
		}
	}

}