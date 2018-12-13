<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Houdunwang\Arr\Arr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Category $category)
    {
        $data  = Category::all()->toArray();
        $categorys = $category->getCategory($data);

//        dd($categorys);

//         dd($categorys->toArray());
        //加载 栏目页面模版
        return view('admin.category.index',compact('categorys'));
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
       // 获得栏目数据

        //引入创建栏目yem
        return view('admin.category.create',compact('categorys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request,Category $category)
    {
        $category->create($request->all());

        return redirect()->route('admin.category.index')->with('success','栏目创建成功');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {

        $categorys = $category->getEditCategorys($category['id']);

//        dd($categorys);
        //
        return view('admin.category.edit',compact('category','categorys'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
//        dd($request->all());
        $category->name= $request->name;
        $category->pid = $request->pid;
        $category->save();
        return redirect()->route('admin.category.index')->with('success','编辑成功');

        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {

            if (Category::where('pid',$category['id'])->first()){
               return redirect()->back()->with('danger','你下面有子级');
            }

        //
        $category->delete();
        return redirect()->route('admin.category.index')->with('suucess','删除成功');

    }
}
