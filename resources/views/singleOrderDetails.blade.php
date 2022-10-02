 @extends('layouts.master')
 @section('title', 'Order Details')
 @section('content')
     <section style="height: 700px;" class=" d-flex justify-content-center align-items-center">
         <div class="container">
             <div class="row">
                 <div class="col-md-12">
                     <div class="card">
                         <div class="card-header bg-primary">
                             <h4 class="text-white">Λεπτομέριες Παραγγελίας</h4>
                         </div>
                         <div class="card-body">
                             <div class="row">
                                 <div class="col-md-6">
                                     <label for="">Όνομα</label>
                                     <div class="border p-2">{{ $orders->fname }}</div>
                                     <label for="">Επώνυμο</label>
                                     <div class="border p-2">{{ $orders->lname }}</div>
                                     <label for="">Διεύθυνση</label>
                                     <div class="border p-2">{{ $orders->address }}</div>
                                 </div>
                                 <div class="col-md-6">
                                     <table class="table table-bordered">
                                         <thead>
                                             <tr>
                                                 <th>Όνομα</th>
                                                 <th>Ποσότητα</th>
                                                 <th>Τιμή</th>
                                                 <th>Εικόνα</th>
                                             </tr>
                                         </thead>
                                         <tbody>
                                             @foreach ($orders->orderitems as $item)
                                                 <tr>
                                                     <td>{{ $item->products->name }}</td>
                                                     <td>{{ $item->qty }}</td>
                                                     <td>{{ $item->price }}&euro;</td>
                                                     <td>
                                                         <img width="50px"
                                                             src="{{ asset('images/products/' . $item->products->image) }}"
                                                             alt="">
                                                     </td>
                                                 </tr>
                                             @endforeach
                                         </tbody>
                                     </table>
                                     <h4>Τελικό Ποσό : {{ $orders->total_price }}&euro;</h4>
                                 </div>
                             </div>
                         </div>
                     </div>

                 </div>
             </div>
         </div>
     </section>
 @endsection
