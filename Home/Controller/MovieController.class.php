<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
use Home\Model\ClassModel;
use Home\Model\CommonModel;
use Home\Model\EmotionModel;
use Home\Model\MovieGradeModel;
use Home\Model\MovieModel;
use Home\Model\MovieSegmentModel;
use Think\Controller;
use Think\Model;

define("ALLCLASS",1);
define("PERSONLIST",2);
define("PERSON",3);
class MovieController extends Controller {
    public function index(){
        //展示出四种情感
        //因为加载图时有点奇怪，所以决定先写死..后期改良，图片也从数据库读取
//        $emo=new EmotionModel();
//        $res=$emo->showEmo();
//        $this->assign($res);
        $this->allClass();
//        var_dump($_SESSION);
        $this->display();
    }

    /**
     * 选择具体情感后处理
     */
    function emoSelect(){
        if(!$_GET['emotion_id']){
            $_GET['emotion_id']=1;
        }
        $emotion_id=$_GET['emotion_id'];
        $movie=new MovieModel();
        $res=$movie->moiveList($emotion_id);
        $common=new CommonModel();
        $res=$common->movieIntro($res);
//                var_dump($res);
        $this->assign("res",$res);
        $this->assign("emotion_id",$emotion_id);
        $this->display();
    }

    function emoSelectApp(){
        if(!$_POST['emotionID']){
            $arr["status"]=0;
            echo str_replace("\\/", "/",  json_encode($arr));
            return ;
        }else{
            $emotion_id=$_POST['emotionID'];
            $movie=new MovieModel();
            $res=$movie->moiveList($emotion_id);
            $arr["data"]=$res;
            $arr["status"]=1;
            echo str_replace("\\/", "/",  json_encode($arr));
        }
    }
    /**
     * 显示具体片段
     */
    function showMovie(){
        if(!$_GET['movie_id']){
            $this->error("操作失败");
        }
        $movie_id=$_GET['movie_id'];
        if(!$_GET['emotion_id']){
            $_GET['emotion_id']=1;
        }
        $emotion_id=$_GET['emotion_id'];
        $segment=new MovieSegmentModel();
        $res=$segment->showSegment($movie_id,$emotion_id);
        $common=new CommonModel();
        $res=$common->segmentIntro($res);
        if(!$_GET['segment_id']){
            $separate_segment=$common->separate($res[0]["content"]);
        }else{
            for($i=0;$i<count($res);$i++){
                if($res[$i]['segment_id']==$_GET['segment_id']){
                    $separate_segment=$common->separate($res[$i]["content"]);
                    break;
                }
            }
        }
//        var_dump($separate_segment);
        if(!$_GET['segment_addr']){
            $_GET['segment_addr']=$res[0]['segment_addr'];
        }
        $segment_addr=$_GET['segment_addr'];
//        var_dump($res);
        $this->assign("segment_addr",$segment_addr);
        $this->assign("segment_separate",$separate_segment);
        $this->assign("movie_id",$movie_id);
        $this->assign("emotion_id",$emotion_id);
        $this->assign("res",$res);
        $this->display();
    }

    function player(){

        $this->display();
    }

    function indexTeacher(){
        $this->display();
    }

    function emoSelectTeacher(){
        if(!$_GET['emotion_id']){
            $_GET['emotion_id']=1;
        }
        $emotion_id=$_GET['emotion_id'];
        $movie=new MovieModel();
        $res=$movie->moiveList($emotion_id);

        $common=new CommonModel();
        $res=$common->movieIntro($res);
//        var_dump($res);
        $this->assign("res",$res);
        $this->assign("emotion_id",$emotion_id);
        $this->display();
    }

    function showMovieTeacher(){
        if(!$_GET['movie_id']){
            $this->error("操作失败");
        }
        $movie_id=$_GET['movie_id'];
        if(!$_GET['emotion_id']){
            $_GET['emotion_id']=1;
        }
        $emotion_id=$_GET['emotion_id'];
        $segment=new MovieSegmentModel();
        $res=$segment->showSegment($movie_id,$emotion_id);
//        var_dump($res);
        //电影片段的完成度 很多个班加起来
        $res=$segment->finishNum($emotion_id,$movie_id,$res);
        $this->assign("movie_id",$movie_id);
        $this->assign("emotion_id",$emotion_id);
        $this->assign("res",$res);
        $this->display();
    }

    function checkGradeMovie(){
//        $movie_grade=new MovieGradeModel();
//        var_dump($_GET['emotion_id']);
//        exit();
        $this->display();
    }

    function leftLinkMovie(){
        $class=new ClassModel();
        $class_result=$class->teacherClass();
        //获取emotion_id movie_id segment_id
        $string=$_SERVER['HTTP_REFERER'];
        $res=explode("?",$string);
        $var=$res[1];
        $var2=explode("&",$var);
        $emotion_id=explode("=",$var2[0]);
        $emotion_id=$emotion_id[1];
        $movie_id=explode("=",$var2[1]);
        $movie_id=$movie_id[1];
        $segment_id=explode("=",$var2[2]);
        $segment_id=$segment_id[1];
        $this->assign("class",$class_result);
        $this->assign("emotion_id",$emotion_id);
        $this->assign("movie_id",$movie_id);
        $this->assign("segment_id",$segment_id);
        $this->display();
    }

    function gradeResultMovie(){
        if(!$_GET['class_id']){
            $string=$_SERVER['HTTP_REFERER'];
            $res=explode("?",$string);
    //        var_dump($string);
            $var=$res[1];
            $var2=explode("&",$var);
            $emotion_id=explode("=",$var2[0]);
            $emotion_id=$emotion_id[1];
            $movie_id=explode("=",$var2[1]);
            $movie_id=$movie_id[1];
            $segment_id=explode("=",$var2[2]);
            $segment_id=$segment_id[1];
            $class=new ClassModel();
            $class_result=$class->teacherClass();
            $class_id=$class_result[0]['class_id'];
            //如果没有class_id，那么肯定是第一次进入 而且默认班级成绩
            $res=$this->gradeMovieClass($class_id,$emotion_id,$movie_id,$segment_id);
        }else{
            $flag=$_GET["flag"];
            $class_id=$_GET['class_id'];
            $emotion_id=$_GET['emotion_id'];
            $movie_id=$_GET['movie_id'];
            $segment_id=$_GET['segment_id'];
//            var_dump($_GET["flag"]);
//            exit();
//            var_dump($_GET["class_id"]);
//            exit();
            if($flag==ALLCLASS){
                $res=$this->gradeMovieClass($class_id,$emotion_id,$movie_id,$segment_id);
            }else if($flag==PERSONLIST){

                $this->redirect("personList",array('emotion_id'=>$_GET["emotion_id"],'movie_id'=>$_GET["movie_id"],'segment_id'=>$_GET["segment_id"],'class_id'=>$_GET["class_id"]));
            }
        }
//        var_dump($res);
        $this->assign('res',$res);
        $this->display();
    }

    function personList(){
        $emotion_id=$_GET['emotion_id'];
        $movie_id=$_GET['movie_id'];
        $segment_id=$_GET['segment_id'];
        $class_id=$_GET['class_id'];
        $res=$this->gradeMoviePersonIndex($class_id,$emotion_id,$movie_id,$segment_id);
//        var_dump($res);
        $this->assign("res",$res);
        $this->assign("emotion_id",$emotion_id);
        $this->assign("movie_id",$movie_id);
        $this->assign("segment_id",$segment_id);
        $this->assign("class_id",$class_id);
        $this->display();
    }

    function person(){
        $emotion_id=$_GET['emotion_id'];
        $movie_id=$_GET['movie_id'];
        $segment_id=$_GET['segment_id'];
        $user_id=$_GET['user_id'];
        $res=$this->gradeMoviePerson($emotion_id,$movie_id,$segment_id,$user_id);
//        var_dump($user_id);
//        var_dump($emotion_id);
//        var_dump($segment_id);
//        var_dump($movie_id);
//        var_dump($res);
        $this->assign("res",$res);
        $this->display();
    }

    function gradeMoviePerson($emotion_id,$movie_id,$segment_id,$user_id){
        //得到个人电影成绩，需要 emotion_id movie_id segment_id user_id
        $movie_grade=new MovieGradeModel();
        $res=$movie_grade->getPersonGrade($user_id,$emotion_id,$movie_id,$segment_id);
        return $res;
    }

    function gradeMovieClass($class_id,$emotion_id,$movie_id,$segment_id){
        //要得到整个班的电影成绩 需要 emotion_id movie_id segment_id class_id
        $movie_grade=new MovieGradeModel();
        $res=$movie_grade->getClassGrade($class_id,$emotion_id,$movie_id,$segment_id);
        //再通过图形处理
        return $res;
    }

    function gradeMoviePersonIndex($class_id,$emotion_id,$movie_id,$segment_id){
        //要先把这个班的所有同学和他的总分搜出来
        $movie_grade=new MovieGradeModel();
        $res=$movie_grade->getAllStuGrade($class_id,$emotion_id,$movie_id,$segment_id);
        return $res;
    }

    function record(){
        $this->display();
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