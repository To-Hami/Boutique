@extends('layouts.admin')
@section('content')

    <div class="card shade mb-4">

        <div class="card-heard py-3 d-flex mx-2">

            <h6 class="m-0 font-weight-bold text-primary">
                <a href="{{route('admin.coupons.index')}}" class="btn btn-primary">
                    <i class="fa fa-list"></i> All Coupons
                </a>
            </h6>

            <div class="ml-auto">

                <a href="{{route('admin.coupons.create')}}" class="btn btn-primary">

                    <span class="icon text-white-50"> <i class="fa fa-plus"></i> </span>

                    <span class="text">Add New Coupon</span>

                </a>
            </div>


        </div>
        @include('backend.partials.flash')


    </div>

    @include('backend.coupons.fillter.fillter')

    @if($coupons->count() > 0)
        <div class="table-responsive mx-3">
            <table class="table table-hover table-responsive">
                <thead>
                <tr>
                    <th style="width:10%">Code</th>
                    <th>Value</th>
                    <th style="width:15%">Description</th>
                    <th style="width:9%">Use Times</th>
                    <th style="width:13%">Validate Date</th>
                    <th>Grater Than</th>
                    <th>Created at</th>
                    <th>Status</th>
                    <th class="text-center ; width:15%">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($coupons as $coupon)

                    <tr>
                        <td>{{$coupon->code}}</td>
                        <td>{{$coupon->value}} {{$coupon->type == 'fixed' ? '$' : '%'}}</td>
                        <td style="width: 15%;">{{$coupon->description ?? '---'}}</td>
                        <td>{{$coupon->used_times . ' / ' . $coupon->use_times }}</td>
                        <td>{{$coupon->start_date != '' ?  $coupon->start_date->format('Y-m-d') . '/' . $coupon->expire_date  : '-'}}</td>
                        <td>{{$coupon->greater_than ?? '---'}}</td>
                        <td>{{$coupon->created_at->format('Y-m-d h:i a')}}</td>
                        <td>{{$coupon->status()}}</td>
                        <td>

                            <a class=" btn btn-primary btn-sm"
                               href="{{route('admin.coupons.edit',$coupon->id)}}">
                                <i class="fa fa-edit"></i> Edit</a>


                            <form action="{{route('admin.coupons.destroy',$coupon->id)}}"
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
                {!! $coupons->appends(request()->all)->links() !!}
            </div>


        </div>

    @else
        <h2 class="text-center">Sorry no records found </h2>
    @endif








@endsection

