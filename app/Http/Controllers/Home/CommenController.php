<?php

namespace App\Http\Controllers\Home;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class CommenController extends Controller
{
    //
    public  function __construct()
    {

        // 获取顶级栏目进行循环
        $_categories = Category::where('pid',0)->limit(8)->get();

        \View::share('_categories',$_categories);

    }
}
