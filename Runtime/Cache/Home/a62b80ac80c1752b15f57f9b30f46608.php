<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo (HOME_CSS); ?>bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo (CORRECT); ?>css/te_index.css">
    <link rel="stylesheet" href="<?php echo (HOME_CSS); ?>te_nav_style.css">
    <link rel="stylesheet" href="<?php echo (CORRECT); ?>css/hamburgerMenu.css">
    <title>GDUFS-TITE i听说</title>
</head>
<body >
<nav class="navbar navbar-default navbar-fixed-top nav_custom" id="menu-wrap">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
       <a class="navbar-brand" href="#" title="i听说"><div class="logo"></div></a>
    </div>
    <div id="navbar" class="navbar-collapse collapse" aria-expanded="false" style="height: 1.11111px;">
        <div id="menu-trigger"></div>
        <ul class="nav navbar-nav navbar-right" id="menu">
            <li>
                <a href=""><div class="query"></div></a>
                <ul>
                    <li><a href="/its/index.php/Home/movie/indexTeacher"><div class="film_dubbing"></div></a></li>
                    <li><a href="/its/index.php/Home/tone/indexTeacher"><div class="pronounciation_and_intonation"></div></a></li>
                    <li><a href="/its/index.php/Home/text/indexTeacher"><div class="speech_and_essay"></div></a></li>
                </ul>
            </li>
            <li>
                <a href=""><div class="correct"></div></a>
                <ul>
                    <li><a href="/its/index.php/Home/correct/correctIndex"><div class="speech_and_essay"></div></a></li>
                </ul>
            </li>
            <li><a href="javascript:void(0)" title="头像"><div class="nav_img_photo"></div></a></li>
        </ul>
    </div><!--/.nav-collapse -->
</nav>
<!--hamburgerMenu-->
<div class="container">
    <div class="menu">
        <div class="menu1">
        <ul class="hamburger">
            <li class="item" id="lettuce">
                <img src="<?php echo (INDEX); ?>/img/query+.png">
            </li>
            <li class="item" id="pickle">
                <a href="/its/index.php/Home/movie/indexTeacher" title="查看影视配音成绩"><img src="<?php echo (INDEX); ?>img/film_dubbing+.png"></a>
            </li>
            <li class="item" id="cheese">
                <a href="/its/index.php/Home/tone/indexTeacher" title="查看语音语调成绩"><img src="<?php echo (INDEX); ?>img/pronounciation_and_intonation+.png"></a>
            </li>
            <li class="item" id="bacon">
                <a href="/its/index.php/Home/text/indexTeacher" title="查看演讲与散文成绩"><img src="<?php echo (INDEX); ?>img/speech_and_essay+.png"></a>
            </li>
            <li class="item" id="burger">
                &nbsp;
            </li>
        </ul>
        </div>
        <div class="menu2">
        <ul class="hamburger2">
            <li class="item2" id="lettuce2">
                <img src="<?php echo (INDEX); ?>img/correct+.png">
            </li>
            <li class="item2" id="pickle2">
                &nbsp;
            </li>
            <li class="item2" id="cheese2">
                <a href="/its/index.php/Home/correct/correctIndex" title="批改演讲与散文成绩"><img src="<?php echo (INDEX); ?>img/speech_and_essay+.png"></a>
            </li>
            <li class="item2" id="bacon2">
                &nbsp;
            </li>
            <li class="item2" id="burger2">
                &nbsp;
            </li>
        </ul>
        </div>
    </div>
</div>
<!--[if lte IE 6]>
<script type="text/javascript" src="<?php echo (HOME_JS); ?>}belatedPNG.js"></script>
<script type="text/javascript">
    var __IE6=true;
    DD_belatedPNG.fix('.logo img,.prev img,.next img,img');
</script>
<![endif]-->
<script src="<?php echo (HOME_JS); ?>jquery-1.11.2.min.js"></script>
<script src="<?php echo (CORRECT); ?>js/hamburgerMenu.js"></script>
<script src="<?php echo (HOME_JS); ?>bootstrap.min.js"></script>
<script src="<?php echo (HOME_JS); ?>jquery.js"></script>

</body>
</html>