<?php

namespace App\Http\Controllers;
use App\Models\Notification;
use App\Models\Order;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
  

    public function acceptOrderNotification($id,$dateS,$dateE,$time)
    {
        $order=Order::where('order_Id', $id)->first();
        $notification=new Notification();
        
        $notification->type="customer";
        $notification->user_Id=$order->user_Id;
        $notification->title="Order Status Update";
        $notification->message="Your Order Has Been Accepted";
        $notification->status="unseen";
        $notification->photo="processing";
        $notification->save();

        return redirect('/acceptOrder'.'/'.$id.'/'.$dateS.'/'.$dateE.'/'.$time);
    }


    public function denyOrderNotification($id,$reason)
    {
        $order=Order::where('order_Id', $id)->first();
        $notification=new Notification();
        
        $notification->type="customer";
        $notification->user_Id=$order->user_Id;
        $notification->title="Order Status Update";
        $notification->message="Your Order Has Been Denied";
        $notification->status="unseen";
        $notification->photo="reject";
        $notification->save();

        return redirect('/denyOrder'.'/'.$id.'/'.$reason);
    }

    public function completeOrderNotification($id)
    {
        $order=Order::where('order_Id', $id)->first();
        $notification=new Notification();
        
        $notification->type="customer";
        $notification->user_Id=$order->user_Id;
        $notification->title="Order Status Update";
        $notification->message="Your Order Has Been Completed";
        $notification->status="unseen";
        $notification->photo="completed";
        $notification->save();
        
        return redirect('/completeOrder'.'/'.$id);
    }

    public function deleteNotification($id)
    {
        Notification::where([ 'id' => $id ])->delete();      
        return redirect()->back();
    }
    
}
