<div class="form-group">
    <label class="col-sm-2 control-label">商品分类</label>

    <div class="col-sm-10">
        <div class="input-group">


            <div class="input-group-btn">

                <select name="category_id" class="form-control custom-select dropdown-toggle"
                        data-placeholder="Choose a Category" tabindex="1">
                    @foreach($categorys as $category)
                    <option value="{{$category['id']}}">{!! $category['_name'] !!}</option>
                    @endforeach

                </select>

            </div>


        </div>
    </div>
</div>
