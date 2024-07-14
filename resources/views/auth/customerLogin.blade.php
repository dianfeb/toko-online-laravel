@extends('home.templates.header')

@section('content')
    <section class="py-3 bg-color-3" data-animated-id="1">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb py-0">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="#"> Pages </a></li>
                    <li class="breadcrumb-item active" aria-current="page">Register</li>
                </ol>
            </nav>
        </div>
    </section>
    <section class="pb-11 pb-lg-15 pt-10" data-animated-id="2">
        <div class="container">
            <h2 class="fs-sm-40 mb-10 text-center">Register </h2>
            <div class="row no-gutters">
                <div class="col-lg-10 mx-auto">
                    <div class="row no-gutters justify-content-center">
                        <div class="col-lg-10 mb-8 mb-lg-0 pr-xl-2">
                            <h3 class="fs-24 mb-6">{{ __('Register') }}</h3>
                             <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="form-group mb-4">
                                    <label for="exampleInputEmail1" class="sr-only">{{ __('Name') }}</label>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group mb-4">
                                    <label for="exampleInputEmail1" class="sr-only">Phone</label>
                                    <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group mb-4">
                                    <label for="exampleInputEmail1" class="sr-only">{{ __('Email Address') }}</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                                <div class="form-group mb-3">
                                    <label for="exampleInputPassword1" class="sr-only">Password</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="exampleInputPassword1" class="sr-only">{{ __('Confirm Password') }}</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            
                                </div>
                                
                                <button type="submit" class="btn btn-primary btn-block mb-3">Submit</button>
                                <div class="custom-control custom-checkbox mb-7">
                                    <input type="checkbox" class="custom-control-input" id="customCheck1" name="remember">
                                    <label class="custom-control-label fs-15" for="customCheck1">Keep me signed in.</label>
                                </div>
                                
                            </form>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
