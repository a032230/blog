<?php  
namespace Admin\Model;
use Think\Model;

class MsgModel extends Model{

	//新增时允许接收的字段
	protected $insertField = "content";

	//修改时允许接收的字段
	protected $updateField = 'content';

	protected $_validate = array(
		array('content','require','内容不能为空',1),
	);



	//新增之前执行操作
	protected function _before_insert(&$data,$option)
	{
		$data['nick'] = session('nick');
		$data['pubtime'] = time();
		$data['content'] = removeXss($_POST['content']);
	}


	//分页，显示数据
	public function pageList($pagenum = 5)
	{	
		/*************分页***************/
		//取出总记录
		$count = $this -> count();
		// 实例化分页类
		$pageObj = new \Think\Page($count,$pagenum);
		$pageObj -> setConfig('prev','上一页');
		$pageObj -> setConfig('next','下一页');
		$pageString = $pageObj -> show();

		//生成页面下面显示的上一页，下一页的字符串
		$data = $this ->order('pubtime desc') -> limit($pageObj->firstRow.','.$pageObj->listRows) ->select();
		return array(
			'data' => $data,
			'page' => $pageString,
			);
	}
}
