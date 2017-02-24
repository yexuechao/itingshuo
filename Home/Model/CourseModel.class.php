<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/1/16
 * Time: 17:21
 */
namespace Home\Model;
use Think\Model;

class CourseModel extends Model{
    function showCourse(){
        $res=$this->select();
        return $res;
    }

    function showSentence(){
        $course_id=$_POST['course_id'];

    }


}