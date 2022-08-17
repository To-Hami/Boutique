<div class="card-body">
    <form action="{{route('admin.categories.index')}}" method="get">

        <div class="row">
            <div class="col-2">
                <div class="form-group">
                    <input type="text" name="keyword" value="{{old('keyword' , request()->input('keyword'))}}"
                           class="form-control" placeholder="Search">
                </div>
            </div>


            <div class="col-2">
                <div class="form-group">
                    <select name="status" class="form-control">
                        <option value="1" {{old('status',request()->input('status') == '1' ? 'selected' :  '')}}>
                            Active
                        </option>
                        <option value="2" {{old('status',request()->input('status') == '2' ? 'selected' :  '')}}> In
                            Active
                        </option>
                    </select>
                </div>
            </div>


            <div class="col-2">
                <div class="form-group">
                    <select name="sort_by" class="form-control">
                        <option value="" disabled> Sort by</option>
                        <option value="id" {{old('sort_by',request()->input('sort_by') == 'id' ? 'selected' :  '')}} >
                            ID
                        </option>
                        <option
                            value="name" {{old('sort_by',request()->input('sort_by') == 'name' ? 'selected' :  '')}} >
                            Name
                        </option>
                        <option
                            value="created_at" {{old('sort_by',request()->input('sort_by') == 'created_at' ? 'selected' :  '')}} >
                            Created At
                        </option>
                    </select>
                </div>
            </div>


            <div class="col-2">
                <div class="form-group">
                    <select name="order_by" class="form-control">
                        <option value="" disabled> Order by</option>
                        <option
                            value="id" {{old('order_by',request()->input('order_by') == 'asc' ? 'selected' :  '')}} >
                            Ascending
                        </option>
                        <option
                            value="name" {{old('order_by',request()->input('order_by') == 'desc' ? 'selected' :  '')}} >
                            Descending
                        </option>
                    </select>
                </div>
            </div>


            <div class="col-2">
                <div class="form-group">
                    <select name="limit_by" class="form-control">
                        <option value="" disabled> Limit by</option>
                        <option value=10 {{old('limit_by',request()->input('limit_by') == '10' ? 'selected' :  '')}} >
                            10
                        </option>
                        <option value=20 {{old('limit_by',request()->input('limit_by') == '20' ? 'selected' :  '')}} >
                            20
                        </option>
                        <option value=50 {{old('limit_by',request()->input('limit_by') == '50' ? 'selected' :  '')}} >
                            50
                        </option>
                        <option value=100 {{old('limit_by',request()->input('limit_by') == '100' ? 'selected' :  '')}} >
                            100
                        </option>
                    </select>
                </div>
            </div>


            <div class="col-2">
                <div class="col-1">
                    <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-primary"> Search</button>
                    </div>
                </div>
            </div>


        </div>
    </form>
</div>
