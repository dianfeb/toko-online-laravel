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
                            <a href="#" data-toggle="tooltip" data-placement="left" title=""
                                class="add-to-wishlist d-flex align-items-center justify-content-center text-primary bg-white hover-white bg-hover-primary w-45px h-45px rounded-circle mb-2 border"
                                data-original-title="Add to favourite">
                                <i class="far fa-heart"></i>
                            </a>
                            <a href="#" data-toggle="tooltip" data-placement="left" title=""
                                class="add-to-compare d-flex align-items-center justify-content-center text-primary bg-white hover-white bg-hover-primary w-45px h-45px rounded-circle mb-2 border"
                                data-original-title="Add to compare">
                                <i class="far fa-random"></i>
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
                    <p class="fs-20 text-primary mb-4">{{ $products->price }}</p>
                   
                    <p class="mb-5">Minimal, yet bold - LYNEA Plug Lamp adds an architectural addition without
                        the pain of a professional installation.</p>
                   
                    <form>
                        <div class="form-group shop-swatch mb-6">
                            <label class="mb-3"><span class="text-primary fs-16 font-weight-bold">Color:</span>
                                <span class="var text-capitalize text-primary">black</span></label>
                            <ul class="list-inline d-flex justify-content-start mb-0">
                                <li class="list-inline-item mr-1 selected">
                                    <a href="#" class="d-block swatches-item" data-var="black"
                                        style="background-color: #000000;"> </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="d-block swatches-item" data-var="brown"
                                        style="background-color: #68412d;"></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="d-block swatches-item" data-var="green"
                                        style="background-color: #9ec8bb;"> </a>
                                </li>
                            </ul>
                            <select name="swatches" class="form-select swatches-select d-none"
                                aria-label="Default select example">
                                <option selected="" value="black">Black</option>
                                <option value="brown">Brown</option>
                                <option value="green">Green</option>
                            </select>
                        </div>
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
                                <button type="submit" class="btn btn-primary btn-block ">add to cart
                                </button>
                            </div>
                        </div>


                    </form>
                    <p class="d-flex text-primary justify-content-center">
                        <span class="d-inline-block mr-2 fs-14"><i class="far fa-lock"></i></span>
                        <span class="fs-15">Guarantee Safe and Secure Checkout</span>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="pb-11 pb-lg-13" data-animated-id="4">
        <div class="container">
            <div class="collapse-tabs">
                <ul class="nav nav-pills mb-3 justify-content-center d-md-flex d-none" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active show fs-lg-32 fs-24 font-weight-600 p-0 mr-md-10 mr-4"
                            id="pills-description-tab" data-toggle="pill" href="#pills-description" role="tab"
                            aria-controls="pills-description" aria-selected="false">Description</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-lg-32 fs-24 font-weight-600 p-0 mr-md-10 mr-4" id="pills-infomation-tab"
                            data-toggle="pill" href="#pills-infomation" role="tab" aria-controls="pills-infomation"
                            aria-selected="false">Infomation</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-lg-32 fs-24 font-weight-600 p-0" id="pills-reviews-tab" data-toggle="pill"
                            href="#pills-reviews" role="tab" aria-controls="pills-reviews"
                            aria-selected="true">Reviews (3)</a>
                    </li>
                </ul>
                <div class="tab-content bg-white-md shadow-none py-md-5 p-0">
                    <div id="collapse-tabs-accordion-01">
                        <div class="tab-pane tab-pane-parent fade show active" id="pills-description" role="tabpanel">
                            <div class="card border-0 bg-transparent">
                                <div class="card-header border-0 d-block d-md-none bg-transparent px-0 py-1"
                                    id="headingDetails-01">
                                    <h5 class="mb-0">
                                        <button
                                            class="btn lh-2 fs-18 py-1 px-6 shadow-none w-100 collapse-parent border text-primary"
                                            data-toggle="false" data-target="#description-collapse-01"
                                            aria-expanded="true" aria-controls="description-collapse-01">
                                            Description
                                        </button>
                                    </h5>
                                </div>
                                <div id="description-collapse-01" class="collapsible collapse show"
                                    aria-labelledby="headingDetails-01" data-parent="#collapse-tabs-accordion-01"
                                    style="">
                                    <div id="accordion-style-01"
                                        class="accordion accordion-01 border-md-0 border p-md-0 p-6">
                                        <div class="text-center pt-md-7">
                                            <img src="images/description-product.jpg" alt="Description Product">
                                        </div>
                                        <p class="mt-6 mt-md-10 mxw-830 mx-auto mb-0">Perfect for Equestrian homes or
                                            every horse
                                            lover.
                                            Designer premium signature aluminum alloy all Arthur Court is
                                            compliance with FDA regulations.
                                            Aluminum Serveware can be chilled in the freezer or refrigerator and
                                            warmed in the oven to 350. Wash by hand with mild dish soap and dry
                                            immediately – do not put in the dishwasher.
                                            Comes in Gift Box perfect for Equestrian home or Horse lover in your
                                            life.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane tab-pane-parent fade" id="pills-infomation" role="tabpanel">
                            <div class="card border-0 bg-transparent">
                                <div class="card-header border-0 d-block d-md-none bg-transparent px-0 py-1"
                                    id="headinginfomation-01">
                                    <h5 class="mb-0">
                                        <button
                                            class="btn lh-2 fs-18 py-1 px-6 shadow-none w-100 collapse-parent border collapsed text-primary"
                                            data-toggle="collapse" data-target="#infomation-collapse-01"
                                            aria-expanded="false" aria-controls="infomation-collapse-01">
                                            Infomation
                                        </button>
                                    </h5>
                                </div>
                                <div id="infomation-collapse-01" class="collapsible collapse"
                                    aria-labelledby="headinginfomation-01" data-parent="#collapse-tabs-accordion-01"
                                    style="">
                                    <div id="accordion-style-01-2"
                                        class="accordion accordion-01 border-md-0 border p-md-0 p-6 ">
                                        <div class="mxw-830 mx-auto pt-md-4">
                                            <div class="table-responsive mb-md-7">
                                                <table class="table table-border-top-0 mb-0">
                                                    <tbody>
                                                        <tr>
                                                            <td class="pl-0">Material</td>
                                                            <td class="text-right pr-0">Steel, Wood, Marble</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="pl-0">Dimensions</td>
                                                            <td class="text-right pr-0">55.1"W X 14.6"D X 23.6"H</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="pl-0">Weight</td>
                                                            <td class="text-right pr-0">Weight 23 lbs</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="pl-0">Origin</td>
                                                            <td class="text-right pr-0">Denmark</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="pl-0">Brand</td>
                                                            <td class="text-right pr-0">FLOYD</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-3 col-md-2 mb-6 mb-sm-0">
                                                    <img class="border" src="images/product-page-09.jpg"
                                                        alt="Image Product">
                                                </div>
                                                <div class="col-sm-9 col-md-10">
                                                    Perfect for Equestrian homes or every horse lover. Designer premium
                                                    signature aluminum alloy all Arthur Court is compliance with FDA
                                                    regulations. Aluminum Serveware can be chilled in the freezer or
                                                    refrigerator and warmed in the oven to 350. Wash by hand with mild
                                                    dish
                                                    soap and dry immediately – do not put in the dishwasher. Comes in
                                                    Gift
                                                    Box perfect for Equestrian home or Horse lover in your life.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane tab-pane-parent fade" id="pills-reviews" role="tabpanel">
                            <div class="card border-0 bg-transparent">
                                <div class="card-header border-0 d-block d-md-none bg-transparent px-0 py-1"
                                    id="headingreviews-01">
                                    <h5 class="mb-0">
                                        <button
                                            class="btn lh-2 fs-18 py-1 px-6 shadow-none w-100 collapse-parent border collapsed text-primary"
                                            data-toggle="collapse" data-target="#reviews-collapse-01"
                                            aria-expanded="false" aria-controls="reviews-collapse-01">
                                            Reviews (3)
                                        </button>
                                    </h5>
                                </div>
                                <div id="reviews-collapse-01" class="collapsible collapse"
                                    aria-labelledby="headingreviews-01" data-parent="#collapse-tabs-accordion-01"
                                    style="">
                                    <div id="accordion-style-01-3"
                                        class="accordion accordion-01 border-md-0 border p-md-0 p-6">
                                        <div class="comment-product mxw-830 mx-auto pt-md-4">
                                            <ul class="list-inline mb-3 d-flex justify-content-center rating-result">
                                                <li class="list-inline-item fs-18 text-primary"><i
                                                        class="fas fa-star"></i></li>
                                                <li class="list-inline-item fs-18 text-primary"><i
                                                        class="fas fa-star"></i></li>
                                                <li class="list-inline-item fs-18 text-primary"><i
                                                        class="fas fa-star"></i></li>
                                                <li class="list-inline-item fs-18 text-primary"><i
                                                        class="fas fa-star"></i></li>
                                                <li class="list-inline-item fs-18 text-primary"><i
                                                        class="fas fa-star"></i></li>
                                            </ul>
                                            <p class="text-center mb-9 fs-15 text-primary lh-1"><span
                                                    class="d-inline-block border-right pr-1 mr-1">5.0</span>Base on 3
                                                Reviews</p>
                                            <div class="media border-bottom pb-6 mb-6 ">
                                                <div class="w-70px d-block mr-6">
                                                    <img src="images/tes_01.png" alt="Dean. D">
                                                </div>
                                                <div class="media-body">
                                                    <div class="row no-gutters mb-2 align-items-center rating-result">
                                                        <ul class="list-inline mb-0 mr-auto d-flex col-sm-6">
                                                            <li class="list-inline-item fs-12 text-primary"><i
                                                                    class="fas fa-star"></i></li>
                                                            <li class="list-inline-item fs-12 text-primary"><i
                                                                    class="fas fa-star"></i></li>
                                                            <li class="list-inline-item fs-12 text-primary"><i
                                                                    class="fas fa-star"></i></li>
                                                            <li class="list-inline-item fs-12 text-primary"><i
                                                                    class="fas fa-star"></i></li>
                                                            <li class="list-inline-item fs-12 text-primary"><i
                                                                    class="fas fa-star"></i></li>
                                                        </ul>
                                                        <div class="col-sm-6 text-sm-right"><span
                                                                class="fs-12 text-primary">Nov 20, 2020</span></div>
                                                    </div>
                                                    <p class="text-gray-01 lh-175 mb-2">It has a really nice fit
                                                        however it loses many fluffs and is kind of see-through because
                                                        the fabric is quite wid-meshed. Nevertheless it's a really good
                                                        and comfy staple that goes with every kind.</p>
                                                    <span class="font-weight-600 text-primary d-block">Dean. D</span>
                                                </div>
                                            </div>
                                            <div class="media border-bottom pb-6 mb-6 ">
                                                <div class="w-70px d-block mr-6">
                                                    <img src="images/tes_02.png" alt="Dean. D">
                                                </div>
                                                <div class="media-body">
                                                    <div class="row no-gutters mb-2 align-items-center rating-result">
                                                        <ul class="list-inline mb-0 mr-auto d-flex col-sm-6">
                                                            <li class="list-inline-item fs-12 text-primary"><i
                                                                    class="fas fa-star"></i></li>
                                                            <li class="list-inline-item fs-12 text-primary"><i
                                                                    class="fas fa-star"></i></li>
                                                            <li class="list-inline-item fs-12 text-primary"><i
                                                                    class="fas fa-star"></i></li>
                                                            <li class="list-inline-item fs-12 text-primary"><i
                                                                    class="fas fa-star"></i></li>
                                                            <li class="list-inline-item fs-12 text-primary"><i
                                                                    class="fas fa-star"></i></li>
                                                        </ul>
                                                        <div class="col-sm-6 text-sm-right"><span
                                                                class="fs-12 text-primary">Nov 20, 2020</span></div>
                                                    </div>
                                                    <p class="text-gray-01 lh-175 mb-2">It has a really nice fit
                                                        however it loses many fluffs and is kind of see-through because
                                                        the fabric is quite wid-meshed. Nevertheless it's a really good
                                                        and comfy staple that goes with every kind.</p>
                                                    <span class="font-weight-600 text-primary d-block">Dean. D</span>
                                                </div>
                                            </div>
                                            <div class="media ">
                                                <div class="w-70px d-block mr-6">
                                                    <img src="images/tes_03.png" alt="Dean. D">
                                                </div>
                                                <div class="media-body">
                                                    <div class="row no-gutters mb-2 align-items-center rating-result">
                                                        <ul class="list-inline mb-0 mr-auto d-flex col-sm-6">
                                                            <li class="list-inline-item fs-12 text-primary"><i
                                                                    class="fas fa-star"></i></li>
                                                            <li class="list-inline-item fs-12 text-primary"><i
                                                                    class="fas fa-star"></i></li>
                                                            <li class="list-inline-item fs-12 text-primary"><i
                                                                    class="fas fa-star"></i></li>
                                                            <li class="list-inline-item fs-12 text-primary"><i
                                                                    class="fas fa-star"></i></li>
                                                            <li class="list-inline-item fs-12 text-primary"><i
                                                                    class="fas fa-star"></i></li>
                                                        </ul>
                                                        <div class="col-sm-6 text-sm-right"><span
                                                                class="fs-12 text-primary">Nov 20, 2020</span></div>
                                                    </div>
                                                    <p class="text-gray-01 lh-175 mb-2">It has a really nice fit
                                                        however it loses many fluffs and is kind of see-through because
                                                        the fabric is quite wid-meshed. Nevertheless it's a really good
                                                        and comfy staple that goes with every kind.</p>
                                                    <span class="font-weight-600 text-primary d-block">Dean. D</span>
                                                </div>
                                            </div>
                                            <div class="text-center mt-6 mt-md-9">
                                                <a href="#" class="btn btn-outline-primary write-review">write a
                                                    review</a>
                                            </div>
                                            <div class="card border-0 mt-9 form-review hide ">
                                                <div class="card-body p-0">
                                                    <h3 class="fs-40 text-center mb-9">Write A Review</h3>
                                                    <form>
                                                        <div class="d-flex flex-wrap">
                                                            <p class="text-primary font-weight-bold mb-0 mr-2 mb-2">
                                                                Your
                                                                Rating</p>
                                                            <div class="form-group mb-6 d-flex justify-content-start">
                                                                <div class="rate-input">
                                                                    <input type="radio" id="star5" name="rate"
                                                                        value="5">
                                                                    <label for="star5" title="text"
                                                                        class="mb-0 mr-1 lh-1">
                                                                        <i class="fal fa-star"></i>
                                                                    </label>
                                                                    <input type="radio" id="star4" name="rate"
                                                                        value="4">
                                                                    <label for="star4" title="text"
                                                                        class="mb-0 mr-1 lh-1">
                                                                        <i class="fal fa-star"></i>
                                                                    </label>
                                                                    <input type="radio" id="star3" name="rate"
                                                                        value="3">
                                                                    <label for="star3" title="text"
                                                                        class="mb-0 mr-1 lh-1">
                                                                        <i class="fal fa-star"></i>
                                                                    </label>
                                                                    <input type="radio" id="star2" name="rate"
                                                                        value="2">
                                                                    <label for="star2" title="text"
                                                                        class="mb-0 mr-1 lh-1">
                                                                        <i class="fal fa-star"></i>
                                                                    </label>
                                                                    <input type="radio" id="star1" name="rate"
                                                                        value="1">
                                                                    <label for="star1" title="text"
                                                                        class="mb-0 mr-1 lh-1">
                                                                        <i class="fal fa-star"></i>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="form-group mb-6">
                                                                    <input placeholder="Your Name*" class="form-control"
                                                                        type="text" name="name">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group mb-6">
                                                                    <input type="email" placeholder="Your Email*"
                                                                        name="email" class="form-control">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group mb-8">
                                                            <textarea class="form-control" placeholder="Your Review" name="message" rows="5"></textarea>
                                                        </div>
                                                        <div class="text-center">
                                                            <button type="submit" class="btn btn-primary">submit now
                                                            </button>
                                                        </div>
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
        </div>
    </section>
@endsection
