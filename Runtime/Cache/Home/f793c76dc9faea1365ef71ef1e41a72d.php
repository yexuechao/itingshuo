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
	<li><a href="/its/index.php/Home/movie/gradeResultMovie?emotion_id=<?php echo $emotion_id; ?>&movie_id=<?php echo $movie_id; ?>&segment_id=<?php echo $segment_id?>&class_id=<?php echo $class[$i]['class_id']?>&flag=" class="<?php if($i==0){echo 'hover_color';}?> send_flag" target="iFrame2"><?php echo $class[$i]['institute_name'],$class[$i]['class_name']?></a></li>
	<?php
 } ?>
</ul>
<script src="<?php echo (HOME_JS); ?>jquery-1.11.2.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
//		var origin_href;
		$("#left_link li a").click(
				function(){
//					alert("aaaa");
					$("#left_link li a").removeClass("hover_color");
					$(this).addClass("hover_color");
				}
		);
		$(".send_flag").click(
				function(){
					var value=$("#check_box_value",parent.document).val();
					var href_val=$(this).attr("href");
					var str=href_val.charAt(href_val.length-1);
					if(str!="="){
//						alert("aaa");
						href_val=href_val.substring(0,href_val.length-1);
					}
//					alert(href_val);
					href_val=href_val+value;
					$(this).attr("href",href_val);
				}
		)
	})


</script>

</body>
</html>