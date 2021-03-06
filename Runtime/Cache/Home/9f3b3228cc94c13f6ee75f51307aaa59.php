<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="<?php echo (HOME_CSS); ?>bootstrap.min.css" >
	  <link  rel="stylesheet" href="<?php echo (HOME_CSS); ?>nav_style.css">
	  <link  rel="stylesheet" href="<?php echo (TEXT); ?>css/history_score.css">
	<title>GDUFS-TITE i听说</title>
</head>
<body class="custom_container">
  <nav class="navbar navbar-default navbar-fixed-top nav_custom">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
          <a class="navbar-brand" href="#">i听说</a>
    </div>
    <div id="navbar" class="navbar-collapse collapse" aria-expanded="false" style="height: 1.11111px;">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="/its/index.php/Home/Movie/index" title="影视配音"><div class="nav_img1"></div></a></li>
        <li><a href="/its/index.php/Home/Tone/index" title="语音语调"><div class="nav_img2"></div></a></li>
        <li><a href="/its/index.php/Home/Text/index" title="演讲与散文"><div class="nav_img3"></div></a></li>
			  <li><a href="#" title="设置个人信息"><div class="nav_img4"></div></a></li>
        <li><a href="javascript:void(0)" title="头像"><div class="nav_img_photo"></div></a></li>
      </ul>
    </div><!--/.nav-collapse -->
  </nav>

  <ol class="custom_navigate list-unstyled">
    <li><a href="/its/index.php/Home/text/textList?type_id=<?php echo $current_res[0]['type_id'];?>">选择练习篇章</a></li>
    <li>&gt;&gt;</li>
    <li>查看历史成绩</li>
  </ol>

 <div class="container">
   <h1 class="passage_title">所选文章名称</h1>

   <div class="panel panel-default">
     <ul class="list-group">
         <li class="list-group-item"><h3><?php echo $current_res[0]['eval_grade']?></h3><p>评语:<?php echo $current_res[0]['eval_feedback']?></p></li>
         <?php
 foreach($history_res as $history){ ?>
       <li class="list-group-item"><h3><?php echo $history['eval_grade']?></h3><p>评语:<?php echo $history['eval_feedback']?></p></li>
        <?php
 } ?>
     </ul>
   </div>
 </div>
  <!--[if lte IE 6]>-->
  <script type="text/javascript" src="<?php echo (HOME_JS); ?>belatedPNG.js"></script>
  <script type="text/javascript">
    var __IE6=true;
    DD_belatedPNG.fix('.logo img,.prev img,.next img,img');
  </script>
  <!--[endif]-->
  <script src="<?php echo (HOME_JS); ?>jquery-1.11.2.min.js"></script>
  <script src="<?php echo (HOME_JS); ?>bootstrap.min.js"></script>
  <script src="<?php echo (HOME_JS); ?>jquery.js"></script>
  <script src="<?php echo (TEXT); ?>js/main.js"></script>
  <!--瀑布流-->
  <script src="<?php echo (HOME_JS); ?>jquery.masonry.min.js"></script>
  <script type="text/javascript">
    $(function(){
    
        var $container = $('#masonry');
    
        $container.imagesLoaded( function(){
    
            $container.masonry({
    
                itemSelector : '.box',
    
                gutterWidth : 20,
    
                isAnimated: true,
    
            });
    
        });
    
    });
  </script>
</body>
</html>