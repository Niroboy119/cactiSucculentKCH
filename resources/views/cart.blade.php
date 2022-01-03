<?php use Illuminate\Support\Facades\Auth;
	$user=Auth::check();
?>

<?php use App\Models\Product;
    $products=Product::all();?>
<!doctype html>
<html class="no-js" lang="en">

    <head>
        <!-- Displays appropriate header -->
        @if($user)
		    @include('header')
		@else
			@include('guestheader')
		@endif

        <!-- meta data -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

        <!--font-family-->
		<link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
        
        <!-- title of site -->
        <title>Cacti Products</title>

       
        <!--font-awesome.min.css-->
        <link rel="stylesheet" href="css/font-awesome.min.css">

        <!--linear icon css-->
		<link rel="stylesheet" href="css/linearicons.css">

		<!--animate.css-->
        <link rel="stylesheet" href="css/animate.css">

        <!--owl.carousel.css-->
        <link rel="stylesheet" href="css/owl.carousel.min.css">
		<link rel="stylesheet" href="css/owl.theme.default.min.css">
		
        <!--bootstrap.min.css-->
        <link rel="stylesheet" href="css/bootstrap.min.css">
		
		<!-- bootsnav -->
		<link rel="stylesheet" href="css/bootsnav.css" >	
        
        <!--style.css-->
        <link rel="stylesheet" href="css/style.css">
        
        <!--responsive.css-->
        <link rel="stylesheet" href="css/responsive.css">
        
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		
        <!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>
		<!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

        	<!--shopping cart start -->
        <!--cart item details-->
		<section id="shopping-cart" class="shopping-cart">
            <div class="container">
                <div class="section-header">
                    <h2 style="font-size:40px"><br>Shopping Cart</h2>
                </div><!--/.section-header-->
                <div class="small-container cart-page">
                @if(session('cart'))
                    <table>
                        <thead>
                        <tr>
                            <th style="width:60%">Product</th>
                            <th class="text-center" style="width:20%">Quantity</th>
                            <th class="text-center" style="width:20%">Subtotal</th>
                        </tr>
                        </thead>

                        <tbody>
                            @foreach(session('cart') as $id=>$details)
                        <tr>
                            <td data-th="Product">
                                <div class="items-info">
                                    <div class="item-image">
                                        <img src="{{URL::asset('storage/images/products/'.$details['Product_Image'])}}" alt="cart images">
                                    </div>
                                    <div class="items-details">
                                        <div class="items-name">
                                            <small>Name: {{$details['Product_Name']}}</small><br>
                                        </div>
                                        <!-- <div class="items-description">
                                            <small>Description: {{$details['Product_Desc']}}</small><br>
                                        </div> -->
                                        <div class="items-price">
                                            <small>Price: RM {{$details['Product_Price']}}</small>
                                        </div>
                                        <br>
                                        <div class="items-removal">
                                        <a href="{{ url('cart/delete/'.$id) }}" role="button" onclick="return confirm('Are you sure to remove this item?')">Remove <span>From </span> Cart</a> 
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td data-th="Quantity">
                                <div class="quantity-update">
                                    <div class="row">
                                        <a href="{{ url('cart/increaseCartQuantity/'.$id ) }}" role="button" style="margin-left:60px;display:inline-block;"class="btn btn-primary btn-sm"  >+</a>
                                        <a style="float:center;display:inline-block;background-color:white;color:black;font-size:20px" type="number" class="number">{{ $details['Product_Quantity'] }}</a>
                                        <a href="{{ url('cart/decreaseCartQuantity/'.$id ) }}" style="margin-right:60px;display:inline-block;" class="btn btn-primary btn-sm" >-</a>
                                    </div>
                                </div>
                            </td>
                            <td data-th="Subtotal" class="text-center">
                                <div class="items-total">
                                    <p class="text-center" style="font-size:20px">RM {{ $details['Product_Price'] * $details['Product_Quantity'] }}</p>
                                </div>    
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                        
                    </table>
                   
                    <?php $total = 0 ?>
                        @foreach((array) session('cart') as $id => $details)
                            <?php $total += $details['Product_Price'] * $details['Product_Quantity'] ?>
                        @endforeach

                    <div class="totals">
                        <div class="totals-item totals-item-total">
                            <label>Total</label>
                            <div class="totals-value" id="cart-total">
                                RM {{$total}}
                            </div>
                        </div>
                    </div>
    
                    <button class="checkout" type="submit" onclick="goToCheckout()">Checkout</button>
                    <script>
                        function goToCheckout(){
                            window.location.href = "checkout";
                        }
                    </script>   
                     
                    @else
                        <div>
                            <h1 class="text-center" style="font-size:30px;color:#808080">Your Cart is Empty!</h1>
                        </div>
                    @endif
                    
                    <script src="js/cart.js"></script>
                </div>
                </div><!--/.small-container-->
            </div><!--.container-->
		
		</section><!--/.shopping cart-->

        <!-- Include all js compiled plugins (below), or include individual files as needed -->

		<script src="js/jquery.js"></script>
        
        <!--modernizr.min.js-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
		
		<!--bootstrap.min.js-->
        <script src="js/bootstrap.min.js"></script>
		
		<!-- bootsnav js -->
		<script src="js/bootsnav.js"></script>

		<!--owl.carousel.js-->
        <script src="js/owl.carousel.min.js"></script>


		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
		
        
        <!--Custom JS-->
        <script src="js/custom.js"></script>
        
		<!--footer start -->
		@include('footer')
		<!--footer end -->

    </body>
	
</html>