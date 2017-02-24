<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/1/16
 * Time: 17:21
 */
namespace Home\Model;
use Think\Model;
define("MOVIE_FLAG",1);
define("TONE_FLAG",2);
define("TEXT_FLAG",3);
class CommonModel extends Model{
    /**
     * 把时间戳转换成可视化时间
     *
     * @param $time 时间戳
     * @return bool|string 可视化时间
     */
    function changeTime($time){
        $data=date('Y-m-d H:i:s',$time);
        return $data;
    }

    /**
     * 如果不存在，新建文件（上传录音的文件）
     *
     *
     */
    function createBasicFile(){
        $basic_folder1 = "Public/Home/upload/movie";
        $basic_folder2 = "Public/Home/upload/sentence";
        $basic_folder3 = "Public/Home/upload/text";
        if (!file_exists($basic_folder1)) {
            if (!mkdir($basic_folder1)) {
                die("failed to create save folder $basic_folder1");
            }
        }
        if (!file_exists($basic_folder2)) {
            if (!mkdir($basic_folder2)) {
                die("failed to create save folder $basic_folder2");
            }
        }
        if (!file_exists($basic_folder3)) {
            if (!mkdir($basic_folder3)) {
                die("failed to create save folder $basic_folder3");
            }
        }
    }
    function valid_wav_file($file)
    {
        $handle = fopen($file, 'r');
        $header = fread($handle, 4);
        list($chunk_size) = array_values(unpack('V', fread($handle, 4)));
        $format = fread($handle, 4);
        fclose($handle);
        return $header == 'RIFF' && $format == 'WAVE' && $chunk_size == (filesize($file) - 8);
    }

    function upload(){
//        if(empty($_POST['senId'])){
//            return;
//        }
        $this->createBasicFile();
        //片段flag=1 语音语调flag=2 文本flag=3  依据flag决定upload_name
        $flag=$_POST['flag'];
        $time=time();
        if ($flag == MOVIE_FLAG) {
            $file_type = 'movie';
            $upload_name = $_POST["emotion_id"].'_' .$_POST['movie_id'] . '_' . $_POST['segment_id'] . '_' . $_SESSION['user']['user_id']. '_' . $time . '.wav';
        } else if ($flag  == TONE_FLAG) {
            $file_type = 'sentence';
            $upload_name = "0_".$_POST['course_id'] . '_' . $_POST['sentence_id'] . '_' . $_SESSION['user']['user_id']. '_' . $time . '.wav';
        }else if($flag ==TEXT_FLAG){
            $file_type = 'text';
            $upload_name = $_POST['type_id'] . '_' . $_POST['text_id'] . '_' . $_SESSION['user']['user_id']. '_' . $time . '.wav';
        }
        $user_code=$_SESSION['user']['user_code'];
        $save_folder = "Public/Home/upload/$file_type/$user_code";
        //如果文件不存在，创建
        if (!file_exists($save_folder)) {
            if (!mkdir($save_folder)) {
                die("failed to create save folder $save_folder");
            }
        }
        $key = 'filename';
        $tmp_name = $_FILES["upload_file"]["tmp_name"][$key];
        $type = $_FILES["upload_file"]["type"][$key];
        $file_name = "$save_folder/$upload_name";
        $saved = 0;
        if ($type == 'audio/wav' && preg_match('/^[a-zA-Z0-9_\-]+\.wav$/', $upload_name) && $this->valid_wav_file($tmp_name)) {
            $saved = move_uploaded_file($tmp_name, $file_name) ? 1 : 0;
        }

        if($_POST['format'] == 'json') {
            header('Content-type: application/json');
            print "{\"saved\": $saved}";
        } else {
            print $saved ? "Saved" : 'Not saved';
        }

        //上传完后各自插入各自的数据库中，把旧的数据搬到历史表（如果有）
        if ($saved == 1) {
            // 电影1
            if($flag==MOVIE_FLAG){
                $movie_grade=new MovieGradeModel();
                $movie_grade->addSegment($_POST['emotion_id'],$_POST['movie_id'],$_POST['segment_id'],$time,$file_name);
            }else if($flag==TONE_FLAG){
                //语音语调 2
                $sen_grade=new SenGradeModel();
                $sen_grade->addSentence();
            }else if($flag==TEXT_FLAG){
                //文本 3
                $text_grade=new TextGradeModel();
                $text_grade->addUploadText($_POST["type_id"],$_POST["text_id"],$time,$file_name);
            }
        }
    }

    function userBehavior(){
        $currentTime=time();
        $time_gap=$currentTime-$_SESSION['user']['time'];
        $_SESSION['user']['time']=$currentTime;
        //获取当前页面URL
        $url=$_SERVER["PHP_SELF"];
        //获取这个URL的url_id
        $user_behavior=new UserBehaviorModel();
        $url_id=$user_behavior->getUrlId($url);
        $res=$user_behavior->addbehavior($url_id,$time_gap);
        if(!$res){
            $this->error("发生错误","index/index");
            exit();
        }

    }

    function separate($content){
        $contents=explode("##",$content);
        return $contents;
    }

    function movieIntro($res){
        for($i=0;$i<count($res);$i++){
            $res[$i]['short_introduction']=mb_substr( $res[$i]['movie_introduction'],0,85,"utf-8");
            $res[$i]['short_introduction']=$res[$i]['short_introduction']."...";
        }
        return $res;
    }

    function segmentIntro($res){
        for($i=0;$i<count($res);$i++){
            $res[$i]['short_segment']=mb_substr( $res[$i]['content'],0,20,"utf-8");
            $res[$i]['short_segment']=$res[$i]['short_segment']."...";
        }
        return $res;

    }


}