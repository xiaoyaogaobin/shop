<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Home\CommenController;
use App\Models\Category;
use App\Models\Slid;
use Houdunwang\Arr\Arr;
use Illuminate\Http\Request;

class HomeCotroller extends CommenController
{
    //
    public function  home(Category $category){
    // 获得栏目数据 放到页面进行循环
        $categories = Category::all ()->toArray ();
        //获取所有栏目数据.左侧菜单数据
        $categoryData = (new Arr())->channelLevel($categories, $pid = 0, $html = "&nbsp;", $fieldPri = 'id',
                                                  $fieldPid = 'pid');

        $categoryData =  array_slice($categoryData,0,7);
//        dd($categoryData);
        // 调用轮播图
       $slids=  Slid::all();

    return view('home.index.index',compact('categoryData','slids'));
}

}
