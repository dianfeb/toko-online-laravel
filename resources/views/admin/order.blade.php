@extends('admin.templates')

@section('content')
    <main id="main-container">
        <div class="content">
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Order</h3>         
                </div>
                    <div class="block-content block-content-full overflow-x-auto">
                        <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                            <thead>
                                <tr>
                                    <th class="text-center">Name</th>
                                    <th>Product</th>
                                    <th class="d-none d-sm-table-cell" >Qty</th>
                                    <th class="d-none d-md-table-cell">Price</th>
                                    <th class="d-none d-md-table-cell">Status</th>
                                    <th class="d-none d-md-table-cell">Recipient</th>
                                    <th class="d-none d-md-table-cell">Phone</th>
                                    <th class="d-none d-md-table-cell">Address</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                @foreach ($order->orderItems as $item)
                                    <tr>
                                       
                                        <td class="d-none d-md-table-cell fs-sm">
                                            {{ $order->user->name }}
                                        </td>
                                        <td class="d-none d-md-table-cell fs-sm">
                                            {{ $item->product->name }}
                                        </td>
                                        <td class="d-none d-md-table-cell fs-sm">
                                            {{ $item->quantity }}
                                        </td>
                                        <td class="d-none d-md-table-cell fs-sm">
                                            Rp. {{ $item->product->price }}
                                        </td>
                                        <td class="d-none d-md-table-cell fs-sm">
                                            @if ($order->status == 'pending')
                                                <span
                                                    class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-warning-light text-warning">Pending</span>
                                            @elseif ($order->status == 'paid')
                                                <span
                                                    class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-success-light text-success">Paid</span>
                                            @else
                                                <span
                                                    class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill bg-danger-light text-danger">Failed</span>
                                            @endif

                                        </td>

                                        <td class="d-none d-md-table-cell fs-sm">
                                            {{ $order->name }}
                                        </td>
                                        <td class="d-none d-md-table-cell fs-sm">
                                            {{ $order->phone }}
                                        </td>

                                        <td class="d-none d-md-table-cell fs-sm">
                                            {{ $order->address }}
                                        </td>





                                    </tr>
                                @endforeach
                            @endforeach

                            </tbody>
                        </table>
                    </div>

                 
            </div>
        </div>


    </main>
@endsection
