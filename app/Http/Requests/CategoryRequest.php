<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
        $id = $this->route( 'category' ) ? $this->route( 'category' )->id : null;
//        dd( $id );
        return [
            //
            'name' =>'required|unique:categories,name,'.$id,
            'pid'  =>'required'
        ];
    }
    // 提示消息
    public function messages()
    {
       return [
         'name.required'  =>'栏目不能为空',
         'name.unique'  =>'栏目名称已存在',
         'pid.required'  =>'父级id不能为空',

       ];
    }
}
