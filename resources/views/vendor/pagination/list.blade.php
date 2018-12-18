
@if ($paginator->hasPages())
    <div class="layui-box layui-laypage layui-laypage-molv" id="layui-laypage-4">
        {{-- 上一页数据 --}}
        @if ($paginator->onFirstPage())
            <a href="javascript:;" class="layui-laypage-prev layui-disabled" data-page="0">首页</a>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="layui-laypage-prev" data-page="0">上一页</a>

        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="page-item disabled" aria-disabled="true">
                    <span class="page-link">{{ $element }}</span>
                </li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="layui-laypage-curr">
                            <em class="layui-laypage-em" style="background-color:#FF5722;"></em>
                            <em>{{ $page }}</em>
                        </span>
                    @else

                        <a href="{{ $url }}" data-page="{{ $page }}">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- 下一页数据 --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="layui-laypage-next" >下一页</a>
        @else
            <a href="javascript:;" class="layui-laypage-next layui-disabled" >尾页</a>
        @endif

    </div>
@endif
