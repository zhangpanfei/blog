<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class IndexController extends CommonController
{
    //首页
    public function getIndex(){
        return view('admin.index')->with(['admin'=>session('admin')]);
    }
    //信息页面
    public function getInfo(){
        return view('admin.info');
    }
    //发送邮件
    public function getMail(){
        Mail::send('mail.mail',['name'=>'zhang'],function($msg){
            $msg->to('zpfeiv@163.com')->subject('您好');
        });
    }
    //修改密码
    public function getPass(){
        return view('admin.pass');
    }
    public function postPass(){
        $input=Input::all();
        $role=[
            'password'=>'required',
            'nPassword'=>'required|between:6,20|confirmed',
        ];
        $msg=[
            'password.required'=>'原密码不能为空',
            'nPassword.required'=>'新密码不能为空',
            'nPassword.between'=>'新密码必须在6-12位',
        ];
        $validate=Validator::make($input,$role,$msg);
        if($validate->passes()){
            return view('admin/index');
        }else{
            return back()->withErrors($validate);
        }
    }
}
