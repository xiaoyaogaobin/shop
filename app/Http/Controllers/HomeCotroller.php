<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeCotroller extends Controller
{
    //
    public function  home(){

        return view('home.index.index');
    }

}
