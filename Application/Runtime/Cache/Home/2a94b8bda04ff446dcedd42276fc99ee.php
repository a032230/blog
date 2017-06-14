<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>博客</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="/Public/Home/css/base.css" rel="stylesheet">

<!--[if lt IE 9]>
<script src="js/modernizr.js"></script>
<![endif]-->
</head>
<body>
<header>
  <nav class="topnav" id="topnav">
    <a href="<?php echo U('Index/index');?>"><span>首页</span><span class="en">Home</span></a>
    <?php if(is_array($cats)): foreach($cats as $key=>$v): ?><a href="<?php echo U('Art/article');?>?cat_id=<?php echo ($v["cat_id"]); ?>"><span><?php echo ($v["catname"]); ?></span><span class="en"><?php echo ($v["hover"]); ?></span></a><?php endforeach; endif; ?>
    <a href="<?php echo U('Msg/chat');?>"><span>随言碎语</span><span class="en">Message</span></a>
    <a href="<?php echo U('Admin/Index/index');?>"><span>GitHub</span><span class="en">GitHub</span></a>
    <a href="<?php echo U('Admin/Index/index');?>"><span>后台管理</span><span class="en">Admin</span></a>

    </nav>
  </nav>
</header>


<link href="/Public/Home/css/index.css" rel="stylesheet">
<div class="template">
  <div class="box">
    <h3>
      <p><span>个人博客</span>模板 Templates</p>
    </h3>
    <ul>
      <li><a href="/"  target="_blank"><img src="/Public/Home/images/01.jpg"></a><span>仿新浪博客风格・梅――古典个人博客模板</span></li>
      <li><a href="/" target="_blank"><img src="/Public/Home/images/02.jpg"></a><span>黑色质感时间轴html5个人博客模板</span></li>
      <li><a href="/"  target="_blank"><img src="/Public/Home/images/03.jpg"></a><span>Green绿色小清新的夏天-个人博客模板</span></li>
      <li><a href="/" target="_blank"><img src="/Public/Home/images/04.jpg"></a><span>女生清新个人博客网站模板</span></li>
      <li><a href="/"  target="_blank"><img src="/Public/Home/images/02.jpg"></a><span>黑色质感时间轴html5个人博客模板</span></li>
      <li><a href="/"  target="_blank"><img src="/Public/Home/images/03.jpg"></a><span>Green绿色小清新的夏天-个人博客模板</span></li>
    </ul>
  </div>
</div>
<article>
  <h2 class="title_tj">
    <p>文章<span>推荐</span></p>
  </h2>
  <div class="bloglist left">
    <?php if(is_array($data)): foreach($data as $key=>$v): ?><div class="lists">
      <h3><?php echo ($v["title"]); ?></h3>
      <ul>
        <p><?php $str = substr($v['content'],0,230); echo $str.'....';?></p>
        <a href="<?php echo U('Art/detail');?>?art_id=<?php echo ($v["art_id"]); ?>&cat_id=<?php echo ($v["cat_id"]); ?>" target="_blank" class="readmore">阅读全文>></a></p>
      </ul>
      <p class="dateview"><span><?php echo date("Y-m-d H:i:s",$v['pubtime']) ?></span><span>作者：杨青</span><span>个人博客：[<a href=""><?php echo ($v["catname"]); ?></a>]</span><span style="margin-left: 100px">阅读次数：<?php echo ($v["click"]); ?></span></p>
    </div><?php endforeach; endif; ?>
    <div class="page"><?php echo ($page); ?></div>
  </div>
<!--  -->

<?php include T('Public/right')?>
</article>

</body>
</html>




<footer>
  <p>Design by DanceSmile <a href="http://www.miitbeian.gov.cn/" target="_blank">蜀ICP备11002373号-1</a> <a href="/">网站统计</a></p>
</footer>