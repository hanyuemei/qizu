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
    public function __construct($id, $module, $config = array()) {
        parent::__construct($id, $module, $config);
         $session=Yii::$app->session;
         //parent::__construct();
       $username=$session['username'];
       // echo $username;die;
        Yii::$app->params['username']=$username;
       //echo  Yii::$app->params['username'];die;
    }

}