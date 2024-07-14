@extends('admin.templates')

@section('content')
    <main id="main-container">
        <div class="bg-body-light">
            <div class="content content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
                    <div class="flex-grow-1">
                        <h1 class="h3 fw-bold mb-1">
                            Form Edit data
                        </h1>
                        <h2 class="fs-base lh-base fw-medium text-muted mb-0">
                            Carefully designed elements that will ensure a great experience for your users.
                        </h2>
                    </div>
                    <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-alt">
                            <li class="breadcrumb-item">
                                <a class="link-fx" href="javascript:void(0)">Forms</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">
                                Edit data
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Edit Data</h3>
                </div>
                @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (session('success'))
                        <div class="my-3">
                            <div class="alert alert-success">
                                <ul>
                                    {{ session('success') }}
                                </ul>
                            </div>
                        </div>
                    @endif
                <div class="block-content block-content-full">
                    <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                   
                        <div class="row push">
                          
                            <div class="col-lg-12">
                                <div class="mb-4">
                                    <label class="form-label" for="example-text-input">Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="name" name="name" placeholder="Plese input name product" value="{{ old('name', $data->name) }}">
                                </div>

                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                                <div class="mb-4">
                                    <label class="form-label" for="example-text-input">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        id="email" name="email"  value="{{ old('email', $data->email) }}">
                                </div>
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                                <div class="mb-4">
                                    <label class="form-label" for="example-text-input">Password</label>
                                    <input type="password" class="form-control @error('name') is-invalid @enderror"
                                        id="password" name="password" value="{{ old('password', $data->password) }}">
                                </div>
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                                <div class="mb-4">
                                    <label class="form-label" for="example-text-input">Password Confirmation</label>
                                    <input type="password" class="form-control @error('name') is-invalid @enderror"
                                        id="password_confirmation" name="password_confirmation" value="{{ old('password', $data->password) }}">
                                </div>
                                @error('password_confirmation')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                          
                            <div class="mb-4">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </main>
@endsection
