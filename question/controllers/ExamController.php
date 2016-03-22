<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Direction;
use app\models\Company;
use app\models\Exam;
class ExamController extends CommonController
{
    public $enableCsrfValidation = false;
    /*添加试题页面*/
    public function actionAddexam(){
        //公司
        $company=new Company();
        $company=$company->find()->asArray()->all();
        //职业方向
        $direction=new Direction;
        $direction=$direction->find()->asArray()->all();
        return $this->render('addexam',['company'=>$company,'direction'=>$direction]);
    }

    //试题添加

    public function actionExam_add(){
        $request=Yii::$app->request;
        $db=Yii::$app->db;
        //print_r($_POST);DIE;
        if($request->isPost){
           $status=$request->post('radio','');
           $company=$request->post('company','');
           $direction=$request->post('direction','');
           $e_name=$request->post('e_name','');
           $a=$request->post('a','');
           $b=$request->post('b','');
           $c=$request->post('c','');
           $d=$request->post('d','');
           $e_an=$request->post('answer','');
        }
        $addtime=date('Y-m-d H:i:s');
        $arr=$db->createCommand("insert into exam(company_id,direction_id,e_name,e_an,addtime,`status`,a,b,c,d) values('$company','$direction','$e_name','$e_an','$addtime','$status','$a','$b','$c','$d')")->query();
        if($arr){
            echo "<script>alert('添加成功');location.href='index.php?r=exam/listexam';</script>";
        }else{
            echo "<script>alert('添加成功');location.href='index.php?r=exam/addexam';</script>";
        }
    }

    //试题列表

    public function actionListexam(){
        $model=new Exam();
        $arr=$model->find()->asArray()->all();
        //print_r($arr);die;
        return $this->render('listexam',['arr'=>$arr]);
    }

}