@extends('admin.templates')

@section('content')
    <main id="main-container">
        <div class="content">
            <div class="row">
                <div class="col-6 col-lg-3">

                    <a class="block block-rounded block-link-shadow text-center" href="{{ url('admin/product/create') }}">
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
                            <div class="fs-2 fw-semibold text-dark">{{ $newProduct }}</div>
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
                            <div class="fs-2 fw-semibold text-dark">{{ $totalProduct }}</div>
                        </div>
                        <div class="block-content py-2 bg-body-light">
                            <p class="fw-medium fs-sm text-muted mb-0">
                                All Product
                            </p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">All Product</h3>
                    <div class="block-options">
                        <div class="dropdown">
                            <button type="button" class="btn-block-option" id="dropdown-ecom-filters"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Filters <i class="fa fa-angle-down ms-1"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-ecom-filters">
                                <a class="dropdown-item d-flex align-items-center justify-content-between"
                                    href="javascript:void(0)">
                                    New
                                    <span class="badge bg-success rounded-pill">260</span>
                                </a>
                                <a class="dropdown-item d-flex align-items-center justify-content-between"
                                    href="javascript:void(0)">
                                    Out of Stock
                                    <span class="badge bg-danger rounded-pill">24</span>
                                </a>
                                <a class="dropdown-item d-flex align-items-center justify-content-between"
                                    href="javascript:void(0)">
                                    All
                                    <span class="badge bg-primary rounded-pill">14503</span>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>


                <div class="block-content">
                    <form action="be_pages_ecom_products.html" method="POST" onsubmit="return false;">
                        <div class="mb-4">
                            <div class="input-group">
                                <input type="text" class="form-control form-control-alt" id="one-ecom-products-search"
                                    name="one-ecom-products-search" placeholder="Search all Product.">
                                <span class="input-group-text bg-body border-0">
                                    <i class="fa fa-search"></i>
                                </span>
                            </div>
                        </div>
                    </form>
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
                                    <th class="d-none d-md-table-cell">Category</th>
                                    <th class="d-none d-md-table-cell">Name</th>
                                    <th class="d-none d-md-table-cell">Images</th>
                                    <th class="d-none d-md-table-cell">Price</th>
                                    <th class="d-none d-md-table-cell">Stock</th>
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
                                            {{ $item->category->name }}
                                        </td>
                                        <td class="d-none d-md-table-cell fs-sm">
                                            {{ $item->name }}
                                        </td>
                                        <td class="d-none d-md-table-cell fs-sm">
                                            <img src="{{ asset('storage/product/'.$item->img) }}" alt="" style="width: 30px">
                                        </td>
                                        <td class="d-none d-md-table-cell fs-sm">
                                            {{ $item->price }}
                                        </td>
                                        <td class="d-none d-md-table-cell fs-sm">
                                            {{ $item->stock }}
                                        </td>

                                        <td class="text-center fs-sm">
                                            <a class="btn btn-sm btn-alt-info js-bs-tooltip-enabled" href="{{ url('admin/product/'.$item->id.'/edit') }}"
                                                aria-label="Edit" data-bs-original-title="Edit" data-bs-toggle="Tooltip">
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
                                                            <form action="{{ url('admin/product/'.$item->id) }}" method="POST">
                                                                @method('delete')
                                                                @csrf
                                                                <div class="block-content fs-sm">
                                                                    <p>Are u sure, product {{ $item->name }} Delete?</p>
                                                       
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
                    <nav aria-label="Photos Search Navigation">
                        <ul class="pagination pagination-sm justify-content-end mt-2">
                            <li class="page-item">
                                <a class="page-link" href="javascript:void(0)" tabindex="-1" aria-label="Previous">
                                    Prev
                                </a>
                            </li>
                            <li class="page-item active">
                                <a class="page-link" href="javascript:void(0)">1</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="javascript:void(0)">2</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="javascript:void(0)">3</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="javascript:void(0)">4</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="javascript:void(0)" aria-label="Next">
                                    Next
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>

        
    </main>
@endsection
