<?php  
namespace Home\Model;
use Think\Model;

class ArtModel extends Model{


	public function search($perPage = 1)
	{
		$id = I('get.cat_id');
		/*************分页***************/
		//取出总记录
		$count = $this ->where("cat_id=$id") ->count() ;
		// echo $this -> getLastSql();exit; //打印出前一次操作的sql语句
		// 实例化分页类
		$pageObj = new \Think\Page($count,$perPage);
		$pageObj -> setConfig('prev','上一页');
		$pageObj -> setConfig('next','下一页');
		$pageString = $pageObj -> show();
		//生成页面下面显示的上一页，下一页的字符串
		$data = $this ->field('a.art_id,a.cat_id,a.title,a.content,a.pubtime,a.nick,a.click,b.catname') 
		              ->alias('a') 
		              ->join("left join cat b on a.cat_id = b.cat_id") 
		              -> where("a.cat_id=$id")  
		              -> limit($pageObj->firstRow.','.$pageObj->listRows) 
		              -> select();

		//返回分页数据
		return array(
			'data' => $data,
			'page' => $pageString,
			);
	}

	//首页文章列表,分页展示
	public function showList($perPage = 5)
	{

		/*************分页***************/
		//取出总记录
		$count = $this -> count();
		// 实例化分页类
		$pageObj = new \Think\Page($count,$perPage);
		$pageObj -> setConfig('prev','上一页');
		$pageObj -> setConfig('next','下一页');
		$pageString = $pageObj -> show();

		//生成页面下面显示的上一页，下一页的字符串
		$data = $this -> field('a.art_id,a.cat_id,a.title,a.content,a.pubtime,a.nick,a.click,b.catname') 
		              -> alias('a') 
		              -> join("left join cat b on a.cat_id = b.cat_id")  
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


