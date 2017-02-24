<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <style>
    *{
        padding:0;
        margin:0;
    }
    body{
        background-color:white;
    }
    .personalresult{
        width:689px;
    }
    tr{
        height:40px;
        line-height: 40px;
        text-align: left;
        font-family: "微软雅黑";
    }
    thead tr td{
        color:#70C3D2;
        font-size:24px;
    }
    td{
        color:black;
        font-size:20px;
        padding-left:10px;
    }
    .col-1{
        width:70%;
    }
    a{
        float:right;
    }

    </style>
</head>
<body>
<div class="personalresult">
<table width="100%" frame="void" border="1" cellspacing="1" cellpadding="0" bordercolor="#C5C5C5" style="border-collapse:collapse;">
    <thead>
        <tr>
            <td class="col-1">名单</th>
            <td class="col-2">总评</th>
        </tr>
    </thead>
    <tbody>
        <?php
 foreach($res as $persons){ ?>
        <tr>
            <td class="col-1"><?php echo $persons['user_name']?></td>
            <td class="col-2"><?php echo $persons['eval_grade']?><a href="/its/index.php/Home/text/person?type_id=<?php echo $type_id; ?>&text_id=<?php echo $text_id; ?>&user_id=<?php echo $persons['user_id']?>"><img src="<?php echo (HOME_IMG); ?>详细查看.png" title="详细成绩"></a></td>
        </tr>
        <?php
 } ?>
    </tbody>
</table>
</div>
</body>
</html>