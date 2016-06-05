<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class IndexController extends CommonController
{
    //
    public function getIndex(){
        return view('admin.index')->with(['admin'=>session('admin')]);
    }
    public function getInfo(){
        return view('admin.info');
    }
    public function getMail(){
        Mail::send('mail.mail',['name'=>'zhang'],function($msg){
            $msg->to('zpfeiv@163.com')->subject('您好');
        });
    }
}
