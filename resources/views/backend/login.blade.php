@extends('layouts.admin-auth')
@section('content')

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form class="user" method="POST" action="{{route('login')}}">
                                        @csrf
                                        @method('post')
                                        <div class="form-group">
                                            <input type="text"  name="username" class="form-control form-control-user"
                                                   placeholder="Enter user name ...">
                                            @error('username')<span class="text-danger">{{ $message }}</span>@enderror

                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user"
                                                  placeholder="Password">
                                            @error('Password')<span class="text-danger">{{ $message }}</span>@enderror
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">

                                                <input type="checkbox" class="custom-control-input" id="remember" name="remember" {{old('remember')?'checked':''}}>
                                                <label class="custom-control-label" for="remember ">remember  Me</label>
                                            </div>
                                        </div>
                                        <button type="submit" name="login" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                        <hr>

                                    </form>

                                    <div class="text-center">
                                        <a class="small" href="{{route('forgot')}}">Forgot Password?</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>



@endsection
