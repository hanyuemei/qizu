<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;

class RbacController extends Controller
{
	public function __construct($id, $module, $config = [])
    {

    	header("content-type:text/html;charset=utf8");
        parent::__construct($id,$module);
        $session=Yii::$app->session;
        //echo $session['u_name'];die;
		if(empty($session['u_name'])){
			exit("<script>alert('请先登录');location.href='index.php?r=login/index'</script>");
		}
		$power = $session['power'];
		$common=["andadd","Update","index","search","basics","senior","hr","andsubmit","seniordel","basicsdel","hrdel","logic","collect","direction"];
		$mg=array_merge($common,$power);
		//print_r($mg);die;
		$url=Yii::$app->request->getUrl();
		//echo $url;die;
		if (strpos($url,'&')) {
			$action=substr($url,strrpos($url,"/")+1);
			$num=strpos($action,"&");
			$action=substr($action,0,$num);
		} else {
			$action = substr($url,strrpos($url,"/")+1);
		}
		//echo $action;die;
		//print_r($action);die;
		//print_r($power);die;
		//echo $url=Yii::$app->request->action;die;
		//print_r($power);die;
		// if(empty($power)){
		// 	$p = $session['power'];
		// 	$act = Yii::$app->controller->action;
		// 	$url = $act;
			if(!in_array($action,$mg)){
				exit("<script>alert('对不起，您没有权限');location.href='".$_SERVER['HTTP_REFERER']."'</script>");
			}
		// }
	}
}