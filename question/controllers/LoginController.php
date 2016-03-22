<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\CollegeForm;
use app\models\AndroidForm;
use app\controllers\RbacController;


Class LoginController extends Controller
{
	public $enableCsrfValidation = false;
	public function actionIndex(){	
		return $this->renderPartial('index');
	}

	public function actionLogin(){
		$connect=Yii::$app->db;
		$request=Yii::$app->request;
		$session=Yii::$app->session;
		$session->open();
		$username = $request->post('username');
		$pwd = $request->post('pwd');
       // echo $pwd;die;
		$sql="select * from user where u_name='$username'";
		$arr = $connect->createCommand($sql)->queryOne();
        if($arr){
            if($arr['u_pwd']==md5($pwd)){
                $session['u_id'] = $arr['u_id'];
                $session['username'] = $arr['u_name'];
                $user_id = $arr['u_id'];
                $sql="select distinct(p_url) from u_r inner join r_p on u_r.r_id = r_p.r_id inner join power on r_p.p_id = power.p_id where u_r.u_id = '$user_id'";
                $power = $connect->createCommand($sql)->queryAll();
                $ary = array();
                foreach($power as $k=>$v){
                    $ary[] = $v['p_url'];
                }
                $session['power'] = $ary;
                echo "<script>alert('登陆成功');location.href='index.php?r=index/index';</script>";
            }else{
                echo "<script>alert('密码错误');location.href='index.php?r=login/index'</script>";
            }
        }else{
            echo "<script>alert('用户名不存在');location.href='index.php?r=login/index'</script>";
        }

	}
}