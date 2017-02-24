<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?php echo (HOME_CSS); ?>bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo (MOVIE); ?>css/movie.css" type="text/css" />
    <link  rel="stylesheet" href="<?php echo (HOME_CSS); ?>nav_style.css" type="text/css">
    <title>GDUFS-TITE i听说</title>
    <script src="<?php echo (HOME_JS); ?>jquery-1.11.2.min.js"></script>
    <script src="<?php echo (HOME_JS); ?>bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo (HOME_JS); ?>jquery.js"></script>

    <script>
      $(function(){
        $(".select p").click(function(e){
          $(".select").toggleClass('open');
          e.stopPropagation();
        });
        
        $(".content .select ul li").click(function(e){
          var _this=$(this);
          $(".select > p").text(_this.attr('data-value'));
          _this.addClass("Selected").siblings().removeClass("Selected");
          $(".select").removeClass("open");
          e.stopPropagation();
        });
        
        $(document).on('click',function(){
          $(".select").removeClass("open");
        })
        
      });
    </script>
</head>
<body >
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
            <li><a href="/its/index.php/Home/movie/index" title="影视配音"><div class="nav_img1"></div></a></li>
            <li><a href="/its/index.php/Home/Tone/index" title="语音语调"><div class="nav_img2"></div></a></li>
            <li><a href="/its/index.php/Home/Text/index" title="演讲与散文"><div class="nav_img3"></div></a></li>
            <li><a href="#" title="设置个人信息"  data-toggle="modal" data-target="#myModal"><div class="nav_img4"></div></a></li>
            <li><a href="javascript:void(0)" title="头像"><div class="nav_img_photo"></div></a></li>
        </ul>
    </div><!--/.nav-collapse -->
</nav>
<ol class="custom_navigate list-unstyled">
    <li>选择电影情绪</li>
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
                            <input type="text" name="user_name" placeholder="这里显示原姓名" id="name" autofocus="autofocus" >
                        </div>
                        <div class="set_password list">
                            <h3>原密码：</h3>
                            <lable for="set_password" class="sr-only">set password</lable>
                            <input type="password" name="set_password" placeholder="请输入原密码" id="before_password">
                        </div>
                        <div class="set_password list">
                            <h3>新密码：</h3>
                            <lable for="set_password" class="sr-only">set password</lable>
                            <input type="password" name="pwd" placeholder="请输入新密码" id="set_password">
                        </div>
                        <div class=" set_password list">
                            <h3>新密码：</h3>
                            <lable for="reset_password" class="sr-only">reset password</lable>
                            <input type="password" name="reset_password" placeholder="请再次输入新密码" id="reset_password">
                        </div>
                        <div class=" select_class list">
                            <h3>&nbsp;&nbsp;&nbsp;班级：</h3>
                            <div class="content">
                                <div class="select" id="select_class">
                                    <p data-value="选择班级">选择班级</p>
                                    <ul>
                                        <li data-value="选择班级" class="Selected">选择班级</li>
                                        <?php
 foreach($all_class as $class){ ?>
                                        <li data-value="<?php echo $class['institute_name'].$class['class_name'] ?>" value="<?php echo $class['class_id'] ?>"><?php echo $class["institute_name"]; echo $class["class_name"]?></li>
                                        <?php
 } ?>
                                    </ul>
                                    <input type="hidden" value="" name="class_id" id="fill_class">
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
<div class="container position" >
    <div class="row">
        <div class="col-md-3"><a href="/its/index.php/Home/movie/emoSelect?emotion_id=1"><div class="btn1"></div></a></div>
        <div class="col-md-3"><a href="/its/index.php/Home/movie/emoSelect?emotion_id=2"><div class="btn2"></div></a></div>
        <div class="col-md-3"><a href="/its/index.php/Home/movie/emoSelect?emotion_id=3"><div class="btn3"></div></a></div>
        <div class="col-md-3"><a href="/its/index.php/Home/movie/emoSelect?emotion_id=4"><div class="btn4"></div></a></div>
    </div>
</div>


</body>