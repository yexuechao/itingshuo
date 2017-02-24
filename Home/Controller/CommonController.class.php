<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
use Home\Model\CommonModel;
use Think\Controller;
use Think\Model;

class CommonController extends Controller{
    function upload(){
        if($_POST["test_flag"]==0){
            exit();
        }else{
            $common=new CommonModel();
            $common->upload();
        }


    }

    function test(){

        if($_POST["test_flag"]==1){
            echo 1;
        }else{
            echo 0;
        }

    }

}