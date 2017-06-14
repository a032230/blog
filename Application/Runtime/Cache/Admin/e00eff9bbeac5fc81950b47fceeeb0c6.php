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
    <script src="js/jquery.js"></script>
</head>
<body>
<form method="post" action="">
  <div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder"> 留言管理</strong></div>
    <div class="padding border-bottom">
          <a href="<?php echo U('Msg/add');?>" class="button border-yellow"><span class="icon-plus-square-o"></span> 发表心情</a>
    </div>
    <table class="table table-hover text-center">
      <tr>
        <th>ID</th>
        <th>用户名</th>       
        <th width="25%">内容</th>
        <th>发表时间</th>
        <th>操作</th>       
      </tr>    
      <?php if(is_array($data)): foreach($data as $key=>$v): ?><tr>
          <td><?php echo ($v["id"]); ?></td>
          <td><?php echo ($v["nick"]); ?></td>               
          <td><?php echo ($v["content"]); ?></td>
          <td><?=date('Y-m-d',$v['pubtime'])?></td>
          <td>
            <div class="button-group"> <a class="button border-red" href="<?php echo U('del');?>?id=<?php echo ($v["id"]); ?>" onclick="return del(1)"><span class="icon-trash-o" style="margin-right: 5px"></span>删除</a> </div>
          </td>
        </tr><?php endforeach; endif; ?>
    </table>
  </div>
      <div class="pagelist" style="margin-top: 20px"><?php echo ($page); ?> </div>
</form>
<script type="text/javascript">

function del(id){
	if(confirm("您确定要删除吗?")){
		
	}
}


</script>
</body></html>