<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\GoodsRequest;
use App\Models\Category;
use App\Models\Goods;
use App\Models\Spec;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Goods $goods)

    {
        //
        $goods = $goods->latest()->paginate(8);

        return view('admin.goods.index',compact('goods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Category $category)
    {
        $data  = Category::all()->toArray();
        $categorys = $category->getCategory($data);
        return view('admin.goods.create',compact('categorys'));
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GoodsRequest $request,Goods $goods)
    {
        //添加goods 商品
        $data = $request->all();
        $data['user_id']= auth('admin')->id();
        $data['pics'] =json_encode($data['pics']);
        $specs = json_decode ( $data['specs'] , true );
        $total = 0;
        foreach($specs as $v){
            $total+=$v['total'];
        }
        $data['total'] =$total;
       $goods_id =  $goods->create($data);
        // 添加 规格数据

        foreach($specs as $v){
            $spec =new Spec();
            $spec->spec = $v['spec'];
            $spec->total = $v['total'];
            $spec->goods_id = $goods_id->id;
            $spec->save();
        }

        return redirect()->route('admin.goods.index')->with('success','商品添加成功');


    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Goods  $goods
     * @return \Illuminate\Http\Response
     */
    public function edit(Goods $good,Category $category)
    {
        //

        $goods = $good;
        $goods['pics'] = json_decode($goods['pics'] , true);
        $data  = Category::all()->toArray();
        $categorys = $category->getCategory($data);
        $specs = Spec::where('goods_id',$goods['id'])->get();

        return view('admin.goods.edit',compact('goods','categorys','specs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Goods  $goods
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Goods $good)
    {
//        dump($good->toArray());

        //添加goods 商品
        $data = $request->all();
        $data['user_id']= $good->user_id;
        $data['pics'] =json_encode($data['pics']);
        $specs = json_decode ( $data['specs'] , true );
        $total = 0;
        foreach($specs as $v){
            $total+=$v['total'];
        }
        $data['total'] =$total;
//        dd($data);
         $good->update($data);
        // 删除原先数据 规格数据
        $good->spec()->delete();
        foreach($specs as $v){

            $spec =new Spec();
            $spec->spec = $v['spec'];
            $spec->total = $v['total'];
            $spec->goods_id = $good['id'];
            $spec->save();
        }


        return redirect()->route('admin.goods.index')->with('success','商品编辑成功');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Goods  $goods
     * @return \Illuminate\Http\Response
     */
    public function destroy(Goods $good)
    {
        //删除
        $good->delete();
        return redirect()->route('admin.goods.index')->with('success','删除成功');

    }
}
