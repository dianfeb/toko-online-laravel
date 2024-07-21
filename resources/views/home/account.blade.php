@extends('home.templates.header')

@section('title', 'Toko Online Laravel | Account Page')

@section('content')
<section class="py-3 bg-color-3" data-animated-id="1">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb py-0">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                
                <li class="breadcrumb-item active" aria-current="page">My Account</li>
            </ol>
        </nav>
    </div>
</section>

<section class="pb-11 pb-lg-15 pt-10">
    <div class="page-content pt-150 pb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 m-auto">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="dashboard-menu">
                                <ul class="nav flex-column" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="dashboard-tab" data-bs-toggle="tab" href="#dashboard" role="tab" aria-controls="dashboard" aria-selected="false"><i class="fa fa-settings-sliders mr-2"></i>Dashboard</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="orders-tab" data-bs-toggle="tab" href="#orders" role="tab" aria-controls="orders" aria-selected="false"><i class="fa fa-shopping-bag mr-2"></i>Orders</a>
                                    </li>
                                   
                                    <li class="nav-item">
                                        <a class="nav-link" id="address-tab" data-bs-toggle="tab" href="#address" role="tab" aria-controls="address" aria-selected="true"><i class="fa fa-marker mr-2"></i>My Address</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="account-detail-tab" data-bs-toggle="tab" href="#account-detail" role="tab" aria-controls="account-detail" aria-selected="true"><i class="fa fa-user mr-2"></i>Account details</a>
                                    </li>
                                    <li class="nav-item">
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"><i class="fa fa-sign-out mr-2"></i>Logout</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="tab-content account dashboard-content pl-50">
                                <div class="tab-pane fade active show" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="mb-0">Hello {{ auth()->user()->name }}</h3>
                                        </div>
                                        <div class="card-body">
                                            <p>
                                                From your account dashboard. you can easily check &amp; view your <a href="#">recent orders</a>,<br>
                                                manage your <a href="#">shipping and billing addresses</a> and <a href="#">edit your password and account details.</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="mb-0">Your Orders</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>Order</th>
                                                            <th>Date</th>
                                                            <th>Status</th>
                                                            <th>Total</th>
                                                            <th class="text-center">Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($orders as $order)
                                                        <tr>
                                                            <td>#{{ $order->id }}</td>
                                                            <td>{{ $order->created_at->format('F j, Y') }}</td>
                                                            <td>{{ ucfirst($order->status) }}</td>
                                                            <td>Rp. {{ number_format($order->total, 0, ',', '.') }}</td>
                                                            <td class="text-center">
                                                                <button id="pay-now-button" class="btn btn-outline-primary btn-block" type="button">
                                                                    Pay Now
                                                                </button>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                        @if($orders->isEmpty())
                                                        <tr>
                                                            <td colspan="5" class="text-center">No orders found.</td>
                                                        </tr>
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               
                                <div class="tab-pane fade" id="address" role="tabpanel" aria-labelledby="address-tab">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="card mb-3 mb-lg-0">
                                                <div class="card-header">
                                                    <h3 class="mb-0">Billing Address</h3>
                                                </div>
                                                <div class="card-body">
                                                    <address>
                                                        3522 Interstate<br>
                                                        75 Business Spur,<br>
                                                        Sault Ste. <br>Marie, MI 49783
                                                    </address>
                                                    <p>New York</p>
                                                    <a href="#" class="btn-small">Edit</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5 class="mb-0">Shipping Address</h5>
                                                </div>
                                                <div class="card-body">
                                                    <address>
                                                        4299 Express Lane<br>
                                                        Sarasota, <br>FL 34249 USA <br>Phone: 1.941.227.4444
                                                    </address>
                                                    <p>Sarasota</p>
                                                    <a href="#" class="btn-small">Edit</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade " id="account-detail" role="tabpanel" aria-labelledby="account-detail-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Account Details</h5>
                                            @if (session('status'))
                                            <div class="alert alert-success">
                                                {{ session('status') }}
                                            </div>
                                        @endif
                                        </div>
                                        <div class="card-body">
                                           
                                            <form method="POST" action="{{ route('account.update') }}">
                                                @csrf
                                                <div class="form-group mb-4">
                                                    <label for="exampleInputEmail1" class="sr-only">{{ __('Name') }}</label>
                                                    <input  type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $user->name) }}">
                
                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                
                                                <div class="form-group mb-4">
                                                    <label for="exampleInputEmail1" class="sr-only">Phone</label>
                                                    <input  type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone', $user->phone) }}">
                
                                                    @error('phone')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                
                                                <div class="form-group mb-4">
                                                    <label for="exampleInputEmail1" class="sr-only">Email</label>
                                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->email) }}">
                
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                
                                                <div class="form-group mb-3">
                                                    <label for="exampleInputPassword1" class="sr-only">Password</label>
                                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password', $user->password) }}">
                
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                </div>
                
                                                <div class="form-group mb-3">
                                                    <label for="exampleInputPassword1" class="sr-only">{{ __('Confirm Password') }}</label>
                                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" value="{{ old('password', $user->password) }}">
                                            
                                                </div>   
                                                <button type="submit" class="btn btn-primary btn-block mb-3">Update</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


    
@endsection

@push('js')
  <script src="{{ asset('assets/tab/bootstrap.bundle.min.js') }}"></script> 
  <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
<script type="text/javascript">
 document.addEventListener('DOMContentLoaded', function() {
    let buttons = document.querySelectorAll('.pay-now-button');
    buttons.forEach(function(button) {
        button.addEventListener('click', function() {
            let orderId = this.getAttribute('data-order-id');

            fetch('{{ route("checkout") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    order_id: orderId
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.snap_token) {
                    snap.pay(data.snap_token, {
                        onSuccess: function(result) {
                            alert('Payment successful!');
                        },
                        onPending: function(result) {
                            alert('Waiting for payment...');
                        },
                        onError: function(result) {
                            alert('Payment failed: ' + result.message);
                        },
                        onClose: function() {
                            alert('You closed the payment popup without finishing the payment');
                        }
                    });
                } else {
                    alert('Error: ' + data.error);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('There was an error: ' + error.message);
            });
        });
    });
});
</script>
@endpush