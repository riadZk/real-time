<?php

use App\Models\Team;
use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});


Broadcast::channel('private-channel.{userId}', function ($user, $userId) {
    return (int) $user->id === (int) $userId;
});

// // Authenticate the team for the "Call Waiter" channel
// Broadcast::channel('waiter.{restaurantId}', function ($user, $restaurantId) {
//     // Check if the user is part of the restaurant's team with the 'Waiter' role
//     $team = Team::where('restaurant_id', $restaurantId)
//         ->where('user_id', $user->id)
//         ->where('role', 'Waiter')
//         ->first();

//     return $team !== null;
// });


// // Private channel for the restaurant owner (user)
// Broadcast::channel('user.{userId}', function ($user, $userId) {
//     return (int) $user->id === (int) $userId;
// });

// // Private channel for the restaurant team (staff)
// Broadcast::channel('team.{restaurantId}', function ($user, $restaurantId) {
//     return $user->restaurant_id == $restaurantId; // Ensure the user belongs to the restaurant
// });