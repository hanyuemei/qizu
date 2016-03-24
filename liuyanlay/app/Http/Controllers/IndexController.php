<?php
namespace App\Http\Controllers;
use DB;
use App\Http\Controllers\Controller;


class IndexController extends Controller {
    public function lists(){
       // echo "aaa";die;
       // $sql="select * from liuyan";
        //$arr=DB::select($sql);
        //return view('index',['arr'=>$arr]);
        $arr= DB::table('liuyan')->paginate(3);
        return view('index',['arr'=>$arr]);
    }
    public function add(){
        $con=$_GET['con'];
        $sql="insert into liuyan(c_con) values('$con')";
        DB::insert($sql);
        //$sql2="select * from liuyan";
       //$arr= DB::select($sql2);
        $arr= DB::table('liuyan')->paginate(3);
        return view('index2',['arr'=>$arr]);
    }
    public function del(){
        $id=$_GET['id'];
        $sql="delete from liuyan where c_id=".$id;
        DB::delete($sql);
       // $sql2="select * from liuyan";
       // $arr= DB::select($sql2);
        $arr= DB::table('liuyan')->paginate(3);
        return view('index',['arr'=>$arr]);
    }
    public function save(){
        $id=$_GET['id'];
        //echo $id;die;
        $sql="select * from liuyan where c_id=".$id;
        $arr=DB::select($sql);
        //print_r($arr);die;
        return view('save',['arr'=>$arr]);

}
    public function saveadd(){
       // echo "ssss";die;
        $id=$_GET['id'];
       $con=$_GET['con'];
       $sql="update liuyan set c_con='$con' where c_id=".$id;
       //echo $sql;die;
        DB::update($sql);
       // $sql2="select * from liuyan";
       // $arr=DB::select($sql2);
        //print_r($arr);die;
        //return view('index')->with('arr',$arr);
        $arr= DB::table('liuyan')->paginate(3);
        return view('index',['arr'=>$arr]);
    }
}