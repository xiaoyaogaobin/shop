<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    //后台模版首页加载
    public function index(){
//        //加载后台登录

        return view('admin.index.index');
    }

}
