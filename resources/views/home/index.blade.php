@extends('home.templates.header')

@section('content')
<section class="overflow-hidden">
    <div class="slick-slider custom-slider-02"
        data-slick-options="{&quot;slidesToShow&quot;: 1,&quot;infinite&quot;:true,&quot;autoplay&quot;:false,&quot;dots&quot;:true,&quot;arrows&quot;:false}">
        <div class="box">
            <div class="d-flex flex-column bg-img-cover-center vh-100 pt-xxl-13 custom-height-sm"
                style="background-image: url('assets/images/bg-home-03.jpg')">
                <div
                    class="d-flex flex-column h-100 align-items-center justify-content-center justify-content-xxl-start pt-xxl-13">
                    <div class="container container-xxl">
                        <h1 class="mb-6 fs-40 fs-xxl-90 lh-1 text-center" data-animate="fadeInUp">Table
                            Extendable</h1>
                        <div class="text-center">
                            <a href="shop-page-02.html"
                                class="btn btn-outline-primary text-uppercase letter-spacing-05"
                                data-animate="fadeInUp">Shop Now</a>
                        </div>
                    </div>
                </div>
                <div class="mt-auto">
                    <div class="container container-xxl">
                        <p class="text-primary mb-8">Designed by <span class="font-weight-600">Nicholas
                                Karlovasitis & Sarah Gibson</span></p>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</section>
<section class="py-lg-15 py-11">
    <h2 class="text-center fs-30 fs-md-40 mb-8">Featured Items</h2>
    <div class="container container-xxl">
        <div class="d-grid g-1 g-sm-2 g-lg-4 grid-gap overflow-hidden">
            @foreach ($products as $item)
            <div class="grid-item gc-lg-1 gr-lg-1" data-animate="fadeInUp">
                <div class="card border-0 hover-change-content product product-03">
                    <div style="background-image: url('{{ url('storage/product/'.$item->img) }}')"
                        class="card-img ratio bg-img-cover-center ratio-1-1 ratio-lg-1-1">
                    </div>
                    <div class="card-img-overlay d-flex py-4 py-sm-5 pl-6 pr-4">
                        <div class="d-flex flex-column">
                            <a href="#" class="font-weight-bold mb-1 d-block lh-12">{{ $item->name }}</a>
                            <a href="#"
                                class="text-uppercase text-muted letter-spacing-05 fs-13 font-weight-500">{{ $item->category->name }}</a>
                            <div class="mt-auto price-wrap">
                                <p class="mt-auto text-primary mb-0 price font-weight-500">
                                    {{ $item->price }}</p>
                                <a href="#"
                                    class="fs-14 font-weight-500 border-bottom border-light-dark border-hover-primary text-uppercase letter-spacing-05 add-to-cart d-inline-block">Add
                                    to
                                    card</a>
                            </div>
                        </div>
                        <div class="ml-auto d-flex flex-column">
                            <div class="content-change-vertical">
                                <a href="#" data-toggle="tooltip" data-placement="left"
                                    title="Add to favourite"
                                    class="add-to-wishlist d-flex align-items-center justify-content-center text-primary bg-white hover-white bg-hover-primary w-45px h-45px rounded-circle mb-2 border">
                                    <i class="fa fa-heart"></i>
                                </a>
                                <a href="#" data-toggle="tooltip" data-placement="left"
                                    title="Add to compare"
                                    class="add-to-compare d-flex align-items-center justify-content-center text-primary bg-white hover-white bg-hover-primary w-45px h-45px rounded-circle mb-2 border">
                                    <i class="fa fa-random"></i>
                                </a>
                                <a href="#" data-toggle="tooltip" data-placement="left"
                                    title="Preview"
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

{{-- <section class="pb-12 pb-lg-15 border-bottom">
    <div class="container">
        <h2 class="fs-30 fs-md-40 mb-11 text-center">Happy Clients</h2>
        <div class="slick-slider custom-arrow-1"
            data-slick-options="{&quot;slidesToShow&quot;: 3,&quot;infinite&quot;:false,&quot;autoplay&quot;:false,&quot;dots&quot;:true,&quot;arrows&quot;:true,&quot;responsive&quot;:[{&quot;breakpoint&quot;: 1200,&quot;settings&quot;: {&quot;slidesToShow&quot;:2,&quot;arrows&quot;:false,&quot;dots&quot;:true}},{&quot;breakpoint&quot;: 576,&quot;settings&quot;: {&quot;slidesToShow&quot;: 1,&quot;arrows&quot;:false,&quot;dots&quot;:true}}]}">
            <div class="box">
                <div class="media">
                    <div class="mxw-84px mr-4">
                        <img src="images/tes_04.jpg" alt="Sampson Totton">
                    </div>
                    <div class="media-body">
                        <ul class="list-inline mb-2">
                            <li class="list-inline-item fs-14 text-primary mr-0"><i class="fas fa-star"></i>
                            </li>
                            <li class="list-inline-item fs-14 text-primary mr-0"><i class="fas fa-star"></i>
                            </li>
                            <li class="list-inline-item fs-14 text-primary mr-0"><i class="fas fa-star"></i>
                            </li>
                            <li class="list-inline-item fs-14 text-primary mr-0"><i class="fas fa-star"></i>
                            </li>
                            <li class="list-inline-item fs-14 text-primary mr-0"><i class="fas fa-star"></i>
                            </li>
                        </ul>
                        <p class="card-text mb-3 font-weight-500">
                            “ Such amazing quality! We also bought the mattress sheet and have nothing bad to
                            say!! “
                        </p>
                        <p class="card-text text-primary font-weight-bold mb-1 fs-15">Sampson Totton</p>
                        <p class="card-text text-muted fs-12 text-uppercase letter-spacing-05 font-weight-500">
                            Golden Clock</p>
                    </div>
                </div>
            </div>
            <div class="box">
                <div class="media">
                    <div class="mxw-84px mr-4">
                        <img src="images/tes_05.jpg" alt="Alfie Wood">
                    </div>
                    <div class="media-body">
                        <ul class="list-inline mb-2">
                            <li class="list-inline-item fs-14 text-primary mr-0"><i class="fas fa-star"></i>
                            </li>
                            <li class="list-inline-item fs-14 text-primary mr-0"><i class="fas fa-star"></i>
                            </li>
                            <li class="list-inline-item fs-14 text-primary mr-0"><i class="fas fa-star"></i>
                            </li>
                            <li class="list-inline-item fs-14 text-primary mr-0"><i class="fas fa-star"></i>
                            </li>
                            <li class="list-inline-item fs-14 text-primary mr-0"><i class="fas fa-star"></i>
                            </li>
                        </ul>
                        <p class="card-text mb-3 font-weight-500">
                            “ Super class, cute, comfortable. You can wear them with just about anything.”
                        </p>
                        <p class="card-text text-primary font-weight-bold mb-1 fs-15">Alfie Wood</p>
                        <p class="card-text text-muted fs-12 text-uppercase letter-spacing-05 font-weight-500">
                            Piper Bar</p>
                    </div>
                </div>
            </div>
            <div class="box">
                <div class="media">
                    <div class="mxw-84px mr-4">
                        <img src="images/tes_06.jpg" alt="Herse Hedman">
                    </div>
                    <div class="media-body">
                        <ul class="list-inline mb-2">
                            <li class="list-inline-item fs-14 text-primary mr-0"><i class="fas fa-star"></i>
                            </li>
                            <li class="list-inline-item fs-14 text-primary mr-0"><i class="fas fa-star"></i>
                            </li>
                            <li class="list-inline-item fs-14 text-primary mr-0"><i class="fas fa-star"></i>
                            </li>
                            <li class="list-inline-item fs-14 text-primary mr-0"><i class="fas fa-star"></i>
                            </li>
                            <li class="list-inline-item fs-14 text-primary mr-0"><i class="fas fa-star"></i>
                            </li>
                        </ul>
                        <p class="card-text mb-3 font-weight-500">
                            “ The separate laptop makes traveling easy. Cannot express how much I love this
                            bag!”
                        </p>
                        <p class="card-text text-primary font-weight-bold mb-1 fs-15">Herse Hedman</p>
                        <p class="card-text text-muted fs-12 text-uppercase letter-spacing-05 font-weight-500">
                            Potato Chair</p>
                    </div>
                </div>
            </div>
            <div class="box">
                <div class="media">
                    <div class="mxw-84px mr-4">
                        <img src="images/tes_04.jpg" alt="Herse Hedman">
                    </div>
                    <div class="media-body">
                        <ul class="list-inline mb-2">
                            <li class="list-inline-item fs-14 text-primary mr-0"><i class="fas fa-star"></i>
                            </li>
                            <li class="list-inline-item fs-14 text-primary mr-0"><i class="fas fa-star"></i>
                            </li>
                            <li class="list-inline-item fs-14 text-primary mr-0"><i class="fas fa-star"></i>
                            </li>
                            <li class="list-inline-item fs-14 text-primary mr-0"><i class="fas fa-star"></i>
                            </li>
                            <li class="list-inline-item fs-14 text-primary mr-0"><i class="fas fa-star"></i>
                            </li>
                        </ul>
                        <p class="card-text mb-3 font-weight-500">
                            “ Such amazing quality! We also bought the mattress sheet and have nothing bad to
                            say!! “
                        </p>
                        <p class="card-text text-primary font-weight-bold mb-1 fs-15">Herse Hedman</p>
                        <p class="card-text text-muted fs-12 text-uppercase letter-spacing-05 font-weight-500">
                            Potato Chair</p>
                    </div>
                </div>
            </div>
            <div class="box">
                <div class="media">
                    <div class="mxw-84px mr-4">
                        <img src="images/tes_05.jpg" alt="Herse Hedman">
                    </div>
                    <div class="media-body">
                        <ul class="list-inline mb-2">
                            <li class="list-inline-item fs-14 text-primary mr-0"><i class="fas fa-star"></i>
                            </li>
                            <li class="list-inline-item fs-14 text-primary mr-0"><i class="fas fa-star"></i>
                            </li>
                            <li class="list-inline-item fs-14 text-primary mr-0"><i class="fas fa-star"></i>
                            </li>
                            <li class="list-inline-item fs-14 text-primary mr-0"><i class="fas fa-star"></i>
                            </li>
                            <li class="list-inline-item fs-14 text-primary mr-0"><i class="fas fa-star"></i>
                            </li>
                        </ul>
                        <p class="card-text mb-3 font-weight-500">
                            “ Super class, cute, comfortable. You can wear them with just about anything.”
                        </p>
                        <p class="card-text text-primary font-weight-bold mb-1 fs-15">Herse Hedman</p>
                        <p class="card-text text-muted fs-12 text-uppercase letter-spacing-05 font-weight-500">
                            Potato Chair</p>
                    </div>
                </div>
            </div>
            <div class="box">
                <div class="media">
                    <div class="mxw-84px mr-4">
                        <img src="images/tes_06.jpg" alt="Herse Hedman">
                    </div>
                    <div class="media-body">
                        <ul class="list-inline mb-2">
                            <li class="list-inline-item fs-14 text-primary mr-0"><i class="fas fa-star"></i>
                            </li>
                            <li class="list-inline-item fs-14 text-primary mr-0"><i class="fas fa-star"></i>
                            </li>
                            <li class="list-inline-item fs-14 text-primary mr-0"><i class="fas fa-star"></i>
                            </li>
                            <li class="list-inline-item fs-14 text-primary mr-0"><i class="fas fa-star"></i>
                            </li>
                            <li class="list-inline-item fs-14 text-primary mr-0"><i class="fas fa-star"></i>
                            </li>
                        </ul>
                        <p class="card-text mb-3 font-weight-500">
                            “ The separate laptop makes traveling easy. Cannot express how much I love this
                            bag!”
                        </p>
                        <p class="card-text text-primary font-weight-bold mb-1 fs-15">Herse Hedman</p>
                        <p class="card-text text-muted fs-12 text-uppercase letter-spacing-05 font-weight-500">
                            Potato Chair</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
 --}}


@endsection
       