<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo (HOME_CSS); ?>bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo (HOME_CSS); ?>slide_style.css">
    <link  rel="stylesheet" href="<?php echo (HOME_CSS); ?>nav_style.css">
    <link  rel="stylesheet" href="<?php echo (TONE); ?>css/choose_sentence.css">
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
    <li><a href="/its/index.php/Home/tone/index">选择语音语调练习课程</a></li>
    <li>&gt;&gt;</li>
    <li>选择练习句子</li>
  </ol>
  <div id="masonary" class="container container-fluid">
    <ul class="list-unstyled">
      <?php
 for($i=0;$i<count($res);$i++){ ?>
      <li>
        <div class="media jumbotron custom_film box">
          <div class="media-body">
            <h2 class="media-heading">句子<?php echo $i+1?><small><?php echo $res[$i]['sen_time']?></small></h2>
            <p><?php echo $res[$i]['content']?></p>
            <a href="/its/index.php/Home/tone/senSelect?course_id=<?php echo $res[$i]['course_id'];?>&sentence_id=<?php echo $res[$i]['sentence_id']; ?>"><div class="button"></div></a>
          </div>
        </div>
      </li>
      <?php
 } ?>
    </ul>
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
  <script src="<?php echo (TONE); ?>js/main.js"></script>
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