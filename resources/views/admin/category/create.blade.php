@extends('admin.layouts.index')
@section('content')
    <div class="row content-tabs">
        <button class="roll-nav roll-left J_tabLeft"><i class="fa fa-backward"></i>
        </button>
        <nav class="page-tabs J_menuTabs">
            <div class="page-tabs-content">
                <a href="javascript:;" class="active J_menuTab" data-id="index_v1.html">添加栏目</a>
            </div>
        </nav>

        </button>

        <a href="{{asset(route('admin.loginout'))}}" class="roll-nav roll-right J_tabExit"><i class="fa fa fa-sign-out"></i> 退出</a>
    </div>
    <div class="wrapper wrapper-content">
        {{--内容添加--}}
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>栏目添加 <small class="text-danger">栏目名称不能重复</small></h5>


                </div>
                <div class="ibox-content">
                    <form method="post" class="form-horizontal" action="{{route('admin.category.store')}}">
                        @csrf
                        <div class="form-group">
                            <label class="col-sm-2 control-label">栏目名称</label>

                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">父级栏目</label>

                            <div class="col-sm-10">
                                <div class="input-group">


                                    <div class="input-group-btn">
                                        <select name="pid" class="form-control custom-select dropdown-toggle" data-placeholder="Choose a Category" tabindex="1">
                                            <option value="0">顶级栏目</option>
                                            @foreach($categorys as $category)
                                                <option value="{{$category['id']}}">{!! $category['_name'] !!}</option>
                                                @endforeach

                                        </select>


                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>



                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">
                                <button class="btn btn-primary" type="submit">保存内容</button>
                                <a href="{{route('admin.category.index')}}" class="btn btn-white">
                                    返回栏目</a>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @include('layouts.message')
        {{--内容添加结束--}}
    </div>
@endsection



