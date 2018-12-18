<?php

namespace App\Http\Controllers\Home;

use App\Models\Category;
use App\Models\Goods;
use App\Models\Spec;
use Houdunwang\Arr\Arr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContentController extends CommenController
{
    //
    public function  index(Goods $content,Category $category){

//dd(session('cart'));
      $contents = $content->spec()->get()->toArray();
//        $content['pics'] = json_decode($content['pics']);
//        dd($content);
        // 获得栏目数据 放到页面进行循环
        $categoriesd = Category::all ()->toArray();

        $getFather = array_reverse($category->getFather ( $categoriesd , $content['category_id'] ));
        $categories = Category::all ()->toArray ();
        $categoryData = (new Arr())->channelLevel($categories, $pid = 0, $html = "&nbsp;", $fieldPri = 'id',
                                                  $fieldPid = 'pid');
        $categoryData =  array_slice($categoryData,0,7);
//        dd($getFather);
        return view('home.index.content',compact('content','contents','getFather','categoryData'));
    }

    public function specGetTotal ( Request $request )
    {
//        dd(1);

//        dd($request->all ());
        return Spec::find ( $request->id );
    }
}
