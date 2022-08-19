@extends('layouts.admin')
@section('content')

    <div class="card shade mb-4">

        <div class="card-heard py-3 d-flex mx-2">

            <h6 class="m-0 font-weight-bold text-primary">
                <a href="{{route('admin.customers.index')}}" class="btn btn-primary">
                    <i class="fa fa-list"></i> All Customers
                </a>
            </h6>

            <div class="ml-auto">

                <a href="{{route('admin.customers.create')}}" class="btn btn-primary">

                    <span class="icon text-white-50"> <i class="fa fa-plus"></i> </span>

                    <span class="text">Add New Customer</span>

                </a>
            </div>


        </div>
        @include('backend.partials.flash')


    </div>

    @include('backend.products.fillter.fillter')

    @if($customers->count() > 0)
        <div class="table-responsive mx-3">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Name</th>
                    <th> Image</th>
                    <th>Email & Mobile</th>
                    <th>Status</th>
                    <th>Created at</th>
                    <th class="text-center">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($customers as $customer)

                    <tr>
                        <td>{{$customer->username}}</td>

                        @if($customer->user_image != null)
                            <td>
                                <img src="{{asset('assets/users/'.$customer->user_image)}}"
                                     class="img-thumbnail" style="width:100px;height:100px">
                            </td>
                        @else
                            <td>
                                <img src="{{asset('assets/users/default.png')}}"
                                     class="img-thumbnail" style="width:100px;height:100px">
                            </td>
                        @endif
                        <td>{{$customer->email}}</td>
                        <td>{{$customer->status()}}</td>
                        <td>{{$customer->created_at}}</td>

                        <td>
                            <a class=" btn btn-primary btn-sm"
                               href="{{route('admin.customers.edit',$customer->id)}}">
                                <i class="fa fa-edit"></i> Edit</a>


                            <form action="{{route('admin.customers.destroy',$customer->id)}}"
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
                {!! $customers->appends(request()->all)->links() !!}
            </div>

        </div>

    @else
        <h2 class="text-center">Sorry no records found </h2>
    @endif








@endsection

