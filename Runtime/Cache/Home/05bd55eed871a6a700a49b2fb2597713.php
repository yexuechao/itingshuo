<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo (HOME_CSS); ?>bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo (CORRECT); ?>css/te_play_correcting_submit.css">
    <link rel="stylesheet" href="<?php echo (HOME_CSS); ?>te_nav_style.css">
    <script src="<?php echo (HOME_JS); ?>jquery-1.11.2.min.js"></script>
    <script src="<?php echo (HOME_JS); ?>jquery.js"></script>
    <script src="<?php echo (CORRECT); ?>js/audio.js"></script>
    <script src="<?php echo (HOME_JS); ?>bootstrap.min.js"></script>
    <title>GDUFS-TITE i听说</title>
     <script>
      var a = audiojs;
      a.events.ready(function() {
        var a1 = a.createAll();
      });
    </script>
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
<ol class="custom_navigate list-unstyled">
    <li><a href="../21.语音语调选择课程/choose_course.html">批改</a></li>
    <li>&gt;&gt;</li>
    <li>谁谁谁--Passage_name</li>
    <li>&gt;&gt;</li>
</ol>
<div class="custom_container">
    <div class="left_wrapper">
        <div class="leftlink">
            <ul>
                <li><a href="correcting_list.html" target="iFrame2">XXX--Passage</a></li>
                <li><a href="correcting_list.html" target="iFrame2">XXX--Passage</a></li>
                <li><a href="correcting_list.html" target="iFrame2">XXX--Passage</a></li>
                <li><a href="correcting_list.html" target="iFrame2">XXX--Passage</a></li>
                <li><a href="correcting_list.html" target="iFrame2">XXX--Passage</a></li>
                <li><a href="correcting_list.html" target="iFrame2">XXX--Passage</a></li>
                <li><a href="correcting_list.html" target="iFrame2">XXX--Passage</a></li>
                <li><a href="correcting_list.html" target="iFrame2">XXX--Passage</a></li>
                <li><a href="correcting_list.html" target="iFrame2">XXX--Passage</a></li>
                <li><a href="correcting_list.html" target="iFrame2">XXX--Passage</a></li>
            </ul>
        </div>
    </div>
    <div class="right">
        <div class="main_top">
             <div class="main_top_main">
                 <audio src="" preload="auto"></audio>
             <div class="main_top_down">
             <a href="#"><div class="last_passage"></div></a>
             <a href="#" data-toggle="modal" data-target="#myModal"><div class="correcting"></div></a>
             <a href="#"><div class="next_passage"></div></a>
             <a href="#"><div class="next_student"></div></a>
             </div> 
             </div>
        </div>
        <div class="main_down">
            <p class="sentence">Stray birds of summer come to my window to sing and fly away.</p>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <img src="<?php echo (CORRECT); ?>img/你的评价)).png" class="modal-title" id="myModalLabel" alt="">
      </div>
      <div class="modal-body">
        <div class="correcting_form">
        <form method="post" action="">
            音准：
            <input type="text" name="" placeholder="请打分"><br/>
            情感：
            <input type="text" name="" placeholder="请打分"><br/>
            重音：
            <input type="text" name="" placeholder="请打分"><br/>
            语速：
            <input type="text" name="" placeholder="请打分"><br/>
            节奏：
            <input type="text" name="" placeholder="请打分"><br/>
            语调：
            <input type="text" name="" placeholder="请打分"><br/>
            评语：
            <textarea name="" id="" cols="30" rows="2" placeholder="请写上你的评语"></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <input type="submit" value="" class="submit">
      </div>
    </div>
      </form>
  </div>
</div>


</body>
</html>