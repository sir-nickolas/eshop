@section('title', 'Insert Product')
@extends('layouts.master')
@section('extra')
    <div class="container">
        <h4 class="text-center">Εισαγωγή Προιόντος</h4>
        <div class="card-body">
            <form action="{{ url('insert-product') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <span class="text-danger">
                            @error('cate_id')
                                {{ 'Παρακαλω εισάγεται μια κατηγορία πρώτα' }}
                            @enderror
                        </span>
                        <select name="cate_id" class="form-select form-control" aria-label="Default select example">
                            <option value="">Επιλογή Κατηγορίας</option>
                            @foreach ($category as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="name">Όνομα</label>
                        <span class="text-danger">
                            @error('name')
                                {{ 'Το Πεδίο είναι υποχρεωτικό' }}
                            @enderror
                        </span>
                        <input value="{{ old('name') }}" class="form-control" name="name" type="text">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="sku">Sku</label>
                        <span class="text-danger">
                            @error('sku')
                                {{ 'Το Πεδίο είναι υποχρεωτικό' }}
                            @enderror
                        </span>
                        <input value="{{ old('sku') }}" class="form-control" name="sku" type="text">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="small_description">Περιγραφή Προιόντος</label>
                        <span class="text-danger">
                            @error('small_description')
                                {{ 'Το Πεδίο είναι υποχρεωτικό' }}
                            @enderror
                        </span>
                        <textarea class="form-control" name="small_description" rows="3">{{ old('small_description') }}</textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="price">Τιμή</label>
                        <span class="text-danger">
                            @error('price')
                                {{ 'Το Πεδίο είναι υποχρεωτικό' }}
                            @enderror
                        </span>
                        <input value="{{ old('price') }}" class="form-control" name="price" type="number">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="qty">Ποσότητα</label>
                        <span class="text-danger">
                            @error('qty')
                                {{ 'Το Πεδίο είναι υποχρεωτικό' }}
                            @enderror
                        </span>
                        <input value="{{ old('qty') }}" class="form-control" name="qty" type="number">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="image">Ανέβασμα Φωτογραφίας</label>
                        <span class="text-danger">
                            @error('image')
                                {{ 'Το Πεδίο είναι υποχρεωτικό' }}
                            @enderror
                        </span>
                        <input value="{{ old('image') }}" type="file" name="image" class="form-control">
                    </div>
                    <div class="col-md-12 mb-3">
                        <button type="submit" class="btn btn-primary">
                            Submit
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
