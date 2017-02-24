<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo (HOME_CSS); ?>bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo (HOME_CSS); ?>check_class_result.css">
    <link rel="stylesheet" href="<?php echo (HOME_CSS); ?>te_nav_style.css">
    <link rel="stylesheet" href="<?php echo (HOME_CSS); ?>button_styles.css">
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
        <a class="navbar-brand" href="#">i听说</a>
    </div>
    <div id="navbar" class="navbar-collapse collapse" aria-expanded="false" style="height: 1.11111px;">
        <div id="menu-trigger"></div>
        <ul class="nav navbar-nav navbar-right" id="menu">
            <li>
                <a href=""><div class="query"></div></a>
                <ul>
                    <li><a href=""><div class="film_dubbing"></div></a></li>
                    <li><a href=""><div class="pronounciation_and_intonation"></div></a></li>
                    <li><a href=""><div class="speech_and_essay"></div></a></li>
                </ul>
            </li>
            <li>
                <a href=""><div class="correct"></div></a>
                <ul>
                    <li><a href=""><div class="speech_and_essay"></div></a></li>
                </ul>
            </li>
            <li><a href="javascript:void(0)" title="头像"><div class="nav_img_photo"></div></a></li>
        </ul>
    </div><!--/.nav-collapse -->
</nav>

<div class="container">
    <div class="top">
        <section class="model-9">
          <div class="checkbox">
            <input type="checkbox" id="check_box_choose">
            <label></label>
          </div>
      </section>
    </div>
    <div id="iFrame1">
        <iframe name= "iFrame1" class="leftlink" src= "/its/index.php/Home/correct/leftLinkMovie" scrolling= "auto" frameborder= "0"> </iframe>
    </div>
    <div id="iFrame2">
        <iframe name= "iFrame2" class="right" src= "/its/index.php/Home/correct/chooseFlag" scrolling= "auto" frameborder= "0"> </iframe>
    </div>
</div>
<script src="<?php echo (HOME_JS); ?>jquery-1.11.2.min.js"></script>
<script src="<?php echo (HOME_JS); ?>bootstrap.min.js"></script>
<script src="<?php echo (HOME_JS); ?>jquery.js"></script>
<!--[if lte IE 6]>
<script type="text/javascript" src="<?php echo (HOME_JS); ?>belatedPNG.js"></script>
<script type="text/javascript">
    var __IE6=true;
    DD_belatedPNG.fix('.logo img,.prev img,.next img,img');
</script>
<![endif]-->
<script type="text/javascript">
    $(document).ready(function(){
//        $("#left_link li a:eq(0)").css({color:"#3DAEC3","font-weight":"bold"});
        $("#left_link li a").click(
                function(){
                    //所有先变成浅色
//                    $("#left_link li a").css({color:"#69BDCE","text-decoration":"none","font-weight":"normal"});
//                    $(this).css({color:"#3DAEC3","font-weight":"bold"});
                    $("#left_link li a").removeClass("hover_color");
                    $(this).addClass("hover_color");
                }
        );

        $("#check_box_choose").click(function(){


        })
    })

</script>
</body>
</html>