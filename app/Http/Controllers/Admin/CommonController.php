<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CommonController extends Controller
{
    public function __construct()
    {
        session_start();
        $this->checkLogin();
    }

    //获取验证码
    public function getCode(){
        require_once 'app/Http/Controllers/Org/ValidateCode.class.php';
        $_vc = new \ValidateCode();  //实例化一个对象
        $_vc->doimg();
        $_SESSION['verifyCode']=$_vc->getCode();
    }
    //验证验证码
    public function checkCode($code){
        $res=strtolower($code)==$_SESSION['verifyCode']?true:false;
        if($res){
            unset($_SESSION['verifyCode']);
        }
        return $res;
    }
    //检查是否登录
    private function checkLogin(){
        //dd(session('admin'));
        if(empty(session('admin')))return redirect('Admin/login');
    }
}
