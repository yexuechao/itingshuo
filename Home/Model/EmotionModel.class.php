<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/1/16
 * Time: 17:21
 */
namespace Home\Model;
use Think\Model;

class EmotionModel extends Model{
    /**
     * 电影模块首页，展示四种情感
     *
     * @return mixed 四种情感
     */
    function showEmo(){
        $res=$this->select();
        return $res;
    }


}