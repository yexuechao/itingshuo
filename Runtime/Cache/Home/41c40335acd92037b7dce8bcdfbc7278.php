<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="<?php echo (HOME_CSS); ?>bootstrap.min.css" rel="stylesheet">
	<link  rel="stylesheet" href="<?php echo (HOME_CSS); ?>nav_style.css" type="text/css">
	<link  rel="stylesheet" href="<?php echo (INDEX); ?>css/custom_index.css" type="text/css">
	<link href="<?php echo (INDEX); ?>css/carousel.css" rel="stylesheet">
	<title>GDUFS-TITE i听说</title>
</head>
<body>
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h2 class="modal-title" id="myModalLabel">修改个人资料</h2>
            </div>
            <div class="register">
                <form class="register-sub" autocomplete="off" action="" method="post">
                    <div class="modal-body">
                        <div class="name list">
                            <h3>&nbsp;&nbsp;&nbsp;姓名：</h3>
                            <lable for="name" class="sr-only">name</lable>
                            <input type="text" name="user_name" placeholder="<?php echo $_SESSION['user']['user_name']?>" id="name" autofocus="autofocus" >
                        </div>
                        <div class="set_password list">
                            <h3>原密码：</h3>
                            <lable for="set_password" class="sr-only">set password</lable>
                            <input type="password" name="before_password" placeholder="请输入原密码" id="before_password">
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
                                <div class="select" id="select_class">
                                    <p data-value="选择班级">选择班级</p>
                                    <ul>
                                        <li data-value="选择班级" class="Selected" value1="0">选择班级</li>
                                        <?php
 foreach($all_class as $class){ ?>
                                        <li data-value="<?php echo $class['institute_name'].$class['class_name'] ?>" value1="<?php echo $class['class_id'] ?>"><?php echo $class["institute_name"]; echo $class["class_name"]?></li>
                                        <?php
 } ?>
                                    </ul>
                                    <input type="hidden" value="0" name="class_id" id="fill_class">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" value="" id="submit_info" class="submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
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
			  <li><a href="/its/index.php/Home/Tone/index" title="语音语调"><div class="nav_img2"></div></a></li>
			  <li><a href="/its/index.php/Home/Text/index" title="演讲与散文"><div class="nav_img3"></div></a></li>
			  <li><a href="" title="设置个人信息" data-toggle="modal" data-target="#myModal"><div class="nav_img4"></div></a></li>
			  <li><a href="javascript:void(0)" title="头像"><div class="nav_img_photo"></div></a></li>
          </ul>
        </div><!--/.nav-collapse -->
    </nav>


<div>
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class=""></li>
			<li data-target="#myCarousel" data-slide-to="1" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="2" class=""></li>
		</ol>
		<div class="carousel-inner" role="listbox">
			<div class="item active">
				<img class="second-slide" src="<?php echo (INDEX); ?>img/bg_colour.png" alt="Second slide">
				<div class="container">
					<div class="carousel-caption">
						<div><img src="<?php echo (INDEX); ?>img/1_white.png"> </div>
						<div><p>此处输入关于影视配音的介绍文本</p></div>
					</div>
				</div>
			</div>

			<div class="item">
				<img class="first-slide" src="<?php echo (INDEX); ?>/img/bg_colour.png" alt="First slide">
				<div class="container">
					<div class="carousel-caption">
						<div><img src="<?php echo (INDEX); ?>img/2_white.png"> </div>
						<div><p>此处输入关于语音语调练习的介绍文本</p></div>

					</div>
				</div>
			</div>

			<div class="item">
				<img class="third-slide" src="<?php echo (INDEX); ?>img/bg_colour.png" alt="Third slide">
				<div class="container">
					<div class="carousel-caption">
						<div><img src="<?php echo (INDEX); ?>img/3_white.png"> </div>
						<div><p>此处输入关于演讲与散文练习的介绍文本</p></div>
					</div>
				</div>
			</div>
		</div>
		<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
</div>
	<div class="container">
		<div class="row">
			<a href="/its/index.php/Home/Movie/index"><div class="col-md-4 button1"></div></a>
			<a href="/its/index.php/Home/Tone/index"><div class="col-md-4 button2"></div></a>
			<a href="/its/index.php/Home/Text/index"><div class="col-md-4 button3"></div></a>
		</div>
	</div>
	<script src="<?php echo (HOME_JS); ?>jquery-1.11.2.min.js"></script>
	<script src="<?php echo (HOME_JS); ?>bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo (HOME_JS); ?>jquery.js"></script>
	<script type="text/javascript" src="<?php echo (HOME_JS); ?>modal.js"></script>
</body>
</html>