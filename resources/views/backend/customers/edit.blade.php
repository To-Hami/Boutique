@extends('layouts.admin')
@section('content')

    <div class="card shade mb-4">

        <div class="card-heard py-3 d-flex mx-2">

            <h6 class="m-0 font-weight-bold text-white btn btn-primary">Update Customer </h6>

            <div class="ml-auto">

                <a href="{{route('admin.customers.index')}}" class="btn btn-primary">

                    <span class="icon text-white-50"> <i class="fa fa-list"></i> </span>

                    <span class="text">All Customers</span>

                </a>
            </div>
        </div>


    </div>

    <div class="card-body">

        <form action="{{route('admin.customers.update',$customer->id)}}" method="post" enctype="multipart/form-data">

            @csrf
            @method('put')

            <div class="row">

                <div class="col-4">
                    <div class="form-group">
                        <label for="first_name">First Name </label>
                        <input type="text" name="first_name" value="{{old('first_name',$customer->first_name)}}" class="form-control">
                        @error('first_name')<span class="text-danger">{{$message}}</span>@enderror
                    </div>
                </div>

                <div class="col-4">
                    <div class="form-group">
                        <label for="last_name">Last Name </label>
                        <input type="text" name="last_name" value="{{old('last_name',$customer->last_name)}}" class="form-control">
                        @error('last_name')<span class="text-danger">{{$message}}</span>@enderror
                    </div>
                </div>

                <div class="col-4">
                    <div class="form-group">
                        <label for="last_name">Username </label>
                        <input type="text" name="username" value="{{old('username',$customer->username)}}" class="form-control">
                        @error('username')<span class="text-danger">{{$message}}</span>@enderror
                    </div>
                </div>

                <div class="col-4">
                    <div class="form-group">
                        <label for="email"> Email </label>
                        <input type="email" name="email" value="{{old('email',$customer->email)}}" class="form-control">
                        @error('email')<span class="text-danger">{{$message}}</span>@enderror
                    </div>
                </div>

                <div class="col-4">
                    <div class="form-group">
                        <label for="mobile"> Mobile </label>
                        <input type="number" name="mobile" value="{{old('mobile',$customer->mobile)}}" class="form-control">
                        @error('mobile')<span class="text-danger">{{$message}}</span>@enderror
                    </div>
                </div>

                <div class="col-4">
                    <div class="form-group">
                        <label for="password"> Password </label>
                        <input type="password" name="password" value="{{old('password')}}" class="form-control">
                        @error('password')<span class="text-danger">{{$message}}</span>@enderror
                    </div>
                </div>

                <div class="col-6">
                    <label for="customer_image">Customer Image</label>
                    <br>
                    <div class="file-loading">
                        <input type="file" name="user_image" id="user_image" class="file-input-overview"
                        >
                        @error('user_image')<span class="text-danger">{{$message}}</span>@enderror

                    </div>
                </div>

                <div class="col-6">
                    <label for="status">Status</label>
                    <select name="status" class="form-control">
                        <option value=""> Select Status</option>

                        <option value="1" {{$customer->status == 1 ? 'selected' : ''}}> Active</option>
                        <option value="2" {{$customer->status == 0 ? 'selected' : ''}}>In Active</option>

                    </select>
                    @error('status')<span class="text-danger">{{$message}}</span>@enderror
                </div>


                <div class=" col-12 form-group pt-4">

                    <button type="submit"  class="btn btn-primary"><i class="fa fa-plus"></i> Update
                        Customer
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
            $("#user_image").fileinput({

                theme: "fa5",
                maxFileCount: 5,
                allowedFileTypes: ['image'],
                showCancel: true,
                showRemove: false,
                showUpload: false,
                overwriteInitial: false,
                initialPreview: [

                        "{{asset('assets/users/' . $customer->user_image)}}",

                ],
                initialPreviewAsData: true,
                initialPreviewFileType: 'image',
                initialPreviewConfig: [

                    {
                        caption: "{{$customer->user_image}}",
                        width: '120px',
                        url: "{{route('admin.customer.delete_image',[ 'customer_id' => $customer->id, '_token' => @csrf_token()])}}",
                    },

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
