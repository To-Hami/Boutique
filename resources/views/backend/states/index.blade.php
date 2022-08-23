@extends('layouts.admin')
@section('content')

    <div class="card shade mb-4">

        <div class="card-heard py-3 d-flex mx-2">

            <h6 class="m-0 font-weight-bold text-primary">
                <a href="{{route('admin.states.index')}}" class="btn btn-primary">
                    <i class="fa fa-list"></i> All States
                </a>
            </h6>

            <div class="ml-auto">

                <a href="{{route('admin.states.create')}}" class="btn btn-primary">

                    <span class="icon text-white-50"> <i class="fa fa-plus"></i> </span>

                    <span class="text">Add New States</span>

                </a>
            </div>


        </div>
        @include('backend.partials.flash')


    </div>

    @include('backend.states.fillter.fillter')

    @if($states->count() > 0)
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
                @foreach($states as $state)

                    <tr>
                        <td>{{$state->name}}</td>
                        <td>{{$state->status == 1 ? 'Active' : 'In Active'}}</td>
                        <td>

                            <a class=" btn btn-primary btn-sm"
                               href="{{route('admin.states.edit',$state->id)}}">
                                <i class="fa fa-edit"></i> Edit</a>


                            <form action="{{route('admin.states.destroy',$state->id)}}"
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
                {!! $states->appends(request()->all)->links() !!}
            </div>


        </div>

    @else
        <h2 class="text-center">Sorry no records found </h2>
    @endif








@endsection

