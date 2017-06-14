<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){

  		$model = D('art');
      //首页显示
  		$data = $model -> showList();
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
        'cats' => $cats,
       	));

      $this->assign($data);
      $this-> display();
    }
}