<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/1/16
 * Time: 17:21
 */
namespace Home\Model;
use Think\Model;

class UserModel extends Model{
    /**
     * 是否已经被注册
     *
     * @param $user_code 学号
     * @return bool 是否存在帐号
     */
    function isExist($user_code){
        $res=$this->where("user_code=".$user_code)->select();
        if($res){
            return true;
        }else{
            return false;
        }
    }

    /**
     *
     * 注册逻辑
     *
     * 处理user表 还有manage_student表
     * @param $user_name 姓名
     * @param $user_code 学号
     * @param $pwd 密码
     * @param $class_id 班级ID
     * @return bool 是否注册成功
     */
    function register($user_name,$user_code,$pwd,$class_id){
        $this->user_code=$user_code;
        $this->user_name=$user_name;
        $this->pwd=md5($pwd);
        $this->class_id=$class_id;
        $this->identity_id=1;
        $this->register_date=time();
        $res=$this->add();
        if($res){
            $manage_student=D("ManageStudent");
            //这里有待确定
//            show_bug($res);
            $manage_student->user_id=$res;
            $manage_student->class_id=$class_id;
            $ress=$manage_student->add();
            if(!$ress){
//                show_bug($ress);
                return false;
            }
        }else{
            return false;
        }
        return true;
    }

    /**
     *
     * 登录检测
     * @param $user_code 学号
     * @return mixed 返回密码
     */
    function login($user_code){
        $res=$this->where("user_code=%s",$user_code)->select();
        return $res;
    }

    /**
     * 更新最新登录时间
     *
     * @param $user_id 学生id
     * @return bool 返回是否更改成功
     */
    function updateLoginTime($user_id){
        $this->last_login_time=time();
        $res=$this->where("user_id=".$user_id)->save();
        if($res){
            return true;
        }else{
            return false;
        }
    }

    function alterInfo($class_id,$user_name,$pwd){
        if($class_id!=0){
            $this->class_id=$class_id;
        }
        if($user_name!=""){
            $this->user_name=$user_name;
        }
        if($pwd!=""){
            $this->pwd=md5($pwd);
            $res=$this->where("user_id=".$_SESSION["user"]["user_id"])->save();
            if($res){
                $_SESSION["user"]["class_id"]=$class_id;
                $_SESSION["user"]["user_name"]=$user_name;
                $_SESSION["user"]["pwd"]=$pwd;
                return true;
            }else{
                return false;
            }
        }

    }





}