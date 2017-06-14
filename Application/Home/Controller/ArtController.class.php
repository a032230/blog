<?php  
namespace Home\Controller;
use Think\Controller;

class ArtController extends Controller{

	//文章详情页
	public function detail()
	{
		if(IS_POST){
			$this->error("等待登陆功完善！目前不开放留言");
			exit;
		}
		$id = I('get.art_id');
		$catid = I('get.cat_id');
		if(!is_numeric($id) || empty($id)){
			$this -> error('非法id！');
			exit;
		}
		$model = M('art');
		$row = $model->field('art_id,title,content,pubtime') -> find($id);
		//上一篇
		$prev = $model -> field('title,art_id,cat_id') -> find($id-1);
		// p($prev);die;
		//下一篇
		$next = $model -> field('title,art_id,cat_id') -> find($id+1);
		//相关文章
		$arts = $model->field('title,art_id,cat_id') ->where(array('cat_id'=>array('eq',$catid),'art_id'=>array('neq',$id))) -> select();
		$this -> assign(array(
			'prev' => $prev,
			'next' => $next,
			'arts' => $arts,
		));
		
		//点击处理
		$model->where("art_id=$id")->setInc('click');



		 //最新文章
  	     $res = $model -> field('art_id,title')->order('pubtime desc')->select();
         //点击量排行
  	     $sort = $model -> field('art_id,title')->limit(5)->order('click desc')->select();
		  //栏目列表
          $catModel = M('cat');
          $cats = $catModel -> select();

		$this -> assign(array(
			'order' => $res,
			'sort' => $sort,
			'cats' => $cats
		));

		$this -> assign('data',$row);
		$this -> display();
	}

	public function article()
	{

		$model = D('art');
		//分类文章
		$data = $model -> search();

		//最新文章
  	     $res = $model -> field('art_id,title')->order('pubtime desc')->select();
         //点击量排行
  	     $sort = $model -> field('art_id,title')->limit(5)->order('click desc')->select();
		  //栏目列表
          $catModel = M('cat');
          $cats = $catModel -> select();

		$this -> assign(array(
			'order' => $res,
			'sort' => $sort,
			'cats' => $cats
		));
		// p($data);exit;ss
		$this -> assign($data);
		$this -> display();
	}
}