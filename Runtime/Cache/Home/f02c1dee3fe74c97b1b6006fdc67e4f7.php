<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<h1><?php echo $res[0]['text_name']?></h1>
　　<?php
for($i=0;$i<count($res[0]['separate_content']);$i++){ echo $res[0]['separate_content'][$i]; echo "</br>　　"; } ?>
</body>
</html>