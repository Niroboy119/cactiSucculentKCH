<?php
$count=1;
$dateCount=1;
?>

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <link href="{{ asset('css/viewProductsAdmin.css') }}" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    

    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    

</head>
<body>
    <div class="con">
    <div id="app">
        <nav style="position:fixed; top:0; left:0; z-index:9999; width: 100%; background: #000000; height: 80px; padding-left: 20px;" class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a style="color:#32CD32;" class="navbar-brand" href="{{ url('/') }}">
                    Cacti Succulent KCH
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link btn btn-outline-success mr-2" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link btn btn-outline-success" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        
    </div>
</div>

 <!-- jQuery CDN - Slim version (=without AJAX) -->
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
   
    <link href="{{ asset('sass/test.css') }}" rel="stylesheet">


<div class="wrapper">

<!-- Sidebar -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <h4>Admin Management</h4>
        </div>

        <ul  class="list-unstyled components">
            <p>Administrator</p>
            <div>
            <li>
                <a href="#">Dashboard</a>
            </li>
            <li>
                <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Manage Products</a>
                <ul class="collapse list-unstyled" id="pageSubmenu">
                    <li>
                        <a href="/manageProducts">View Products List</a>
                    </li>
                    <li>
                        <a href="/addProductForm">Add New Product</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#pageSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Manage Suppliers</a>
                <ul class="collapse list-unstyled" id="pageSubmenu2">
                    <li>
                        <a href="/manageSuppliers">View Suppliers List</a>
                    </li>
                    <li>
                        <a href="/addSupplierForm">Add New Supplier</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="/manageOrders">Manage Orders</a>
            </li>
            <li>
                <a href="#">Profile Page</a>
            </li>
        </div>
        </ul>
    </nav>


    <?php
use App\Models\Order;
use App\Models\User;
use App\Models\OrderItem;
use App\Models\Product;

$orders=Order::all();
$users=User::all();
?>

<div class="combine">
<br><br> 

<div class="d-flex justify-content-center h-100">
    <div style="margin-left:100px;" class="search"> <input  onchange="searchSupplier()" id="searchBar" style=" padding-right:750px; padding-bottom:6px; padding-top:4px;" type="text" class="search-input" placeholder="Enter Order Number...." name=""> <button style="border-color:#32CD32; color:#32CD32;" onclick="searchSupplier2()" type="button" onmouseover="this.style.background='#32CD32'; this.style.color='white';"  onmouseout="this.style.background='white'; this.style.color='#32CD32';" class="btn btn-outline-primary">Search Order</button> <i class="fa fa-search"></i> </a> </div>
</div>

<br>

<script type="text/javascript">
    window.scrollTo(0, 0);
function searchSupplier()
{
    var link= "/searchSuppliers/"+document.getElementById("searchBar").value;
    sdocument.addEventListener("keyup", function(event) {
        if (event.keyCode === 13) {
            location.replace(link);
        }
    });
}

function searchSupplier2()
{
    var link= "/searchSuppliers/"+document.getElementById("searchBar").value;
    if(document.getElementById("searchBar").value!="")
    {
        location.replace(link);
    }
}
</script>


<div style="margin-left=-120px;" class="container mt-5 mb-5">
    <div class="d-flex justify-content-center row">
        <div class="col-md-10">
            @php
            $inputId=100;
            @endphp
            @foreach($orders as $order)
            <?php      
                $user=DB::table('users')->where('id', $order->user_Id)->first();
                if($order->status=='pending'){
                    $img="pending.png";
                    $color="#F2DE1E";
                    $display1="visibility";
                    $display2="visibility";
                    $display3="none";
                    $margin="0px";
                }else if($order->status=='cancelled'){
                    $img="cancelled.png";
                    $color="red";
                    $display1="none";
                    $display2="none";
                    $display3="none";
                    $margin="25px";
                }else if($order->status=='processing'){
                    $img="processing.png";
                    $color="#2132E0";
                    $display1="none";
                    $display2="visibility";
                    $display3="visibility";
                    $margin="0px";
                }else if($order->status=='completed'){
                    $img="completed.png";
                    $color="#32CD32";
                    $display1="none";
                    $display2="none";
                    $display3="none";
                    $margin="25px";
                }

                if($order->delivery_type=="homeDelivery")
                {
                    $deliveryS="Estimated Delivery Start Date";
                    $deliveryE="Estimated Delivery End Date";
                    $deliverytime="Estimated Delivery Time";

                }else if($order->delivery_type=="pickUp")
                {
                    $deliveryS="Estimated Pick Up Start Date";
                    $deliveryE="Estimated Pick Up End Date";
                    $deliverytime="Estimated Pick Up Time";

                }else if($order->delivery_type=="remotePickUp")
                {
                    $deliveryS="Estimated Remote Pick Up Start Date";
                    $deliveryE="Estimated Remote Pick Up End Date";
                    $deliverytime="Estimated Remote Pick Up Time";
                }

                $date="To Be Decided"; 
                $timeDet="To Be Decided";

            ?>
            <div class="row p-2 bg-white border rounded">
                <div class="col-md-3 mt-1"><img  style="width:200px; height: 170px;" class="img-fluid img-responsive rounded product-image" src="{{URL::asset('storage/images/'.$img)}}"></div>
                <div class="col-md-6 mt-1">
                    <h4>Order Id: {{$order->order_Id}}</h4>
                    <div class="mt-1 mb-1 spec-1"><span style="font-size:17px;">Name: {{$user->name}}</span><span style="background:{{$color}}" class="dot"></span><span style="font-size:17px;">Email: {{$user->email}}<span style="background:{{$color}}" class="dot"></span><span style="font-size:17px;">Number of Items: {{$order->item_count}}
                    <span style="background:{{$color}}" class="dot"></span><span style="font-size:17px;">Order Total: ${{sprintf('%.2f', ($order->grand_total))}}
                    <span style="background:{{$color}}" class="dot"></span><span style="color:{{$color}}; font-size:17px;">{{$order->status}}</div>
                    <p style="color:black;" class="text-justify text-truncate para mb-0"><br><br></p>
                </div>
                <div class="align-items-center align-content-center col-md-3 border-left mt-1">
                    <br/> 
                    <div style="position:relative; padding-bottom:40px;" class="d-flex flex-column mt-4">
                        <a style="display:{{$display1}}; margin-bottom:10px; border-color:#32CD32; background:#32CD32;" data-toggle="modal" data-target="#datetimeModal{{$dateCount}}" class="btn btn-primary btn-sm" href="">Accept</a>
                        
                        <div class="container d-flex justify-content-center mt-100">
                            <div class="modal fade" id="datetimeModal{{$dateCount}}">
                                <div style="width:500px; margin-top:230px; margin-left:570px;" class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Pick Date & Time
                                        </div> <!-- Modal body -->
                                        <div class="modal-body">
                                            <div class="container">   
                                                <h6>Delivery Type: {{$order->delivery_type}}</h6>
                                                <br>
                                                <h6>Start Date:</h6>
                                                  <input id="dateS{{$dateCount}}" type = "date" name = "date" min="{{date('d-m-y')}}"> 
                                                  <br>
                                                  <br>

                                                  <h6>End Date:</h6>
                                                  <input id="dateE{{$dateCount}}" type = "date" name = "date"> 
                                                  <br>
                                                  <br>

                                                  <h6>Time:</h6>
                                                  <select name="time" id="timeCount{{$dateCount}}">
                                                    @php
                                                      $time=1;  
                                                    @endphp
                                                    @while ($time!=13)
                                                    <option value="{{$time}}">{{$time}}</option>
                                                    @php
                                                      $time+=1;  
                                                    @endphp
                                                    @endwhile
                                                  </select>
                                                  <select id="time{{$dateCount}}">
                                                    <option value="AM">AM</option>
                                                    <option value="PM">PM</option>
                                                  </select>
                                            </div>
                                        </div> <!-- Modal footer -->
                                        <div class="modal-footer">
                                            <button  onclick="myFunction1('{{$order->order_Id}}',document.getElementById('dateS{{$dateCount}}').value, document.getElementById('dateE{{$dateCount}}').value,document.getElementById('timeCount{{$dateCount}}').value,document.getElementById('time{{$dateCount}}').value)" type="button" class="btn" data-dismiss="modal">Submit</button> 
                                             <button type="button" class="btn" data-dismiss="modal">Close</button> </div>
                                    </div>

                                    @php
                                        $dateCount+=1;
                                    @endphp
                                </div>
                            </div>
                        </div>
                            
                     

                        <a style="display:{{$display3}}; margin-bottom:10px; border-color:#32CD32; background:#32CD32"  class="btn btn-primary btn-sm" onclick= "return myFunction();" href="/completeOrderNotification/{{$order->order_Id}}">Order Completed</a>
                        <a style="margin-top:{{$margin}}; border-color:#32CD32; background:#32CD32;"  class="btn btn-primary btn-sm" href="/editSupplier/"  data-toggle="modal" data-target="#{{$count}}">View Details</a>
                        <div class="container d-flex justify-content-center mt-100">
                            <div class="modal fade" id="{{$count}}">
                                <div style="margin-top:200px; margin-left:450px;" class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Order Id: {{$order->order_Id}}
                                        </div> <!-- Modal body -->
                                        <div style="height:300px; overflow-y:scroll;" class="modal-body">
                                            <div class="container">                                                
                                                <h6>Customer Details</h6>
                                                <div class="row">
                                                    <div class="col-xs-6">
                                                        <ul type="none">
                                                            <li class="left">Order Id</li>
                                                            <li class="left">Name</li>
                                                            <li class="left">Email</li>
                                                            <li class="left">Phone Number</li>
                                                            <li class="left">Address</li>

                                                        </ul>
                                                    </div>
                                                    <div class="col-xs-6">
                                                        <ul class="right" type="none">
                                                            <li class="right">{{$order->order_Id}}</li>
                                                            <li class="right">{{$user->name}}</li>
                                                            <li class="right">{{$user->email}}</li>
                                                            <li class="right">{{$user->cust_phone_number}}</li>
                                                            <li class="right">{{$user->cust_address}}</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <br>
                                                <h6>Item Details</h6>
                                                <div class="row" style="border-bottom: none">
                                                    <div class="col-xs-6">
                                                        <ul type="none">
                                                            <?php
                                                             $orderItems=OrderItem::all()->where('order_Id',$order->order_Id);
                                                            ?>
                                                            @foreach ($orderItems as $item)
                                                                    <li class="left">{{Product::where('Product_ID', $item->product_Id)->value('Product_Name')}}</li>
                                                                    <br>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                    <div class="col-xs-6">
                                                        <ul style="top:100px;" class="right" type="none">
                                                           
                                                            @foreach ($orderItems as $item)
                                                                    <li class="right">
                                                                        <input id="{{$inputId}}" onchange="changeQuantityAdmin({{$item->id}},document.getElementById({{$inputId}}).value)" style="margin-top:3px; height:20px; width:50px; border-radius:0px; text-align: center;" type="text" class="form-control input-number" value="{{$item->quantity}}">
                                                                    {{--    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   
                                                                        <a style="padding:2px 5px 2px 5px; color:white; border-color:#32CD32; background:#32CD32; border-style: solid;" href="">+</a> 
                                                                        <a style="padding:2px 5px 2px 5px; color:white; border-color:#32CD32; background:#32CD32; border-style: solid;" href="">-</a></li>
                                                            --}}

                                                            <script type="text/javascript">

                                                                function changeQuantityAdmin(y,x)
                                                                        {
                                                                            var link="/changeQuantityAdmin/"+y+"/"+x;
                                                                            location.replace(link);
                                                                        }

                                                                    
                                                            </script>

                                                            @php
                                                                $inputId+=1;
                                                            @endphp

                                                            <br>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                                <h6>Delivery Details</h6>
                                                <div class="row" style="border-bottom: none">
                                                    <div class="col-xs-6">
                                                        <ul type="none">
                                                            <li class="left">Type of Delivery</li>
                                                            <li class="left">Order Made On</li>
                                                            <li class="left">{{$deliveryS}}</li>
                                                            <li class="left">{{$deliveryE}}</li>
                                                            <li class="left">{{$deliverytime}}</li>      
                                                        </ul>
                                                    </div>
                                                    <div class="col-xs-6">
                                                        <ul class="right" type="none">
                                                            <li class="left">{{$order->delivery_type}}</li>
                                                            <li class="right">{{$order->orderMadeDate}}</li> 
                                                            <li class="right">{{$order->shippingStartDate}}</li> 
                                                            <li class="right">{{$order->shippingEndDate}}</li> 
                                                            <li class="right">{{$order->shippingTime}}</li>   
                                                        </ul>
                                                    </div>
                                                </div>
                                                <br>
                                                <h6>Grand Total</h6>
                                                <div class="row" style="border-bottom: none">
                                                    <div class="col-xs-6">
                                                        <ul type="none">                                                                                                                   
                                                            <li class="left">Total Price</li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-xs-6">
                                                        <ul  class="right" type="none">                                                        
                                                            <li class="right">${{round($order->grand_total)}}</li> 
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> <!-- Modal footer -->
                                        <div class="modal-footer"> <button type="button" class="btn" data-dismiss="modal">Close</button> </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <a onmouseover="this.style.background='#32CD32'; this.style.color='white';"  onmouseout="this.style.background='white'; this.style.color='#32CD32';" style="display:{{$display2}}; border-color:#32CD32; color:#32CD32;"data-toggle="modal" data-target="#reason{{$dateCount}}"  class="btn btn-outline-primary btn-sm mt-2">Deny</a></div>
                    
                    

                    <div class="container d-flex justify-content-center mt-100">
                        <div class="modal fade" id="reason{{$dateCount}}">
                            <div style="width:500px; margin-top:230px; margin-left:570px;" class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Order Cancellation
                                    </div> <!-- Modal body -->
                                    <div class="modal-body">
                                        <div class="container">   
                                    
                                            <h6>Reason:</h6>
                                            <textarea id="textArea{{$dateCount}}" rows="4" cols="55" name="comment" form="usrform">Enter text here...</textarea>
                                            <br>
                                            <br>
                                            
                                        </div>
                                    </div> <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <button  onclick="myFunction2('{{$order->order_Id}}',document.getElementById('textArea{{$dateCount}}').value)" type="button" class="btn" data-dismiss="modal">Submit</button> 
                                         <button type="button" class="btn" data-dismiss="modal">Close</button> </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    
                </div>
                     
              
            </div>
                <script type="text/javascript">

                function myFunction() 
                {
                    if (confirm("Are you sure you want to continue?")) {

                    return true;

                    } else {

                        return false;
                    }

                }

                

                  function myFunction1(id,dateS,dateE,timeCount,time) 
                            {
                                 if (confirm("Are you sure you want to continue?")) 
                                 {     
                                     location.replace("/acceptOrderNotification/"+id+"/"+dateS+"/"+dateE+"/"+timeCount+" "+time);
                                 } 
                                 else 
                                 {
                                     return false;
                                 }
                            }
                                                      

                            function myFunction2(id,reason) 
                            {
                                 if (confirm("Are you sure you want to continue?")) 
                                 {     
                                     location.replace("/denyOrderNotification/"+id+"/"+reason);
                                 } 
                                 else 
                                 {
                                     return false;
                                 }
                            }               

            
             </script>
            <br>
            @php
                $count+=1;    
            @endphp
            @endforeach
        </div>
    </div>
</div>
<div>
</div>  



            </body>
            </html>