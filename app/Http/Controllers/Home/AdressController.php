<?php

namespace App\Http\Controllers\Home;

use App\Models\Address;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdressController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',[
            'except'=>[]
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Address $address)
    {
        //
        $address = $address->where('user_id',auth()->id())->get();
//        dd($address->toarray());
//        dd($address->all()->toArray());
        return view('home.address.index',compact('address'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Address $address)
    {
        $address->user_id = auth()->id();
        $address->phone =$request->phone;
        $address->address =$request->address;
        $address->name =$request->name;
        $address->city =$request->city;
        $address->save();
        return redirect()->back()->with('success','添加成功');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function edit(Address $address)
    {
        //
//        dd($address->toArray());
        return view('home.address.edit',compact('address'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Address $address)
    {
        $address->user_id = auth()->id();
        $address->phone =$request->phone;
        $address->address =$request->address;
        $address->name =$request->name;
        $address->city =$request->city;
        $address->save();
        return redirect()->route('home.address.index')->with('success','更改成功');
        //

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function destroy(Address $address)
    {
        $address->delete();
        return redirect()->back()->with('success','删除成功');
    }
    public function push(Address $address){


        if ($address['default']==0){
            //将当前菜单数据表 status 修改1,
            $address->update(['default'=>1]);
            //将当前菜单数据表 status ,其余的改为0
            Address::where('id','!=',$address->id)->update(['default'=>0]);

            return redirect()->route('home.address.index')->with('success','设为默认成功');
        }else{
            return back()->with('danger','不能重复选择默认地址');
        }
    }
}
