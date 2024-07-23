@extends('admin.templates')

@section('content')
    <main id="main-container">
        <div class="content">
            <div class="row">
                <div class="col-6 col-lg-3">

                    <a class="block block-rounded block-link-shadow text-center" data-bs-toggle="modal"
                        data-bs-target="#modal-block-large" href="#">
                        <div class="block-content block-content-full">
                            <div class="fs-2 fw-semibold text-success">
                                <i class="fa fa-plus"></i>
                            </div>
                        </div>
                        <div class="block-content py-2 bg-body-light">
                            <p class="fw-medium fs-sm text-success mb-0">
                                Add New
                            </p>
                        </div>
                    </a>
                </div>

            </div>
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Slider</h3>
                </div>

                <div class="block-content">

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
                    <div class="table-responsive">
                        <table class="table table-borderless table-striped table-vcenter">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 100px;">No</th>
                                    <th class="d-none d-md-table-cell">Name</th>
                                    <th class="d-none d-md-table-cell">Images</th>
                                    <th class="text-center">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td class="text-center fs-sm">
                                            <a class="fw-semibold" href="">
                                                <strong>{{ $loop->iteration }}</strong>
                                            </a>
                                        </td>
                                        <td class="d-none d-md-table-cell fs-sm">
                                            {{ $item->name }}
                                        </td>
                                        <td class="d-none d-md-table-cell fs-sm">
                                            <img src="{{ asset('storage/slider/'.$item->img) }}" alt="" style="width: 100px">
                                        </td>

                                        <td class="text-center fs-sm">
                                            <a class="btn btn-sm btn-alt-info js-bs-tooltip-enabled" href=""
                                                aria-label="Edit" data-bs-original-title="Edit" data-bs-toggle="modal"
                                                data-bs-target="#inlineFormUpdate{{ $item->id }}">
                                                <i class="fa fa-fw fa-pencil"></i>
                                            </a>
                                            <a class="btn btn-sm btn-alt-secondary js-bs-tooltip-enabled" href=""
                                                data-bs-toggle="tooltip" aria-label="View" data-bs-original-title="View">
                                                <i class="fa fa-fw fa-eye"></i>
                                            </a>
                                            <a class="btn btn-sm btn-alt-danger js-bs-tooltip-enabled"
                                                href="javascript:void(0)" aria-label="Delete"
                                                data-bs-original-title="Delete" data-bs-toggle="modal"
                                                data-bs-target="#inlineFormDelete{{ $item->id }}">
                                                <i class="fa fa-fw fa-times text-danger"></i>
                                            </a>
                                        </td>

                                    </tr>

                                    {{-- modal update --}}
                                    <div class="modal" id="inlineFormUpdate{{ $item->id }}" tabindex="-1"
                                        aria-labelledby="modal-block-large" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="block block-rounded block-transparent mb-0">
                                                    <div class="block-header block-header-default">
                                                        <h3 class="block-title">Update Data</h3>
                                                        <div class="block-options">
                                                            <button type="button" class="btn-block-option"
                                                                data-bs-dismiss="modal" aria-label="Close">
                                                                <i class="fa fa-fw fa-times"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="block-content fs-sm">
                                                        <div class="row push">
                                                            <form action="{{ url('admin/category/' . $item->id) }}"
                                                                method="POST">
                                                                @method('PUT')
                                                                @csrf
                                                                <div class="col-lg-12 col-xl-12">
                                                                    <div class="mb-4">
                                                                        <label class="form-label"
                                                                            for="example-text-input">Category</label>
                                                                        <input type="text"
                                                                            class="form-control @error('name') is-invalid @enderror"
                                                                            id="name" name="name"
                                                                            placeholder="Please input category"
                                                                            value="{{ old('name', $item->name) }}">
                                                                    </div>
                                                                    @error('name')
                                                                        <div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                    <div
                                                                        class="block-content block-content-full text-end bg-body">
                                                                        <button type="submit"
                                                                            class="btn btn-sm btn-primary"
                                                                            data-bs-dismiss="modal">Update</button>
                                                                    </div>
                                                                </div>

                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- modal delete --}}
                                    <div class="modal" id="inlineFormDelete{{ $item->id }}" tabindex="-1"
                                        aria-labelledby="modal-block-large" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="block block-rounded block-transparent mb-0">
                                                    <div class="block-header block-header-default">
                                                        <h3 class="block-title">Delete Data</h3>
                                                        <div class="block-options">
                                                            <button type="button" class="btn-block-option"
                                                                data-bs-dismiss="modal" aria-label="Close">
                                                                <i class="fa fa-fw fa-times"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="block-content fs-sm">
                                                        <div class="row push">
                                                            <form action="{{ url('admin/category/' . $item->id) }}"
                                                                method="POST">
                                                                @method('delete')
                                                                @csrf
                                                                <div class="block-content fs-sm">
                                                                    <p>Are u sure, category {{ $item->name }} Delete?</p>

                                                                </div>
                                                                <div
                                                                    class="block-content block-content-full text-end bg-body">
                                                                    <button type="submit" class="btn btn-sm btn-primary"
                                                                        data-bs-dismiss="modal">Delete</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
        <div class="modal" id="modal-block-large" tabindex="-1" aria-labelledby="modal-block-large"
            aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="block block-rounded block-transparent mb-0">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Add Data</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-bs-dismiss="modal"
                                    aria-label="Close">
                                    <i class="fa fa-fw fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content fs-sm">
                            <div class="row push">
                                <form action="{{ url('/admin/slider') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-lg-12 col-xl-12">
                                        <div class="mb-4">
                                            <label class="form-label" for="example-text-input">Name</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                id="name" name="name" placeholder="Please input name"
                                                value="{{ old('name') }}">
                                            @error('name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>


                                        <div class="mb-4">
                                            <label class="form-label" for="example-file-input">Images</label>
                                            <input class="form-control" type="file" id="example-file-input"
                                                name="img">
                                            @error('img')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="mb-4">
                                            <label class="form-label" for="example-textarea-input-alt">Textarea</label>
                                            <textarea class="form-control form-control-alt" id="desc" name="desc" rows="7"
                                                placeholder="Textarea content.."></textarea>
                                            @error('desc')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="block-content block-content-full text-end bg-body">
                                            <button type="submit" class="btn btn-sm btn-primary"
                                                data-bs-dismiss="modal">Submit</button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
