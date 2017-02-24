<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/1/16
 * Time: 17:21
 */
namespace Home\Model;
use Think\Model;

class ClassModel extends Model{
    /**
     * 搜索老师带的所有班级
     *
     * @return mixed 返回学院和班级信息
     */
    function teacherClass(){
        $manage_class=D('ManageClass');
        $res=$manage_class->where("user_id=".$_SESSION['user']['user_id'])->order("class_id")->select();
        //通过class表找到class名称和学院,因为一个老师多个班级，需要循环
        for($i=0;$i<count($res);$i++){
            $sql="select c.class_id,c.class_name,i.institute_name from its_class as c,its_institute as i where i.institute_id=c.institute_id and c.class_id=".$res[$i]['class_id'];
            $val=$this->query($sql);
            $ress[$i]=$val[0];
        }
        return $ress;
    }


}