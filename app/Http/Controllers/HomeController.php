<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;

class HomeController extends Controller
{

    public function home() {
        $products = Product::orderBy('id', 'desc')->take(4)->get();
        $products2 = Product::inRandomOrder()->take(4)->get();
        return view('home', [
            'products' => $products,
            'products2' => $products2
        ]);
    }

    public function contact() {
        return view('contact');
    }


    public function orders() {
        $user = auth()->user();
        return view('orders', [
            'orders' => $user->orders
        ]);
    }
}
