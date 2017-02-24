<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
use Home\Model\ClassModel;
use Home\Model\MovieGradeModel;
use Home\Model\SenGradeModel;
use Home\Model\TextGradeHistModel;
use Home\Model\TextGradeModel;
use Home\Model\TextTypeModel;
use Home\Model\UserModel;
use Think\Controller;
define("ALLCLASS",1);
define("PERSON",2);
class CorrectController extends Controller {
    /**
     * 检查session
     * 调用event控制器时调用
     */
    function _initialize(){
        if(empty($_SESSION['user'])){
            $this->redirect('index/index');
            exit();
        }
    }
    /**
     * 选择查看成绩、批改
     */
    public function index(){
	    $this->display();
    }

    /**
     * 罗列出文本所有的类型
     */
    function typeSelect(){
        $text_type=new TextTypeModel();
        //获取所有的类型
        $res=$text_type->showType();
        $this->assign("res",$res);
        $this->display();
    }

    /**
     * 整个班的可视化成绩
     */
    function classGrade(){
        $text_id=$_GET["text_id"];
        $type_id=$_GET["type_id"];
        $class_id=$_GET["class_id"];
        $text_grade=new TextGradeModel();
        $res=$text_grade->getAllGrade($type_id,$text_id,$class_id);
        $this->assign("res",$res);
        $this->display();
    }

    /**
     * 列出成绩名单
     */
    function gradeList(){
        $this->classGrade();
    }

    /**
     * 个人成绩
     */
    function personGrade(){
        $text_id=$_GET["text_id"];
        $type_id=$_GET["type_id"];
        $user_id=$_GET["user_id"];
        $text_grade=new TextGradeModel();
        $res=$text_grade->getpersonGrade($type_id,$text_id,$user_id);
        $this->assign("res",$res);
        $this->display();
    }

    /**
     * 信息界面 用session就OK
     */
    function info(){
        $this->display();
    }

    /**
     * 修改信息界面
     */
    function alterInfo(){

    }

    function correctIndex(){
        //一个教师对应多个班级，manage_class先从user_id找到class_id 学生不需要这样
        $teacher_class=new ClassModel();
        $class=$teacher_class->teacherClass();
        $this->assign("class",$class);
//        var_dump($class);
        //
        $this->display();
    }

    function correctingList(){
//        $type_id=$_GET['type_id'];
//        $text_id=$_GET['text_id'];
        //教师所带的班级 可能有多个
        $teacher_class=new ClassModel();
        $class=$teacher_class->teacherClass();
        //根据班级搜出学生名单
        if(!$_GET['class_id']){
            $_GET['class_id']=$class[0]['class_id'];
        }
        $class_id=$_GET['class_id'];
//        show_bug($class_id);
        //只需要针对班级搜索就可以了
        $text_grade=new TextGradeModel();
        $res=$text_grade->getStudent($class_id);
//        $this->assign("class_id",$class_id);
        $this->assign("res",$res);
        $this->display();
    }
    function evalChange(){
        $text_id=$_GET["text_id"];
        $type_id=$_GET["type_id"];
        $user_id=$_GET["user_id"];
        $last_text=$_GET["last_text"];
        $next_text=$_GET["next_text"];
        $class_id=$_GET["class_id"];
        echo "<script>window.parent.location.href='evalGradeIndex?text_id=".$text_id."&type_id=$type_id&user_id=$user_id&class_id=$class_id"."';</script>";
    }

    function evalGradeIndex(){
        //先根据type_id text_id user_id 搜索出addr
        //其实操作上，可以通过user_id 和upload_time 搜索出数据
        $user_id=$_GET['user_id'];
        if(!is_int($_GET['upload_time'])){
            $upload_time=strtotime($_GET['upload_time']);
        }else{
            $upload_time=$_GET['upload_time'];
        }
        $text_grade=new TextGradeModel();
        if($_GET['type_id']){
            $type_id=$_GET['type_id'];
            $text_id=$_GET['text_id'];
            $class_id=$_GET['class_id'];
        }else{
            $info=$text_grade->getAddrByTime($upload_time,$user_id);
            $type_id=$info["text_type_id"];
            $text_id=$info["text_id"];
            $class_id=$info["class_id"];
        }
        $res=$text_grade->getAddr($type_id,$text_id,$user_id,$upload_time);
        //根据时间排序找出他们上一篇下一篇内容
        $last_next=$text_grade->getStudent($class_id);
        //通过时间找出i
        for($i=0;$i<count($last_next);$i++){
            if($last_next[$i]["upload_time"]==$upload_time){
                break;
            }
        }
        if(count($last_next)==1){
            $last_user_id='';
            $last_time='';
            $next_user_id='';
            $next_time='';
        }else if($i==0){
            //如果是第一句，就没有上一句
            $last_user_id='';
            $last_time='';
            $next_user_id=$last_next[1]['user_id'];
            $next_time=$last_next[1]['upload_time'];
        }else if($i==count($last_next)-1){
            //如果是最后一句，就没有下一句
            $last_time=$last_next[count($last_next)-1-1]['upload_time'];
            $last_user_id=$last_next[count($last_next)-1-1]['user_id'];
            $next_user_id='';
            $next_time='';
        }else{
            $last_user_id=$last_next[$i-1]["user_id"];
            $last_time=$last_next[$i-1]["upload_time"];
            $next_user_id=$last_next[$i+1]["user_id"];
            $next_time=$last_next[$i+1]["upload_time"];
        }
        $this->assign("res",$res);
        $this->assign('last_next',$last_next);
        $this->assign("last_user_id",$last_user_id);
        $this->assign("last_time",$last_time);
        $this->assign("next_user_id",$next_user_id);
        $this->assign("next_time",$next_time);
        $this->display();
    }

    function evalGrade(){
        $user_id=$_GET["user_id"];
        $type_id=$_GET["type_id"];
        $text_id=$_GET["text_id"];
        $eval_grade=$_GET["eval_grade"];
        $eval_feedback=$_GET["eval_feedback"];
        $text_grade=new TextGradeModel();
        $text_grade->moveToHist($type_id,$text_id,$eval_grade,$eval_feedback,$user_id);
    }
    function allClass(){
        //连表搜索班级信息
        $model=new Model();
        //班级信息
        $sql="select i.institute_name,c.class_name,c.class_id,i.institute_id from its_class as c,its_institute as i where i.institute_id=c.institute_id";
        $all_class=$model->query($sql);
        $this->assign("all_class",$all_class);
    }




}