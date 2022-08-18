@extends('layouts.admin')
@section('content')

    <div class="card shade mb-4">

        <div class="card-heard py-3 d-flex mx-2">

            <h6 class="m-0 font-weight-bold text-white btn btn-primary">Update Coupon {{$coupon->code}} </h6>

            <div class="ml-auto">

                <a href="{{route('admin.coupons.index')}}" class="btn btn-primary">

                    <span class="icon text-white-50"> <i class="fa fa-list"></i> </span>

                    <span class="text">All Coupons</span>

                </a>
            </div>
        </div>


    </div>

    <div class="card-body">
        <form action="{{route('admin.coupons.update',$coupon->id)}}" method="post">

            @csrf
            @method('put')

            <div class="row">


                <div class="col-6">
                    <div class="form-group">
                        <label for="code"> Code </label>
                        <input type="text" name="code" id="code" value="{{$coupon->code}}"
                               class="form-control">
                        @error('code')<span class="text-danger">{{$message}}</span>@enderror
                    </div>
                </div>


                <div class="col-6">
                    <div class="form-group">
                        <label for="value"> Value </label>
                        <input type="text" name="value" value="{{$coupon->value}}" class="form-control">
                        @error('value')<span class="text-danger">{{$message}}</span>@enderror
                    </div>
                </div>


                <div class="col-6">
                    <label for="type">Type</label>
                    <select name="type" class="form-control">
                        <option value=""> Select Coupon Type</option>

                        <option value="fixed" {{$coupon->type == 'fixed' ? 'selected' : ''}}> Fixed</option>
                        <option value="percentage" {{$coupon->type == 'percentage'? 'selected' : ''}}>Percentage
                        </option>

                    </select>
                    @error('type')<span class="text-danger">{{$message}}</span>@enderror
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label for="greater_than"> Greater Than </label>
                        <input type="number" name="greater_than" value="{{$coupon->greater_than}}"
                               class="form-control">
                        @error('greater_than')<span class="text-danger">{{$message}}</span>@enderror
                    </div>
                </div>


                <div class="col-6">
                    <div class="form-group">
                        <label for="start_date"> Start Date </label>
                        <input type="text" name="start_date" id="start_date"
                               value="{{$coupon->start_date}}"
                               class="form-control">
                        @error('start_date')<span class="text-danger">{{$message}}</span>@enderror
                    </div>
                </div>


                <div class="col-6">
                    <div class="form-group">
                        <label for="expire_date"> Expired Date </label>
                        <input type="text" name="expire_date" id="expire_date"
                               value="{{$coupon->expire_date}}"
                               class="form-control">
                        @error('expire_date')<span class="text-danger">{{$message}}</span>@enderror
                    </div>
                </div>


                <div class="col-6">
                    <div class="form-group">
                        <label for="use_times"> Use Times </label>
                        <input type="number" name="use_times" value="{{$coupon->use_times}}"
                               class="form-control">
                        @error('use_times')<span class="text-danger">{{$message}}</span>@enderror
                    </div>
                </div>


                <div class="col-6">
                    <label for="status">Status</label>
                    <select name="status" class="form-control">
                        <option value=""> Select Status</option>

                        <option value="1" {{$coupon->status == 1 ? 'selected' : ''}}> Active</option>
                        <option value="2" {{$coupon->status == 2 ? 'selected' : ''}}>In Active</option>

                    </select>
                    @error('status')<span class="text-danger">{{$message}}</span>@enderror
                </div>


                <div class="col-12">
                    <div class="form-group">
                        <label for="description"> Description </label>
                        <textarea name="description" id="description" class="form-control" rows="6">
                            {{$coupon->description}}
                        </textarea>
                        @error('description')<span class="text-danger">{{$message}}</span>@enderror
                    </div>
                </div>


                <div class=" col-12 form-group pt-4">

                    <button type="submit" name="submit" class="btn btn-primary">
                        <i class="fa fa-plus"></i> Update Coupon
                    </button>

                </div>


            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script>

        $(function () {

            $('#code').on('keyup', function () {

                    this.value = this.value.toUpperCase();
                }
            );

            $("#start_date").pickadate({
                format: 'yyyy-mm-dd',
                selectMonths: true,
                selectYears: true,
                clear: 'clear',
                close: 'ok',
                closeOnSelect: true,
            });


            var start_date = $("#start_date").pickadate('picker');
            var expire_date = $("#expire_date").pickadate('picker');


            $("#start_date").on('change', function () {

                selected_ci_date = '';
                selected_ci_date = $("#start_date").val();

                if (selected_ci_date != null) {
                    var cidate = new Date(selected_ci_date);

                    min_codedate = '';
                    min_codedate = new Date();
                    min_codedate.setDate(cidate.getDate() + 1);
                    enddate.set('min', min_codedate)
                }

            });
            $("#expire_date").pickadate({
                format: 'yyyy-mm-dd',
                selectMonths: true,
                selectYears: true,
                min: new Date(),
                clear: 'clear',
                close: 'ok',
                closeOnSelect: true,
            });


        })
        ;

    </script>
@endpush
