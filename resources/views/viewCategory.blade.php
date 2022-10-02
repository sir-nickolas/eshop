@extends('layouts.master')
@section('title', 'Product Category')
@section('content')

    
    <h3 class="header-custom">Κατηγορία:{{ $category->name }}</h3>

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
                            <span>Ποσότητα:</span>{{ $product->qty }}
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
                        @if ($product->qty > 0)
                            <input type="hidden" class="prod_id" value="{{ $product->id }}">
                            <button class="btn btn-primary btn-cart addToCartBtn">Add To Cart</button>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
