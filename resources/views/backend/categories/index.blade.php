@extends('layouts.admin')
@section('content')

    <div class="card shade mb-4">

        <div class="card-heard py-3 d-flex mx-2">

            <h6 class="m-0 font-weight-bold text-primary">
                <a href="{{route('admin.categories.index')}}" class="btn btn-primary">
                    <i class="fa fa-list"></i> All Categories
                </a>
            </h6>

            <div class="ml-auto">

                <a href="{{route('admin.categories.create')}}" class="btn btn-primary">

                    <span class="icon text-white-50"> <i class="fa fa-plus"></i> </span>

                    <span class="text">Add New Category</span>

                </a>
            </div>


        </div>
        @include('backend.partials.flash')


    </div>

    @include('backend.categories.fillter.fillter')

    @if($categories->count() > 0)
        <div class="table-responsive mx-3">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Product Count</th>
                    <th>Parent</th>
                    <th>Status</th>
                    <th>Created at</th>
                    <th class="text-center">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)

                    <tr>
                        <td>{{$category->name}}</td>
                        <td>{{$category->products_count}}</td>
                        <td>{{$category->parent->name ?? '---'}}</td>
                        <td>{{$category->status == 1 ? 'Active' : 'In Active'}}</td>
                        <td>{{$category->created_at}}</td>
                        <td>

                            <a class=" btn btn-primary btn-sm"
                               href="{{route('admin.categories.edit',$category->id)}}">
                                <i class="fa fa-edit"></i> Edit</a>


                            <form action="{{route('admin.categories.destroy',$category->id)}}"
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
                {!! $categories->appends(request()->all)->links() !!}
            </div>


        </div>

    @else
        <h2 class="text-center">Sorry no records found </h2>
    @endif








@endsection

