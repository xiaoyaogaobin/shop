<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    //ame
    protected $fillable=['name','data'];
    public $casts = [
        'data' =>'array',
    ];

}
