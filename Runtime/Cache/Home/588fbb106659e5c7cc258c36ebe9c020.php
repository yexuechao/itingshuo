<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?php echo (HOME_CSS); ?>bootstrap.min.css" rel="stylesheet">
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
    .not_marked{
        color:#70C3D2;
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
            <td>批改状态</th>
        </tr>
    </thead>
    <tbody>
    <?php
 for($i=0;$i<count($res);$i++){ ?>
        <tr>
            <td class="col-1"><?php echo $res[$i]['user_name']?></br>
            <?php echo $res[$i]['text_name']?></br>
            <?php echo $res[$i]['upload_time'];?></td>
            <td class="not_marked">未批改<a href="/its/index.php/Home/correct/evalChange?text_id=<?php echo $res[$i]['text_id']?>&type_id=<?php echo $res[$i]['type_id']?>&user_id=<?php echo $res[$i]['user_id']?>&$upload_time=<?php echo $res[$i]['upload_time']?>&class_id=<?php echo $class_id; ?>"><img src="<?php echo (CORRECT); ?>img/批改.png" title="批改作业"></a></td>
        </tr>
    <?php
 } ?>
    </tbody>
</table>
</div>
</body>
</html>