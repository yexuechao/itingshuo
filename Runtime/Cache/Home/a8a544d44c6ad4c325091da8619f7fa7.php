<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo (HOME_CSS); ?>bootstrap.min.css">
    <link  rel="stylesheet" href="<?php echo (HOME_CSS); ?>style.css">
    <!--加载了两个bootstrap.min.css，这两个bootstrap是不同的，都要加载-->
    <link  rel="stylesheet" href="<?php echo (HOME_CSS); ?>nav_style.css">
    <link  rel="stylesheet" href="<?php echo (MOVIE); ?>css/bootstrap.min.css">
    <link  rel="stylesheet" href="<?php echo (MOVIE); ?>css/video-default.css">
    <link  rel="stylesheet" href="<?php echo (MOVIE); ?>css/choose_film_segment.css">
    <link rel="stylesheet" href="<?php echo (MOVIE); ?>css/reveal.css">   
    <style> 
        body{padding-top: 10px}
    </style>
    <title>GDUFS-TITE i听说</title>
    
</head>
<body class="custom_container">
<div id="myModal" class="reveal-modal">
        <h2 class="title">修改个人资料</h2>
            <div class="register">
                <form class="register-sub" autocomplete="off">
                    <div class="my-body">
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
                    <div class="footer">
                        <input type="submit" value="" class="submit" style="float:right;">
                        <a class="close-reveal-modal">&#215;</a>
                    </div>
                </form>
            </div>
</div>


<!-- 导航栏 -->
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
            <li><a href="" title="设置个人信息"  data-reveal-id="myModal"><div class="nav_img4"></div></a></li>
            <li><a href="javascript:void(0)" title="头像"><div class="nav_img_photo"></div></a></li>
        </ul>
    </div><!--/.nav-collapse -->
</nav>
<!-- 路径导航 -->
<ol class="custom_navigate list-unstyled">
    <li><a href="/its/index.php/Home/movie/index">选择电影情绪</a></li>
    <li>&nbsp;&gt;&gt;&nbsp;</li>
    <li><a href="/its/index.php/Home/movie/emoSelect?emotion_id=<?php echo $emotion_id; ?>">选择电影</a></li>
    <li>&nbsp;&gt;&gt;&nbsp;</li>
    <li class="custom_active">选择电影片段</li>
</ol>

<!-- 主体页面 -->
<div class="container">
    <div class="upper_part">
        <!-- 视频窗口 -->
        <div class="upper_left">
            <div class="videoUiWrapper thumbnail">
                <video width="558" height="365"  id="demo1">
                    <source src="/its/<?php echo $segment_addr;?>" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
            <div class="record_div">
               <iframe src="/its/index.php/Home/movie/record" frameborder="0" width="600px"></iframe>
            </div>
        </div>
        
        <!-- 视频片段选择 -->
        <div class="film_segment_box ">
            <ul class="list-unstyled">    
            <?php
 foreach($res as $segment){ ?> 
                <li>
                    <div class="custom_film">
                        <div class="li_left">
                            <img src="/its/<?php echo $segment['segment_cover']; ?>" alt="">
                        </div>
                        <div class="li_body">
                            <h3 class="film_name"><?php echo $segment['segment_name']?></h3>
                            <p class="intro" title="<?php echo $segment['content']?>"><?php echo $segment['short_segment']?></p>
                            <a href="/its/index.php/Home/movie/showMovie?emotion_id=<?php echo $segment['emotion_id']?>&movie_id=<?php echo $segment['movie_id']?>&segment_id=<?php echo $segment['segment_id'];?>&segment_addr=<?php echo $segment['segment_addr']?>"><input type="button" class="button"></a>
                        </div>
                    </div>
                </li>
                <?php
 } ?>
            </ul>
        </div>
        <!-- 视频片段选择窗口 -->
    </div>
    <div class="down_part">
        <?php
 for($i=0;$i<count($segment_separate);$i++){ ?>
        <!--<p class="lines">-->
        <?php echo $segment_separate[$i]; ?></br>
        <!--</p>-->
        <?php
 } ?>
    </div>
</div>
<script src="<?php echo (HOME_JS); ?>jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.6.min.js"></script>
<script src="<?php echo (HOME_JS); ?>jquery.reveal.js"></script>
<script src="<?php echo (HOME_JS); ?>bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo (MOVIE); ?>js/jquery.video-ui.js"></script>
<script type="text/javascript" src="<?php echo (HOME_JS); ?>swfobject.js"></script>
<script type="text/javascript" src="<?php echo (HOME_JS); ?>recorder.js"></script>
<script type="text/javascript" src="<?php echo (HOME_JS); ?>modal.js"></script>
<script type="text/javascript">
    $("#record_next").click(function(){
        $("#record_next").css("display","none");
        $("#stop_last").css("display","inline-block");
    })
    $("#stop_last").click(function(){
        $("#stop_last").css("display","none");
        $("#record_next").css("display","inline-block");
    })
    $('#demo1').videoUI();
//    var audio ;
//    var audio2;
//    var initAudio = function(){
//        audio = document.getElementById('audio');
//        audio2=document.getElementById('audio2');
//    }
//    function getCurrentTime(id){
//        alert(parseInt(audio.currentTime) + '：秒');
//    }
//
//    function audioplayOrPaused(id,obj){
//        audio = document.getElementById('audio');
//        if(audio.paused){
//            audio.play();
//            return;
//        }
//        audio.pause();
//    }
//    function audio2playOrPaused(id,obj){
//        audio2=document.getElementById('audio2');
//        if(audio2.paused){
//            audio2.play();
//            return;
//        }
//        audio2.pause();
//    }
</script>
</body>
</html>