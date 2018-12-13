<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GoodsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'title'=>'required',
            'price'=>'required|numeric|min:1,99999',
            'category_id'=>'required',
            'list_pic'=>'required',
            'pics'=>'required',
            'description'=>'required',
            'content'=>'required',

        ];
    }
    public function messages()
    {
        return [
            'title.required'=>'请输入文章标题',
            'price.required'=>'价格不能为空',
            'price.min'=>'价格不能为负',
            'price.numeric'=>'价格必须是数字',
            'price.min'=>'价格不能为负',
            'category_id.required'=>'栏目不能不选',
            'list_pic.required'=>'商品列表图片不能为空',
            'pics.required'=>'商品列表图片不能为空',
            'description.required'=>'描述不能为空',
            'content.required'=>'商品详情不能为空',
        ];
    }
}
