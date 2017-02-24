<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/1/16
 * Time: 17:21
 */
namespace Home\Model;
use Think\Model;

class TextGradeHistModel extends Model{
	/*bugbugbugbugbugbugbug*/
    function textHistoryGrade($type_id,$text_id){
        $res=$this->where("type_id=".$type_id." and text_id=".$text_id." and user_id=".$_SESSION['user']['user_id'])->order("create_time desc")->select();
        $common=new CommonModel();
        for($i=0;$i<count($res);$i++){
            $res[$i]['create_time']=$common->changeTime($res[$i]['create_time']);
        }
        return $res;
    }


}