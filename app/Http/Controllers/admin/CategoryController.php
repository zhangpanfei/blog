<?php

namespace App\Http\Controllers\Admin;

use App\Model\Category;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    //展示
    public function show(){
        $data=Category::getOrderData();
        return view('admin.list',['data'=>$data]);
    }

    //ajax处理
    public function postAjax(Request $input){
        $cate=Category::find($input->cate_id);
        $cate->cate_order=$input->get('ord',99);
        if($cate->update()){
            exit(json_encode(['code'=>0]));
        }else{
            exit(json_encode(['code'=>1]));
        }
    }
}
