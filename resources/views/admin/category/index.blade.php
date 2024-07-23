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
                <div class="col-6 col-lg-3">
                    <a class="block block-rounded block-link-shadow text-center" href="javascript:void(0)">
                        <div class="block-content block-content-full">
                            <div class="fs-2 fw-semibold text-danger">24</div>
                        </div>
                        <div class="block-content py-2 bg-body-light">
                            <p class="fw-medium fs-sm text-danger mb-0">
                                Out of stock
                            </p>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-lg-3">
                    <a class="block block-rounded block-link-shadow text-center" href="be_pages_ecom_dashboard.html">
                        <div class="block-content block-content-full">
                            <div class="fs-2 fw-semibold text-dark">260</div>
                        </div>
                        <div class="block-content py-2 bg-body-light">
                            <p class="fw-medium fs-sm text-muted mb-0">
                                New
                            </p>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-lg-3">
                    <a class="block block-rounded block-link-shadow text-center" href="be_pages_ecom_dashboard.html">
                        <div class="block-content block-content-full">
                            <div class="fs-2 fw-semibold text-dark">14503</div>
                        </div>
                        <div class="block-content py-2 bg-body-light">
                            <p class="fw-medium fs-sm text-muted mb-0">
                                All Categories
                            </p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">All Categories</h3>
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
                    <div class="block-content block-content-full overflow-x-auto">
                        <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th>Name</th>
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
                                <div class="modal" id="inlineFormUpdate{{ $item->id }}" tabindex="-1" aria-labelledby="modal-block-large"
                                    aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="block block-rounded block-transparent mb-0">
                                                <div class="block-header block-header-default">
                                                    <h3 class="block-title">Update Data</h3>
                                                    <div class="block-options">
                                                        <button type="button" class="btn-block-option" data-bs-dismiss="modal"
                                                            aria-label="Close">
                                                            <i class="fa fa-fw fa-times"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="block-content fs-sm">
                                                    <div class="row push">
                                                        <form action="{{ url('admin/category/'.$item->id) }}" method="POST">
                                                            @method('PUT')
                                                            @csrf
                                                            <div class="col-lg-12 col-xl-12">
                                                                <div class="mb-4">
                                                                    <label class="form-label" for="example-text-input">Category</label>
                                                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                                        id="name" name="name" placeholder="Please input category"
                                                                        value="{{ old('name', $item->name) }}">
                                                                </div>
                                                                @error('name')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                                <div class="block-content block-content-full text-end bg-body">
                                                                    <button type="submit" class="btn btn-sm btn-primary"
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
                                <div class="modal" id="inlineFormDelete{{ $item->id }}" tabindex="-1" aria-labelledby="modal-block-large"
                                    aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="block block-rounded block-transparent mb-0">
                                                <div class="block-header block-header-default">
                                                    <h3 class="block-title">Delete Data</h3>
                                                    <div class="block-options">
                                                        <button type="button" class="btn-block-option" data-bs-dismiss="modal"
                                                            aria-label="Close">
                                                            <i class="fa fa-fw fa-times"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="block-content fs-sm">
                                                    <div class="row push">
                                                        <form action="{{ url('admin/category/'.$item->id) }}" method="POST">
                                                            @method('delete')
                                                            @csrf
                                                            <div class="block-content fs-sm">
                                                                <p>Are u sure, category {{ $item->name }} Delete?</p>
                                                   
                                                              </div>
                                                              <div class="block-content block-content-full text-end bg-body">
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
                            <h3 class="block-title">Modal Title</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-bs-dismiss="modal"
                                    aria-label="Close">
                                    <i class="fa fa-fw fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content fs-sm">
                            <div class="row push">
                                <form action="{{ url('/admin/category') }}" method="POST">
                                    @csrf
                                    <div class="col-lg-12 col-xl-12">
                                        <div class="mb-4">
                                            <label class="form-label" for="example-text-input">Category</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                id="name" name="name" placeholder="Please input category"
                                                value="{{ old('name') }}">
                                        </div>
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
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

@push('js')
<script src="{{  asset('admins/assets/js/jquery.min.js')}}"></script>
<script src="{{  asset('admins/assets/js/dataTables.min.js')}}"></script>
<script src="{{  asset('admins/assets/js/dataTables.bootstrap5.min.js')}}"></script>
<script src="{{  asset('admins/assets/js/dataTables.responsive.min.js')}}"></script>
<script src="{{  asset('admins/assets/js/responsive.bootstrap5.min.js')}}"></script>
<script src="{{  asset('admins/assets/js/dataTables.buttons.min.js')}}"></script>
<script src="{{  asset('admins/assets/js/buttons.bootstrap5.min.js')}}"></script>
<script src="{{  asset('admins/assets/js/jszip.min.js')}}"></script>
<script src="{{  asset('admins/assets/js/pdfmake.min.js')}}"></script>
<script src="{{  asset('admins/assets/js/vfs_fonts.js')}}"></script>
<script src="{{  asset('admins/assets/js/buttons.print.min.js')}}"></script>
<script src="{{  asset('admins/assets/js/buttons.html5.min.js')}}"></script>
<script src="{{  asset('admins/assets/js/be_tables_datatables.min.js')}}"></script>
@endpush