<?php 
namespace Admin\Model;
use Think\Model;

/**
 * 文章模型
 */
class ArtModel extends Model{

	//定义添加时允许接收的字段
	protected $insertField = "cat_id,title,content";

	//定义修改时允许接收的字段 
	protected $updateField = "cat_id,title,content";

	//验证字段
	protected $_validate = array(
		array('cat_id','require','请选择分类',1),
		array('title','require','标题不能为空',1),
		array('content','require','内容不能为空',1),
	);

	//在添加前执行
	protected function _before_insert(&$data,$option)
	{
		$data['pubtime'] = time();
		$data['user_id'] = session('id');
		$data['nick'] = session('nick');
		$data['content'] = removeXss($_POST['content']);
	}

	//在修改前执行
	protected function _before_update(&$data,$option)
	{
		$data['content'] = removeXss($_POST['content']);
		$data['user_id'] = session('id');
		$data['nick'] = session('nick');
	}

	//文章列表，搜索，分页展示
	public function search($perPage = 5)
	{

		/***************搜索*****************/
		$where = array();
		//商品名
		$gn = I('get.lt');
		if($gn)
			$where['title'] = array('like',"%$gn%");
		/*************分页***************/
		//取出总记录
		$count = $this ->where($where) -> count();
		// 实例化分页类
		$pageObj = new \Think\Page($count,$perPage);
		$pageObj -> setConfig('prev','上一页');
		$pageObj -> setConfig('next','下一页');
		$pageString = $pageObj -> show();

		//生成页面下面显示的上一页，下一页的字符串
		$data = $this ->field('a.art_id,a.cat_id,a.title,a.content,a.pubtime,a.nick,a.click,b.catname') 
		              ->alias('a') 
		              ->join("left join cat b on a.cat_id = b.cat_id") 
		              -> where($where)  
		              -> limit($pageObj->firstRow.','.$pageObj->listRows) 
		              -> select();
		// echo $this -> getLastSql();exit; //打印出前一次操作的sql语句
		//返回分页数据
		return array(
			'data' => $data,
			'page' => $pageString,
			);
	}

}