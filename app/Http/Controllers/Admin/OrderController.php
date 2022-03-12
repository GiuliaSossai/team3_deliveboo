<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;
use App\Restaurant;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index($slug)
    {

        $restaurant_id = Restaurant::where('slug', $slug)->first()->id;

        $restaurant_name = Restaurant::where('id', $restaurant_id)->first()->name;

        $orders = Order::where('restaurant_id', $restaurant_id)->orderBy('created_at', 'DESC')->get();

        return view('admin.oreders.index', compact('orders', 'restaurant_name', 'slug'));
    }
}
