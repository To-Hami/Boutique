@extends('layouts.admin')
@section('content')

    <div class="card shade mb-4">

        <div class="card-heard py-3 d-flex mx-2">

            <h6 class="m-0 font-weight-bold text-white btn btn-primary"> Categories {{$category->name}} </h6>

            <div class="ml-auto">

                <a href="{{route('admin.categories.index')}}" class="btn btn-primary">

                    <span class="icon text-white-50"> <i class="fa fa-list"></i> </span>

                    <span class="text">All Categories</span>

                </a>
            </div>
        </div>


    </div>

    <div class="card-body">
        <form action="{{route('admin.categories.update',$category->id)}}" method="post" enctype="multipart/form-data">

            @csrf
            @method('put')

            <div class="row">


                <div class="col-6">
                    <div class="form-group">
                        <label for="name"> Name </label>
                        <input type="text" name="name" value="{{old('name',$category->name)}}" class="form-control">
                        @error('name')<span class="text-danger">{{$message}}</span>@enderror
                    </div>
                </div>

                <div class="col-6">

                    <label for="parent_id"> Parent</label>
                    <select name="parent_id" class="form-control">

                        <option value=""> ---</option>
                        @foreach($main_categories as $main_category)
                            <option
                                value="{{$main_category->id}}" {{old('parent_id',$category->parent_id) == $main_category->id ? 'selected' : ''}}>
                                {{$main_category->name}}</option>
                        @endforeach
                    </select>
                    @error('parent_id')<span class="text-danger">{{$message}}</span>@enderror
                </div>


                <div class="col-6">
                    <label for="cover">Cover</label>
                    <br>
                    <div class="file-loading">
                        <input type="file" name="cover" id="category_images" class="file-input-overview">
                        <span class="form-text text-muted">Image should be 500 * 500</span>
                        @error('cover')<span class="text-danger">{{$message}}</span>@enderror

                    </div>
                </div>

                <div class="col-3">
                    <label for="status">Status</label>
                    <select name="status" class="form-control">

                        <option value="" disabled> Select Status</option>

                        <option value="1" {{old('status',$category->staus) == 1 ? 'selected' : ''}}> Active</option>
                        <option value="2" {{old('status',$category->staus) == 2 ? 'selected' : ''}}>In Active</option>

                    </select>
                    @error('status')<span class="text-danger">{{$message}}</span>@enderror
                </div>


                <div class=" col-12 form-group pt-4">

                    <button type="submit" name="submit" class="btn btn-primary">
                        <i class="fa fa-plus"></i>
                        Edit Category
                    </button>

                </div>


            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script>

        $(function () {
            $("#category_images").fileinput({

                theme: "fa5",
                maxFileCount: 1,
                allowedFileTypes: ['image'],
                showCancel: true,
                showRemove: false,
                showUpload: false,
                overwriteInitial: false,
                initialPreview: [
                    "{{asset('assets/categories/' . $category->cover)}}"
                ],
                initialPreviewAsData: true,
                initialPreviewFileType: 'image',
                initialPreviewConfig: [{
                    caption: "{{$category->cover}}",
                    size: '1111',
                    width: '120px',
                    url: "{{route('admin.categories.delete_image',['category_id' => $category->id , '_token' => @csrf_token()])}}",
                    key: "{{$category->id}}"

                }]
            });
        });

    </script>
@endpush
