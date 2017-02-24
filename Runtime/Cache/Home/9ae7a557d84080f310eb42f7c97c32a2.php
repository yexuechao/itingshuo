<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo (HOME_CSS); ?>bootstrap.min.css" >
    <!--<link rel="stylesheet" href="./css/player_style.css">-->
    <link  rel="stylesheet" href="<?php echo (MOVIE); ?>css/nav_style.css">
    <link  rel="stylesheet" href="<?php echo (MOVIE); ?>css/choose_film_segment.css">
    <link href="<?php echo (MOVIE); ?>css/video-default.css" rel="stylesheet">
    <style>
        body{padding-top: 10px}
    </style>
    <title>GDUFS-TITE i听说</title>
</head>
<body class="custom_container">
<!-- 导航栏 -->
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
            <li><a href="#" title="影视配音"><div class="nav_img1"></div></a></li>
            <li><a href="#" title="语音语调"><div class="nav_img2"></div></a></li>
            <li><a href="#" title="演讲与散文"><div class="nav_img3"></div></a></li>
            <li><a href="#" title="设置个人信息"><div class="nav_img4"></div></a></li>
            <li><a href="javascript:void(0)" title="头像"><div class="nav_img_photo"></div></a></li>
        </ul>
    </div><!--/.nav-collapse -->
</nav>
<!-- 路径导航 -->
<ol class="custom_navigate list-unstyled">
    <li><a href="#">选择电影情绪</a></li>
    <li>&nbsp;&gt;&gt;&nbsp;</li>
    <li><a href="#">选择电影</a></li>
    <li>&nbsp;&gt;&gt;&nbsp;</li>
    <li class="custom_active">选择电影片段</li>
</ol>
<!-- 主体页面 -->
<div class="container">
    <div class="row upper_part">
        <!-- 视频窗口 -->
        <div class="videoUiWrapper thumbnail">
            <video width="494" height="286"  id="demo1">
                <source src="<?php echo (MOVIE); ?>video/1.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
        <!-- 视频片段选择 -->
        <div class="film_segment_box">
            <ul class="list-unstyled">
                <li>
                    <div class="media jumbotron custom_film box">
                        <div class="media-left">
                            <img class="media-object" src="<?php echo (MOVIE); ?>img/image_Agents of SHIELD.png" alt="神盾局">
                        </div>
                        <div class="media-body">
                            <h2 class="media-heading">Agents Of SHIELD</h2>
                            <p>Marvel's Agents of S.H.I.E.L.D. is a fictional peacekeeping and spy agency in a world of superheroes. </p>
                            <input type="button" class="button"></button>
                        </div>
                    </div>
                </li>

            </ul>
        </div>
        <!-- 视频片段选择窗口 -->
    </div>
</div>
<!--[if lte IE 6]>-->
<script type="text/javascript" src="js/belatedPNG.js"></script>
<script type="text/javascript">
    var __IE6=true;
    DD_belatedPNG.fix('.logo img,.prev img,.next img,img');
</script>
<!--[endif]-->
<!--<script src="./js/jquery-1.11.2.min.js"></script>-->
<script src="<?php echo (HOME_JS); ?>bootstrap.min.js"></script>
<script src="<?php echo (HOME_JS); ?>jquery.js"></script>
<script src="<?php echo (MOVIE); ?>js/main_video.js"></script>
<!--<script type="text/javascript" src="assets/js/jquery-1.8.1.min.js"></script>-->
<script type="text/javascript" src="<?php echo (MOVIE); ?>js/jquery.video-ui.js"></script>
<script type="text/javascript" >
    $('#demo1').videoUI();
</script>
</body>
</html>