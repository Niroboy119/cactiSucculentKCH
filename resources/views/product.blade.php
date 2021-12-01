<?php use Illuminate\Support\Facades\Auth;
	$user=Auth::check();
?>



<?php 
session_start();?>

<?php
use App\Models\Product;
$products=Product::all();
?>

<?php
$product = Product::where([ 'Product_ID' => 6 ]);
?>

<!doctype html>

<style>
	.single-new-arrival-bg img{
		max-height:350px;
		max-width:300px;
		object-fit: cover;
	}

	.Rows {
    display: table;
    width: 100%; /*Optional*/
    table-layout: fixed; /*Optional*/
    border-spacing: 10px; /*Optional*/
	}
	
</style>

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
        <!-- The above 3 meta tags must come first in the head; any other head content must come after these tags -->

        <!--font-family-->
		<link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
        
        <!-- title of site -->
        <title>Cacti Succulent KCH Products</title>

        <!-- For favicon png -->
		<link rel="shortcut icon" type="image/icon" href="logo/favicon.png"/>
       
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
        

    </head>
	
	<body>
		

		<!--welcome-hero start -->
		<header id="home" class="welcome-hero">


			<div id="header-carousel" class="carousel slide carousel-fade" data-ride="carousel">
				<!--/.carousel-indicator -->
				 <ol class="carousel-indicators">
					<li data-target="#header-carousel" data-slide-to="0" class="active"><span class="small-circle"></span></li>
					
					@foreach($products as $product)
					<li data-target="#header-carousel" data-slide-to="1"><span class="small-circle"></span></li>
					@endforeach
				</ol>
				<!-- /ol-->
				<!--/.carousel-indicator -->

				<!--/.carousel-inner -->
				<div class="carousel-inner" role="listbox">

					<!-- .item -->

					<div class="item active">

						<div class="single-slide-item slide1">

						<div class="container">
								<div class="welcome-hero-content">
									<div class="row">
										<div class="col-sm-7">
											<div class="single-welcome-hero">
												<div class="welcome-hero-txt">
													<h4>Cacti collection</h4>
													<h2 style="color:black;">{{$product->Product_Name}}</h2>
													<p>
													{{$product->Product_Desc}}
													</p>
													<div class="packages-price">
														<p>
														RM {{$product->Product_Price}}
														</p>
													</div>
													<button class="btn-cart welcome-add-cart" style="color:white;"onClick="parent.open('{{ url('cart/'.$product->Product_ID) }}')">
														<span class="lnr lnr-plus-circle" ></span>
														add <span>to </span> cart
													</button>
													<button class="btn-cart welcome-add-cart welcome-more-info" onclick="window.location.href='product'">
														more info
													</button>
												</div><!--/.welcome-hero-txt-->
											</div><!--/.single-welcome-hero-->
										</div><!--/.col-->
										<div class="col-sm-5">
											<div class="single-welcome-hero">
												<div class="welcome-hero-img">
													<img src="{{URL::asset('storage/images/products/'.$product->Product_Image)}}" style="max-height:500px">
												</div><!--/.welcome-hero-txt-->
											</div><!--/.single-welcome-hero-->
										</div><!--/.col-->
									</div><!--/.row-->
								</div><!--/.welcome-hero-content-->
							</div><!-- /.container-->

						</div><!-- /.single-slide-item-->

					</div><!-- /.item .active-->
				

					@foreach($products as $product)

					<!-- .item -->

					<div class="item ">

						<div class="single-slide-item slide2">

							<div class="container">
								<div class="welcome-hero-content">
									<div class="row">
										<div class="col-sm-7">
											<div class="single-welcome-hero">
												<div class="welcome-hero-txt">
													<h4>Cacti collection</h4>
													<h2 style="color:black;">{{$product->Product_Name}}</h2>
													<p>
													{{$product->Product_Desc}}
													</p>
													<div class="packages-price">
														<p>
														RM {{$product->Product_Price}}
														</p>
													</div>
													<button class="btn-cart welcome-add-cart" style="color:white;"onClick="parent.open('{{ url('cart/'.$product->Product_ID) }}')">
														<span class="lnr lnr-plus-circle" ></span>
														add <span>to </span> cart
													</button>
													<button class="btn-cart welcome-add-cart welcome-more-info" onclick="window.location.href='product'">
														more info
													</button>
												</div><!--/.welcome-hero-txt-->
											</div><!--/.single-welcome-hero-->
										</div><!--/.col-->
										<div class="col-sm-5">
											<div class="single-welcome-hero">
												<div class="welcome-hero-img">
													<img src="{{URL::asset('storage/images/products/'.$product->Product_Image)}}" style="max-height:500px">
												</div><!--/.welcome-hero-txt-->
											</div><!--/.single-welcome-hero-->
										</div><!--/.col-->
									</div><!--/.row-->
								</div><!--/.welcome-hero-content-->
							</div><!-- /.container-->

						</div><!-- /.single-slide-item-->

					</div><!-- /.item .active-->
					@endforeach

					
				</div><!-- /.carousel-inner-->

			</div><!--/#header-carousel-->
		</header><!--/.welcome-hero-->


		<!--populer-products start -->
		<section id="populer-products" class="populer-products">
			<div class="container">
				<div class="populer-products-content">
					<div class="row">
						<div class="col-md-3">
							<div class="single-populer-products">
								<div class="single-populer-product-img mt40">
									<img src="images/collection/pcacti2.png" style="max-height:125px;">
								</div>
								<h2><a href="#">Pots</a></h2>
								<div class="single-populer-products-para">
									<p>Pots of the Highest Quality</p>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="single-populer-products">
								<div class="single-inner-populer-products">
									<div class="row">
										<div class="col-md-4 col-sm-12">
											<div class="single-inner-populer-product-img">
											<img class="single-populer-product-img" src="images/collection/pcacti1.png" style="max-height:800px; padding-top:35px;">
											</div>
										</div>
										<div class="col-md-8 col-sm-12">
											<div class="single-inner-populer-product-txt">
												<h2>
													<a href="#">
														Plants <span>and</span> Succulents
													</a>
												</h2>
												<p>
													We sell to our customers plants we believe in. No error is made in preparation and no limitation is placed in execution.  
												</p>
												<div class="populer-products-price">
													<h4>Sales Start from <span>RM 15.00</span></h4>
												</div>
												<button class="btn-cart welcome-add-cart populer-products-btn" onclick="{{ url('cart/'.$product->Product_ID) }}">
													discover more
												</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="single-populer-products">
								<div class="single-populer-products">
									<div class="single-populer-product-img">
									<img src="images/collection/pcacti3.png" style="max-height:150px; padding-top:70px" >
									</div>
									<h2><a href="#">Soils</a></h2>
									<div class="single-populer-products-para">
										<p>Soils of the Highest Grade </p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div><!--/.container-->

		</section><!--/.populer-products-->
		<!--populer-products end-->

		<!--new-arrivals start -->
		<section id="new-arrivals" class="new-arrivals">
			<div class="container">
				<div class="section-header">
					<br>
					<br>

					<h2>All Products</h2>

				</div><!--/.section-header-->
				<div class="new-arrivals-content">
					<div class="Row">

						@foreach($products as $product)
							<div class="single-new-arrival" style="float:left; padding:8px;">
								<div class="single-new-arrival-bg">
									<img src="{{URL::asset('storage/images/products/'.$product->Product_Image)}}" alt="new-arrivals images">
									<div class="single-new-arrival-bg-overlay"></div>
									<div class="new-arrival-cart">
										
									<!-- <p 
									class="btn-holder"><a href="javascript:void(0);" data-id="{{$product->Product_ID}}" 
										class="btn btn-warning btn-block text-center add-to-cart" role="button">Add to cart</a>
                                <i class="fa fa-circle-o-notch fa-spin btn-loading" style="font-size:24px; display: none"></i>
                            </p> -->
							<p>
											<span class="lnr lnr-cart"></span>
											<a href="{{ url('cart/'.$product->Product_ID) }}" role="button">add <span>to </span> cart</a>
										</p>
										<p class="arrival-review pull-right">
											<span class="lnr lnr-heart"></span>
											<span class="lnr lnr-frame-expand"></span>
										</p>
									</div>
								</div>
								<h4><a href="#">{{$product->Product_Name}}</a></h4>
								<p class="arrival-product-price">RM {{$product->Product_Price}}</p>
							</div>
						@endforeach

    <!-- <script type="text/javascript">
        $(".add-to-cart").click(function (e) {
            e.preventDefault();

            var ele = $(this);

            ele.siblings('.btn-loading').show();

            $.ajax({
                url: '{{ url('cart') }}' + '/' + ele.attr("data-id"),
                method: "get",
                data: {_token: '{{ csrf_token() }}'},
                dataType: "json",
                success: function (response) {

                    ele.siblings('.btn-loading').hide();

                    $("span#status").html('<div class="alert alert-success">'+response.msg+'</div>');
                    $("#header-bar").html(response.data);
                }
            });
        });
    </script> -->
						
					</div>
				</div>		
			</div><!--/.container-->
		
		</section><!--/.new-arrivals-->
		<!--new-arrivals end -->
	
		<!-- clients end -->
		
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


	</body>

	@include('footer')


        
    
	
</html>