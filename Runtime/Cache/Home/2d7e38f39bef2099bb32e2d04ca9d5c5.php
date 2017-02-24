<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="<?php echo (HOME_CSS); ?>bootstrap.min.css">
	  <link  rel="stylesheet" href="<?php echo (HOME_CSS); ?>nav_style.css">
	  <link  rel="stylesheet" href="<?php echo (TONE); ?>css/play_and_record.css">
    <script src="<?php echo (HOME_JS); ?>jquery-1.11.2.min.js"></script>
    <script src="<?php echo (HOME_JS); ?>jquery.js"></script>
    <script src="<?php echo (TONE); ?>js/audio.js"></script>
    <script src="<?php echo (TONE); ?>css/bootstrap.min.js"></script>
    <script src="<?php echo (HOME_JS); ?>swfobject.js"></script>
    <script src="<?php echo (HOME_JS); ?>recorder.js"></script>
    <script src="<?php echo (TONE); ?>js/main.js"></script>
    <script>
      var a = audiojs;
      a.events.ready(function() {
        var a1 = a.createAll();
      });
    </script>
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
        <li><a href="/its/index.php/Home/movie/index" title="影视配音"><div class="nav_img1"></div></a></li>
        <li><a href="/its/index.php/Home/tone/index" title="语音语调"><div class="nav_img2"></div></a></li>
        <li><a href="/its/index.php/Home/text/index" title="演讲与散文"><div class="nav_img3"></div></a></li>
			  <li><a href="#" title="设置个人信息"><div class="nav_img4"></div></a></li>
        <li><a href="javascript:void(0)" title="头像"><div class="nav_img_photo"></div></a></li>
      </ul>
    </div><!--/.nav-collapse -->
  </nav>
  <ol class="custom_navigate list-unstyled">
    <li><a href="/its/index.php/Home/tone/index">选择语音语调练习课程</a></li>
    <li>&gt;&gt;</li>
    <li><a href="">选择练习句子</a></li>
    <li>&gt;&gt;</li>
  </ol>

  <div class="container">
  <div class="main_top">
  <h1>One Hundred</h1>
  <div class="main_top_main">
    <audio src="/its/<?php echo $res[0]['sen_addr']; ?>" preload="auto"></audio>
    <div class="record_div">
      <iframe src="/its/index.php/Home/tone/record" frameborder="0" width="800px"></iframe>
    </div>
  </div>
  </div>
  <div class="main_down">
    <p class="sentence"><?php echo $res[0]['content'];?></p>
  </div>
  </div>
  <!--[if lte IE 6]>-->
  <script type="text/javascript" src="<?php echo (HOME_JS); ?>belatedPNG.js"></script>
  <script type="text/javascript">
    var __IE6=true;
    DD_belatedPNG.fix('.logo img,.prev img,.next img,img');
  </script>
  <!--[endif]-->
</body>
</html>