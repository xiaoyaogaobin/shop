<?php

namespace App\Http\Controllers\Admin;

use App\Models\Config;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConfigController extends Controller
{


    //    加载模板页面
    public function create($name)
    {
        $config = Config::firstOrNew(
            ['name' => $name]
        );
        return view('config.config_' . $name,compact('name','config'));

    }

//    执行数据添加更新
    public function update($name,Request $request)
    {
//        dd($request->all());

        Config::updateOrCreate(
            ['name' => $name],
            ['name' => $name,'data' => $request->all()]);
        hd_edit_env($request->all());
        return back()->with('success','更新配置成功');

    }

}
