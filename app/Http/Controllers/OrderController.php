<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    
    public function store(Request $request){

        $order_total = 0;
        foreach ((array) session('cart') as $id => $details) {
            $order_total += $details['Product_Price'] * $details['Product_Quantity'];
        }

        $order = new Order();

        if (auth()->check()) { // if the order request is made by a already registered users

            $order->user_Id = auth()->id();

        }else { // make a new user of type 'guest' and store their personal information into the users table
            // $new_user_record = new User();
            // $new_user_record->user_type = 'guest';
            // $new_user_record->name = $request->firstName.' '.$request->lastName;
            // $new_user_record->email = $request->email;
            // $new_user_record->cust_address = $request->address;
            // $new_user_record->cust_phone_number = $request->phonenumber;
            // $new_user_record->password = null;
            $guest = DB::table('users')->insertGetId(['user_type' => 'guest', 'name' => ($request->firstName.' '.$request->lastName), 'email' => $request->email, 'cust_address' => $request->address, 'cust_phone_number' => $request->phonenumber, 'password' => 123456789]);

            $order->user_Id = $guest;
        }

        $order->grand_total = $order_total;
        $order->item_count = count((array) session('cart'));
        $order->delivery_type = $request->inlineRadioOptions;

        $order->save();
        $request->session()->forget('cart');
        
        
        return redirect('/homepage');
    }
	
	public function updateS($id)
    {
        Order::where('order_Id', $id)->update(array('status' => 'cancelled'));
        return redirect('/order');
    }

}

