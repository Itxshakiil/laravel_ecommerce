<?php

namespace App\Billing;

use Gloudemans\Shoppingcart\Facades\Cart;
use Razorpay\Api\Api;

class RazorpayApi
{
    protected $api;

    public function __construct()
    {
        $this->api = new Api(config('app.razorpay_key'), config('app.razorpay_private'));
    }

    public function createOrder()
    {
        $orderData = [
            'amount' => str_replace(',', '', Cart::total()) * 100, // 2000 rupees in paise
            'currency' => 'INR',
            'receipt' => 'Receipt #20',
            'payment_capture' => 1 // auto capture
        ];

        return $this->api->order->create($orderData);
    }

    public function fetchOrder($razorpay_order_id)
    {
        return $this->api->order->fetch($razorpay_order_id);
    }

    public function fetchCard($card_id)
    {
        return $this->api->card->fetch($card_id);
    }

    public function verifyPaymentSignature($attributes)
    {
        return $this->api->utility->verifyPaymentSignature($attributes);
    }

    public function fetchPayment($razorpay_payment_id)
    {
        return $this->api->payment->fetch($razorpay_payment_id);
    }
}
