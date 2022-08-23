@extends('layouts.admin')
@section('content')

    <div class="card shade mb-4">

        <div class="card-heard py-3 d-flex mx-2">

            <h6 class="m-0 font-weight-bold text-white btn btn-primary"> State {{$state->name}} </h6>

            <div class="ml-auto">

                <a href="{{route('admin.states.index')}}" class="btn btn-primary">

                    <span class="icon text-white-50"> <i class="fa fa-list"></i> </span>

                    <span class="text">All States</span>

                </a>
            </div>
        </div>


    </div>

    <div class="card-body">
        <form action="{{route('admin.states.update',$state->id)}}" method="post" enctype="multipart/form-data">

            @csrf
            @method('put')

            <div class="row">


                <div class="col-4">
                    <div class="form-group">
                        <label for="name"> Name </label>
                        <input type="text" name="name" value="{{old('name',$state->name)}}" class="form-control">
                        @error('name')<span class="text-danger">{{$message}}</span>@enderror
                    </div>
                </div>

                <div class="col-4">
                    <div class="form-group">
                        <label for="country_id"> Country </label>
                        <select   name="country_id"  class="form-control">

                            <option  value="{{$state->country->id}}"> {{$state->country->name}} </option>

                        </select>
                        @error('country_id')<span class="text-danger">{{$message}}</span>@enderror
                    </div>
                </div>

                <div class="col-4">
                    <label for="status">Status</label>
                    <select name="status" class="form-control">

                        <option value="" disabled> Select Status</option>

                        <option value="1" {{old('status',$state->staus) == 1 ? 'selected' : ''}}> Active</option>
                        <option value="0" {{old('status',$state->staus) == 0 ? 'selected' : ''}}>In Active</option>

                    </select>
                    @error('status')<span class="text-danger">{{$message}}</span>@enderror
                </div>


                <div class=" col-12 form-group pt-4">

                    <button type="submit" name="submit" class="btn btn-primary">
                        <i class="fa fa-plus"></i>
                        Edit State
                    </button>

                </div>


            </div>
        </form>
    </div>
@endsection

