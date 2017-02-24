<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
use Home\Model\ClassModel;
use Home\Model\CourseModel;
use Home\Model\SenGradeModel;
use Home\Model\SentenceModel;
use Home\Model\TextGradeModel;
use Think\Controller;
define("ALLCLASS",1);
define("PERSONLIST",2);
define("PERSON",3);
class ToneController extends Controller {
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
     * 课程列表
     */
    public function index(){
        $course=new CourseModel();
        $res=$course->showCourse();
//        var_dump($res);
        $this->assign("res",$res);
        $this->display();
    }

    /**
     * 句子列表
     */
    function sentenceList(){
        if(!$_GET["course_id"]){
            $this->error("请重新选择");
        }
        $course_id=$_GET['course_id'];
        $sentence=new SentenceModel();
        $res=$sentence->showSentence($course_id);
//        var_dump($res);
        $this->assign("res",$res);
        $this->display();
    }
    /**
     * 通过课程ID 句子ID，确定选定句子内容
     */
    function senSelect(){
        $sentence_id=$_GET['sentence_id'];
        $course_id=$_GET['course_id'];
        $sentence=new SentenceModel();
        $res=$sentence->sentence($course_id,$sentence_id);
//        var_dump($res);
        //搜索出所有句子解决上下句逻辑 为了找出$i 需对比现在的sentence_id对应哪个 传的时候只需要传sentence_id
        $all_sentence=$sentence->showSentence($course_id);
        //先找$i
        for($i=0;$i<count($all_sentence);$i++){
            if($all_sentence[$i]["sentence_id"]==$sentence_id){
                break;
            }
        }
        if(count($all_sentence)==2){
            $last_sentence_id='';
            $next_sentence_id='';
        }else if($i==0){
            //如果是第一句，就没有上一句
            $last_sentence_id='';
            $next_sentence_id=$all_sentence[1]['sentence_id'];
        }else if($i==count($all_sentence)-1){
            //如果是最后一句，就没有下一句
            $last_sentence_id=$all_sentence[count($all_sentence)-1-1]['sentence_id'];
            $next_sentence_id='';
        }else{
            $last_sentence_id=$all_sentence[$i-1]["sentence_id"];
            $next_sentence_id=$all_sentence[$i+1]["sentence_id"];
        }
        //上下句
        $this->assign("last_sentence_id",$last_sentence_id);
        $this->assign("next_sentence_id",$next_sentence_id);
        $this->assign("res",$res);
//        var_dump($res);
        $this->display();
    }
    function indexTeacher(){
        $course=new CourseModel();
        $res=$course->showCourse();
//        var_dump($res);
        $this->assign("res",$res);
        $this->display();
    }

    function senListTeacher(){
        if(!$_GET["course_id"]){
            $this->error("请重新选择");
        }
        $course_id=$_GET['course_id'];
        $sentence=new SentenceModel();
        $res=$sentence->showSentence($course_id);
//        var_dump($res);
        //处理完成度,不同句子完成度不同
        $res=$sentence->finishNum($course_id,$res);
        $this->assign("res",$res);
        $this->display();
    }

    function checkGradeTone(){
//        $movie_grade=new MovieGradeModel();
//        var_dump($_GET['emotion_id']);
//        exit();
        $this->display();
    }

    function leftLinkTone(){
        $class=new ClassModel();
        $class_result=$class->teacherClass();
        //获取emotion_id movie_id segment_id
        $string=$_SERVER['HTTP_REFERER'];

        $res=explode("?",$string);
        $var=$res[1];
        $var2=explode("&",$var);
        $course_id=explode("=",$var2[0]);
        $course_id=$course_id[1];
        $sentence_id=explode("=",$var2[1]);
        $sentence_id=$sentence_id[1];
        $this->assign("class",$class_result);
        $this->assign("course_id",$course_id);
        $this->assign("sentence_id",$sentence_id);
        $this->display();
    }

    function gradeResultTone(){
        if(!$_GET['class_id']){
            $string=$_SERVER['HTTP_REFERER'];
            $res=explode("?",$string);
            $var=$res[1];
            $var2=explode("&",$var);
            $course_id=explode("=",$var2[0]);
            $course_id=$course_id[1];
            $sentence_id=explode("=",$var2[1]);
            $sentence_id=$sentence_id[1];

            $class=new ClassModel();
            $class_result=$class->teacherClass();
            $class_id=$class_result[0]['class_id'];
            //如果没有class_id，那么肯定是第一次进入 而且默认班级成绩
            $res=$this->gradeToneClass($class_id,$course_id,$sentence_id);
        }else{
            $flag=$_GET["flag"];
            $class_id=$_GET['class_id'];
            $course_id=$_GET['course_id'];
            $sentence_id=$_GET['sentence_id'];
//            var_dump($_GET["flag"]);
//            var_dump($_GET["class_id"]);
//            exit();
            if($flag==ALLCLASS){
                $res=$this->gradeToneClass($class_id,$course_id,$sentence_id);
            }else if($flag==PERSONLIST){
                $this->redirect("personList",array('course_id'=>$_GET["course_id"],'sentence_id'=>$_GET["sentence_id"],'class_id'=>$_GET["class_id"]));
            }
        }
//        var_dump($res);
        $this->assign('res',$res);
        $this->display();
    }

    function personList(){
        $course_id=$_GET['course_id'];
        $sentence_id=$_GET['sentence_id'];
        $class_id=$_GET['class_id'];
        $res=$this->gradeTonePersonIndex($class_id,$course_id,$sentence_id);
//        var_dump($class_id);
//        var_dump($res);
//        exit();
        $this->assign("res",$res);
        $this->assign("course_id",$course_id);
        $this->assign("sentence_id",$sentence_id);
        $this->assign("class_id",$class_id);
        $this->display();
    }

    function person(){
        $course_id=$_GET['course_id'];
        $sentence_id=$_GET['sentence_id'];
        $user_id=$_GET['user_id'];
        $res=$this->gradeTonePerson($user_id,$course_id,$sentence_id);
//        var_dump($user_id);
//        var_dump($sentence_id);
//        var_dump($course_id);
//        var_dump($res);
        $this->assign("res",$res);
        $this->display();
    }

    function gradeToneClass($class_id,$course_id,$sentence_id){
        //要得到整个班的电影成绩 需要 class_id course_id sentence_id
        $sen_grade=new SenGradeModel();
        $res=$sen_grade->getClassGrade($class_id,$course_id,$sentence_id);
        //再通过图形处理
        return $res;
    }

    function gradeTonePersonIndex($class_id,$course_id,$sentence_id){
        //要先把这个班的所有同学和他的总分搜出来
        $sen_grade=new SenGradeModel();
        $res=$sen_grade->getAllStuGrade($class_id,$course_id,$sentence_id);
        return $res;
    }

    function gradeTonePerson($user_id,$course_id,$sentence_id){
        //得到个人电影成绩，需要 user_id $course_id $sentence_id
        $sen_grade=new SenGradeModel();
        $res=$sen_grade->getPersonGrade($user_id,$course_id,$sentence_id);
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
}