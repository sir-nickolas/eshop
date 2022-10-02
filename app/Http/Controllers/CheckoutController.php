<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {

        $cartitems = Cart::where('user_id', Auth::id())->get();

        return view('viewCheckoutForm', compact('cartitems'));
    }


    public function placeorder(Request $request)
    {
        $order = new Order();
        $order->user_id = Auth::id();
        $order->fname = $request->input('fname');
        $order->lname = $request->input('lname');
        $order->address = $request->input('address');
        $order->payment_type = $request->input('payment_type');
        $order->tracking_no =  rand(111111, 999999);

        $total = 0;
        $cart_items_total = Cart::where('user_id', Auth::id())->get();

        foreach ($cart_items_total as $prod) {
            $total += (float) $prod->products->price * (int) $prod->prod_qty;
        }

        $order->total_price = $total;
        $order->save();

        $cartitems = Cart::where('user_id', Auth::id())->get();

        foreach ($cartitems as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'prod_id' => $item->prod_id,
                'qty' => $item->prod_qty,
                'price' => $item->products->price,
            ]);
            $prod = Product::where('id', $item->prod_id)->first();
            $prod->qty = $prod->qty - $item->prod_qty;
            $prod->update();
        }

        $user = User::where('id', Auth::id())->first();
        $user->lname = $request->input('lname');
        $user->fname = $request->input('fname');
        $user->address = $request->input('address');
        $user->update();

        $cartitems = Cart::where('user_id', Auth::id())->get();
        Cart::destroy($cartitems);

        $orderId = $order->id;

        return redirect('/')->with('status', 'Η παραγγελία σας με το Id ' . $orderId . ' ολοκληρώθηκε. Σας ευχαριστούμε πολύ!');
    }
}
