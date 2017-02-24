<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
    *{
	padding:0px;
	margin:0px;
    }
	ul{
		list-style: none;
		font-family:"微软雅黑";
		font-size: 24px;
    }
	ul li{
		height:45px;
		border-bottom:1px solid gray;
		text-align: center;
		line-height: 45px;	
	}
    ul li a{
    	color:#69BDCE;
    	text-decoration:none;
    }

	ul li a:hover,.hover_color{
		color:#3DAEC3;
		font-weight: bold;
	}
    </style>
</head>
<body>
<ul id="left_link">
	<?php
 for($i=0;$i<count($class);$i++){ ?>
	<li><a href="class_result.html" class="<?php if($i==0){echo 'hover_color';}?>" target="iFrame2"><?php echo $class[$i]['institute_name'],$class[$i]['class_name']?></a></li>
	<?php
 } ?>
</ul>
</body>
</html>