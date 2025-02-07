<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class OrderPlaced implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $order;
    public $restaurant;
    public $message;

    public function __construct($order, $restaurant)
    {
        $this->order = $order;
        $this->restaurant = $restaurant;
        $this->message = "New order has been placed .";
    }

    public function broadcastOn()
    {
        // Notify the user (owner) and teams (staff)
        return [
            new Channel('user.' . $this->restaurant->user_id), // Notify the owner
            new Channel('team.' . $this->restaurant->id),      // Notify the team
        ];
    }
}