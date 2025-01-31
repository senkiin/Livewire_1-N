<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class Show_users_controller extends Controller
{
    public function index(){
        $orders = Order::with('user')->where('state','Pending')->paginate(6);
        return view('welcome', compact('orders'));
    }
}
