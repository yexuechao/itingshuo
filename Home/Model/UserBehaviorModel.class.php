<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/1/16
 * Time: 17:21
 */
namespace Home\Model;
use Think\Model;

class UserBehaviorModel extends Model{
    function addbehavior($url_id,$time_gap){
        $this->url_id=$url_id;
        $this->user_id=$_SESSION['user']['user_id'];
        $this->url_timestamp=$time_gap;
        $res=$this->add();
        if($res){
            return true;
        }else{
            return false;
        }
    }

    function getUrlId($url){
        $url_chart=D('Url');
        $res=$url_chart->field("url_id")->where("url='".$url."''")->select();
        return $res[0]['url_id'];
    }

}