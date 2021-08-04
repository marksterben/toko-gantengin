<?php

namespace App\Http\Controllers;

use App\Models\Order;

class MidtransController extends Controller
{

    public function notificationsHandler()
    {
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        $notif = new \Midtrans\Notification();

        $transaction = $notif->transaction_status;
        $order_id = $notif->order_id;

        if ($transaction == 'settlement') {
            Order::where('invoice', $order_id)->update(['status' => 'paid']);
        } else if ($transaction == 'deny' || $transaction == 'cancel' || $transaction == 'expire') {
            Order::where('invoice', $order_id)->update(['status' => 'canceled']);
        }
    }
}
