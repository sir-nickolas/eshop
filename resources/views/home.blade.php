@extends('layouts.master')
@section('title', 'Home')
@section('content')
    @if ($message = Session::get('status'))
        <div style="width:fit-content" class="alert-success text-center container">
            <strong>{{ $message }}</strong>
        </div>
    @endif
    <div class="row justify-content-center pad">
        <div class="col-md-8 ftco-animate fadeInUp ftco-animated">
            <form action="#" class="domain-form">
                <div class="form-group d-md-flex">
                    <input name="search" value="{{ $search }}" type="text" class="form-control px-4 form-cntrol"
                        placeholder="Αναζήτηση Προιόντος...">
                    <input type="submit" class="search-domain btn btn-primary px-5 mr-2" value="Αναζήτηση">
                    <a class="reset-domain btn btn-danger px-5" href="{{ url('/') }}">
                        <h6>Reset</h6>
                    </a>
                </div>
            </form>
            <p class="domain-price text-center">
        </div>
    </div>

    <p class="alert-toast"></p>
    <div class="products-shop-container">
        <div class="products-container">
            @foreach ($products as $product)
                <div class="product-single">
                    <div class="product-single-category">
                        <h6>Κατηγορία:</h6>
                        <a href="view-category/{{ $product->cate_id }}">
                            <h4>{{ $product->category->name }}</h4>
                        </a>
                    </div>
                    <img src="{{ asset('images/products/' . $product->image) }}" alt="">
                    <div class="product-single-info product_data">
                        @if ($product->qty > 0)
                            <span>Quantity:</span>{{ $product->qty }}
                        @else
                            <span class="badge badge-danger">
                                Out of Stock
                            </span>
                        @endif
                        <a href="details/{{ $product->id }}">
                            <h5 class="text-center">{{ $product->name }}
                            </h5>
                        </a>
                        <h3>{{ $product->price }}&euro;</h3>
                        <h6><span>Sku:</span>{{ $product->sku }}</h6>
                        @if ($product->qty > 0)
                            <input type="hidden" class="prod_id" value="{{ $product->id }}">
                            <button class="btn btn-primary btn-cart addToCartBtn">Add To Cart</button>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="empty-space"></div>
@endsection
