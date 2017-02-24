<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/1/16
 * Time: 17:21
 */
namespace Home\Model;
use Think\Model;

class SenGradeModel extends Model{
    /**
     * 保存上传的语音语调录音
     *
     * @param $course_id 课程ID
     * @param $sentence_id 句子ID
     * @param $time 时间
     * @param $sen_addr 句子命名
     */
    function addSentence($course_id,$sentence_id,$time,$sen_addr){
        //判断是否有数据
        $res=$this->where("course_id=$course_id and sentence_id=$sentence_id and user_id=".$_SESSION["user"]['user_id'])->find();
        //如果有数据，则覆盖，没有则添加
        if($res){
            $this->create_time=$time;
            $this->sen_addr=$sen_addr;
            $this->eval_yinzhun=null;
            $this->eval_qinggan=null;
            $this->eval_zhongyi=null;
            $this->eval_yusu=null;
            $this->eval_jiezou=null;
            $this->eval_yudiao=null;
            $this->total=null;
            $ress=$this->where("course_id=$course_id and sentence_id=$sentence_id and user_id=".$_SESSION["user"]['user_id'])->save();
        }else{
            $this->sentence_id=$course_id;
            $this->sentence_id=$sentence_id;
            $this->class_id=$_SESSION['user']['class_id'];
            $this->create_time=$time;
            $this->sen_addr=$sen_addr;
            $this->user_id=$_SESSION['user']['user_id'];
            $ress=$this->add();
        }
        if(!$ress){
            $this->error("操作失败");
        }
    }

    function senEval(){
        //评分
        //调用moveToHist把分数插入表中，并且改变历史表
    }

    /**
     * 把成绩添加到grade表，并且更新历史表
     *
     * @param $course_id 课程ID
     * @param $sentence_id 句子ID
     * @param $eval_yinzhun 音准
     * @param $eval_qinggan 情感
     * @param $eval_zhongyin 重音
     * @param $eval_yusu 语速
     * @param $eval_jiezou 节奏
     * @param $eval_yudiao 语调
     * @param $eval_total 总分
     */
    function moveToHist($course_id,$sentence_id,$eval_yinzhun,$eval_qinggan,$eval_zhongyin,$eval_yusu,$eval_jiezou,$eval_yudiao,$eval_total){
        $this->eval_yinzhun=$eval_yinzhun;
        $this->eval_qinggan=$eval_qinggan;
        $this->eval_zhongyin=$eval_zhongyin;
        $this->eval_yusu=$eval_yusu;
        $this->eval_jiezou=$eval_jiezou;
        $this->eval_yudiao=$eval_yudiao;
        $this->eval_total=$eval_total;
        $res=$this->where("course_id=$course_id and sentence_id=$sentence_id and user_id=".$_SESSION["user"]['user_id'])->save();
        if(!$res){
            $this->error("操作失败");
        }
        //把这个表的数据插入历史表
        $ress=$this->where("course_id=$course_id and sentence_id=$sentence_id and user_id=".$_SESSION["user"]['user_id'])->find();
        $sen_grade_hist=D("SenGradeHist");
        $sen_grade_hist->user_id=$ress['user_id'];
        $sen_grade_hist->sentence_id=$ress['sentence_id'];
        $sen_grade_hist->course_id=$ress['course_id'];
        $sen_grade_hist->class_id=$ress['class_id'];
        $sen_grade_hist->create_time=$ress['create_time'];
        $sen_grade_hist->sen_addr=$ress['sen_addr'];
        $sen_grade_hist->eval_yinzhun=$ress['eval_yinzhun'];
        $sen_grade_hist->eval_qinggan=$ress['eval_qinggan'];
        $sen_grade_hist->eval_zhongyi=$ress['eval_zhongyin'];
        $sen_grade_hist->eval_yusu=$ress['eval_yusu'];
        $sen_grade_hist->eval_jiezou=$ress['eval_jiezou'];
        $sen_grade_hist->eval_yudiao=$ress['eval_yudiao'];
        $sen_grade_hist->total=$ress['eval_total'];
        $resss=$sen_grade_hist->add();
        if(!$resss){
            $this->error("操作失败");
        }
    }

    function getClassGrade($class_id,$course_id,$sentence_id){
        $res=$this->where("class_id=$class_id and course_id=$course_id and sentence_id=$sentence_id and eval_total is not null")->select();
        return $res;
    }

    function getPersonGrade($user_id,$course_id,$sentence_id){
//        var_dump($user_id,"fff",$course_id,"ffff",$sentence_id);
        $res=$this->where("user_id=$user_id and course_id=$course_id and sentence_id=$sentence_id")->select();
        //获取班级详细信息
//        var_dump($res);
        $model=new Model();
        $sql="select c.class_name,i.institute_name from its_class as c,its_institute as i where c.institute_id=i.institute_id and c.class_id=".$res[0]["class_id"];
        $class_info=$model->query($sql);
        $res[0]['class_name']=$class_info[0]['class_name'];
        $res[0]['institute_name']=$class_info[0]['institute_name'];
        //个人姓名和学号信息
        $user=D('user');
        $user_info=$user->where("user_id=".$user_id)->find();
        $res[0]['user_name']=$user_info['user_name'];
        $res[0]['user_code']=$user_info['user_code'];
        return $res;
    }

    function getAllStuGrade($class_id,$course_id,$sentence_id){
        $model=new Model();
        $sql="select u.user_name,u.user_id,g.eval_total from its_sen_grade as g,its_user as u where u.user_id=g.user_id and g.class_id=$class_id and g.course_id=$course_id and g.sentence_id=$sentence_id";
        $res=$model->query($sql);
        return $res;
    }

}