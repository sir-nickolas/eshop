@section('title', 'Edit Product')
@extends('layouts.master')
@section('extra')
    <div class="container">
        <h4 class="text-center">Επεξεργασία Προιόντος</h4>
        <div class="card-body">
            <form action="{{ url('update-product/' . $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="category">Κατηγορία</label>
                        <select name="cate_id" class="form-select form-control" aria-label="Default select example">
                            @foreach ($category as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="name">Όνομα Προιόντος</label>
                        <input required value="{{ $product->name }}" class="form-control" name="name" type="text">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="small_description">Περιγραφή Προιόντος</label>
                        <input required value="{{ $product->small_description }}" class="form-control"
                            name="small_description" type="text">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="price">Τιμή</label>
                        <input required value="{{ $product->price }}" class="form-control" name="price" type="text">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="qty">Ποσότητα</label>
                        @if ($product->qty < 0)
                            <input required value="{{ $product->qty = 0 }}" class="form-control" name="qty"
                                type="text">
                        @else
                            <input required value="{{ $product->qty }}" class="form-control" name="qty" type="text">
                        @endif
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="sku">Sku</label>
                        <input required value="{{ $product->sku }}" class="form-control" name="sku" type="text">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="image">Επεξεργασία Φωτογραφίας</label>
                        @if ($product->image)
                            <img width="50px" src="{{ asset('images/products/' . $product->image) }}" alt="">
                        @endif
                        <input type="file" name="image" class="form-control image-upload-input">
                    </div>
                    <div class="col-md-12 mb-3">
                        <button type="submit" class="btn btn-primary">
                            Επεξεργασία
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@include('layouts.adminmaster')

@section('dashboardscripts')
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
@endsection
