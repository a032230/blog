<?php  
namespace Admin\Model;
use Think\Model;

class CatModel extends Model{

	//定义允许添加的字段
	protected $insertField = "catname,hover";

	//定义修改时候允许接收的字段
	protected $updateField = "cat_id,catname,hover";

	//定义需要验证的字段
	protected $_validate = array(
		array('catname','require','栏目名不能为空',1),
		array('catname','','栏目名称已经存在！',0,'unique',1), // 在新增的时候验证name字段是否唯一
		array('hover','require','别名不能为空',1),
		// array('url','','URL已经存在！',0,'unique',1), // 在新增的时候验证name字段是否唯一
	);

	//在插入数据库前执行操作
	
	protected function _before_insert(&$data,$option){

	}

	//修改之前执行操作
	protected function _before_update(&$data,$option){

	}

	// 删除前处理
	public function del()
	{
		$id = I('get.cat_id');
		$art = M('art');
		$res = $art -> where("cat_id=$id") -> select();
	 	if($res){
	 		$this->error = '请先删除栏目下的文章';
	 		return false;
	 	}else{
	 		$this ->delete($id);
	 		return true;
	 	}

	}
}