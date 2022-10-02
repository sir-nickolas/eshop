@extends('layouts.master')
@section('title', 'Register')
@section('content')
<section class="vh-100 d-flex justify-content-center align-items-center">
    <div class="container p-3" style="border: 0.5px solid #ccc; width:600px;">
        <form action="register" method="POST">
            @csrf
            <h4 class="text-center">Εγγραφή Νέου Χρήστη</h4>
            <div class="form-outline mb-4">
                <label class="form-label">Email</label> <span class="text-danger">
                    @error('email')
                        {{ $message }}
                    @enderror
                </span>
                <input placeholder="Εισάγεται email..." type="email" value="{{ old('email') }}" name="email"
                    class="form-control" />
            </div>

            <div class="form-outline mb-4">
                <label class="form-label">Όνομα</label> <span class="text-danger">
                    @error('name')
                        {{ "Το 'Ονομα είναι υποχρεωτικό" }}
                    @enderror
                </span>
                <input placeholder="Εισάγεται Όνομα..." type="name" value="{{ old('name') }}" name="name"
                    class="form-control" />
            </div>


            <div class="form-outline mb-4">
                <label class="form-label">Κωδικός</label>
                <span class="text-danger">
                    @error('password')
                        {{ 'Ο κωδικός είναι υποχρεωτικός' }}
                    @enderror
                </span>
                <input placeholder="Εισάγεται Κωδικό..." name="password" type="password" class="form-control" />
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-4">Εγγραφή</button>
        </form>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <strong>{{ $message }}</strong>
            </div>
        @endif
    </div>
</section>
@endsection
