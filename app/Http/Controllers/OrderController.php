<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Events\OrderPlaced;

class OrderController extends Controller
{
    public function order()
    {

        $order = [
            'customer_name' => 'John Doe',
            'customer_email' => 'john@example.com',
            'customer_phone' => '1234567890',
            'order_total' => 100,
            'restaurant_id' => 1,
        ];

        $restaurant = Restaurant::find($order['restaurant_id']);
        event(new OrderPlaced($order, $restaurant));

        return response()->json(['message' => 'Order placed successfully!']);
    }
}