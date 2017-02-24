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
    .personaldetail{
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
        font-size:20px;
    }
    </style>
</head>
<body>
<div class="personaldetail">
    <table width="100%" frame="void" border="0" cellspacing="1" cellpadding="0" bordercolor="#C5C5C5" style="border-collapse:collapse;">
        <thead>
            <tr>
                <td class="col-1"><?php echo $res[0]['user_name']?></th>
                <td class="col-2"><?php echo $res[0]['user_code']?></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="col-1"><div>学生成绩的第一个图</div></td>
                <td class="col-2"><div>学生成绩的第二个图</div></td>
            </tr>
        <tbody>
    </table>
</div>
</body>
</html>