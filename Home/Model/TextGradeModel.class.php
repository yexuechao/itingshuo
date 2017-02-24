<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/1/16
 * Time: 17:21
 */
namespace Home\Model;
use Think\Model;

class TextGradeModel extends Model{
    /**
     * 完成的话就添加finish=1,否则finish=0
     *
     * @param $res 这个类型下的所有文章
     * @param $type_id 文章类型
     * @return mixed 处理好的文章，涉及用户信息
     */
    function hasFinished($res,$type_id){
        $upload_text_list=D("UploadTextList");
//        show_bug($type_id);
        $ress=$upload_text_list->field("text_id")->where("user_id=".$_SESSION['user']['user_id']." and text_type_id=".$type_id)->group("user_id,text_type_id,text_id")->select();
        //finish 初始值为0
        for($i=0;$i<count($res);$i++){
            $res[$i]['finish']=0;
        }
//        show_bug($ress);
        //如果$ress里面有，则已经完成
        for($i=0;$i<count($ress);$i++){
            for($j=0;$j<count($res);$j++){
                if($res[$j]['text_id']==$ress[$i]['text_id']){
                    $res[$j]['finish']=1;
                    break;
                }
            }
        }
        //返回修改完finish的$res
//        show_bug($res);
        return $res;
    }
    function hasEvaluated($res,$type_id){
        $ress=$this->field("text_id")->where("user_id=" . $_SESSION['user']['user_id'] . " and type_id=" . $type_id)->group("user_id,type_id,text_id")->select();
        //correct 初始值为0
        for($i=0;$i<count($res);$i++){
            $res[$i]['correct']=0;
        }
//        show_bug($ress);
        //如果$ress里面有，则已经修改
        for($i=0;$i<count($ress);$i++){
            for($j=0;$j<count($res);$j++){
                if($res[$j]['text_id']==$ress[$i]['text_id']){
                    $res[$j]['correct']=1;
                    break;
                }
            }
        }
        //返回修改完correct的$res
        return $res;
    }

    /**
     * 找出文章历史成绩，要用最新表和历史表
     *
     * @param $type_id 类型ID
     * @param $text_id 文本ID
     * @return mixed 最新表和历史表的成绩
     */
    function textHistoryGrade($type_id,$text_id){
        //最新内容表的数据
        $current_res=$this->where("type_id=".$type_id." and text_id=".$text_id." and user_id=".$_SESSION['user']['user_id'])->select();
        //历史表里面的数据
        $text_grade_hist=new TextGradeHistModel();
        $history_res=$text_grade_hist->where("type_id=".$type_id." and text_id=".$text_id." and user_id=".$_SESSION['user']['user_id'])->order("create_time desc")->select();
        $common=new CommonModel();
        for($i=0;$i<count($current_res);$i++){
            $current_res[$i]['create_time']=$common->changeTime($current_res[$i]['create_time']);
        }
        for($i=0;$i<count($history_res);$i++){
            $history_res[$i]['create_time']=$common->changeTime($history_res[$i]['create_time']);
        }
        $res[0]=$current_res;
        $res[1]=$history_res;
        return $res;
    }

    /**
     * 保存上传的文本录音
     *
     * @param $type_id 课程ID
     * @param $text_id 句子ID
     * @param $time 时间
     * @param $text_addr 句子命名
     */
    function addUploadText($type_id,$text_id,$time,$text_addr){
        //先处理upload_text_list表
        $upload_text_list=D("UploadTextList");
        $upload_text_list->user_id=$_SESSION["user"]["user_id"];
        $upload_text_list->text_id=$text_id;
        $upload_text_list->text_type_id=$type_id;
        $upload_text_list->upload_time=$time;
        $upload_text_list->text_addr=$text_addr;
        $upload_text_list->class_id=$_SESSION["user"]["class_id"];
        $upload_text_list->is_pigai=0;
        $res=$upload_text_list->add();
        if(!$res){
            $this->error("操作失败");
        }
    }

    function addText($type_id,$text_id,$time,$user_id,$eval_grade,$eval_feedback){
        //先把is_pigai置为1
        $upload_text_list=D("UploadTextList");
        $upload_text_list->is_pigai=1;
        $upload_text_list->where("user_id=".$user_id." and text_id=".$text_id." and text_type_id=".$type_id." and upload_time=".$time)->save();
        //批改 判断grade是否已经有评分
        $res=$this->where("user_id=".$user_id." and text_id=".$text_id." and type_id=".$type_id)->find();
        $class=D("User");
        $class_id=$class->where("user_id=".$user_id)->find();
        $class_id=$class_id["class_id"];
        if(!$res){
            //寻找他的班级
            //如果没有，插入一条新的
            $this->user_id=$user_id;
            $this->text_id=$text_id;
            $this->type_id=$type_id;
            $this->class_id=$class_id;
            $this->create_time=$time;
            $this->eval_grade=$eval_grade;
            $this->eval_feedback=$eval_feedback;
            $ress=$this->add();
        }else{
            //如果已经有了一条记录
            //把旧的记录转移到历史表
            $this->moveToHist($type_id,$text_id,$res["eval_grade"],$res["eval_feedback"],$user_id,$res["create_time"],$class_id);
            //把新的成绩插入现时表
            $this->eval_grade=$eval_grade;
            $this->eval_feedback=$eval_feedback;
            $this->create_time=$time;
            $ress=$this->where("user_id=".$user_id." and text_id=".$text_id." and type_id=".$type_id)->save();
        }
        if(!$ress){
            $this->error("操作失败");
        }
    }

    /**
     * 评分把文本成绩移到历史表
     *
     * @param $type_id 类型ID
     * @param $text_id 文本ID
     * @param $eval_grade 评分
     * @param $eval_feedback 反馈建议
     */
    function moveToHist($type_id,$text_id,$eval_grade,$eval_feedback,$user_id,$create_time,$class_id){
        //把东西都插入历史表
        $text_grade_hist=D("TextGradeHist");
        $text_grade_hist->type_id=$type_id;
        $text_grade_hist->text_id=$text_id;
        $text_grade_hist->class_id=$class_id;
        $text_grade_hist->user_id=$user_id;
        $text_grade_hist->create_time=$create_time;
        $text_grade_hist->eval_grade=$eval_grade;
        $text_grade_hist->eval_feedback=$eval_feedback;
        $resss=$text_grade_hist->add();
        if(!$resss){
            $this->error("操作失败");
        }
    }

    /**
     * 寻找上一篇下一篇
     *
     *
     * @param $class_id
     * @return mixed
     */
    function getStudent($class_id){
        //因为不区别哪个班，class也有可能多个 给一个for
        $model=new Model();
        $sql="select u.user_id,t.text_id,t.type_id,t.text_name,u.user_name,l.upload_time
from its_text as t,its_upload_text_list as l,its_user as u
where u.user_id=l.user_id and t.text_id=l.text_id and t.type_id=l.text_type_id and l.class_id=".$class_id." and is_pigai=0
order by l.upload_time desc";
//        var_dump($sql);
        $res=$model->query($sql);
        $common=new CommonModel();
        for($i=0;$i<count($res);$i++){
            $res[$i]["upload_time"]=$common->changeTime($res[$i]["upload_time"]);
        }
//        var_dump($res);
        return $res;

    }
    function getAddr($type_id,$text_id,$user_id,$upload_time){
        $upload_text_list=D("UploadTextList");
        $res=$upload_text_list->where("text_type_id=".$type_id." and text_id=$text_id and user_id=$user_id and upload_time=$upload_time")->select();
//        var_dump($res);
        return $res;
    }

    function getClassGrade($class_id,$text_id,$type_id){
        $res=$this->where("class_id=$class_id and text_id=$text_id and type_id=$type_id")->select();
        return $res;
    }

    function getPersonGrade($user_id,$text_id,$type_id){
        $res=$this->where("user_id=$user_id and text_id=$text_id and type_id=$type_id")->select();
        //获取班级详细信息
        $model=new Model();
        $sql="select c.class_name,i.institute_name from its_class as c,its_institute as i where c.institute_id=i.institute_id and c.class_id=".$res[0]["class_id"];
        $class_info =$model->query($sql);
        $res[0]['class_name']=$class_info[0]['class_name'];
        $res[0]['institute_name']=$class_info[0]['institute_name'];
        //个人姓名和学号信息
        $user=D('user');
        $user_info=$user->where("user_id=".$user_id)->find();
        $res[0]['user_name']=$user_info['user_name'];
        $res[0]['user_code']=$user_info['user_code'];
        return $res;
    }

    function getAllStuGrade($class_id,$text_id,$type_id){
        $model=new Model();
        $sql="select u.user_name,u.user_id,g.eval_grade from its_text_grade as g,its_user as u where u.user_id=g.user_id and g.class_id=$class_id and g.text_id=$text_id and g.type_id=$type_id";
//        var_dump($sql);
        $res=$model->query($sql);
//        var_dump($res);
        return $res;
    }

    function getAddrByTime($upload_time,$user_id){
        $upload_text_list=D("UploadTextList");
        $res=$upload_text_list->where("upload_time=$upload_time and user_id=$user_id")->find();
        return $res;
    }





}