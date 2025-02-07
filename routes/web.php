<?php

use App\Events\DataArrayBroadcast;
use App\Events\TestEvent;
use Illuminate\Support\Facades\Route;
use App\Events\RestaurantNotification;
use App\Models\Restaurant;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\OrderController;

Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('login2');

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function () {
    Route::get('/TEST', function () {
        event(new TestEvent('Hello world !'));

        $userId = auth()->user()->id;  // Get the authenticated user's ID
        $arrayData = ['item1', 'item2', 'item3', auth()->user()];  // Your data to send

        event(new DataArrayBroadcast($arrayData, $userId));

        return 'welcome';
    });

    Route::get('/event', function () {



        // Get the specific restaurant (for example, by its ID)
        $restaurant = Restaurant::find(1);

        // Define the notification data (message, title, etc.)
        $notificationData = [
            'title' => 'New Special Offer!',
            'message' => '50% off all pizzas for the next 24 hours.'
        ];

        // Trigger the event
        event(new RestaurantNotification($restaurant, $notificationData));

    });

    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Route::get('order', [OrderController::class, 'order']);

});