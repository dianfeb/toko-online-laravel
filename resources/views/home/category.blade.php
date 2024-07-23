@extends('home.templates.header')

@section('title', 'Toko Online Laravel |'. $category)
@section('content')
<section class="bg-color-3" data-animated-id="1">
    <div class="container">
        <nav aria-label="breadcrumb" class="d-flex align-items-center justify-content-between">
            <ol class="breadcrumb py-3 mr-6">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="#"> Category </a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $category->name }}</li>
            </ol>
           
        </nav>
    </div>
</section>


<section class="py-lg-15 py-11">
    <div class="container container-xxl">
        <div class="d-grid g-1 g-sm-2 g-lg-4 grid-gap overflow-hidden">
            @foreach ($products as $item)
                <div class="grid-item gc-lg-1 gr-lg-1" data-animate="fadeInUp">
                    <div class="card border-0 hover-change-content product product-03">
                        <div style="background-image: url('{{ url('storage/product/' . $item->img) }}')"
                            class="card-img ratio bg-img-cover-center ratio-1-1 ratio-lg-1-1">
                        </div>
                        <div class="card-img-overlay d-flex py-4 py-sm-5 pl-6 pr-4">
                            <div class="d-flex flex-column">
                                <a href="#" class="font-weight-bold mb-1 d-block lh-12">{{ $item->name }}</a>
                                <a href="#"
                                    class="text-uppercase text-muted letter-spacing-05 fs-13 font-weight-500">{{ $item->category->name }}</a>
                                <div class="mt-auto price-wrap">
                                    <p class="mt-auto text-primary mb-0 price font-weight-500">
                                        Rp. {{ $item->price }}</p>
                                    {{-- route cart --}}
                                    <form action="{{ route('cart.add', $item->id) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="quantity" value="1">
                                        <button type="submit"
                                            class="fs-14 font-weight-500 border-bottom border-light-dark border-hover-primary text-uppercase letter-spacing-05 add-to-cart d-inline-block">
                                            Add to cart
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <div class="ml-auto d-flex flex-column">
                                <div class="content-change-vertical">
                                    <form id="wishlist-form-{{ $item->id }}" action="{{ route('wishlist.add', $item->id) }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    <a href="#" data-toggle="tooltip" data-placement="left"
                                    title="Add to favourite"
                                    class="add-to-wishlist d-flex align-items-center justify-content-center text-primary bg-white hover-white bg-hover-primary w-45px h-45px rounded-circle mb-2 border"
                                    onclick="event.preventDefault(); document.getElementById('wishlist-form-{{ $item->id }}').submit();">
                                    <i class="fa fa-heart"></i>
                                </a>
                                

                                    <a href="{{ url('detail/' . $item->slug) }}" data-toggle="tooltip"
                                        data-placement="left" title="Preview"
                                        class="preview d-flex align-items-center justify-content-center text-primary bg-white hover-white bg-hover-primary w-45px h-45px rounded-circle mb-2 border">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection