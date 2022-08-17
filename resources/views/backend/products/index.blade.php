@extends('layouts.admin')
@section('content')

    <div class="card shade mb-4">

        <div class="card-heard py-3 d-flex mx-2">

            <h6 class="m-0 font-weight-bold text-primary">
                <a href="{{route('admin.products.index')}}" class="btn btn-primary">
                    <i class="fa fa-list"></i> All Products
                </a>
            </h6>

            <div class="ml-auto">

                <a href="{{route('admin.products.create')}}" class="btn btn-primary">

                    <span class="icon text-white-50"> <i class="fa fa-plus"></i> </span>
                    <span class="text">Add New Product</span>

                </a>
            </div>


        </div>
        @include('backend.partials.flash')


    </div>

    @include('backend.products.fillter.fillter')

    @if($products->count() > 0)
        <div class="table-responsive mx-3">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Name</th>
                    <th> Image</th>
                    <th>Featured</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Tags</th>
                    <th>Status</th>
                    <th>Created at</th>
                    <th class="text-center">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)

                    <tr>
                        <td>{{$product->name}}</td>

                        @if($product->media()->first())
                            <td><img src="{{asset('assets/products/'.$product->media()->first()->file_name)}}"
                                     class="img-thumbnail" style="width:100px;height:100px"></td>
                        @else
                            <td><img src="{{asset('assets/products/default.png')}}"
                                     class="img-thumbnail" style="width:100px;height:100px"></td>
                        @endif

                        <td>{{$product->featured == 1 ? 'Yes' : 'No'}}</td>
                        <td>{{$product->quantity}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->tags->pluck('name')->join(', ')}}</td>
                        <td>{{$product->status == 1 ? 'Active' : 'In Active'}}</td>
                        <td>{{$product->created_at}}</td>

                        <td>
                            <a class=" btn btn-primary btn-sm"
                               href="{{route('admin.products.edit',$product->id)}}">
                                <i class="fa fa-edit"></i> Edit</a>


                            <form action="{{route('admin.products.destroy',$product->id)}}"
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
                {!! $products->appends(request()->all)->links() !!}
            </div>

        </div>

    @else
        <h2 class="text-center">Sorry no records found </h2>
    @endif








@endsection

