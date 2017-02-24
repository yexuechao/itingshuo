<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/1/16
 * Time: 17:21
 */
namespace Home\Model;
use Think\Model;

class MovieModel extends Model{
    /**
     * 展示对应情感的所有电影
     *
     * @param $emotion_id 情感ID
     * @return mixed 电影
     */
    function moiveList($emotion_id){
        $res=$this->where("emotion_id=".$emotion_id)->select();
        return $res;
    }


}