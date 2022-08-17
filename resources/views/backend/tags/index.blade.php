@extends('layouts.admin')
@section('content')

    <div class="card shade mb-4">

        <div class="card-heard py-3 d-flex mx-2">

            <h6 class="m-0 font-weight-bold text-primary">
                <a href="{{route('admin.tags.index')}}" class="btn btn-primary">
                    <i class="fa fa-list"></i> All Tags
                </a>
            </h6>

            <div class="ml-auto">

                <a href="{{route('admin.tags.create')}}" class="btn btn-primary">

                    <span class="icon text-white-50"> <i class="fa fa-plus"></i> </span>

                    <span class="text">Add New Tag</span>

                </a>
            </div>


        </div>
        @include('backend.partials.flash')


    </div>

    @include('backend.tags.fillter.fillter')

    @if($tags->count() > 0)
        <div class="table-responsive mx-3">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Product Count</th>
                    <th>Status</th>
                    <th>Created at</th>
                    <th class="text-center">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tags as $tag)

                    <tr>
                        <td>{{$tag->name}}</td>
                        <td>{{$tag->products->count()}}</td>
                        <td>{{$tag->status == 1 ? 'Active' : 'In Active'}}</td>
                        <td>{{$tag->created_at}}</td>
                        <td>

                            <a class=" btn btn-primary btn-sm"
                               href="{{route('admin.tags.edit',$tag->id)}}">
                                <i class="fa fa-edit"></i> Edit</a>


                            <form action="{{route('admin.tags.destroy',$tag->id)}}"
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
                {!! $tags->appends(request()->all)->links() !!}
            </div>


        </div>

    @else
        <h2 class="text-center">Sorry no records found </h2>
    @endif








@endsection

