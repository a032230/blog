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


<link href="/Public/Home/css/new.css" rel="stylesheet">
<link href="/Public/umeditor/themes/default/css/umeditor.css" rel="stylesheet">
<article class="blogs">
  <h1 class="t_nav"><a href="javascript:;" class="n1">网站首页</a><a href="javascript:;" class="n2">日记</a></h1>
  <div class="index_about">
    <h2 class="c_titile"><?php echo ($data["title"]); ?></h2>
    <p class="box_c"><span class="d_time">发布时间：<?php echo date("Y-m-d",$data['pubtime'])?></span><span>编辑：杨青</span></p>
    <ul class="infos">
      <p><?php echo ($data["content"]); ?></p>
    </ul>
    <div class="keybq">
    <p><span>关键字词</span>：爱情,犯错,原谅,分手</p>
    </div>
    <div class="ad"> </div>
    <div class="nextinfo">
      <?php if($prev){?>
      <p>上一篇：<a href="{:U(detail)}?art_id=<?php echo ($prev["art_id"]); ?>&cat_id=<?php echo ($prev["cat_id"]); ?>"><?php echo ($prev["title"]); ?></a></p>
      <?php }else{ ?>
      <p>上一篇：<a href="javascript:;">没有了</a></p>
      <?php } ?>
      <?php if($next){?>
      <p>下一篇：<a href="{:U(detail)}?art_id=<?php echo ($next["art_id"]); ?>&cat_id=<?php echo ($next["cat_id"]); ?>"><?php echo ($next["title"]); ?></a></p>
      <?php }else{ ?>
      <p>下一篇：<a href="javascript:;">没有了</a></p>
       <?php } ?>
    </div>
    <div class="otherlink">
      <h2>相关文章</h2>
      <ul>
        <?php if(is_array($arts)): foreach($arts as $key=>$v): ?><li><a href="<?php echo U(detail);?>?art_id=<?php echo ($v["art_id"]); ?>&cat_id=<?php echo ($v["cat_id"]); ?>" title="<?php echo ($v["title"]); ?>"><?php echo ($v["title"]); ?></a></li><?php endforeach; endif; ?>
      </ul>
    </div>
    <div style="clear: both"></div>
    <form action="/index.php/Home/Art/detail" method="post">
    <div class="comment "> 
      <textarea id="comment"></textarea>
      <button type="submit" class="btns">提交</button>
    </div>
    </form>
    <div class="msg">
        <h2><span>最新评论</span></h2>
        <div class="user clearfix">
          <div class="pic">
            <img src="/Public/Home/images/100.jpg">
          </div>
          <div class="userbox">
            <p class="b_content"><span class="auth">爱便流通于世</span>：<span class="ct">期待开始laravel的项目<span></p>
            <p class="pubtime">2017-06-12 08:06:28 <a href="javascript:;" aid='' class="return">回复</a></p>
            <form class="retform" action="" method="post" style="display: none">
            <textarea name='msg'class="retmsg"></textarea>
            <button type="submit" class="btns">提交</button>
            </form>
          </div>
          
        </div>
        <div class="user clearfix">
          <div class="pic">
            <img src="/Public/Home/images/100.jpg">
          </div>
          <div class="userbox">
            <p class="b_content"><span class="auth">爱便流通于世</span>：<span class="ct">期待开始laravel的项目<span></p>
            <p class="pubtime">2017-06-12 08:06:28 <a href="javascript:;" aid='' class="return">回复</a></p>
            <form class="retform" action="" method="post" style="display: none">
            <textarea name='msg'class="retmsg"></textarea>
            <button type="submit" class="btns">提交</button>
            </form>
          </div>
          
        </div>
    </div>
  </div>
  <?php include T('Public/right')?>
</article>
<script src="/Public/Home/Js/silder.js"></script>
<script src="/Public/Admin/Js/jquery.js"></script>
<script type="text/javascript" src="/Public/umeditor/third-party/template.min.js"></script>
<script src="/Public/umeditor/umeditor.config.js"></script>
<script src="/Public/umeditor/lang/zh-cn/zh-cn.js"></script>
<script src="/Public/umeditor/umeditor.min.js"></script>
<script type="text/javascript">

    UM.getEditor('comment',{
            initialFrameWidth:'96%',
            initialFrameHeight:200,      
         }
    );

    $('.return').click(function(){
      $(this).parent().siblings('.retform').toggle();
    })
</script>

</body>
</html>



<footer>
  <p>Design by DanceSmile <a href="http://www.miitbeian.gov.cn/" target="_blank">蜀ICP备11002373号-1</a> <a href="/">网站统计</a></p>
</footer>