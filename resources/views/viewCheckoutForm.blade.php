@extends('layouts.master')
@section('title', 'Checkout')
@section('content')
    <section style="height: 700px;" class="d-flex justify-content-center align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <h6>Προσωπικά Στοιχεία</h6>
                            <hr>
                            <form action="{{ url('place-order') }}" method="POST">
                                @csrf

                                <div class="row checkout-form">
                                    <div class="col-md-6">
                                        <label for="firstname">Όνομα</label>
                                        <input required name="fname" type="text" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="lastname">Επώνυμο</label>
                                        <input required name="lname" type="text" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="address">Διεύθυνση</label>
                                        <input required name="address" type="text" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="payment_type">Τρόπος Πληρωμής</label>
                                        <select class="form-select form-control" name="payment_type">
                                             
                                              <option value="credit_card">Πιστωτική Κάρτα</option>
                                              <option value="bank_transfer">Τραπεζικός Λογαριασμός</option>
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mt-3">
                                    Πληρωμή
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div style="height: 288px;" class="card">
                        <div class="card-body">
                            <h6>Λεπτομέριες Παραγγελίας</h6>
                            <hr>
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cartitems as $item)
                                        <tr>
                                            <td>{{ $item->products->name }}</td>
                                            <td>{{ $item->prod_qty }}</td>
                                            <td>{{ $item->products->price * $item->prod_qty }}&euro;</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
