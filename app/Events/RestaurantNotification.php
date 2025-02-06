<?php

namespace App\Events;

use App\Models\Restaurant;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class RestaurantNotification implements ShouldBroadcast
{
    public $restaurant;
    public $notificationData;

    // Constructor receives restaurant and notification data
    public function __construct(Restaurant $restaurant, $notificationData)
    {
        $this->restaurant = $restaurant;
        $this->notificationData = $notificationData;
    }

    // Broadcast to the private channel for the restaurant
    public function broadcastOn()
    {
        return new PrivateChannel('restaurant.' . $this->restaurant->id);
    }

    // Broadcasting notification data
    public function broadcastWith()
    {
        return [
            'restaurant_id' => $this->restaurant->id,
            'notification_data' => $this->notificationData
        ];
    }
}