<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo (HOME_CSS); ?>bootstrap.min.css" >
    <link  rel="stylesheet" href="<?php echo (HOME_CSS); ?>nav_style.css">
    <link  rel="stylesheet" href="<?php echo (TONE); ?>css/choose_course.css">
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
          <a class="navbar-brand" href="#" title="i听说"><div class="logo"></div></a>
    </div>
    <div id="navbar" class="navbar-collapse collapse" aria-expanded="false" style="height: 1.11111px;">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="/its/index.php/Home/Movie/index" title="影视配音"><div class="nav_img1"></div></a></li>
        <li><a href="/its/index.php/Home/tone/index" title="语音语调"><div class="nav_img2"></div></a></li>
        <li><a href="/its/index.php/Home/Text/index" title="演讲与散文"><div class="nav_img3"></div></a></li>
			  <li><a href="#" title="设置个人信息" data-toggle="modal" data-target="#myModal"><div class="nav_img4"></div></a></li>
        <li><a href="javascript:void(0)" title="头像"><div class="nav_img_photo"></div></a></li>
      </ul>
    </div><!--/.nav-collapse -->
  </nav>

  <ol class="custom_navigate list-unstyled">
    <li>选择语音语调练习课程</li>
    <li>&gt;&gt;</li>
  </ol>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h2 class="modal-title" id="myModalLabel">修改个人资料</h2>
            </div>
            <div class="register">
                <form class="register-sub" autocomplete="off">
                    <div class="modal-body">
                        <div class="name list">
                            <h3>&nbsp;&nbsp;&nbsp;姓名：</h3>
                            <lable for="name" class="sr-only">name</lable>
                            <input type="text" name="name" placeholder="这里显示原姓名" id="name" autofocus="autofocus" >
                        </div>
                        <div class="set_password list">
                            <h3>原密码：</h3>
                            <lable for="set_password" class="sr-only">set password</lable>
                            <input type="password" name="set_password" placeholder="请输入原密码" id="set_password">
                        </div>
                        <div class="set_password list">
                            <h3>新密码：</h3>
                            <lable for="set_password" class="sr-only">set password</lable>
                            <input type="password" name="set_password" placeholder="请输入新密码" id="set_password">
                        </div>
                        <div class=" set_password list">
                            <h3>新密码：</h3>
                            <lable for="reset_password" class="sr-only">reset password</lable>
                            <input type="password" name="reset_password" placeholder="请再次输入新密码" id="reset_password">
                        </div>
                        <div class=" select_class list">
                            <h3>&nbsp;&nbsp;&nbsp;班级：</h3>
                            <div class="content">
                                <div class="select">
                                    <p data-value="选择班级">选择班级</p>
                                    <ul>
                                        <li data-value="选择班级" class="Selected">选择班级</li>
                                        <li data-value="计算机1班">计算机1班</li>
                                        <li data-value="计算机2班">计算机2班</li>
                                        <li data-value="计算机3班">计算机3班</li>
                                        <li data-value="计算机4班">计算机4班</li>
                                        <li data-value="计算机5班">计算机5班</li>
                                        <li data-value="计算机6班">计算机6班</li>
                                        <li data-value="计算机7班">计算机7班</li>
                                        <li data-value="信管1班">信管1班</li>
                                        <li data-value="电商1班">电商1班</li>
                                        <li data-value="电商2班">电商2班</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" value="" class="submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
  <div id="masonary" class="container container-fluid">
    <ul class="list-unstyled">
      <?php
 foreach($res as $course){ ?>
      <li>
        <div class="media jumbotron custom_film box">
          <div class="media-body">
            <h2 class="media-heading"><?php echo $course['course_name']?><small>共有<?php echo $course['course_num']?>个练习</small></h2>
            <p><?php echo $course['course_introduction']?></p>
            <a href="/its/index.php/Home/tone/sentenceList?course_id=<?php echo $course['course_id']?>"><div class="button"></div></a>
          </div>
        </div>
      </li>
      <?php
 } ?>
    </ul>
  </div>
  
  <script src="<?php echo (HOME_JS); ?>jquery-1.11.2.min.js"></script>
  <script src="<?php echo (HOME_JS); ?>bootstrap.min.js"></script>
  <script src="<?php echo (HOME_JS); ?>jquery.js"></script>
  <script src="<?php echo (HOME_JS); ?>modal.js"></script>
</body>
</html>