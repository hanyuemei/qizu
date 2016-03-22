<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Direction;
use yii\web\UploadedFile;
class IndexController extends CommonController
{
	public $layout = 'main';

	public $enableCsrfValidation=false;

    /*
     * [actionIndex] 主页
     */
    public function actionIndex(){
        $session=Yii::$app->session;
        if(empty($session['username'])){
            echo "<script>alert('请先登录');location.href='index.php?r=login/index';</script>";
        }else{

            return $this->render('index');
        }
    }
	/**
	 * [actionCompany 添加公司试题页面]
	 */
    public function actionCollege(){
        $connect=Yii::$app->db;
        $session=Yii::$app->session;
        $u_id = $session['u_id'];
        //阶段
        $jie = "select * from type";
        $jie = $connect->createCommand($jie)->queryAll();
        if($u_id==1){
            $xue=$connect->createCommand("select * from college")->queryAll();
            $zhuan="";
            return $this->render('college',['xue'=>$xue,'zhuan'=>$zhuan,'jie'=>$jie,'u_id'=>$u_id]);
        }else {
            //查询当前用户所在的学院及专业
            $sql = "select * from user where u_id='$u_id'";
            $arr = $connect->createCommand($sql)->queryOne();
            //print_r($arr);die;
            $college_id = $arr['college_id'];
            $direction_id = $arr['direction_id'];

            //print_r($jie);die;
            //学院
            $sql2 = "select c_name,c_id from user inner join college on user.college_id=college.c_id where user.college_id=" . $college_id;
            $xue = $connect->createCommand($sql2)->queryOne();
            //print_r($xue);die;
            $sql = "select d_name from user inner join direction on user.direction_id=direction.d_id where user.direction_id=" . $direction_id;
            //echo $sql;die;
            $zhuan = $connect->createCommand($sql)->queryAll();
           // print_r($zhuan);die;
            return $this->render('college',['xue'=>$xue,'zhuan'=>$zhuan,'jie'=>$jie,'u_id'=>$u_id]);
        }

    }

    /**
	 * [actionCompany_add 验证是否添加成功]
	 */
	public function actionCompany_add(){
		$connect=Yii::$app->db;
		$request=Yii::$app->request;
		$title=$request->post('title','');
		$answer=$request->post('answer','');
		$type=$request->post('type','');
		$company=$request->post('company','');
		$img=UploadedFile::getInstanceByName('file');
        //echo $img;die;
		$path=$_SERVER['DOCUMENT_ROOT'].'/xm/question/web/assets/uploads/';
       // echo $path;die;
		$filename=rand(100000,999999);
		$file=$path.$filename.".jpg";
		//echo $file;die;
		$image=substr($file,23);
        //echo $image;die;
		$status=$img->saveAs($file,true);
        //echo $status;die;
		$sql="insert into college_questions(c_name,c_answer,c_type,c_college,c_logo) values('$title','$answer','$type','$company','$image');";
        //echo $sql;die;
		$re=$connect->createCommand($sql)->execute();
		if($re){
			echo "<script>alert('添加成功！');location.href='index.php?r=index/lists'</script>";
		}else{
			echo "<script>alert('添加失败！');location.href='index.php?r=index/college'</script>";
		}
	}
	/**
	 * [actionLists 试题列表]
	 */
	public function actionLists(){
		$connect=Yii::$app->db;
		$sql="select * from college_questions";
		$arr=$connect->createCommand($sql)->queryAll();
		return $this->render('lists',['arr'=>$arr]);
	}

    /**
     * [actionLists 专业二级联动]
     */
    public function actionZhuan(){
        $model=new Direction;
        $request=Yii::$app->request;
        $id=$request->post('id');
        $arr=$model->find()->where("college_id=$id")->asArray()->all();
        return json_encode($arr);

    }
    /**
     * [actionLists 退出]
     */
    public function actionLayout(){
        $session=Yii::$app->session;
        unset($session['username']);
        echo "<script>location.href='index.php?r=index/index'</script>";
    }
}