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

                <a href="#" class="btn btn-primary">

                    <span class="icon text-white-50"> <i class="fa fa-eye"></i> </span>

                    <span class="text">Show Review</span>

                </a>
            </div>


        </div>
        @include('backend.partials.flash')


    </div>


    <div class="table-responsive mx-3">
        <table class="table table-hover table-responsive">
            <tbody>
            <tr>
                <th>Name</th>
                <td>{{$review->name }}
            </tr>

            <tr>
                <th>Email</th>
                <td>{{$review->email }}
            </tr>


            <tr>
                <th style="width:20%">Customer Name</th>
                <td>{{ $review->user_id != '' ?  $review->user->username : '---'}}</td>

            </tr>

            <tr>

                <th>Rating</th>
                <td class="badge badge-primary">{{$review->rating}}</td>
            </tr>

            <tr>
                <th>Title</th>
                <td>{{$review->title }}</td>


            </tr>
            <tr>

                <th>Message</th>
                <td> {{$review->message}} </td>

            </tr>

            <tr>
                <th>Status</th>
                <td>{{$review->status()}}</td>

            </tr>

            <tr>

                <th>Created Date</th>
                <td>{{$review->created_at->format('Y-m-d h:i a')}}</td>

            </tr>

            </tbody>

        </table>


    </div>

@endsection
