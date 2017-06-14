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


<link href="/Public/Home/css/learn.css" rel="stylesheet">

<article class="blogs">
<h1 class="t_nav"><span>我们长路漫漫，只因学无止境。 </span><a href="/" class="n1">网站首页</a><a href="/" class="n2">学无止境</a></h1>
<div class="newblog left">
	<?php if(is_array($data)): foreach($data as $key=>$v): ?><div class="contentbox">
	         <h2><?php echo ($v["title"]); ?></h2>
	   <p class="dateview"><span>发布时间：<?=date('Y-m-d',$v['pubtime'])?></span><span>作者：<?php echo ($v["nick"]); ?></span><span>分类：[<a href=""><?php echo ($v["catname"]); ?></a>]</span></p>
	    <figure><img src="/Public/Home/images/04.jpg"></figure>
	    <ul class="nlist">
	      <p><?php echo substr($v['content'],0,260).'....'?></p>
	      <a  href="<?php echo U('detail');?>?art_id=<?php echo ($v["art_id"]); ?>" target="_blank" class="readmore" style="margin: 43px 30px 0 0px;">详细信息>></a>
	    </ul>
	     <div class="line"></div>
	</div><?php endforeach; endif; ?>
	<div class="page"><?php echo ($page); ?></div>
</div>
 <?php include T('Public/right')?>
</article>
<footer>
  <p>Design by DanceSmile <a href="http://www.miitbeian.gov.cn/" target="_blank">蜀ICP备11002373号-1</a> <a href="/">网站统计</a></p>
</footer>
<script src="js/silder.js"></script>
</body>
</html>



<footer>
  <p>Design by DanceSmile <a href="http://www.miitbeian.gov.cn/" target="_blank">蜀ICP备11002373号-1</a> <a href="/">网站统计</a></p>
</footer>