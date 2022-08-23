@extends('layouts.admin')
@section('content')

    <div class="card shade mb-4">

        <div class="card-heard py-3 d-flex mx-2">

            <h6 class="m-0 font-weight-bold text-primary">
                <a href="{{route('admin.customer_addresses.index')}}" class="btn btn-primary">
                    <i class="fa fa-list"></i> All Customers
                </a>
            </h6>

            <div class="ml-auto">

                <a href="{{route('admin.customer_addresses.create')}}" class="btn btn-primary">

                    <span class="icon text-white-50"> <i class="fa fa-plus"></i> </span>

                    <span class="text">Add New Customer Addresses</span>

                </a>
            </div>


        </div>
        @include('backend.partials.flash')


    </div>
    @include('backend.customer_address.fillter.fillter')

    @if($customer_addresses->count() > 0)
        <div class="table-responsive mx-3">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Customer</th>
                    <th>Title</th>
                    <th style="width: 15%">Shipping Info</th>
                    <th style="width: 15%">Location </th>
                    <th>Address </th>
                    <th>Zip Code </th>
                    <th>PO Box  </th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($customer_addresses as $customer_address)

                    <tr>
                        <td>
                            <a href="{{route('admin.customers.show',$customer_address->user_id)}}">
                                {{$customer_address->user->full_name}}
                            </a>
                        </td>
                        <td>
                            <a href="{{route('admin.customer_addresses.show',$customer_address->id)}}">
                                {{$customer_address->address_title}}
                                <p class="text-gray-400"><b>{{$customer_address->defaultAddress()}}</b></p>
                            </a>

                        </td>
                        <td>{{$customer_address->first_name . ' ' .$customer_address->last_name}}
                            <p class="text-gray-400"><b>{{$customer_address->email . ' ' . $customer_address->mobile}}</b></p>

                        </td>
                        <td>{{$customer_address->country->name . ' ' .$customer_address->state->name . ' ' .$customer_address->city->name }}</td>
                        <td>{{$customer_address->address}}</td>
                        <td>{{$customer_address->zip_code}}</td>
                        <td>{{$customer_address->po_box}}</td>

                        <td>

                            <a class=" btn btn-primary btn-sm"
                               href="{{route('admin.customer_addresses.edit',$customer_address->id)}}">
                                <i class="fa fa-edit"></i> Edit
                            </a>


                            <form action="{{route('admin.customer_addresses.destroy',$customer_address->id)}}"
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
                {!! $customer_addresses->appends(request()->all)->links() !!}
            </div>


        </div>

    @else
        <h2 class="text-center">Sorry no records found </h2>
    @endif








@endsection

