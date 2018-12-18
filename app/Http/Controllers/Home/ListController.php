<?php

namespace App\Http\Controllers\Home;

use App\Models\Category;
use App\Models\Goods;
use Houdunwang\Arr\Arr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ListController extends CommenController

{
    //需要继承 commen 类 因为需要调用数据类
    public  function index($list,Category $category){

        // 获得栏目数据 放到页面进行循环
        $categories = Category::all ()->toArray ();
        //获取所有栏目数据.左侧菜单数据
        $categoryData = (new Arr())->channelLevel($categories, $pid = 0, $html = "&nbsp;", $fieldPri = 'id',
                                                  $fieldPid = 'pid');
        //获取所有栏目数据
        $categories = Category::all ()->toArray ();
        //获取当前栏目下所有子栏目商品
        $sonIds = $category->getSon ( $categories , $list );
        $sonIds[]=$list;
        // 查找产品数据，wherein  第一个是关联id  第二个是产品

        $goods = Goods::whereIn('category_id',$sonIds);
//        获得栏目数据
        $categoriesd = Category::all ();

        $categoriess = $categoriesd->where('id',$list)->first();

//        dd($goods);
        //进行分页处理
        // 获得商品排序
        if(\request ()->query('price') == 'asc'){
            $goods = $goods->orderBy('price','asc');
        }
        if(\request ()->query('price') == 'desc'){
            $goods = $goods->orderBy('price','desc');
        }
        $goods = $goods->orderby('created_at','desc')->paginate(10);

        $getFather = array_reverse($category->getFather ( $categories , $list ));
        $categoryData =  array_slice($categoryData,0,7);
//        dd($getFather);
        return view('home.index.list',compact('categoryData','goods','categoriess','list','getFather'));

    }
}
