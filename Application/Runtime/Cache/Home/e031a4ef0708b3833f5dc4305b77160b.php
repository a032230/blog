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


<link href="/Public/Home/css/mood.css" rel="stylesheet">

<div class="moodlist">
  <h1 class="t_nav"><span>删删写写，回回忆忆，虽无法行云流水，却也可碎言碎语。</span><a href="/" class="n1">网站首页</a><a href="/" class="n2">碎言碎语</a></h1>
  <div class="bloglist">
    <?php if(is_array($data)): foreach($data as $key=>$v): ?><ul class="arrow_box">
     <div class="sy">
      <p> <?php echo ($v["content"]); ?></p>
      </div>
      <span class="dateview"><?=date('Y-m-d',$v['pubtime'])?></span>
    </ul><?php endforeach; endif; ?>
  </div>
  <div class="page"><?php echo ($page); ?></div>
</div>
<footer>
  <p>Design by DanceSmile <a href="http://www.miitbeian.gov.cn/" target="_blank">蜀ICP备11002373号-1</a> <a href="/">网站统计</a></p>
</footer>
<script src="js/silder.js"></script>
</body>
</html>



<footer>
  <p>Design by DanceSmile <a href="http://www.miitbeian.gov.cn/" target="_blank">蜀ICP备11002373号-1</a> <a href="/">网站统计</a></p>
</footer>