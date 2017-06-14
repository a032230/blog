<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="renderer" content="webkit">
<title></title>
<link rel="stylesheet" href="/Public/Admin/css/pintuer.css">
<link rel="stylesheet" href="/Public/Admin/css/admin.css">
</head>
<body>
<div class="panel admin-panel">
  <div class="panel-head"><strong class="icon-reorder"> 内容列表</strong></div>
  <div class="padding border-bottom">
    <a class="button border-yellow" href="<?php echo U('add');?>"><span class="icon-plus-square-o"></span> 添加分类</a>
  </div>
  <table class="table table-hover text-center">
    <tr>
      <th width="5%">ID</th>
      <th width="15%">分类名称</th>
      <th width="15%">别名</th>
      <th width="10%">操作</th>
    </tr>
  <?php if(is_array($data)): foreach($data as $key=>$v): ?><tr>
      <td><?php echo ($v["cat_id"]); ?></td>
      <td><?php echo ($v["catname"]); ?></td>
      <td><?php echo ($v["hover"]); ?></td>
      <td><div class="button-group"> <a class="button border-main" href="<?php echo U('edit');?>?cat_id=<?php echo ($v["cat_id"]); ?>"><span class="icon-edit"></span> 修改</a> <a style="margin-left: 10px" class="button border-red" href="<?php echo U('del');?>?cat_id=<?php echo ($v["cat_id"]); ?>" onclick="return del()"><span class="icon-trash-o"></span> 删除</a> </div></td>
    </tr><?php endforeach; endif; ?>
  </table>
</div>
<script type="text/javascript">
function del(){
	 return confirm("您确定要删除吗?");
		
	
}
</script>
</body>
</html>