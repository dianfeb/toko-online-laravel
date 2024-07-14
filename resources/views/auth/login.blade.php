@extends('home.templates.header')

@section('content')
    <section class="py-3 bg-color-3" data-animated-id="1">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb py-0">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    
                    <li class="breadcrumb-item active" aria-current="page">My Account</li>
                </ol>
            </nav>
        </div>
    </section>
    <section class="pb-11 pb-lg-15 pt-10" data-animated-id="2">
        <div class="container">
            <h2 class="fs-sm-40 mb-10 text-center">My Account </h2>
            <div class="row no-gutters">
                <div class="col-lg-10 mx-auto">
                    <div class="row no-gutters">
                        <div class="col-lg-6 mb-8 mb-lg-0 pr-xl-2">
                            <h3 class="fs-24 mb-6">{{ __('Login') }}</h3>
                             <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group mb-4">
                                    <label for="exampleInputEmail1" class="sr-only">{{ __('Email Address') }}</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email Address">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="exampleInputPassword1" class="sr-only">Password</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                <a href="{{ route('password.request') }}"
                                    class="d-inline-block fs-15 border-bottom border-2x lh-12 mb-5 border-secondary border-hover-primary">Forgot
                                    your password?</a>
                                <button type="submit" class="btn btn-primary btn-block mb-3">Submit</button>
                               
                            </form>
                        </div>
                        <div class="col-lg-6 pl-lg-6 pl-xl-12">
                            <h3 class="fs-24 mb-3">New Customer</h3>
                            <p class="mb-6">By creating an account with our store, you will be able to move through the
                                checkout process
                                faster, store multiple shipping addresses, view and track your orders in your account and
                                more.</p>
                            <a href="/register" class="btn btn-primary">Register</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
