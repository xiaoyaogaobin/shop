<?php

namespace App\Models;

use Houdunwang\Arr\Arr;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['pid','name'
    ];

    //创建一个公共调用
    public function getCategory($data)
    {
        return (new Arr)->tree($data,'name',$fieldPri = 'id',$fieldPid = 'pid');
    }

    // 创建一个方法把自己跟自己儿子的数据抛出去，返回剩下数据

     public function getEditCategorys($id){
        //得到全部数据
         $getEditCategorys = Category::all();
         //调用son 方法得到id
        $categorys =  $this->getSon($getEditCategorys,$id);
        //把自己id也追加进去
         $categorys[] = $id;
         $data = $this->whereNotIn( 'id' , $categorys )->get();
         //调用树形方法返回
        return $this->getCategory($data->toarray());


     }


    // 创建一个递归接受除了自己儿子孙子
    public function getSon($data,$id)
    {
        static $shopSon = [];
        foreach($data as $v){
            if ($id == $v['pid']){
                $shopSon[] = $v['id'];
                $this->getSon($data,$v['id']);
            }
        }
        return $shopSon;
    }
}
