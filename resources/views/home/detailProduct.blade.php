@extends('home.templates.header')

@section('content')
    <section class="bg-color-3" data-animated-id="1">
        <div class="container">
            <nav aria-label="breadcrumb" class="d-flex align-items-center justify-content-between">
                <ol class="breadcrumb py-3 mr-6">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="#"> Product </a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $products->name }}</li>
                </ol>
                <div class="navigation d-flex align-items-center">
                    <div class="dropdown no-caret product-dropdown">
                        <a class="fs-14 pr-3 py-3 d-block dropdown-toggle" href="#" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false" rel="prev">
                            <i class="far fa-arrow-left"></i>
                        </a>
                        <div class="dropdown-menu w-215px p-2 border-0 dropdown-menu-right rounded-0">
                            <a href="product-page-01.html" class="media align-items-center">
                                <div class="w-60px mr-2">
                                    <img src="images/product-08.jpg" alt="Bow Chair">
                                </div>
                                <div class="media-body">
                                    <p class="font-weight-bold text-primary mb-0 lh-11 mb-1">Bow Chair </p>
                                    <p class="text-primary mb-0 lh-1 fs-14">$1390.00 </p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="dropdown no-caret product-dropdown">
                        <a class="fs-14 py-3 d-block dropdown-toggle" href="#" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false" rel="next">
                            <i class="far fa-arrow-right"></i>
                        </a>
                        <div class="dropdown-menu w-215px p-2 border-0 dropdown-menu-right rounded-0">
                            <a href="product-page-01.html" class="media align-items-center">
                                <div class="w-60px mr-2">
                                    <img src="images/product-10.jpg" alt="Bow Chair">
                                </div>
                                <div class="media-body">
                                    <p class="font-weight-bold text-primary mb-0 lh-11 mb-1">Golden Clock</p>
                                    <p class="text-primary mb-0 lh-1 fs-14">$1390.00 </p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </section>
    <section class="pt-10 pb-lg-15 pb-11" data-animated-id="2">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-md-7 mb-6 mb-md-0 pr-md-6 pr-lg-9">
                    <div class="galleries position-relative">
                        <div class="position-absolute pos-fixed-top-right pr-4 pt-4 z-index-2">
                            <form id="wishlist-form-{{ $products->id }}" action="{{ route('wishlist.add', $products->id) }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            <a href="#" data-toggle="tooltip" data-placement="left"
                            title="Add to favourite"
                            class="add-to-wishlist d-flex align-items-center justify-content-center text-primary bg-white hover-white bg-hover-primary w-45px h-45px rounded-circle mb-2 border"
                            onclick="event.preventDefault(); document.getElementById('wishlist-form-{{ $products->id }}').submit();">
                            <i class="fa fa-heart"></i>
                        </a>
                           
                        </div>
                        <div class="slick-slider slider-for slick-initialized"
                            data-slick-options="{&quot;slidesToShow&quot;: 1, &quot;autoplay&quot;:false,&quot;dots&quot;:false,&quot;arrows&quot;:false,&quot;asNavFor&quot;: &quot;.slider-nav&quot;}">
                            <div class="slick-list draggable" style="height: 623px;">
                                <div class="slick-track"
                                    style="opacity: 1; width: 2612px; transform: translate3d(0px, 0px, 0px);">
                                    <div class="box slick-slide slick-current slick-active" data-slick-index="0"
                                        aria-hidden="false" style="width: 653px;" tabindex="0">
                                        <div class="card p-0 hover-change-image rounded-0 border-0">
                                            <a href="images/product-page-13.jpg"
                                                class="card-img ratio ratio-1-1 bg-img-cover-center" data-gtf-mfp="true"
                                                data-gallery-id="02"
                                                style="background-image:url('{{ asset('storage/product/' .$products->img) }}')" tabindex="0">
                                            </a>
                                        </div>
                                    </div>
                                    {{-- <div class="box slick-slide" data-slick-index="1" aria-hidden="true"
                                        style="width: 653px;" tabindex="-1">
                                        <div class="card p-0 hover-change-image rounded-0 border-0">
                                            <a href="images/product-page-15.jpg"
                                                class="card-img ratio ratio-1-1 bg-img-cover-center" data-gtf-mfp="true"
                                                data-gallery-id="02"
                                                style="background-image:url('images/product-page-15.jpg')" tabindex="-1">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="box slick-slide" data-slick-index="2" aria-hidden="true"
                                        style="width: 653px;" tabindex="-1">
                                        <div class="card p-0 hover-change-image rounded-0 border-0">
                                            <a href="images/product-page-16.jpg"
                                                class="card-img ratio ratio-1-1 bg-img-cover-center" data-gtf-mfp="true"
                                                data-gallery-id="02"
                                                style="background-image:url('images/product-page-16.jpg')" tabindex="-1">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="box slick-slide" data-slick-index="3" aria-hidden="true"
                                        style="width: 653px;" tabindex="-1">
                                        <div class="card p-0 hover-change-image rounded-0 border-0">
                                            <a href="images/product-page-14.jpg"
                                                class="card-img ratio ratio-1-1 bg-img-cover-center" data-gtf-mfp="true"
                                                data-gallery-id="02"
                                                style="background-image:url('images/product-page-14.jpg')" tabindex="-1">
                                            </a>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>



                        </div>
                        <div class="slick-slider slider-nav mt-1 mx-n1 slick-initialized"
                            data-slick-options="{&quot;slidesToShow&quot;: 4, &quot;autoplay&quot;:false,&quot;dots&quot;:false,&quot;arrows&quot;:false,&quot;asNavFor&quot;: &quot;.slider-for&quot;,&quot;focusOnSelect&quot;: true,&quot;responsive&quot;:[{&quot;breakpoint&quot;: 768,&quot;settings&quot;: {&quot;slidesToShow&quot;: 3,&quot;arrows&quot;:false}},{&quot;breakpoint&quot;: 576,&quot;settings&quot;: {&quot;slidesToShow&quot;: 2,&quot;arrows&quot;:false}}]}">
                            <div class="slick-list draggable" style="height: 159px;">
                                <div class="slick-track"
                                    style="opacity: 1; width: 636px; transform: translate3d(0px, 0px, 0px);">
                                    <div class="box px-0 slick-slide slick-current slick-active" data-slick-index="0"
                                        aria-hidden="false" style="width: 159px;" tabindex="0">
                                        <div class="bg-white p-1 h-100 rounded-0">
                                            <img src="images/product-page-13.jpg" alt="Image 1" class="h-100 w-100">
                                        </div>
                                    </div>
                                    <div class="box px-0 slick-slide slick-active" data-slick-index="1"
                                        aria-hidden="false" style="width: 159px;" tabindex="0">
                                        <div class="bg-white p-1 h-100 rounded-0">
                                            <img src="images/product-page-15.jpg" alt="Image 2" class="h-100 w-100">
                                        </div>
                                    </div>
                                    <div class="box px-0 slick-slide slick-active" data-slick-index="2"
                                        aria-hidden="false" style="width: 159px;" tabindex="0">
                                        <div class="bg-white p-1 h-100 rounded-0">
                                            <img src="images/product-page-16.jpg" alt="Image 3" class="h-100 w-100">
                                        </div>
                                    </div>
                                    <div class="box px-0 slick-slide slick-active" data-slick-index="3"
                                        aria-hidden="false" style="width: 159px;" tabindex="0">
                                        <div class="bg-white p-1 h-100 rounded-0">
                                            <img src="images/product-page-14.jpg" alt="Image 4" class="h-100 w-100">
                                        </div>
                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <p class="text-muted fs-12 font-weight-500 letter-spacing-05 text-uppercase mb-3">{{ $products->category->name }}</p>
                    <h2 class="fs-30 fs-lg-40 mb-2">{{ $products->name }}</h2>
                    <p class="fs-20 text-primary mb-4">Rp. {{ number_format($products->price, 0, ',', '.') }}</p>
                    
                    <p class="mb-5">{!! $products->description !!}</p>
                   
                    <form>
                        <div class="row align-items-end no-gutters mx-n2">
                            <div class="col-sm-4 form-group px-2 mb-6">
                                <label class="text-primary fs-16 font-weight-bold mb-3" for="number">Quantity: </label>
                                <div class="input-group position-relative w-100">
                                    <a href="#"
                                        class="down position-absolute pos-fixed-left-center pl-2 z-index-2"><i
                                            class="fa fa-minus"></i></a>
                                    <input name="number" type="number" id="number"
                                        class="form-control w-100 px-6 text-center input-quality bg-transparent"
                                        value="1" required="">
                                    <a href="#"
                                        class="up position-absolute pos-fixed-right-center pr-2 z-index-2"><i
                                            class="fa fa-plus"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="col-sm-8 mb-6 w-100 px-2">
                                <a href="/cart" class="btn btn-primary btn-block ">add to cart
                                </a>
                            </div>
                        </div>


                    </form>
                  
                </div>
            </div>
        </div>
    </section>

    
@endsection
