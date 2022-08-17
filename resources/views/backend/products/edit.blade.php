@extends('layouts.admin')
@section('content')

    <div class="card shade mb-4">

        <div class="card-heard py-3 d-flex mx-2">

            <h6 class="m-0 font-weight-bold text-white btn btn-primary">Edit Products </h6>

            <div class="ml-auto">

                <a href="{{route('admin.products.index')}}" class="btn btn-primary">

                    <span class="icon text-white-50"> <i class="fa fa-list"></i> </span>

                    <span class="text">All Products</span>

                </a>
            </div>
        </div>


    </div>

    <div class="card-body">
        <form action="{{route('admin.products.update',$product->id)}}" method="post" enctype="multipart/form-data">

            @csrf
            @method('put')

            <div class="row">


                <div class="col-6">
                    <div class="form-group">
                        <label for="name"> Name </label>
                        <input type="text" name="name" value="{{old('name',$product->name)}}" class="form-control">
                        @error('name')<span class="text-danger">{{$message}}</span>@enderror
                    </div>
                </div>

                <div class="col-6">
                    <label for="category_id"> Category</label>
                    <select name="category_id" class="form-control">

                        <option value=""> ---</option>
                        @foreach($categories as $category)
                            <option
                                value="{{$category->id}}" {{$product->category_id == $category->id ? 'selected' : ''}}>
                                {{$category->name}}</option>
                        @endforeach
                    </select>
                    @error('category_id')<span class="text-danger">{{$message}}</span>@enderror
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label for="quantity"> Quantity </label>
                        <input type="number" name="quantity" value="{{old('quantity',$product->quantity)}}"
                               class="form-control">
                        @error('quantity')<span class="text-danger">{{$message}}</span>@enderror
                    </div>
                </div>


                <div class="col-6">
                    <div class="form-group">
                        <label for="price"> Price </label>
                        <input type="number" name="price" value="{{old('price',$product->price)}}" class="form-control">
                        @error('price')<span class="text-danger">{{$message}}</span>@enderror
                    </div>
                </div>


                <div class="col-4">
                    <label for="status">Status</label>
                    <select name="status" class="form-control">

                        <option value="1" {{$product->satus ==  1  ? 'selected' : ''}} > Active</option>
                        <option value="2" {{$product->status == 2  ?  'selected' : '' }}>In Active</option>

                    </select>
                    @error('status')<span class="text-danger">{{$message}}</span>@enderror
                </div>

                <div class="col-4">
                    <label for="featured">Featured</label>
                    <select name="featured" class="form-control">
                        <option value=""> Select Featured</option>

                        <option value="1" {{old('featured',$product->featured) == 1 ? 'selected' : ''}}> Yes</option>
                        <option value="2" {{old('featured',$product->featured) == 2 ? 'selected' : ''}}>No</option>

                    </select>
                    @error('featured')<span class="text-danger">{{$message}}</span>@enderror
                </div>

                <div class="col-4">
                    <label for="tags">Tags</label>
                    <select name="tags" class="form-control select2" multiple="multiple">
                        <option value=""> Select Tags</option>

                        @foreach($tags as $tag)

                            <option
                                value="{{$tag->id}}" {{in_array($tag->id , $product->tags->pluck('id')->toArray()) ? 'selected' : ''}}> {{$tag->name}}</option>

                        @endforeach

                    </select>
                    @error('tags')<span class="text-danger">{{$message}}</span>@enderror
                </div>


                <div class="col-6">
                    <label for="images">Images</label>
                    <br>
                    <div class="file-loading">
                        <input type="file" name="images[]" id="product_images" class="file-input-overview"
                               multiple="multiple">
                        @error('images')<span class="text-danger">{{$message}}</span>@enderror

                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label for="description"> Description </label>
                        <textarea name="description" class="form-control summernote" rows="12">
                            {!!  old('description',$product->description) !!}
                        </textarea>
                        @error('description')<span class="text-danger">{{$message}}</span>@enderror
                    </div>
                </div>


                <div class=" col-12 form-group pt-4">

                    <button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Update
                        Product
                    </button>

                </div>


            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script>
        //to select 2
        function matchCustom(params, data) {
            // If there are no search terms, return all of the data
            if ($.trim(params.term) === '') {
                return data;
            }

            // Do not display the item if there is no 'text' property
            if (typeof data.text === 'undefined') {
                return null;
            }

            // `params.term` should be the term that is used for searching
            // `data.text` is the text that is displayed for the data object
            if (data.text.indexOf(params.term) > -1) {
                var modifiedData = $.extend({}, data, true);
                modifiedData.text += ' (matched)';

                // You can return modified objects from here
                // This includes matching the `children` how you want in nested data sets
                return modifiedData;
            }

            // Return `null` if the term should not be displayed
            return null;
        }

        $(".select2").select2({
            tags: true,
            closeOnSelect: false,
            minimumResultsForSearch: Infinity,
            matcher: matchCustom
        })
        ;


        // to image
        $(function () {
            $("#product_images").fileinput({

                theme: "fa5",
                maxFileCount: 5,
                allowedFileTypes: ['image'],
                showCancel: true,
                showRemove: false,
                showUpload: false,
                overwriteInitial: false,
                initialPreview: [
                    @if($product->media()->count() > 0)
                        @foreach($product->media as $media)
                        "{{asset('assets/products/' . $media->file_name)}}",
                    @endforeach
                    @endif
                ],
                initialPreviewAsData: true,
                initialPreviewFileType: 'image',
                initialPreviewConfig: [
                        @if($product->media()->count() > 0)
                        @foreach($product->media as $media)
                    {
                        caption: "{{$media->file_name}}",
                        size: "{{$media->file_size}}",
                        width: '120px',
                        url: "{{route('admin.products.delete_image',['image_id' => $media->id , 'product_id' => $product->id, '_token' => @csrf_token()])}}",
                        key: "{{ $media->id}}"

                    },
                    @endforeach
                    @endif
                ]
            });
        });


        //to summernote
        $(".summernote").summernote({
            tabSize: 2,
            height: 200,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color',]],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table',]],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']],

            ]
        });


    </script>
@endpush
