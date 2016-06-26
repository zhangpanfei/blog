<?php
/**
 * Created by PhpStorm.
 * User: zpf
 * Date: 2016/6/26
 * Time: 19:20
 */
 namespace App\Scopes;

 use Illuminate\Database\Eloquent\Scope;
 use Illuminate\Database\Eloquent\Model;
 use Illuminate\Database\Eloquent\Builder;

 /**
  * Class delScope
  * @package App\Scopes
  * 自定义全局控制查询未被软删除的实例
  */
 class delScope implements Scope{
     public function apply(Builder $builder, Model $model)
     {
         // TODO: Implement apply() method.
         return $builder->where('is_del','=',0);
     }
 }
?>