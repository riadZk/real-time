<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Events\OrderPlaced;

class OrderController extends Controller
{
    public function store()
    {
        // // Create the order
        // $order = Order::create([
        //     'restaurant_id' => $request->restaurant_id,
        //     'details' => $request->details,
        // ]);

        // // Get the restaurant
        // $restaurant = Restaurant::find($request->restaurant_id);

        // // Broadcast the event
        // event(new OrderPlaced($order, $restaurant));

        return response()->json(['message' => 'Order placed successfully!']);
    }
}