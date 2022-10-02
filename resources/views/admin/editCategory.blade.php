@section('title', 'Edit Category')
@extends('layouts.master')
@section('extra')
    <div class="container">
        <h4 class="text-center">Επεξεργασία Κατηγορίας</h4>
        <div class="card-body">
            <form action="{{ url('update-category/' . $category->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="name">Όνομα Κατηγορίας</label>
                        <input required value="{{ $category->name }}" class="form-control" name="name" type="text">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="description">Περιγραφή Κατηγορίας</label>
                        <input value="{{ $category->description }}" class="form-control" name="description" type="text">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="name">Επεξεργασία Φωτογραφίας</label>
                        @if ($category->image)
                            <img width="50px" src="{{ asset('images/category/' . $category->image) }}" alt="">
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
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <strong>{{ $message }}</strong>
                </div>
            @endif
        </div>
    </div>

@endsection
@include('layouts.adminmaster')

@section('dashboardscripts')
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
@endsection
