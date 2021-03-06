<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    protected $fillable =['title','price','category_id','list_pic','pics','description','content','total','user_id','hot_id'];
    //
    protected $casts    = [
        'pics' => 'array'
    ];
    public  function  spec(){

        return $this->hasMany(Spec::class,'goods_id','id');
    }

}
