@extends('home.templates.header')

@section('content')
<section class="py-3 bg-color-3" data-animated-id="1">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb py-0">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="#"> Pages </a></li>
                <li class="breadcrumb-item active" aria-current="page">Checkout</li>
            </ol>
        </nav>
    </div>
</section>
<section class="pb-11 pb-lg-15 pt-10" data-animated-id="2">
    <div class="container">
        <h2 class="fs-sm-40 mb-9 text-center">Check Out</h2>

        <form id="checkout-form" method="POST" action="{{ route('checkout.complete') }}">
            @csrf
            <div class="row">
                <div class="col-lg-6 mb-9 mb-lg-0">
                    <h3 class="fs-24 mb-7">Billing details</h3>
                    <div class="form-group mb-5">
                        <label for="address" class="mb-2 text-primary font-weight-500">Address <abbr
                                class="text-danger text-decoration-none" title="required">*</abbr></label>
                        <input type="text" id="address" class="form-control" name="address" required="">
                    </div>
                </div>
                <div class="col-lg-6 pl-lg-13">
                    <h3 class="fs-24 mb-7">Your order</h3>
                    <div class="card border-0 rounded-0 bg-color-3">
                        <div class="card-body px-6 py-7">
                            <div class="d-flex pb-3">
                                <div class="text-primary font-weight-bold">Product</div>
                                <div class="text-primary font-weight-bold ml-auto">Total</div>
                            </div>
                            @foreach($cart->cartItems as $cartItem)
                            <div class="pb-3 mb-3 border-bottom d-flex">
                                <div class="text-primary">{{ $cartItem->product->name }} × {{ $cartItem->quantity }}</div>
                                <div class="text-primary ml-auto">Rp. {{ number_format($cartItem->quantity * $cartItem->product->price, 0, ',', '.') }}</div>
                            </div>
                            @endforeach
                            <div class="pb-3 mb-3 border-bottom d-flex">
                                <div class="text-primary">Subtotal</div>
                                <div class="text-primary ml-auto">Rp. {{ number_format($cart->cartItems->sum(function($cartItem) { return $cartItem->quantity * $cartItem->product->price; }), 0, ',', '.') }}</div>
                            </div>
                            <div class="pb-8 mb-3 border-bottom d-flex">
                                <div class="text-primary">Total</div>
                                <div class="text-primary font-weight-bolder ml-auto">Rp. {{ number_format($cart->cartItems->sum(function($cartItem) { return $cartItem->quantity * $cartItem->product->price; }), 0, ',', '.') }}</div>
                            </div>
                            
                            <p class="mb-8">Your personal data will be used to process your order, support your
                                experience throughout
                                this website, and for other purposes described in our <a href="#">privacy
                                    policy</a> .
                            </p>
                            <input type="hidden" name="snap_token" id="snap_token">
                            <button id="pay-button" class="btn btn-outline-primary btn-block" type="button">
                                Place Order
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>

<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('MIDTRANS_CLIENT_KEY') }}"></script>
<script type="text/javascript">
    document.getElementById('pay-button').onclick = function(){
        fetch('{{ route("checkout") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                address: document.getElementById('address').value
            })
        })
        .then(response => response.json())
        .then(data => {
            if(data.snap_token) {
                snap.pay(data.snap_token, {
                    onSuccess: function(result){
                        document.getElementById('snap_token').value = data.snap_token;
                        document.getElementById('checkout-form').submit();
                    },
                    onPending: function(result){
                        document.getElementById('snap_token').value = data.snap_token;
                        document.getElementById('checkout-form').submit();
                    },
                    onError: function(result){
                        alert('Payment failed: ' + result.message);
                    },
                    onClose: function(){
                        alert('You closed the payment popup without finishing the payment');
                    }
                });
            } else {
                alert('Error: ' + data.error);
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    };
</script>
@endsection
