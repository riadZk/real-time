<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class DataArrayBroadcast implements ShouldBroadcast
{
    public $data;
    public $userId;

    // Accepting userId as a parameter in the constructor
    public function __construct($data, $userId)
    {
        $this->data = $data;
        $this->userId = $userId;
    }

    public function broadcastOn()
    {
        // Use the passed userId to create the private channel
        return new PrivateChannel('private-channel.' . $this->userId);
    }

    public function broadcastWith()
    {
        // You can pass the data and userId to the frontend
        return [
            'data' => $this->data,
            'userId' => $this->userId
        ];
    }
}