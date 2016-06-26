<?php

namespace App\Model;

use App\Scopes\delScope;
use Illuminate\Database\Eloquent\Model;
use App\Services\Helper;

class Category extends Model
{
    //
    protected $table='category';
    protected $primaryKey='cate_id';
    public $timestamps=false;

    //使用全局作用域
    protected static function boot(){
        parent::boot();
        static::addGlobalScope(new delScope());
    }

    //获取无限极排好顺序的数据
    public static function getOrderData()
    {
        $data=self::orderBy('cate_order','asc')->get();
        return Helper::noLimit($data);
    }
}
