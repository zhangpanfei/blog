<?php
    namespace App\Services;
    /**
     * 自定义帮助类
     */
    class Helper{
        //无限极排序
        public static function noLimit($data,$parentId=0,$level=0){
            static $newData=[];
            foreach($data as $key=>$val){
                if($val->p_id==$parentId){
                    $val['level']=$level;
                    $newData[]=$val;
                    unset($data[$key]);
                    self::noLimit($data,$val->cate_id,$level+1);
                }
            }
            return $newData;
        }
    }
?>