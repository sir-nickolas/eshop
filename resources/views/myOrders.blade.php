@extends('layouts.master')
@section('title', 'Orders')
@section('content')
    <section style="height: auto;" class=" d-flex justify-content-center align-items-center">
        <div style="height:600px;" class="container">
            <h1>Οι Παραγγελίες Μου</h1>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID Παραγγελίας</th>
                                <th>Tracking number</th>
                                <th>Τρόπος Πληρωμής</th>
                                <th>Τελικό Ποσό</th>
                                <th>Ενέργεια</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $item)
                                <tr>
                                    <td>
                                        {{ $item->id }}
                                    </td>
                                    <td>{{ $item->tracking_no }}</td>
                                    <td>
                                        {{ $item->payment_type }}
                                    </td>
                                    <td>{{ $item->total_price }}&euro;</td>
                                    <td>
                                        <a class="btn btn-primary" href="{{ url('view-order/' . $item->id) }}">
                                            Λεπτομέρειες Παραγγελίας</a>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
