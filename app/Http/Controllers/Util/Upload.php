<?php

namespace App\Http\Controllers\Util;

use App\Exceptions\UploadException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Upload extends Controller
{
    //
    public function  upload(Request $request){


        $file = $request->file('file');

        // 处理字节照片大小
        $this->checkSize($file);
        // 处理图片类型管理
        $this->checkType($file);
        if ($file){
            $path = $file->store('image','image');

            return [
                "code"=> 0,
                "msg"=>'',
                "data"=>[
                    "src"=>'/'.$path
                ],
            ];
        }
    }
    //处理字节大小

    private function checkSize($file)
    {
        if ($file->getSize() >20000000){
            // 抛出异常
            throw new UploadException('文件超过大小');

        }

    }

    // 判断图片类型
    private function checkType($file)
    {
        if (!in_array(strtolower($file->getClientOriginalExtension()),['jpg','png'])){
            //return  ['message' =>'类型不允许', 'code' => 403];
            throw new UploadException('类型不允许');
        }

    }

}
