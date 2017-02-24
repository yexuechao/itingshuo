<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?php echo (HOME_CSS); ?>bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!--该页面css-->
    <link rel="stylesheet" type="text/css" href="<?php echo (INDEX); ?>css/login.css" />
    <!--[if lte IE 6]>
    <script type="text/javascript" src="<?php echo (INDEX); ?>js/belatedPNG.js"></script>
    <script type="text/javascript">
        var __IE6=true;
        DD_belatedPNG.fix('.logo img,.prev img,.next img,img');
    </script>
    <script type="text/javascript" src="<?php echo (HOME_JS); ?>jquery-1.12.0.min.js"></script>
    <script type="text/javascript" src="<?php echo (HOME_JS); ?>bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo (HOME_JS); ?>jquery.js"></script>
    <script type="text/javascript" src="<?php echo (INDEX); ?>js/main.js"></script>
    <![endif]-->
    <title>login</title>
</head>

<body>
<div class="container">
    <div class="login">
        <form method="post" action="/its/index.php/Home/index/login" autocomplete="off">
            <div class="form-group username" >
                <lable for="username " class="sr-only"></lable>
                <input type="text" name="user_code" placeholder="账号" id="user_code" >
            </div>
            <div class="form-group password">
                <p>
                    <lable for="password" class="sr-only"></lable>
                    <input type="password" name="pwd" placeholder="密码" id="pwd">
                </p>
            </div>


        <div class="wrong">
            <h5><?php if($_GET["error"]){ echo $_GET["error"]; } ?></h5>
        </div>

        <div class="button" id="button">
            <input name="" type="submit" value=" ">
        </div>
        </form>
        <div class="zzz" style="text-align:center" >
            <a href="/its/index.php/Home/index/registerUrl">注册 &gt;&gt; </a>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo (INDEX); ?>js/register.js"></script>
</body>
</html>