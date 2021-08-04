<?php

namespace App\Http\Livewire\Checkout;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Str;

class Index extends Component
{
    public $carts;
    public $recipient;
    public $address;
    public $phone;

    protected $rules = [
        'recipient' => 'required|string',
        'address' => 'required|string',
        'phone' => 'required|numeric',
    ];

    public function mount()
    {
        $this->carts = Auth::user()->carts;
    }

    public function render()
    {
        return view('livewire.checkout.index')->extends('layouts.app');
    }

    public function checkout()
    {
        $this->validate();

        $order = Order::create([
            'invoice' => Str::upper(Str::random(4)) . date('dmy'),
            'user_id' => Auth::id(),
            'total' => $this->carts->sum('subtotal'),
            'recipient' => $this->recipient,
            'address' => $this->address,
            'phone' => $this->phone,
            'status' => 'waiting',
        ]);

        if ($order) {
            foreach ($this->carts as $cart) {
                OrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $cart->product_id,
                    'qty' => $cart->qty,
                    'subtotal' => $cart->subtotal,
                ]);

                $cart->delete();
            }

            \Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');
            \Midtrans\Config::$isProduction = false;
            \Midtrans\Config::$isSanitized = true;
            \Midtrans\Config::$is3ds = true;

            $params = [
                'transaction_details' => [
                    'order_id' => $order->invoice,
                    'gross_amount' => $order->total,
                ],
                'customer_details' => [
                    'first_name' => $order->recipient,
                    'email' => $order->user->email,
                    'phone' => $order->phone,
                ],
            ];

            $order->token = \Midtrans\Snap::getSnapToken($params);
            $order->save();

            return redirect('/');
        }
    }
}
