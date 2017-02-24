<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/1/16
 * Time: 17:21
 */
namespace Home\Model;
use Think\Model;

class TextTypeModel extends Model{
    /**
     * select所有文章类型
     *
     * @return mixed 文章类型
     */
    function showType(){
        $res=$this->select();
        return $res;
    }


}