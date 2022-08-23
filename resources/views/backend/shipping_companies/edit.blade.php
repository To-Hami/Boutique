@extends('layouts.admin')
@section('content')

    <div class="card shade mb-4">

        <div class="card-heard py-3 d-flex mx-2">

            <h6 class="m-0 font-weight-bold text-white btn btn-primary">Create Shipping Company </h6>

            <div class="ml-auto">

                <a href="{{route('admin.shipping_companies.index')}}" class="btn btn-primary">

                    <span class="icon text-white-50"> <i class="fa fa-list"></i> </span>

                    <span class="text">All Shipping Companies</span>

                </a>
            </div>
        </div>


    </div>

    <div class="card-body">
        <form action="{{route('admin.shipping_companies.update',$shippingCompany->id)}}" method="post" enctype="multipart/form-data">

            @csrf
            @method('put')

            <div class="row">


                <div class="col-4">
                    <div class="form-group">
                        <label for="name"> Name </label>
                        <input type="text" name="name" value="{{old('name',$shippingCompany->name)}}" class="form-control">
                        @error('name')<span class="text-danger">{{$message}}</span>@enderror
                    </div>
                </div>

                <div class="col-4">
                    <div class="form-group">
                        <label for="code"> Code </label>
                        <input type="text" name="code" value="{{old('code',$shippingCompany->code)}}" class="form-control">
                        @error('code')<span class="text-danger">{{$message}}</span>@enderror
                    </div>
                </div>

                <div class="col-4">
                    <div class="form-group">
                        <label for="description"> Description </label>
                        <input type="text" name="description" value="{{old('description',$shippingCompany->description)}}" class="form-control">
                        @error('description')<span class="text-danger">{{$message}}</span>@enderror
                    </div>
                </div>

                <div class="col-4">
                    <div class="form-group">
                        <label for="cost"> Cost </label>
                        <input type="text" name="cost" value="{{old('cost',$shippingCompany->cost)}}" class="form-control">
                        @error('cost')<span class="text-danger">{{$message}}</span>@enderror
                    </div>
                </div>


                <div class="col-4">
                    <label for="fast">Fast</label>
                    <select name="fast" class="form-control" id="fast">
                        <option value="1" {{old('fast',$shippingCompany->fast) == 1 ? 'selected' : ''}}> Fast</option>
                        <option value="0" {{old('fast' ,$shippingCompany->fast) == 0? 'selected' : ''}}>Normal</option>
                    </select>
                    @error('fast')<span class="text-danger">{{$message}}</span>@enderror
                </div>

                <div class="col-4">
                    <label for="status">Status</label>
                    <select name="status" class="form-control" id="status">
                        <option value="1" {{old('status',$shippingCompany->status) == 1 ? 'selected' : ''}}> Active</option>
                        <option value="0" {{old('status' , $shippingCompany->status) == 0? 'selected' : ''}}>In Active</option>
                    </select>
                    @error('status')<span class="text-danger">{{$message}}</span>@enderror
                </div>

                <div class="col-4">
                    <label for="countries">Countries</label>
                    <select name="countries[]" class="form-control select2 select-multiple-tags" multiple="multiple"
                            id="countries">

                        @foreach($countries as $country)
                            <option value="{{$country->id}}" {{in_array($country->id , old('countries' , $shippingCompany->countries->pluck('id')->toArray())) ? 'selected' : ''}}>{{$country->name}}</option>
                        @endforeach
                    </select>
                    @error('countries')<span class="text-danger">{{$message}}</span>@enderror
                </div>


                <div class=" col-12 form-group pt-4">

                    <button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-edit"></i> Edit
                        Shipping Company
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


    </script>
@endpush
