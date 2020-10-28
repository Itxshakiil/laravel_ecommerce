<?php

namespace App\Http\Controllers;

use App\Billing\RazorpayApi;
use App\Order;
use Gloudemans\Shoppingcart\Facades\Cart;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = auth()->user()->orders;

        return view('orders.index', compact('orders'));
    }

    public function store(RazorpayApi $razorpayApi)
    {
        $order = $razorpayApi->createOrder(Cart::total());

        $order = auth()->user()->orders()->create([
            'id' => $order->id,
            'entity' => $order->entity,
            'amount' => $order->amount,
            'currency' => $order->currency,
            'receipt' => $order->receipt,
            'status' => $order->status,
            'attempts' => $order->attempts,
            'notes' => $order->notes,
        ]);
        $products = [];
        Cart::content()->each(function ($item) use (&$products) {
            $products[$item->model->id] = ['quantity' => $item->qty];
        });

        $order->products()->sync($products);

        session(['order' => $order->id]);

        return redirect(route('order.checkout', ['order' => $order]));
    }

    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }

    public function checkout(Order $order)
    {
        // dd($order);
        return view('checkout', compact('order'));
    }
}
