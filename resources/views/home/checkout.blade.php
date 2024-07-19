@extends('home.templates.header')

@section('content')
<section class="py-3 bg-color-3" data-animated-id="1">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb py-0">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
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
                    <h3 class="fs-24 mb-7">Billing Details</h3>

                    <!-- Billing Details -->
                    <div class="form-group mb-5">
                        <label for="name" class="mb-2 text-primary font-weight-500">Name <abbr class="text-danger text-decoration-none" title="required">*</abbr></label>
                        <input type="text" id="name" class="form-control" name="name" required>
                    </div>

                    <div class="form-group mb-5">
                        <label for="phone" class="mb-2 text-primary font-weight-500">Phone <abbr class="text-danger text-decoration-none" title="required">*</abbr></label>
                        <input type="text" id="phone" class="form-control" name="phone" required>
                    </div>

                    <div class="form-group mb-5">
                        <label for="province" class="mb-2 text-primary font-weight-500">Province <abbr class="text-danger text-decoration-none" title="required">*</abbr></label>
                        <select id="province" class="form-control" name="province" required>
                            <option value="">Select Province</option>
                        </select>
                    </div>

                    <div class="form-group mb-5">
                        <label for="city" class="mb-2 text-primary font-weight-500">City <abbr class="text-danger text-decoration-none" title="required">*</abbr></label>
                        <select id="city" class="form-control" name="city" required>
                            <option value="">Select City</option>
                        </select>
                    </div>

                    
                    <div class="form-group mb-5">
                        <label for="address" class="mb-2 text-primary font-weight-500">Address <abbr class="text-danger text-decoration-none" title="required">*</abbr></label>
                        <textarea class="form-control form-control-alt" id="address" name="address" rows="7" required></textarea>
                    </div>

                    <!-- Origin and Courier Selection -->
                    <div class="form-group mb-5">
                        <label for="courier" class="mb-2 text-primary font-weight-500">Courier <abbr class="text-danger text-decoration-none" title="required">*</abbr></label>
                        <select id="courier" class="form-control" name="courier" required>
                            <option value="jne">JNE</option>
                            <option value="pos">POS Indonesia</option>
                            <option value="tiki">TIKI</option>
                        </select>
                    </div>

                    <button id="calculate-shipping-cost" class="btn btn-outline-primary btn-block" type="button">
                        Calculate Shipping Cost
                    </button>

                    <div id="shipping-cost" class="mt-3">
                        <!-- Shipping cost will be displayed here -->
                    </div>
                </div>
                <div class="col-lg-6 pl-lg-13">
                    <h3 class="fs-24 mb-7">Your Order</h3>
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

                            <input type="hidden" name="snap_token" id="snap_token">
                            <input type="hidden" name="order_id" id="order_id">
                            <button id="pay-now-button" class="btn btn-outline-primary btn-block" type="button">
                                Pay Now
                            </button>
                            <button id="pay-later-button" class="btn btn-outline-secondary btn-block" type="button">
                                Pay Later
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>

<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
<script type="text/javascript">
    document.getElementById('pay-now-button').onclick = function() {
        fetch('{{ route("checkout") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                name: document.getElementById('name').value,
                phone: document.getElementById('phone').value,
                address: document.getElementById('address').value,
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.snap_token) {
                document.getElementById('snap_token').value = data.snap_token;
                document.getElementById('order_id').value = data.order_id;

                snap.pay(data.snap_token, {
                    onSuccess: function(result) {
                        document.getElementById('checkout-form').submit();
                    },
                    onPending: function(result) {
                        document.getElementById('checkout-form').submit();
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
        });
    };

    document.getElementById('pay-later-button').onclick = function() {
        fetch('{{ route("checkout.payLater") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                name: document.getElementById('name').value,
                phone: document.getElementById('phone').value,
                address: document.getElementById('address').value,
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                window.location.href = '{{ route("account") }}';
            } else {
                alert('Error: ' + data.error);
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    };

    document.addEventListener('DOMContentLoaded', function() {
        // Fetch provinces on page load
        fetch('{{ route("checkout.get_province") }}')
            .then(response => response.json())
            .then(provinces => {
                let provinceSelect = document.getElementById('province');
                provinces.forEach(province => {
                    let option = document.createElement('option');
                    option.value = province.id;
                    option.textContent = province.name;
                    provinceSelect.appendChild(option);
                });
            });

        document.getElementById('province').addEventListener('change', function() {
            let provinceId = this.value;
            fetch(`/cities/${provinceId}`)
                .then(response => response.json())
                .then(cities => {
                    let citySelect = document.getElementById('city');
                    citySelect.innerHTML = '<option value="">Select City</option>';
                    cities.forEach(city => {
                        let option = document.createElement('option');
                        option.value = city.id;
                        option.textContent = city.name;
                        citySelect.appendChild(option);
                    });
                });
        });

        document.getElementById('city').addEventListener('change', function() {
            let cityId = this.value;
            fetch(`/subdistricts/${cityId}`)
                .then(response => response.json())
                .then(subdistricts => {
                    let subdistrictSelect = document.getElementById('subdistrict');
                    subdistrictSelect.innerHTML = '<option value="">Select Subdistrict</option>';
                    subdistricts.forEach(subdistrict => {
                        let option = document.createElement('option');
                        option.value = subdistrict.id;
                        option.textContent = subdistrict.name;
                        subdistrictSelect.appendChild(option);
                    });
                });
        });

        // Calculate shipping cost
        document.getElementById('calculate-shipping-cost').onclick = function() {
            fetch('{{ route("checkout.shippingCost") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    origin: document.getElementById('province').value, // Use province as origin
                    destination: document.getElementById('province').value, // Use province as destination
                    weight: 300, // Assuming a static weight for demonstration
                    courier: document.getElementById('courier').value,
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.cost) {
                    document.getElementById('shipping-cost').innerText = 'Shipping Cost: Rp. ' + data.cost[0].costs[0].cost[0].value;
                } else {
                    alert('Error: ' + data.error);
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        };
    });
</script>
@endsection
