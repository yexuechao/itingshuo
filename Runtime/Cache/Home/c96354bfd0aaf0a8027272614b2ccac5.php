<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>Choosing</title>
    <!-- Bootstrap -->
    <link href="<?php echo (HOME_CSS); ?>bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo (INDEX); ?>css/register.css" rel="stylesheet" type="text/css">
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo (HOME_JS); ?>jquery-1.11.2.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo (HOME_JS); ?>bootstrap.min.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!-- [if lt IE 9]
      <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    [endif] -->
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
<body>
<div class="container">
    <div class="register">
        <form class="form-horizontal register-sub" action="/its/index.php/Home/Index/register" method="post" autocomplete="off">
            <div class="form-group name list">
                <lable for="name" class="sr-only">name</lable>
                <input type="text" name="user_name" placeholder="姓名" id="user_name" autofocus="autofocus" >
            </div>
            <div class="form-group stu_number list">
                <lable for="stu_number" class="sr-only">student number</lable>
                <input type="text" name="user_code" placeholder="学号" id="user_code">
            </div>
            <div class="form-group set_password list">
                <lable for="set_password" class="sr-only">set password</lable>
                <input type="password" name="pwd" placeholder="设置密码" id="set_password">
            </div>
            <div class="form-group set_password list">
                <lable for="reset_password" class="sr-only">reset password</lable>
                <input type="password" name="reset_pwd" placeholder="再次输入密码" id="reset_password">
            </div>
            <div class="form-group select_class list">
                <div class="content">
                    <div class="select" id="select_class">
                        <p data-value="选择班级">选择班级</p>
                        <ul>
                            <li data-value="选择班级" class="Selected">选择班级</li>
                            <?php
 foreach($res as $class){ ?>
                            <li data-value="<?php echo $class['institute_name'].$class['class_name'] ?>" value="<?php echo $class['class_id'] ?>"><?php echo $class["institute_name"]; echo $class["class_name"]?></li>
                            <?php
 } ?>
                        </ul>
                    </div>
                </div>
                <input type="hidden" value="" name="class_id" id="fill_class">
            </div>
            <div class="button" id="button">
                <input name="" type="submit" value=""/>
            </div>
        </form>
    </div>
</div>
<script src="<?php echo (INDEX); ?>js/register.js"></script>
</body>
</html>