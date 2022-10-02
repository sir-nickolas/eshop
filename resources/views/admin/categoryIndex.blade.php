@section('title', 'View Categories')
@extends('layouts.master')
@section('extra')
    <div class="container">
        <h1></h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Όνομα Κατηγορίας</th>
                    <th>Περιγραφή</th>
                    <th>Εικόνα</th>
                    <th>Ενέργειες</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->description }}</td>
                        <td class="w-25">
                            <img class="w-25" src="{{ asset('images/category/' . $item->image) }}" alt="">
                        </td>
                        <td>
                            <a href="{{ url('edit-category/' . $item->id) }}" class="btn btn-primary">Edit</a>
                            <a href="{{ url('delete-category/' . $item->id) }}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <strong>{{ $message }}</strong>
            </div>
        @endif
    </div>

@endsection
@include('layouts.adminmaster')


@section('dashboardscripts')
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
@endsection
