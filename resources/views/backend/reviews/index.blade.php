@extends('layouts.admin')
@section('content')

    <div class="card shade mb-4">

        <div class="card-heard py-3 d-flex mx-2">

            <h6 class="m-0 font-weight-bold text-primary">
                <a href="{{route('admin.reviews.index')}}" class="btn btn-primary">
                    <i class="fa fa-list"></i> All Reviews
                </a>
            </h6>

            <div class="ml-auto">


            </div>


        </div>
        @include('backend.partials.flash')


    </div>

    @include('backend.coupons.fillter.fillter')

    @if($reviews->count() > 0)
        <div class="table-responsive mx-3">
            <table class="table table-hover table-responsive">
                <thead>
                <tr>
                    <th>Name</th>
                    <th style="width:20%">Message</th>
                    <th>Rating</th>
                    <th>Product</th>
                    <th> Status</th>
                    <th>Created at</th>
                    <th class="text-center ; width:15%">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($reviews as $review)

                    <tr>
                        <td>{{$review->name }}
                            <br>
                            {{$review->email}}
                            <small> {!! $review->user_id != '' ?  $review->user->name : '---'!!}</small>
                        </td>
                        <td>{{$review->title}}
                        </td>
                        <td class="badge badge-primary">{{$review->rating}}</td>
                        <td>{{$review->product->name}}</td>
                        <td>{{$review->status()}}</td>
                        <td>{{$review->created_at->format('Y-m-d h:i a')}}</td>
                        <td>

                            <a class=" btn btn-primary btn-sm"
                               href="{{route('admin.reviews.show',$review->id)}}">
                                <i class="fa fa-eye"></i> Show
                            </a>


                            <form action="{{route('admin.reviews.destroy',$review->id)}}"
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
                {!! $reviews->appends(request()->all)->links() !!}
            </div>


        </div>

    @else
        <h2 class="text-center">Sorry no records found </h2>
    @endif








@endsection

