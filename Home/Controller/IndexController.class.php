<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
use Home\Model\UserModel;
use Think\Controller;
use Think\Model;

class IndexController extends Controller{
    public function index(){
        $this->display();
    }
    /**
     * 登录页面
     *
     * 确定用户类型决定跳转页面,最新登录时间
     */
    function login(){
        // 0管理员 1是学生 2是教师

        $user = new \Home\Model\UserModel();
        //学号
        $res = $user->login($_POST['user_code']);
//        var_dump(md5($_POST['pwd']));
//        show_bug($res);
        if ($res[0]['pwd'] == md5($_POST['pwd'])) {
            session('user', $res[0]);
            $_SESSION["user"]["pwd"]="";
            $update_time=$user->updateLoginTime($res[0]['user_id']);
            if($_POST["interface"]){
                echo 1;
            }
            if(!$update_time){
                $this->error("登录失败");
            }
            //show_bug($_SESSION);
            if ($res[0]['identity_id'] == 0) {
                //管理页面

            } else if ($res[0]['identity_id'] == 1) {
                //学生页面
                $this->redirect('chooseModule');
            } else if ($res[0]['identity_id'] == 2) {
                //教师页面
                $this->redirect('correct/index');
            }
        }else {
//          $this->error('帐号或密码错误');
            if($_POST["interface"]){
                echo 0;
            }
            $this->redirect('Index/index', array('error' => "帐号或密码错误"));
        }
    }

    function chooseModule(){
        $this->allClass();
        $this->display();
    }

    /**
     * 跳转注册页面
     *
     * 要提供班级信息
     */
    function registerUrl(){
        //连表搜索班级信息
        $model=new Model();
        //班级信息
        $sql="select i.institute_name,c.class_name,c.class_id,i.institute_id from its_class as c,its_institute as i where i.institute_id=c.institute_id";
        $res=$model->query($sql);
        $this->assign("res",$res);
//        var_dump($res);
        $this->display();
    }

    function allClass(){
        //连表搜索班级信息
        $model=new Model();
        //班级信息
        $sql="select i.institute_name,c.class_name,c.class_id,i.institute_id from its_class as c,its_institute as i where i.institute_id=c.institute_id";
        $all_class=$model->query($sql);
        $this->assign("all_class",$all_class);
//        var_dump($all_class);
    }

    /**
     * 注册
     *
     * 后跳转回主页
     */
    function register(){
        //检查格式
        $user_name=$_POST['user_name'];
        $user_code=$_POST['user_code'];
        $pwd=$_POST['pwd'];
        $class_id=$_POST['class_id'];
//        show_bug($_POST);
        //是否亦被注册
        //$user = D('User');

        $user = new \Home\Model\UserModel();
        $res=$user->isExist($user_code);
        if($res){
            $this->error( '已经被注册了');
        }else{
            $success=$user->register($user_name,$user_code,$pwd,$class_id);
            if($success){
                $this->success("注册成功","index");
            }else{
                $this->error("Sorry,注册失败");
            }
        }
    }

    function alterInfo(){
        //接受传上来的值
        $user_name=$_POST['user_name'];
        $class_id=$_POST["class_id"];
        $pwd=$_POST["set_password"];
        $before_password=$_POST["before_password"];
        //比较旧密码
        $user=D("user");
        $res=$user->where("user_id=".$_SESSION["user"]["id"])->find();

        if(md5($before_password)!=$res["pwd"]){
            echo 0;
            return false;
        }else{
            $user=new UserModel();
            $res=$user->alterInfo($class_id,$user_name,$pwd);
            if($res){
                echo 1;
                return;
            }else{
                echo 0;
                return;
            }
        }
    }
    /**
     * 退出 注销
     *
     */
    function loginout(){
        //取消session
        session_destroy();
        $this->index();
    }

}