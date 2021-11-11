<?php include 'header.php'?>
<?php use App\Models\Product;
    $products=Product::all();?>
<!doctype html>
<html class="no-js" lang="en">

    <head>
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
                    <h2><br><br><br>Shopping Cart</h2>
                </div><!--/.section-header-->
                <div class="small-container cart-page">
                    <table>
                        <tr>
                            <th>Product</th>
                            <th>Item Quantity</th>
                            <th>Subtotal</th>
                        </tr>


                        @if(session('cart'))
                            @foreach(session('cart') as $id=>$details)
                        <tr>
                            <td>
                                <div class="items-info">
                                    <div class="item-image">
                                        <img src="images/collection/cacti1.jpg" alt="cart images">
                                    </div>
                                    <div class="items-details">
                                        <div class="items-name">
                                            <small>Name: {{$details['Product_Name']}}</small><br>
                                        </div>
                                        <div class="items-description">
                                            <small>Description: {{$details['Product_Desc']}}</small><br>
                                        </div>
                                        <div class="items-price">
                                            <small>Price: RM{{$details['Product_Price']}}</small>
                                        </div>
                                        <br>
                                        <div class="items-removal">
                                            <button class = "btn btn-info btn-sm update-cart" data-id="{{ $id }}">
                                                <i class="fa fa-refresh"></i>
                                            </button>
                                        
                                            <button class = "btn btn-danger btn-sm remove-from-cart" data-id="{{ $id }}">
                                                Remove
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </td>
                                <div class="items-quantity">
                                    <td><input type="number" value="{{ $details['Product_Quantity'] }}"></td>
                                </div>
                        </tr>

                        @endforeach
                        @endif

                    </table>

                    <div class="totals">
                        <div class="totals-item totals-item-total">
                            <label>Total</label>
                            <div class="totals-value" id="cart-total">
                                RM 145.00
                            </div>
                        </div>
                    </div>
                    <button class="checkout">Checkout</button>

                    @section('scripts')

                        <script type="text/javascript">

                            $(".update-cart").click(function (e) {
                                    e.preventDefault();

                                    var ele = $(this);

                                        $.ajax({
                                            url: '{{ url('update-cart') }}',
                                            method: "patch",
                                            data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantity: ele.parents("tr").find(".Product_Quantity").val()},
                                            success: function (response) {
                                                window.location.reload();
                                            }
                                        });
                                    });
                                    $(".remove-from-cart").click(function (e) {
                                        e.preventDefault();

                                        var ele = $(this);

                                        if(confirm("Are you sure?")) {
                                            $.ajax({
                                                url: '{{ url('remove-from-cart') }}',
                                                method: "DELETE",
                                                data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                                                success: function (response) {
                                                    window.location.reload();
                                                }
                                            });
                                        }
                                    });
                            </script>

                    @endsection

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
		<?php include 'footer.php'?>
		<!--footer end -->

    </body>
	
</html>