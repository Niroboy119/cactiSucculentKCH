<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use App\Models\OrderItem;
use App\Models\Product;
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
            
            $guest = DB::table('users')->insertGetId(['user_type' => 'guest', 'name' => ($request->firstName.' '.$request->lastName), 'email' => $request->email, 'cust_address' => $request->address, 'cust_phone_number' => $request->phonenumber, 'password' => 123456789]);

            $order->user_Id = $guest;
        }
        
        $userID=$order->user_Id;
        $order->grand_total = $order_total;
        $order->item_count = count((array) session('cart'));
        $order->delivery_type = $request->inlineRadioOptions;
        $order->orderMadeDate = date('d-m-y');
        $storeID=$order->order_Id;
        $order->save();
        
        $order_ID = DB::getPdo()->lastInsertId();

        $products = Product::all();

        foreach (session('cart') as $id=>$odr_details) {
            foreach ($products as $key => $product) {
                if ($product->Product_Name == $odr_details['Product_Name']) {
                    DB::table('order_items')->insert(['order_Id' => $order_ID, 'product_Id' => $product->Product_ID, 'quantity' => $odr_details['Product_Quantity'], 'price' => $odr_details['Product_Price']]);
                }
            }
            
        }

        $request->session()->forget('cart');

        $user=DB::table('users')->where('id', $userID)->first();
        $order1=DB::table('orders')->where('user_Id', $user->id)->first();

        // $orderItems=OrderItem::all()->where('order_Id',$userID);
        // $products="";
        // foreach($orderItems as $item)
        // {
        //     $products+=Product::where('Product_ID', $item->product_Id)->value('Product_Name');
        //     $products+=", ";                                             
        // }
        return redirect()->away('https://api.whatsapp.com/send?phone=601121409433&text=Hi, I have just placed an order with the following details:%0AOrder ID: '. $order1->order_Id .'%0AName: '. $user->name .'%0AEmail: '. $user->email .'%0AAddress: '. $user->cust_address);
    }
	
	public function updateS($id)
    {
        Order::where('order_Id', $id)->update(array('status' => 'cancelled'));
        return redirect('/order');
    }

    public function displayadminManageOrders()
    {
        return view('manageOrders/viewOrdersList');
    }

    public function acceptOrder($id,$dateS,$dateE,$time)
    {
        Order::where('order_Id', $id)->update(array('status' => 'processing','shippingStartDate' => $dateS,'shippingEndDate' => $dateE,'shippingTime' => $time));
        
        $order=DB::table('orders')->where('order_Id', $id)->first();
        $user=DB::table('users')->where('id', $order->user_Id)->first();       
        return redirect()->away('https://api.whatsapp.com/send?phone='. $user->cust_phone_number .'&text=Hi '. $user->name . ', the order you placed with Order ID: '. $order->order_Id .' has been accepted and will be delivered within the following timeframe:%0A%0ADate Range: '. $order->shippingStartDate .' to '. $order->shippingEndDate .'%0ATime: '. $order->shippingTime);
    }

    public function completeOrder($id)
    {
        Order::where('order_Id', $id)->update(array('status' => 'completed'));
        return redirect('manageOrders');
    }

    public function changeQuantityAdmin($id,$quantity)
    {
        if($quantity==0)
        {
            OrderItem::where([ 'id' => $id ])->delete();
        }
        elseif($quantity>0)
        {
            OrderItem::where('id', $id)->update(array('quantity' => $quantity)); 
        }
        return redirect()->back();   
    }

    public function denyOrder($id,$reason)
    {
        Order::where('order_Id', $id)->update(array('status' => 'cancelled','denyReason' => $reason));
        $order=DB::table('orders')->where('order_Id', $id)->first();
        $user=DB::table('users')->where('id', $order->user_Id)->first();       
        
        return redirect()->away('https://api.whatsapp.com/send?phone='. $user->cust_phone_number .'&text=Sorry '. $user->name . ', the order you placed with Order ID: '. $order->order_Id .' has been denied due to the following reason(s):%0A'. $order->denyReason);
    }

}

