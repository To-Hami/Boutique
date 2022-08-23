@extends('layouts.admin')
@section('content')

    <div class="card shade mb-4">

        <div class="card-heard py-3 d-flex mx-2">

            <h6 class="m-0 font-weight-bold text-primary">
                <a href="{{route('admin.cities.index')}}" class="btn btn-primary">
                    <i class="fa fa-list"></i> All Cities
                </a>
            </h6>

            <div class="ml-auto">

                <a href="{{route('admin.cities.create')}}" class="btn btn-primary">

                    <span class="icon text-white-50"> <i class="fa fa-plus"></i> </span>

                    <span class="text">Add New City</span>

                </a>
            </div>

        </div>
        @include('backend.partials.flash')


    </div>

    @include('backend.cities.fillter.fillter')

    @if($cities->count() > 0)
        <div class="table-responsive mx-3">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($cities as $city)

                    <tr>
                        <td>{{$city->name}}</td>
                        <td>{{$city->status == 1 ? 'Active' : 'In Active'}}</td>
                        <td>

                            <a class=" btn btn-primary btn-sm"
                               href="{{route('admin.cities.edit',$city->id)}}">
                                <i class="fa fa-edit"></i> Edit</a>


                            <form action="{{route('admin.cities.destroy',$city->id)}}"
                                  method="post" style="display: inline-block">
                                {{csrf_field()}}
                                {{method_field('delete')}}
                                <button type="submit"
                                        class=" btn btn-danger delete btn-sm">
                                    <i class="fa fa-trash"></i> Delete
                                </button>

                            </form>

                        </td>

                    </tr>

                @endforeach

                </tbody>

            </table>

            <div class="text-center">
                {!! $cities->appends(request()->all)->links() !!}
            </div>


        </div>

    @else
        <h2 class="text-center">Sorry no records found </h2>
    @endif

@endsection

