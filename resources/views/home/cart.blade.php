@extends('home.templates.header')

@section('content')
    <section class="py-3 bg-color-3" data-animated-id="1">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb py-0">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="#"> Pages </a></li>
                    <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
                </ol>
            </nav>
        </div>
    </section>
    <section class="pb-11 pb-lg-15 pt-10" data-animated-id="2">
        <div class="container">
            <h2 class="fs-sm-40 mb-9 text-center">Shopping Cart</h2>
            @if ($cart && $cart->cartItems->count() > 0)
            <form>
                <div class="row">
                    <div class="col-lg-9 mb-9 mb-lg-0 pr-lg-13">
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    @foreach($cart->cartItems as $cartItem)
                                    <td colspan="4" class="border-bottom pl-0 pb-3">
                                       
                                    </td>
                                    <tr>
                                        
                                        <td class="pl-0 py-6 align-middle">
                                            <form action="{{ route('cart.remove', $cartItem->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-link p-0">
                                                    <i class="fal fa-times"></i>
                                                </button>
                                            </form>
                                        </td>
                                        <td class="py-6 pl-0">
                                            <div class="media">
                                                <div class="w-90px mr-4">
                                                    <img src="{{ url('storage/product/'.$cartItem->product->img) }}" alt="{{ $cartItem->product->name }}">
                                                </div>
                                                <div class="media-body">
                                                    <p class="text-muted fs-12 mb-0 text-uppercase letter-spacing-05 lh-1 mb-1 font-weight-500">
                                                        {{ $cartItem->product->category->name }}
                                                    </p>
                                                    <a href="{{ url('detail/'.$cartItem->product->slug) }}" class="font-weight-bold mb-1 d-block">
                                                        {{ $cartItem->product->name }}
                                                    </a>
                                                    {{-- <p class="fs-15 text-primary d-block mb-0">
                                                        {{ $cartItem->product->color }} / {{ $cartItem->product->size }}
                                                    </p> --}}
                                                </div>
                                            </div>
                                        </td>
                                        <td class="pl-0 py-6">
                                            <div class="input-group position-relative w-100px">
                                                <a href="#" class="down position-absolute pos-fixed-left-center pl-2 z-index-2">
                                                    <i class="fa fa-minus"></i>
                                                </a>
                                                
                                                <input id="quantity_{{ $cartItem->id }}" name="number[]" type="number" class="form-control form-control-sm w-100 px-6 fs-16 text-center input-quality bg-transparent h-35px" value="{{ $cartItem->quantity }}" required="">
                                                <a href="#" class="up position-absolute pos-fixed-right-center pr-2 z-index-2">
                                                    <i class="fa fa-plus"></i>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="pl-0 py-6">
                                            <p class="mb-0 ml-12 text-primary">{{ $cartItem->quantity }} x Rp. {{ number_format($cartItem->product->price, 2) }}</p>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <div class="col-lg-3">
                        <div class="card border-0">
                            <div class="card-header border-0 bg-transparent p-0">
                                <h4 class="card-title fs-24 mb-0">Summary</h4>
                            </div>
                            <div class="card-body pt-6 px-0 pb-4">
                                <div class="d-flex align-items-center mb-1">
                                    <span class="text-primary">Subtotal</span>
                                    <span class="d-block ml-auto text-primary">Rp. {{ number_format($cart->cartItems->sum(function($cartItem) { return $cartItem->quantity * $cartItem->product->price; }), 2) }}</span>
                                </div>
                                
                            </div>
                            <div class="card-footer pt-4 px-0 bg-transparent">
                                <div class="d-flex align-items-center font-weight-bold mb-7">
                                    <span class="text-primary">Total</span>
                                    <span class="d-block ml-auto text-primary">Rp. {{ number_format($cart->cartItems->sum(function($cartItem) { return $cartItem->quantity * $cartItem->product->price; }), 2) }}</span>
                                </div>
                                <!-- <input type="text" name="coupon" class="form-control w-100 text-primary mb-3" placeholder="Enter coupon code here"> -->
                                <a href="/checkout" class="btn btn-primary btn-block" value="Check Out">Check Out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            @else
            <div class="text-center">
                <h4 class="text-danger">Your cart is empty.</h4>
                <a href="{{ route('home.index') }}" class="btn btn-primary mt-3">Go Shopping</a>
            </div>
            @endif
        </div>
    </section>
    
    
@endsection



@push('js')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Ambil semua elemen input kuantitas
        var quantityInputs = document.querySelectorAll('[name="number[]"]');
        
        // Iterasi setiap elemen input
        quantityInputs.forEach(function(input) {
            // Tambahkan event listener untuk setiap perubahan nilai input
            input.addEventListener('change', function() {
                var quantity = this.value; // Ambil nilai kuantitas baru
                var productId = this.id.split('_')[1]; // Ambil id produk dari id input
                
                // Kirim permintaan AJAX untuk memperbarui kuantitas di backend
                axios.post('/cart/update', {
                    productId: productId,
                    quantity: quantity
                })
                .then(function(response) {
                    // Perbarui total dan kuantitas di halaman
                    var subtotal = response.data.subtotal;
                    var total = response.data.total;
                    
                    // Update DOM dengan nilai yang baru
                    document.getElementById('subtotal').textContent = '$' + subtotal.toFixed(2);
                    document.getElementById('total').textContent = '$' + total.toFixed(2);
                })
                .catch(function(error) {
                    console.error('Error updating cart:', error);
                });
            });
        });
    });
</script>
    
@endpush

@push('cart')
    
@endpush
