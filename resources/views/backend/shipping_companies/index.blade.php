@extends('layouts.admin')
@section('content')

    <div class="card shade mb-4">

        <div class="card-heard py-3 d-flex mx-2">

            <h6 class="m-0 font-weight-bold text-primary">
                <a href="{{route('admin.shipping_companies.index')}}" class="btn btn-primary">
                    <i class="fa fa-list"></i> All Shipping Companies
                </a>
            </h6>

            <div class="ml-auto">

                <a href="{{route('admin.shipping_companies.create')}}" class="btn btn-primary">

                    <span class="icon text-white-50"> <i class="fa fa-plus"></i> </span>

                    <span class="text">Add New Companies</span>

                </a>
            </div>


        </div>
        @include('backend.partials.flash')


    </div>

    @include('backend.shipping_companies.fillter.fillter')

    @if($shippingCompanies->count() > 0)
        <div class="table-responsive mx-3">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Name</th>
                    <th> Code</th>
                    <th>Description</th>
                    <th>Fast</th>
                    <th>Cost</th>
                    <th>Countries Count</th>
                    <th>Status</th>
                    <th >Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($shippingCompanies as $company)

                    <tr>
                        <td>{{$company->name}}</td>
                        <td>{{$company->code}}</td>
                        <td>{{$company->description}}</td>
                        <td>{{$company->fast()}}</td>
                        <td>{{$company->cost}}</td>
                        <td>{{$company->countries_count}}</td>
                        <td>{{$company->status()}}</td>
                        <td>

                            <a class=" btn btn-primary btn-sm"
                               href="{{route('admin.shipping_companies.edit',$company->id)}}">
                                <i class="fa fa-edit"></i> Edit</a>


                            <form action="{{route('admin.shipping_companies.destroy',$company->id)}}"
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
                {!! $shippingCompanies->appends(request()->all)->links() !!}
            </div>


        </div>

    @else
        <h2 class="text-center">Sorry no records found </h2>
    @endif








@endsection

