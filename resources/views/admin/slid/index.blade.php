@extends('admin.layouts.index')
@section('content')
    <div class="row content-tabs">
        <button class="roll-nav roll-left J_tabLeft"><i class="fa fa-backward"></i>
        </button>
        <nav class="page-tabs J_menuTabs">
            <div class="page-tabs-content">
                <a href="javascript:;" class="active J_menuTab" data-id="index_v1.html">轮播图管理</a>
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
                        <h5>所有轮播图</h5>
                        <div class="ibox-tools">
                            <a href="{{route('admin.slid.create')}}" class="btn btn-primary btn-sm " style="margin-top: -3px">创建轮播图</a>
                        </div>
                    </div>
                    <div class="ibox-content">


                        <div class="project-list">

                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>轮播图id</th>
                                    <th>轮播图片</th>
                                    <th>创建时间</th>
                                    <th>栏目操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($slids as $slid)
                                    <tr>
                                        <td class="project-status">
                                            <span class="label label-primary">{{$slid['id']}}
                                        </span></td>
                                        <td class="project-title">
                                            <img src="{{$slid['picture']}}" alt="" width="200px" height="70px"></a>
                                            <br>

                                        </td>
                                        <td class="project-completion">
                                            <small>{{$slid['created_at']}}</small>
                                            <div class="progress progress-mini">
                                                <div style="width: 48%;" class="progress-bar"></div>
                                            </div>
                                        </td>

                                        <td class="project-actions">
                                            <a href="{{route('admin.slid.edit',$slid)}}" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> 编辑 </a>
                                            <a href="javascript:;" class="btn btn-white btn-sm" onclick="del(this)"><i class="fa fa-pencil"></i> 删除 </a>
                                            <form method="post" action="{{route('admin.slid.destroy',$slid)}}" id="forms">
                                                @csrf @method('DELETE')

                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

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
