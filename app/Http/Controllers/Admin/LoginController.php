<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\CommonController;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;


class LoginController extends CommonController
{
    //登录
    public function postIndex(){
        //验证
        $data=Input::all();
        if(!$this->checkCode($data['code']))return view('admin.login')->with('msg','验证码错误');
        $userDB=new Admin();
        $row=$userDB->where(['username'=>$data['username']])->first();
        if(empty($row->username)||$data['username']!=$row->username||$data['password']!=Crypt::decrypt($row->password)){
            return view('admin.login')->with('msg','用户名或密码错误！');
        }
        $userDB->where(['admin_id'=>$row->admin_id])->update(['login_time'=>time()]);
        session(['admin'=>$row]);
        return redirect('admin/index');
    }
    public function getIndex(){
        return view('admin.login');
    }

    public function getLogout(){
        session(['admin'=>null]);
        return redirect('admin/login');
    }
}
