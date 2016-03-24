<?php

namespace app\controllers;

use Yii;
use yii\data\Pagination;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\Index;

class IndexController extends Controller
{
    public $enableCsrfValidation = false;
    //前台首页显示
    public function actionIndex(){
        $model=new Index;
        $arr=$model->find()->orderBy("c_id desc");
       $countQuery = clone $arr;
        $pages = new Pagination(['totalCount' => $countQuery->count(),'pageSize'=>2]);
        $models = $arr->offset($pages->offset)
            ->limit($pages->limit)
            ->all();
        return $this->render('index',['arr'=>$models,'pages'=>$pages]);
    }
    //留言添加
    public function actionAdd(){
        $model=new Index;
        $db=Yii::$app->db;
        $con=$_POST['con'];
        $ar=$db->createCommand("insert into liuyan(c_con) values('$con')")->query();
       // $arr=$model->find()->all();
        $arr=$model->find()->orderBy("c_id desc");
        $countQuery = clone $arr;
        $pages = new Pagination(['totalCount' => $countQuery->count(),'pageSize'=>2]);
        $models = $arr->offset($pages->offset)
            ->limit($pages->limit)
            ->all();
        return $this->renderPartial('index2',['arr'=>$models]);
        //return json_encode($arr);
    }
    //留言删除
    public function actionDel(){
        $model=new Index;
        $id=$_GET['id'];

        if(empty($_GET['page'])){
            $sql=$model->findOne($id);
            $del=$sql->delete();
        }

        //$arr=$model->find()->all();
        $arr=$model->find()->orderBy("c_id desc");
        $countQuery = clone $arr;
        $pages = new Pagination(['totalCount' => $countQuery->count(),'pageSize'=>2]);
        $models = $arr->offset($pages->offset)
            ->limit($pages->limit)
            ->all();
        return $this->render('index',['arr'=>$models,'pages'=>$pages]);
    }
    //留言修改页面
    public function actionSave(){
        $session=Yii::$app->session;
        $id=$_GET['id'];
        $session['id']=$id;
        $model=new Index;
        $arr=$model->findOne($id);
        return $this->render('save',['arr'=>$arr]);
    }
    //留言修改
    public function actionSa(){
        $session=Yii::$app->session;
        $model=new Index;
        if(empty($_GET['page'])) {
            $con = $_POST['con'];
            $id = $session['id'];
            $db = Yii::$app->db;
            $sql = "update liuyan set c_con='$con' where c_id='$id'";
            $ar = $db->createCommand($sql)->query();
            // $arr=$model->find()->all();
        }
        $arr=$model->find();
        $countQuery = clone $arr;
        $pages = new Pagination(['totalCount' => $countQuery->count(),'pageSize'=>2]);
        $models = $arr->offset($pages->offset)
            ->limit($pages->limit)
            ->all();
        return $this->render('index',['arr'=>$models,'pages'=>$pages]);
    }
}