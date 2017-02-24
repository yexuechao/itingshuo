<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
use Home\Model\MovieModel;
use Home\Model\MovieSegmentModel;
use Home\Model\SentenceModel;
use Home\Model\TextGradeModel;
use Home\Model\TextModel;
use Home\Model\UserModel;
use Think\Controller;
use Think\Model;

class AppController extends Controller{
    /**
     * 情感
     */
    function emoSelectApp(){
//        if(!$_POST['emotionID']){
//            $arr["status"]=0;
//            echo str_replace("\\/", "/",  json_encode($arr));
//            return ;
//        }else{
//            $emotion_id=$_POST['emotionID'];
//            $movie=new MovieModel();
//            $res=$movie->moiveList($emotion_id);
//            $arr["data"]=$res;
//            $arr["status"]=1;

//        }
                    $movie=new MovieModel();
            $res=$movie->moiveList(1);
        $arr["movie"]=$res;
        $arr["status"]=1;
        $val["data"]=$arr;
        echo str_replace("\\/", "/",  json_encode($val));
    }


    /**
     * 具体片段
     */
    function showMovieApp(){
        if($_POST["emotionID"]||!$_POST['movieID']){
            $movie_id=$_POST['movieID'];
            $emotion_id=$_POST["emotionID"];
            $segment=new MovieSegmentModel();
            $res=$segment->showSegment($movie_id,$emotion_id);
            $arr["status"]=1;
            $arr["movie"]=$res;
        }else{
            $arr["status"]=0;
        }
        $val["data"]=$arr;
        echo str_replace("\\/", "/",  json_encode($val));
    }

    /**
     * 同一类型所有文章
     */
    function textListApp(){
        if($_POST["toneType"]){
            $type_id=$_POST["toneType"];
            $text=new TextModel();
            $res=$text->textList($type_id);
            $arr["status"]=1;
            $arr["text"]=$res;

        }else{
            $arr["status"]=0;
        }
            $val["data"]=$arr;
        echo str_replace("\\/", "/",  json_encode($val));
    }

    /**
     * 具体文章
     */
    function textApp(){
        if($_POST["toneID"]&&$_POST["toneType"]){
            $text_id=$_POST["toneID"];
            $type_id=$_POST["toneType"];
            $text=new TextModel();
            $res=$text->text($type_id,$text_id);
            $arr["status"]=1;
            $arr["text"]=$res;
        }else{
            $arr["status"]=0;
        }
        $val["data"]=$arr;
        echo str_replace("\\/", "/",  json_encode($val));
    }

    /**
     * 历史成绩
     */
    function textHistoryGradeApp(){
        if($_POST["toneID"]&&$_POST["toneType"]){
            $text_id=$_POST["toneID"];
            $type_id=$_POST["toneType"];
            $text_grade=new TextGradeModel();
            $res=$text_grade->textHistoryGrade($type_id,$text_id);
            $arr["status"]=1;
            $arr["grade"]=$res;

        }else{
            $arr["status"]=0;
        }
        $val["data"]=$arr;
        echo str_replace("\\/", "/",  json_encode($val));
    }

    /**
     * 语音语调句子列表
     */
    function sentenceListApp(){
        if($_POST["classID"]){
            $course_id=$_POST['classID'];
            $sentence=new SentenceModel();
            $res=$sentence->showSentence($course_id);
            $arr["status"]=1;
            $arr["sentence"]=$res;
        }else{
            $arr["status"]=0;
        }
        $val["data"]=$arr;
        echo str_replace("\\/", "/",  json_encode($val));
    }

    /**
     * 语音语调具体句子
     */
    function senSelectApp(){
        if($_POST["sentenceID"]&&$_POST["classID"]){
            $course_id=$_POST["classID"];
            $sentence_id=$_POST["sentenceID"];
            $sentence=new SentenceModel();
            $res=$sentence->sentence($course_id,$sentence_id);
            $arr["status"]=1;
            $arr["data"]=$res;
        }else{
            $arr["status"]=0;
        }
        $val["data"]=$arr;
        echo str_replace("\\/", "/",  json_encode($val));
    }

    /**
     * 课程列表
     */
    public function indexApp(){
        if($_POST["requestClass"]==1){
            $course=new CourseModel();
            $res=$course->showCourse();
            $arr["status"]=1;
            $arr["data"]=$res;
        }else{
            $arr["status"]=0;
        }
        $val["data"]=$arr;
        echo str_replace("\\/", "/",  json_encode($val));
    }

}