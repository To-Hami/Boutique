@extends('layouts.admin')
@section('content')

    <div class="card shade mb-4">

        <div class="card-heard py-3 d-flex mx-2">

            <h6 class="m-0 font-weight-bold text-white btn btn-primary">Edit Address {{$customerAddress->address_title}} </h6>

            <div class="ml-auto">

                <a href="{{route('admin.customer_addresses.index')}}" class="btn btn-primary">

                    <span class="icon text-white-50"> <i class="fa fa-list"></i> </span>

                    <span class="text">All Address</span>

                </a>
            </div>
        </div>


    </div>

    <div class="card-body">
        <form action="{{route('admin.customer_addresses.update',$customerAddress->id)}}" method="post" enctype="multipart/form-data">

            @csrf
            @method('put')
            <div class="row">

                <div class="col-4 ">
                    <div class="form-group">
                        <label for="user_id">Customer Name</label>
                        <input type="search" class="form-control" name="customer_name" id="customer_name" value="{{$customerAddress->user->full_name}}" >
                        <input type="hidden" class="form-control" name="user_id" id="user_id" value="{{$customerAddress->user_id}}">

                        @error('user_id')<span class="text-danger">{{$message}}</span>@enderror
                    </div>

                </div>

                <div class="col-4">
                    <div class="form-group">
                        <label for="name"> Address Title </label>
                        <input type="text" name="address_title" value="{{old('address_title',$customerAddress->address_title)}}"  class="form-control">
                        @error('address_title')<span class="text-danger">{{$message}}</span>@enderror
                    </div>
                </div>

                <div class="col-4">
                    <label for="default_address">Default Address</label>
                    <select name="default_address" class="form-control">

                        <option value="1" {{old('default_address',$customerAddress->address_title) == 1 ? 'selected' : ''}}> Yes</option>
                        <option value="2" {{old('default_address',$customerAddress->address_title) == 0? 'selected' : ''}}>No</option>

                    </select>
                    @error('default_address')<span class="text-danger">{{$message}}</span>@enderror
                </div>

                <div class="col-3">
                    <label for="first_name"> First Name</label>
                    <input type="text" class="form-control " name="first_name" value="{{$customerAddress->first_name}}">
                    @error('first_name')<span class="text-danger">{{$message}}</span>@enderror
                </div>

                <div class="col-3">
                    <label for="last_name"> Last Name</label>
                    <input type="text" class="form-control " name="last_name"value="{{$customerAddress->last_name}}">
                    @error('last_name')<span class="text-danger">{{$message}}</span>@enderror
                </div>

                <div class="col-3">
                    <label for="email"> Email</label>
                    <input type="email" class="form-control " name="email" value="{{$customerAddress->email}}">
                    @error('email')<span class="text-danger">{{$message}}</span>@enderror
                </div>

                <div class="col-3">
                    <label for="mobile"> Mobile</label>
                    <input type="number" class="form-control " name="mobile"value="{{$customerAddress->mobile}}">
                    @error('mobile')<span class="text-danger">{{$message}}</span>@enderror
                </div>

                <div class="col-4">
                    <label for="country_id">Country</label>
                    <select name="country_id" id="country_id" class="form-control">

                        @foreach($countries as $country)
                            <option value="{{$customerAddress->country_id}}">{{$customerAddress->country->name}}</option>
                        @endforeach
                    </select>
                    @error('country_id')<span class="text-danger">{{$message}}</span>@enderror
                </div>

                <div class="col-4">
                    <label for="state_id">State</label>
                    <select name="state_id" id="state_id" class="form-control"  >

                    </select>
                    @error('state_id')<span class="text-danger">{{$message}}</span>@enderror
                </div>

                <div class="col-4">
                    <label for="city_id">City</label>
                    <select name="city_id" id="city_id" class="form-control">

                    </select>
                    @error('city_id')<span class="text-danger">{{$message}}</span>@enderror
                </div>

                <div class="col-3">
                    <label for="address"> Address </label>
                    <input type="text" class="form-control " name="address" value="{{$customerAddress->address}}">
                    @error('address')<span class="text-danger">{{$message}}</span>@enderror
                </div>

                <div class="col-3">
                    <label for="address2"> Address 2 </label>
                    <input type="text" class="form-control " name="address2" value="{{$customerAddress->address2}}">
                    @error('address2')<span class="text-danger">{{$message}}</span>@enderror
                </div>

                <div class="col-3">
                    <label for="zip_code"> Zip Code </label>
                    <input type="text" class="form-control " name="zip_code" value="{{$customerAddress->zip_code}}">
                    @error('zip_code')<span class="text-danger">{{$message}}</span>@enderror
                </div>

                <div class="col-3">
                    <label for="po_box"> P.O.Box </label>
                    <input type="text" class="form-control " name="po_box" value="{{$customerAddress->po_box}}">
                    @error('po_box')<span class="text-danger">{{$message}}</span>@enderror
                </div>

                <div class=" col-12 form-group pt-4">
                    <button type="submit" name="submit" class="btn btn-primary my-5">
                        <i class="fa fa-edit"></i>
                        Update Address
                    </button>
                </div>


            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script>


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
            }

        });


    </script>
    <script>


        populateStates();
        populateCities();


        $(function () {
            $("#country_id").on('change', function () {
                populateStates();
                populateCities();
                return false;
            })
        });

        $(function () {
            $("#state_id").on('change', function () {
                populateCities();
                return false;
            })
        });

        function populateStates() {

            let countryIdVal = $('#country_id').val() != null ? $('#country_id').val() : '{{old('country_id',$customerAddress->country_id)}}';

            $.get("{{route('admin.states.get_states')}}", {country_id: countryIdVal}, function (data) {
                $('option', $('#state_id')).remove();
                $.each(data, function (val, text) {
                    let selectedVal = text.id == '{{old('state_id',$customerAddress->state_id)}}' ? "selected" : '';
                    $('#state_id').append($('<option' + selectedVal + '></option>').val(text.id).html(text.name));
                });
            }, "json");

        }

        function populateCities() {

            let stateIdVal = $('#state_id').val() != null ? $('#state_id').val() : '{{old('state_id',$customerAddress->state_id)}}';

            $.get("{{route('admin.cities.get_cities')}}", {state_id: stateIdVal}, function (data) {
                $('option', $('#city_id')).remove();
                $.each(data, function (val, text) {
                    let selectedVal = text.id == '{{old('city_id',$customerAddress->city_id)}}' ? "selected" : '';
                    $('#city_id').append($('<option' + selectedVal + '></option>').val(text.id).html(text.name));
                });
            }, "json");

        }


    </script>
@endpush
