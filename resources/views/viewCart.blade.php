@extends('layouts.master')
@section('title', 'Cart')
@section('content')

    <section style="height: auto">
        <div  class="container py-5">
            <div  class="row d-flex justify-content-center align-items-center">
                <div class="col-10">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h3 class="fw-normal mb-0 text-black">Το Καλάθι σας</h3>
                    </div>
                    @php
                        $total = 0;
                    @endphp
                    @foreach ($cartitems as $item)
                        <div class="card rounded-3 mb-4 product_data">
                            <div class="card-body p-4">
                                <div class="row d-flex justify-content-between align-items-center">
                                    <div class="col-md-2 col-lg-2 col-xl-2">
                                        <img src="{{ asset('images/products/' . $item->products->image) }}"
                                            class="img-fluid rounded-3" alt="">
                                    </div>
                                    <div class="col-md-2 col-lg-2 col-xl-2">
                                        <h5 class="mb-0">{{ $item->products->name }}</h5>
                                    </div>
                                    <div class="col-md-2 col-lg-2 col-xl-2">
                                        <h5 class="mb-0">{{ $item->products->price }}&euro;</h5>
                                    </div>

                                    <div class="col-md-2 col-lg-2 col-xl-2 ">
                                        <input type="hidden" class="prod_id" value="{{ $item->prod_id }}">
                                        @if ($item->products->qty >= $item->prod_qty)
                                            <span class="span-cart decrement-btn changeQuantity"><i
                                                    class="fa fa-minus"></i></span>
                                            <input type="text" name="quantity" class="form-control text-center qty-input"
                                                value="{{ $item->prod_qty }}">
                                            <span class="span-cart increment-btn changeQuantity"><i
                                                    class="fa fa-plus"></i></span>
                                            @php
                                                $total += $item->products->price * $item->prod_qty;
                                            @endphp
                                        @else
                                            <h6 class="text-danger">Out of Stock</h6>
                                        @endif
                                    </div>
                                    <button class="btn btn-danger text-white remove-cart-item">
                                        Remove
                                    </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <div class="card">
                        <div class="card-body">
                            @if ($total > 0)
                                <a class="btn btn-primary text-white" href="{{ url('checkout') }}">Checkout</a>
                            @else
                                <div class="card-body">
                                    <h6> Το Καλάθι είναι άδειο</h6>
                                    <a href="/">Πίσω στην αρχική</a>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="card-footer">
                        <h4 class="text-center">Τελικό Ποσό:{{ $total }}&euro;</h4>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <div class="empty-space"></div>
@endsection
