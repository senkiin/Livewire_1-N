<?php

use App\Http\Controllers\Show_users_controller;
use App\Livewire\ShowOrdersUser;
use App\Livewire\ShowUserOrders;
use Illuminate\Support\Facades\Route;

Route::get('/', [Show_users_controller::class, 'index'])->name('intial');
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('my-orders', ShowUserOrders::class)->name('my-orders');
    // Route::get('orders', [ShowOrdersUser::class, 'render'])->name('orders');
});
