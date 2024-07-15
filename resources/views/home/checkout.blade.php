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
            <p class="mb-6">Have a coupon? <a href="#"
                    class="d-inline-block fs-15 border-bottom lh-12 border-primary enter-coupon">Click
                    here to enter your code</a></p>
            <div class="card bg-color-3 mxw-510 border-0 rounded-0 box-coupon mb-8">
                <div class="card-body pt-6 px-5 pb-7">
                    <p class="card-text text-primary mb-5">If you have a coupon code, please apply it below.</p>
                    <form>
                        <div class="input-group">
                            <input type="email" class="form-control" placeholder="Your Email*">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">apply coupon</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <form>
                <div class="row">
                    <div class="col-lg-6 mb-9 mb-lg-0">
                        <h3 class="fs-24 mb-7">Billing details</h3>
                        <div class="form-group mb-5">
                            <label for="first-name" class="mb-2 text-primary font-weight-500">First name <abbr
                                    class="text-danger text-decoration-none" title="required">*</abbr></label>
                            <input type="text" id="first-name" class="form-control" name="firstName" required="">
                        </div>
                        <div class="form-group mb-5">
                            <label for="last-name" class="mb-2 text-primary font-weight-500">Last name <abbr
                                    class="text-danger text-decoration-none" title="required">*</abbr></label>
                            <input type="text" id="last-name" required="" class="form-control" name="lastName">
                        </div>
                        <div class="form-group mb-5">
                            <label for="company-name" class="mb-2 text-primary font-weight-500">Company
                                name(optional)</label>
                            <input type="text" id="company-name" class="form-control" name="company">
                        </div>
                        <div class="form-group mb-5">
                            <label for="country" class="mb-2 text-primary font-weight-500">Country/Region <abbr
                                    class="text-danger text-decoration-none" title="required">*</abbr></label>
                            <div class="arrows">
                                <select id="country" class="form-control" required="" name="country">
                                    <option>United Kingdom (UK)</option>
                                    <option>United Kingdom (UK)</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group mb-5">
                            <label for="address" class="mb-2 text-primary font-weight-500">Street address <abbr
                                    class="text-danger text-decoration-none" title="required">*</abbr></label>
                            <input type="text" id="address" class="form-control mb-5" name="billing_address_1"
                                required="" placeholder="House number and street name">
                            <input type="text" class="form-control" name="billing_address_2"
                                placeholder="Apartment, suite, unit, etc. (optional)">
                        </div>
                        <div class="form-group mb-5">
                            <label for="city" class="mb-2 text-primary font-weight-500">City / Town <abbr
                                    class="text-danger text-decoration-none" title="required">*</abbr></label>
                            <input type="text" id="city" class="form-control" required="" name="city">
                        </div>
                        <div class="form-group mb-5">
                            <label for="postCode" class="mb-2 text-primary font-weight-500">Post code <abbr
                                    class="text-danger text-decoration-none" title="required">*</abbr></label>
                            <input type="text" id="postCode" class="form-control" name="post_code" required="">
                        </div>
                        <div class="form-group mb-5">
                            <label for="email" class="mb-2 text-primary font-weight-500">Email <abbr
                                    class="text-danger text-decoration-none" title="required">*</abbr></label>
                            <input type="text" id="email" class="form-control" required="" name="email">
                        </div>
                        <div class="form-group mb-9">
                            <label for="phone" class="mb-2 text-primary font-weight-500">Phone <abbr
                                    class="text-danger text-decoration-none" title="required">*</abbr></label>
                            <input type="text" id="phone" class="form-control" name="phone" required="">
                        </div>
                        <h3 class="fs-24 mb-7">Additional information</h3>
                        <div class="form-group mb-5">
                            <label for="note" class="mb-2 text-primary font-weight-500">Order notes(optional)</label>
                            <textarea id="note" class="form-control" name="notes"></textarea>
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
                                <div class="pb-3 mb-3 border-bottom d-flex">
                                    <div class="text-primary">Black Chair × 1</div>
                                    <div class="text-primary ml-auto"> £45.00</div>
                                </div>
                                <div class="pb-3 mb-3 border-bottom d-flex">
                                    <div class="text-primary">Subtotal</div>
                                    <div class="text-primary ml-auto">£45.00</div>
                                </div>
                                <div class="pb-8 mb-3 border-bottom d-flex">
                                    <div class="text-primary">Total</div>
                                    <div class="text-primary font-weight-bolder ml-auto">£45.00</div>
                                </div>
                                <div class="form-check pl-0 border-bottom pb-3 mb-3">
                                    <div class="custom-control custom-radio mb-5">
                                        <input class="custom-control-input" type="radio" name="payment-method"
                                            id="direct-bank" value="option1" checked="">
                                        <label class="custom-control-label text-primary ml-2" for="direct-bank">
                                            Direct Bank Transfer
                                        </label>
                                        <div class="text-gray pl-2 pt-4">Donec sed odio dui. Nulla vitae elit
                                            libero, a
                                            phara
                                            etra augue. Nullam id dolor id nibh ultricies vehicula ut id elit.
                                        </div>
                                    </div>
                                    <div class="custom-control custom-radio mb-5">
                                        <input class="custom-control-input" type="radio" name="payment-method"
                                            id="cheque" value="option1">
                                        <label class="custom-control-label text-primary ml-2" for="cheque">
                                            Cheque Payment
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio mb-5">
                                        <input class="custom-control-input" type="radio" name="payment-method"
                                            id="cash" value="option1">
                                        <label class="custom-control-label text-primary ml-2" for="cash">
                                            Cash On Delivery
                                        </label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" name="payment-method"
                                            id="paypal" value="option1">
                                        <label class="custom-control-label text-primary ml-2" for="paypal">
                                            Paypal
                                        </label>
                                    </div>
                                </div>
                                <p class="mb-8">Your personal data will be used to process your order, support your
                                    experience throughout
                                    this website, and for other purposes described in our <a href="#">privacy
                                        policy</a> .
                                </p>
                                <button class="btn btn-outline-primary btn-block" type="submit">
                                    Place Oder
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
