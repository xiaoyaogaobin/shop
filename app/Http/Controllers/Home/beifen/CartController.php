<?php

namespace App\Http\Controllers\Home;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Goods;
use App\Models\Spec;
use Houdunwang\Arr\Arr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends CommenController
{

    public function __construct()
    {

        $this->middleware(
            'auth',[
            'only' => ['index','update','store','destroy'],
        ]);
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Cart $cart)
    {

        $categories = Category::all()->toArray();
        $categoryData = (new Arr())->channelLevel(
            $categories,$pid = 0,$html = "&nbsp;",$fieldPri = 'id',
            $fieldPid = 'pid');
        $categoryData = array_slice($categoryData,0,7);
        //
        $carts = $cart->where('user_id',auth()->id())->get();

        return view('home.index.carts.index',compact('carts','categoryData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
//    public function create(Cart $cart,Category $category)
//    {
//        //
//        $categories = Category::all()->toArray();
//        $categoryData = (new Arr())->channelLevel(
//            $categories,$pid = 0,$html = "&nbsp;",$fieldPri = 'id',
//            $fieldPid = 'pid');
//        $categoryData = array_slice($categoryData,0,7);
//        $cart = $cart->where('user_id',auth()->id())->get();
//
//        return view('home.index.carts.create',compact('cart','categoryData'));
//    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Cart $cart)
    {   // 得到当前产品
        $goods = Goods::find($request->id);
        //通过商品查找当前栏目ew
        $spec = Spec::find($request->spec);

        $newDate = Cart::where('spec_id',$spec->id)->where('user_id',auth()->id())->where('good_id',$goods->id)->first();
        if (!$newDate){
            $cart->pic = $goods->list_pic;
            $cart->title = $goods->title;
            $cart->spec = $spec->spec;
            $cart->price = $goods->price;
            $cart->num = $request->num;
            $cart->user_id = auth()->id();
            $cart->good_id = $goods->id;
            $cart->spec_id = $spec->id;
            $cart->save();
        } else{
            $newDate->num = (int)$newDate['num'] + (int)$request->num;
            $newDate->save();
        }
        return ['code' => 1,'msg' => '加入购物车成功'];

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Cart $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Cart $cart)
    {
        //
        $cart->num=$request->num;
        $cart->save();
        //$cart->update(['num'=>$request->num]);
        return [ 'code'=>'10' , 'msg'=>'更新成功' ];

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        //
        $cart->delete();
        return ['code'=>'200','message'=>'删除成功'];
    }
}
