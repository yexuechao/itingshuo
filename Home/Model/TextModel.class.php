<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/1/16
 * Time: 17:21
 */
namespace Home\Model;
use Think\Model;

class TextModel extends Model{
    /**
     * 一个类型下所有文章
     *
     * 有用户参与，是否完成，是否批改，成绩如何,修改时间戳
     *
     * @param $type_id 类型ID
     * @return mixed 所有文章信息，涉及用户
     */
    function textList($type_id){
        //select出所有这个类型的文章
        $res=$this->where("type_id=".$type_id)->select();
        //判断该用户是否完成
        $text_grade=new TextGradeModel();
        //如果完成则为$res数据插上finish=1 否则插上finish=0
        $res=$text_grade->hasFinished($res,$type_id);
        //如果已经批改则为$res插上correct=1,否则correct=0
        $res=$text_grade->hasEvaluated($res,$type_id);
        //修改时间戳
        for($i=0;$i<count($res);$i++){
            if($res[$i]['correct']==1){
                $res[$i]['status']="已经批改";
            }else if($res[$i]['finish']==1){
                $res[$i]['status']="已经完成";
            }else{
                $res[$i]['status']="没有完成";
            }
        }
        $common=new CommonModel();
        for($i=0;$i<count($res);$i++){
            $res[$i]['create_time']=$common->changeTime($res[$i]['create_time']);
        }
        return $res;
    }

    /**
     * 显示具体的文本
     *
     * @param $type_id 类型ID
     * @param $text_id 文本ID
     * @return mixed 返回具体文本内容
     */
    function text($type_id,$text_id){
        $res=$this->where("type_id=".$type_id." and text_id=".$text_id)->order("text_id")->select();
        return $res;
    }

    function finishNum($type_id,$res){
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
            //第二个for 为了插上完成度
            for($j=0;$j<count($res);$j++){
                $sql="select user_id from its_upload_text_list where class_id=".$class_id[$i]["class_id"]." and text_type_id=".$type_id." and text_id=".$res[$j]["text_id"]." group by user_id,text_id,text_type_id";
                $result=$model->query($sql);
                $finishNum=count($result);
                $res[$j]["finishNum"]+=$finishNum;
            }
        }
//        show_bug($res);
//        var_dump($segment_id);
        return $res;

    }





}