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
                    <h3 class="block-title">Add Data</h3>
                </div>
                <div class="block-content block-content-full">
                    <form action="{{ url('/admin/product/' . $data->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="oldImg" value="{{$data->img}}">
                        <div class="row push">
                            <div class="col-lg-6 col-xl-6">
                                <div class="mb-4">
                                    <label class="form-label" for="example-select">Category</label>
                                    <select class="form-select" id="category_id" name="category_id"
                                        value="{{ old('category_id') }}">
                                        @foreach ($categories as $row)
                                            @if ($row->id == $data->category_id)
                                                <option value="{{ $row->id }}" selected>{{ $row->name }}</option>
                                            @else
                                                <option value="{{ $row->id }}">{{ $row->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                @error('category')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-lg-6">
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
                            </div>

                            <div class="col-4">
                                <div class="mb-4">
                                    
                                    <img src="{{asset('storage/admin/product/'.$data->img)}}" alt="" width="30px"><br>
                                            <small>Gambar Lama </small><br>
                                    <input class="form-control" type="file" id="example-file-input" name="img">
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="mb-4">
                                    <label class="form-label" for="example-text-input">Price</label>
                                    <input type="text" class="form-control @error('price') is-invalid @enderror"
                                        id="price" name="price" value="{{ old('price', $data->price) }}">
                                </div>
                                @error('price')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-lg-4">
                                <div class="mb-4">
                                    <label class="form-label" for="example-text-input">Stock</label>
                                    <input type="text" class="form-control @error('stock') is-invalid @enderror"
                                        id="stock" name="stock" value="{{ old('stock', $data->stock) }}">
                                </div>
                                @error('stock')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <div class="mb-4">
                                    <label class="form-label" for="example-textarea-input-alt">Textarea</label>
                                    <textarea class="form-control form-control-alt" id="description" name="description" rows="7">{{ old('description', $data->description)  }}</textarea>
                                </div>
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
