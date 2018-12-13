@extends('admin.layouts.index')
@section('content')
    <div class="row content-tabs">
        <button class="roll-nav roll-left J_tabLeft"><i class="fa fa-backward"></i>
        </button>
        <nav class="page-tabs J_menuTabs">
            <div class="page-tabs-content">
                <a href="javascript:;" class="active J_menuTab" data-id="index_v1.html">商品管理</a>
            </div>
        </nav>

        </button>

        <a href="{{asset(route('admin.loginout'))}}" class="roll-nav roll-right J_tabExit"><i class="fa fa fa-sign-out"></i> 退出</a>
    </div>
    <div class="wrapper wrapper-content">
        {{--内容添加--}}
        <div class="row">
            <div class="col-sm-12">

                <div class="ibox">
                    <div class="ibox-title">
                        <h5>所有栏目</h5>
                        <div class="ibox-tools">
                            <a href="{{route('admin.goods.create')}}" class="btn btn-primary btn-sm " style="margin-top: -3px">添加新商品</a>
                        </div>
                    </div>
                    <div class="ibox-content">


                        <div class="project-list">

                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>id</th>
                                    <th>商品名称</th>
                                    <th>商品图片</th>
                                    <th>商品价格</th>
                                    <th>添加时间</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>

                                <tr>
                                    <td class="project-status">
                                            1</td>
                                    <td class="project-title">
                                        <a href="project_detail.html">@商品名称</a>
                                        <br>

                                    </td>
                                    <td class="project-completion">
                                        <small>@商品图片</small>

                                    </td>
                                    <td class="project-completion">
                                        <small>@商品价格</small>

                                    </td>
                                    <td class="project-completion">
                                        <small>@添加时间</small>

                                    </td>

                                    <td class="project-actions">
                                        <a href="" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> 编辑 </a>
                                        <a href="javascript:;" class="btn btn-white btn-sm" onclick="del(this)"><i class="fa fa-pencil"></i> 删除 </a>
                                        <form method="post" action="" id="forms">
                                            @csrf @method('DELETE')

                                        </form>
                                    </td>
                                </tr>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.message')
        {{--内容添加结束--}}
    </div>
@endsection

@push('js')
    <script>
       function del(obj) {

           swal("确定删除吗?", {
               buttons: {
                   cancel: "取消",
                   catch: {
                       text: "确定",
                       value: "catch",
                   },
               },
           })
               .then((value) => {
                   switch (value) {
                       case "catch":
                           $('#forms').submit();
                           break;
                       default:
                   }
               });

        }


    </script>
    @endpush
