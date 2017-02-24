<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/1/16
 * Time: 17:21
 */
namespace Home\Model;
use Think\Model;

class MovieGradeModel extends Model{
    /**
     * 保存上传的电影片段录音
     *
     * @param $movie_id 电影ID
     * @param $segment_id 片段ID
     * @param $time 时间
     * @param $segment_addr 片段命名
     */
    function addSegment($emotion_id,$movie_id,$segment_id,$time,$segment_addr){
        //判断是否有数据
        $res=$this->where("emotion_id=$emotion_id and movid_id=$movie_id and segment_id=$segment_id and user_id=".$_SESSION["user"]['user_id'])->find();
        //如果有数据，则覆盖，没有则添加
        if($res){
            $this->create_time=$time;
            $this->segment_addr=$segment_addr;
            $ress=$this->where("emotion_id=$emotion_id and movid_id=$movie_id and segment_id=$segment_id and user_id=".$_SESSION["user"]['user_id'])->save();
        }else{
            $this->class_id=$_SESSION["user"]['class_id'];
            $this->emotion=$emotion_id;
            $this->movie_id=$movie_id;
            $this->segment_id=$segment_id;
            $this->create_time=$time;
            $this->segment_addr=$segment_addr;
            $this->user_id=$_SESSION['user']['user_id'];
            $ress=$this->add();
        }
        if(!$ress){
            $this->error("操作失败");
        }
    }

    function movieEval(){
        //评分
        //调用moveToHist把分数插入表中，并且改变历史表
    }

    /**
     * 把成绩添加到grade表，并且更新历史表
     *
     * @param $movie_id 电影ID
     * @param $segment_id 片段ID
     * @param $eval_yinzhun 音准
     * @param $eval_qinggan 情感
     * @param $eval_zhongyin 重音
     * @param $eval_yusu 语速
     * @param $eval_jiezou 节奏
     * @param $eval_yudiao 语调
     * @param $eval_total 总分
     */
    function moveToHist($emotion_id,$movie_id,$segment_id,$eval_yinzhun,$eval_qinggan,$eval_zhongyin,$eval_yusu,$eval_jiezou,$eval_yudiao,$eval_total){
        $this->eval_yinzhun=$eval_yinzhun;
        $this->eval_qinggan=$eval_qinggan;
        $this->eval_zhongyin=$eval_zhongyin;
        $this->eval_yusu=$eval_yusu;
        $this->eval_jiezou=$eval_jiezou;
        $this->eval_yudiao=$eval_yudiao;
        $this->eval_total=$eval_total;
        $res=$this->where("emotion_id=$emotion_id and movie_id=$movie_id and segment_id=$segment_id and user_id=".$_SESSION["user"]['user_id'])->save();
        if(!$res){
            $this->error("操作失败");
        }
        //把这个表的数据插入历史表
        $ress=$this->where("emotion_id=$emotion_id and movid_id=$movie_id and segment_id=$segment_id and user_id=".$_SESSION["user"]['user_id'])->find();
        $movie_grade_hist=D("MovieGradeHist");
        $movie_grade_hist->user_id=$ress['user_id'];
        $movie_grade_hist->movie_id=$ress['movie_id'];
        $movie_grade_hist->segment_id=$ress['segment_id'];
        $movie_grade_hist->emotion_id=$ress['emotion_id'];
        $movie_grade_hist->class_id=$ress['class_id'];
        $movie_grade_hist->create_time=$ress['create_time'];
        $movie_grade_hist->segment_addr=$ress['segment_addr'];
        $movie_grade_hist->eval_yinzhun=$ress['eval_yinzhun'];
        $movie_grade_hist->eval_qinggan=$ress['eval_qinggan'];
        $movie_grade_hist->eval_zhongyi=$ress['eval_zhongyin'];
        $movie_grade_hist->eval_yusu=$ress['eval_yusu'];
        $movie_grade_hist->eval_jiezou=$ress['eval_jiezou'];
        $movie_grade_hist->eval_yudiao=$ress['eval_yudiao'];
        $movie_grade_hist->total=$ress['eval_total'];
        $resss=$movie_grade_hist->add();
        if(!$resss){
            $this->error("操作失败");
        }
    }

    function getClassGrade($class_id,$emotion_id,$movie_id,$segment_id){
        $res=$this->where("class_id=$class_id and emotion_id=$emotion_id and movie_id=$movie_id and segment_id=$segment_id and eval_total is not null")->select();
        return $res;
    }

    function getPersonGrade($user_id,$emotion_id,$movie_id,$segment_id){
//        var_dump($user_id);
//        var_dump($emotion_id);
//        var_dump($movie_id);
//        var_dump($segment_id);
        $res=$this->where("user_id=$user_id and emotion_id=$emotion_id and movie_id=$movie_id and segment_id=$segment_id and eval_total is not null")->select();
        //获取班级详细信息
        $model=new Model();
        $sql="select c.class_name,i.institute_name from its_class as c,its_institute as i where c.institute_id=i.institute_id and c.class_id=".$res[0]["class_id"];
        $class_info=$model->query($sql);
//        var_dump($res);
        $res[0]['class_name']=$class_info[0]['class_name'];
        $res[0]['institute_name']=$class_info[0]['institute_name'];
        //个人姓名和学号信息
        $user=D('user');
        $user_info=$user->where("user_id=".$user_id)->find();
        $res[0]['user_name']=$user_info['user_name'];
        $res[0]['user_code']=$user_info['user_code'];
        return $res;
    }

    function getAllStuGrade($class_id,$emotion_id,$movie_id,$segment_id){
        $model=new Model();
        $sql="select u.user_name,u.user_id,g.eval_total from its_movie_grade as g,its_user as u where u.user_id=g.user_id and g.class_id=$class_id and g.emotion_id=$emotion_id and g.movie_id=$movie_id and g.segment_id=$segment_id";
        $res=$model->query($sql);
        return $res;
    }


}