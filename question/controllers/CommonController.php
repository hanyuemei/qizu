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
use yii\data\Pagination;


Class CommonController extends Controller
{
	/*public function __construct(($id, $module, $config = array()){
		$connect=Yii::$app->db;
		parent::__construct($id, $module, $config);
		$sql="select * from label";
		$arr=$connect->createCommand($sql)->queryAll();
		Yii::$app->params['android']=$arr;
	}*/
	public function __construct($id, $module, $config = array()){
         $connect=Yii::$app->db;
         parent::__construct($id, $module, $config);
        $sql="select * from label";
		$arr=$connect->createCommand($sql)->queryAll();
		Yii::$app->params['android']=$arr;
    }

}