<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="<?php echo (HOME_CSS); ?>bootstrap.min.css" >
	  <link  rel="stylesheet" href="<?php echo (HOME_CSS); ?>te_nav_style.css">
	  <link  rel="stylesheet" href="<?php echo (MOVIE); ?>css/choose_film_teacher.css">
	<title>GDUFS-TITE i听说</title>
</head>
<body class="custom_container">
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
          <li><a href="/its/index.php/Home/movie/indexTeacher"><div class="film_dubbing"></div></a></li>
          <li><a href="/its/index.php/Home/tone/indexTeacher"><div class="pronounciation_and_intonation"></div></a></li>
          <li><a href="/its/index.php/Home/text/indexTeacher"><div class="speech_and_essay"></div></a></li>
        </ul>
      </li>
      <li>
        <a href="/its/index.php/Home/correct/correctIndex"><div class="correct"></div></a>
        <ul>
          <li><a href="/its/index.php/Home/correct/correctIndex"><div class="speech_and_essay"></div></a></li>
        </ul>
      </li>
      <li><a href="javascript:void(0)" title="头像"><div class="nav_img_photo"></div></a></li>
    </ul>
  </div><!--/.nav-collapse -->
</nav>

  <ol class="custom_navigate list-unstyled">
    <li><a href="/its/index.php/Home/movie/indexTeacher">选择电影情绪</a></li>
    <li>&gt;&gt;</li>
    <li class="custom_active">选择电影</li>
  </ol>

  <div id="masonary" class="container container-fluid">
    <ul class="list-unstyled">
      <?php
 foreach($res as $movie){ ?>
      <li>
        <div class="media jumbotron custom_film box">
          <div class="media-left">
              <img class="media-object" src="/its/<?php echo $movie['cover_addr']?>" alt="神盾局">
          </div>
          <div class="media-body">
            <h2 class="media-heading"><?php echo $movie['movie_name']?><!--<small>2:22//电影片段时长</small>--></h2>
            <p title="<?php echo $movie['movie_introduction']?>"><?php echo $movie['short_introduction']?></p>
            <!-- 跳转写在这里啊、player页面 -->
            <a href="/its/index.php/Home/movie/showMovieTeacher?movie_id=<?php echo $movie['movie_id']; ?>&emotion_id=<?php echo $emotion_id; ?>"><div class="button"></div></a>
          </div>
        </div>
      </li>
      <?php
 } ?>
    </ul>
  </div>
  <!--[if lte IE 6]>-->
  <script type="text/javascript" src="<?php echo (HOME_JS); ?>belatedPNG.js"></script>
  <script type="text/javascript">
    var __IE6=true;
    DD_belatedPNG.fix('.logo img,.prev img,.next img,img');
  </script>
  <!--[endif]-->
  <script src="<?php echo (HOME_JS); ?>jquery-1.11.2.min.js"></script>
  <script src="<?php echo (HOME_JS); ?>bootstrap.min.js"></script>
  <script src="<?php echo (HOME_JS); ?>jquery.js"></script>
  <script src="<?php echo (MOVIE); ?>js/main.js"></script>
  <!--瀑布流-->
  <script src="<?php echo (HOME_JS); ?>jquery.masonry.min.js"></script>
  <script type="text/javascript">
    $(function(){
    
        var $container = $('#masonry');
    
        $container.imagesLoaded( function(){
    
            $container.masonry({
    
                itemSelector : '.box',
    
                gutterWidth : 20,
    
                isAnimated: true,
    
            });
    
        });
    
    });
  </script>
</body>
</html>