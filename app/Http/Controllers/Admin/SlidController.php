<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slid;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SlidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $slids = Slid::all();
        return view('admin.slid.index',compact('slids'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('admin.slid.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Slid $slid)
    {
        //
        $slid->create($request->all());

        return redirect()->route('admin.slid.index')->with('success','幻灯片添加成功');
    }

    public function edit(Slid $slid)
    {
        //
        return view('admin.slid.edit',compact('slid'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slid  $slid
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slid $slid)
    {
        $slid->update($request->all());
        return redirect()->route('admin.slid.index')->with('success','轮播图编辑成功');

        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slid  $slid
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slid $slid)
    {
        //
        $slid->delete();
        return redirect()->route('admin.slid.index')->with('success','删除成功');
    }
}
