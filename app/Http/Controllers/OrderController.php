<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    
    public function store(Request $request){

        $order_total = 0;
        foreach ((array) session('cart') as $id => $details) {
            $order_total += $details['Product_Price'] * $details['Product_Quantity'];
        }

        $order = new Order();
        $order->user_Id = Auth::user()->id;
        $order->grand_total = $order_total;
        $order->item_count = count((array) session('cart'));      
        
        return redirect('/homepage');
    }

}

