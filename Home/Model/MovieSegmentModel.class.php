<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/1/16
 * Time: 17:21
 */
namespace Home\Model;
use Think\Model;

class MovieSegmentModel extends Model{
    function showSegment($movie_id,$emotion_id){
        $res=$this->where("movie_id=".$movie_id." and emotion_id=".$emotion_id)->select();
//        $res=$this->segmentIntro($res);
        return $res;
    }

    function segmentIntro($res){
//        var_dump($res);
        for($i=0;$i<count($res);$i++){
            $ress=explode("##",$res[$i]["content"]);
            $res[$i]["segment_introduction"]=$ress[0];
        }
        return $res;
    }

    function finishNum($emotion_id,$movie_id,$segment_id){
        //先知道老师管理哪个班
        $manage_class=D("ManageClass");
        //可能存在多个班级
        $class_id=$manage_class->where("user_id=".$_SESSION['user']['user_id'])->select();
        //先初始化完成度为0
        for($i=0;$i<count($segment_id);$i++){
            $segment_id[$i]["finishNum"]=0;
        }
        //给class_id一个for语句
        $model=new Model();
        for($i=0;$i<count($class_id);$i++){
            //第二个for 为了给对应的segment插上完成度
            for($j=0;$j<count($segment_id);$j++){
                $sql="select count(segment_id) as finishNum from its_movie_grade where class_id=".$class_id[$i]["class_id"]." and segment_id=".$segment_id[$j]["segment_id"];
                $result=$model->query($sql);
                $segment_id[$j]["finishNum"]+=$result[0]["finishNum"];
            }
        }
//        var_dump($segment_id);
        return $segment_id;

    }


}