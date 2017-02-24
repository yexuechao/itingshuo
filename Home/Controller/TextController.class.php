<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
use Home\Model\ClassModel;
use Home\Model\CommonModel;
use Home\Model\TextGradeHistModel;
use Home\Model\TextGradeModel;
use Home\Model\TextModel;
use Home\Model\TextTypeModel;
use Think\Controller;
define("ALLCLASS",1);
define("PERSONLIST",2);
define("PERSON",3);
class TextController extends Controller {
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
     * 文章类型
     */
    public function index(){

        $text_type=new TextTypeModel();
        $res=$text_type->showType();
//        var_dump($res);
        $this->assign("res",$res);
        $this->display();
    }
    /**
     * 一个类型下所有文章
     *
     * 有用户参与，是否完成，是否批改，成绩如何
     */
    function textList(){
        if(!$_GET['type_id']){
            $this->error("操作错误");
        }
        $type_id=$_GET['type_id'];
        //通过文章ID搜索文章
        $text=new TextModel();
        $res=$text->textList($type_id);
//        show_bug($res);
//        var_dump($res);
        $this->assign("res",$res);
        $this->display();
    }


    /**
     * 具体文章内容
     */
    function text(){
        if(!$_GET['text_id']){
            echo "<script>window.alert('不存在上一篇或下一篇');javascript:history.back();</script>";
            exit();
        }
        $type_id=$_GET['type_id'];
        $text_id=$_GET['text_id'];
        $text=new TextModel();
        $res=$text->text($type_id,$text_id);
        //把内容分成一句一句
        $common=new CommonModel();
        for($i=0;$i<count($res);$i++){
            $res[$i]['separate_content']=$common->separate($res[$i]['content']);
        }

        //搜索出所有句子解决上下句逻辑 为了找出$i 需对比现在的sentence_id对应哪个 传的时候只需要传sentence_id
        $all_text=$text->textList($type_id);
        //先找$i
        for($i=0;$i<count($all_text);$i++){
            if($all_text[$i]["text_id"]==$text_id){
                break;
            }
        }
        if(count($all_text)==1){
            $last_text_id='';
            $next_text_id='';
        }else if($i==0){
            //如果是第一句，就没有上一句
            $last_text_id='';
            $next_text_id=$all_text[1]['text_id'];
        }else if($i==count($all_text)-1){
            //如果是最后一句，就没有下一句
            $last_text_id=$all_text[count($all_text)-1-1]['text_id'];
            $next_text_id='';
        }else{
            $last_text_id=$all_text[$i-1]["text_id"];
            $next_text_id=$all_text[$i+1]["text_id"];
        }

//        var_dump($res);
//        var_dump($last_text_id);
        $this->assign("last_text_id",$last_text_id);
        $this->assign("next_text_id",$next_text_id);
        $this->assign("type_id",$type_id);
        $this->assign("res",$res);
        $this->display();
    }


    /**
     * 找出历史成绩
     */
    function textHistoryGrade(){
        $type_id=$_GET['type_id'];
        $text_id=$_GET['text_id'];
        $text_grade=new TextGradeModel();
        $res=$text_grade->textHistoryGrade($type_id,$text_id);
        $current_res=$res[0];
        $history_res=$res[1];
        if(!$current_res){
            $this->error("没有完成，没有成绩");
        }
//        var_dump($current_res);
//        var_dump($history_res);
        $this->assign("current_res",$current_res);
        $this->assign("history_res",$history_res);
        $this->display();
    }



    function indexTeacher(){
        $text_type=new TextTypeModel();
        $res=$text_type->showType();
//        var_dump($res);
        $this->assign("res",$res);
        $this->display();
    }

    function textListTeacher(){
        if(!$_GET['type_id']){
            $this->error("操作错误");
        }
        $type_id=$_GET['type_id'];
        //通过文章ID搜索文章
        $text=new TextModel();
        $res=$text->textList($type_id);
        $res=$text->finishNum($type_id,$res);
//        var_dump($res);
        $this->assign("res",$res);
        $this->display();
    }

    function checkGradeText(){
//        $movie_grade=new MovieGradeModel();
//        var_dump($_GET['emotion_id']);
//        exit();
        $this->display();
    }

    function leftLinkText(){
        $class=new ClassModel();
        $class_result=$class->teacherClass();
        //获取emotion_id movie_id segment_id
        $string=$_SERVER['HTTP_REFERER'];
        $res=explode("?",$string);
        $var=$res[1];
        $var2=explode("&",$var);
        $type_id=explode("=",$var2[0]);
        $type_id=$type_id[1];
        $text_id=explode("=",$var2[1]);
        $text_id=$text_id[1];
        $this->assign("class",$class_result);
        $this->assign("type_id",$type_id);
        $this->assign("text_id",$text_id);
        $this->display();
    }

    function gradeResultText(){
        if(!$_GET['class_id']){
            $string=$_SERVER['HTTP_REFERER'];
            $res=explode("?",$string);
            $var=$res[1];
            $var2=explode("&",$var);
            $type_id=explode("=",$var2[0]);
            $type_id=$type_id[1];
            $text_id=explode("=",$var2[1]);
            $text_id=$text_id[1];
            $class=new ClassModel();
            $class_result=$class->teacherClass();
            $class_id=$class_result[0]['class_id'];
            //如果没有class_id，那么肯定是第一次进入 而且默认班级成绩
            $res=$this->gradeTextClass($class_id,$type_id,$text_id);
        }else{
            $flag=$_GET["flag"];
            $class_id=$_GET['class_id'];
            $type_id=$_GET['type_id'];
            $text_id=$_GET['text_id'];
//            var_dump($_GET["flag"]);
//            var_dump($_GET["class_id"]);
//            exit();
            if($flag==ALLCLASS){
                $res=$this->gradeTextClass($class_id,$type_id,$text_id);
            }else if($flag==PERSONLIST){
                $this->redirect("personList",array('type_id'=>$_GET["type_id"],'text_id'=>$_GET["text_id"],'class_id'=>$_GET["class_id"]));
            }
        }
//        var_dump($res);
        $this->assign('res',$res);
        $this->display();
    }

    function personList(){
        $type_id=$_GET['type_id'];
        $text_id=$_GET['text_id'];
        $class_id=$_GET['class_id'];
//        var_dump($class_id);
        $res=$this->gradeTextPersonIndex($class_id,$type_id,$text_id);
//        var_dump($class_id);
//        var_dump($res);
//        exit();
        $this->assign("res",$res);
        $this->assign("type_id",$type_id);
        $this->assign("text_id",$text_id);
        $this->assign("class_id",$class_id);
        $this->display();
    }

    function person(){
        $type_id=$_GET['type_id'];
        $text_id=$_GET['text_id'];
        $user_id=$_GET['user_id'];
        $res=$this->gradeTextPerson($user_id,$type_id,$text_id);
//        var_dump($user_id);
//        var_dump($text_id);
//        var_dump($type_id);
//        var_dump($res);
        $this->assign("res",$res);
        $this->display();
    }

    function gradeTextClass($class_id,$type_id,$text_id){
        //要得到整个班的电影成绩 需要 class_id text_id type_id
        $text_grade=new TextGradeModel();
        $res=$text_grade->getClassGrade($class_id,$text_id,$type_id);
        //再通过图形处理
        return $res;

    }

    function gradeTextPersonIndex($class_id,$type_id,$text_id){
        //要先把这个班的所有同学和他的总分搜出来
        $text_grade=new TextGradeModel();
        $res=$text_grade->getAllStuGrade($class_id,$text_id,$type_id);
        return $res;
    }
    function gradeTextPerson($user_id,$type_id,$text_id){
        //得到个人电影成绩，需要 user_id $text_id $type_id
        $text_grade=new TextGradeModel();
        $res=$text_grade->getPersonGrade($user_id,$text_id,$type_id);
        return $res;
    }

    function allClass(){
        //连表搜索班级信息
        $model=new Model();
        //班级信息
        $sql="select i.institute_name,c.class_name,c.class_id,i.institute_id from its_class as c,its_institute as i where i.institute_id=c.institute_id";
        $all_class=$model->query($sql);
        $this->assign("all_class",$all_class);
    }

    function record(){
        $type_id=$_GET["type_id"];
        $text_id=$_GET["text_id"];
        $this->assign("type_id",$type_id);
        $this->assign("text_id",$text_id);
        $this->display();
    }

}