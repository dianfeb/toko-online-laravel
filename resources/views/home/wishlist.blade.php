@extends('home.templates.header')

@section('title', 'Toko Online Laravel | Wishlist')

@section('content')
    <section class="py-3 bg-color-3" data-animated-id="1">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb py-0">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="#"> Pages </a></li>
                    <li class="breadcrumb-item active" aria-current="page">Wishlist</li>
                </ol>
            </nav>
        </div>
    </section>

    <section class="pb-11 pb-lg-12 pt-10">
        <div class="container mb-30 mt-50">
            <div class="row">
                <div class="col-xl-10 col-lg-12 m-auto">
                    <div class="mb-50">
                        <h1 class="heading-2 ">Your Wishlist</h1>
                        <h6 class="text-body">There are <span class="text-brand">{{ $wishlistItemCount }}</span> products in this list</h6>
                    </div>
                    <div class="table-responsive shopping-summery">
                        @if ($wishlist && $wishlist->items->count() > 0)
                        <table class="table table-wishlist">
                            <thead>
                                <tr class="main-heading">
                                    <th class="custome-checkbox start pl-30">
                                        <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox11" value="">
                                        <label class="form-check-label" for="exampleCheckbox11"></label>
                                    </th>
                                    <th scope="col" colspan="2">Product</th>
                                    <th scope="col">Price</th>
                                 
                                    <th scope="col">Action</th>
                                    <th scope="col" class="end">Remove</th>
                                </tr>
                            </thead>
                            <tbody>

                               
                                @foreach ($wishlist->items as $item)
                                <tr class="pt-30">
                                    <td class="custome-checkbox pl-30">
                                        <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox1" value="">
                                        <label class="form-check-label" for="exampleCheckbox1"></label>
                                    </td>
                                    <td class="image product-thumbnail pt-40"><img src="{{ url('storage/product/' . $item->product->img) }}" style="width: 100px;" alt="#"></td>
                                    <td class="product-des product-name">
                                        <h6><a class="product-name mb-10" href="/shop-product-right">{{$item->product->name  }}</a></h6>
                                        
                                    </td>
                                    <td class="price" data-title="Price">
                                        <p class="text-brand">Rp. {{ $item->product->price }}</p>
                                    </td>
                                   
                                    <td class="" data-title="Cart">
                                        <form action="{{ route('cart.add', $item->id) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="quantity" value="1">
                                            <button type="submit"
                                                class="btn-primary">
                                                Add to cart
                                            </button>
                                        </form>
                                    </td>
                                    <td class="" data-title="Remove">
                                        <form action="{{ route('wishlist.remove', $item->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-link">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                        <a href="{{ route('home.index') }}" class="btn btn-primary mt-3">Go Shopping</a>
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
