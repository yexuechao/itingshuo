<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/1/16
 * Time: 17:21
 */
namespace Home\Model;
use Think\Model;

class SentenceModel extends Model{

    function showSentence($course_id){
        $res=$this->where("course_id=".$course_id)->order("sentence_id")->select();
        return $res;
    }

    function sentence($course_id,$sentence_id){
        $res=$this->where("sentence_id=".$sentence_id." and course_id=".$course_id)->select();
        return $res;
    }

    function finishNum($course_id,$res){
        //先知道老师管理哪个班
        $manage_class=D("ManageClass");
        //可能存在多个班级
        $class_id=$manage_class->where("user_id=".$_SESSION['user']['user_id'])->select();
        //先初始化完成度为0
        for($i=0;$i<count($res);$i++){
            $res[$i]["finishNum"]=0;
        }
        //给class_id一个for语句
        $model=new Model();
        for($i=0;$i<count($class_id);$i++){
            //第二个for 为了给对应的segment插上完成度
            for($j=0;$j<count($res);$j++){
                $sql="select count(sentence_id) as finishNum from its_sen_grade where class_id=".$class_id[$i]["class_id"]." and course_id=".$course_id." and sentence_id=".$res[$j]["sentence_id"];
                $result=$model->query($sql);
                $res[$j]["finishNum"]+=$result[0]["finishNum"];
            }
        }
//        var_dump($res);
        return $res;

    }



}