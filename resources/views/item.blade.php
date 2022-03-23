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
	
	.expand{
		margin-right: 12px;
		
	}

/* Position the "next button" to the right */
.nextSSE {
  right: 0;
  border-radius: 3px 0 0 3px;
}

.welcome-hero-img{
	margin-top:-170px;
	margin-bottom:-170px;
	transition: 0.5s all ease-in-out;


}



.primaryPic{

	position: relative; /* Declared position allows for location changes */
    top: -462px; /* Moves the image 2px closer to the top of the page */
	right:-400px;
	transition: 0.5s all ease-in-out;

}

.secondaryPic{

position: relative; /* Declared position allows for location changes */
top: -282px; /* Moves the image 2px closer to the top of the page */
right:-400px;
transition: 0.5s all ease-in-out;

}

.overlay {
  position: absolute; 
  bottom: 0; 
  background: rgb(0, 0, 0);
  background: rgba(0, 0, 0, 0.5); /* Black see-through */
  color: #f1f1f1; 
  width: 29%;
  transition: .5s ease;
  opacity:0;
  color: white;
  font-size: 20px;
  text-align: center;
}

.overlay2 {
  position: absolute; 
  bottom: 0; 
  background: rgb(0, 0, 0);
  background: rgba(0, 0, 0, 0.5); /* Black see-through */
  color: #f1f1f1; 
  width: 100%;
  transition: .5s ease;
  opacity:0;
  color: white;
  font-size: 20px;
  text-align: center;
}

.primaryPic:hover .overlay,.secondaryPic:hover .overlay{
	opacity: 1;
}








.def {
	/* top: -84560px; Moves the image 2px closer to the top of the page */
	position: relative;
  text-align: center;
  color: white;
}

.centered {
  position: absolute;
  top: 50%;
  left: 50%;
  color: white;

  transform: translate(-50%, -50%);
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
				 
					@foreach($products as $product)
					@if($product->Product_ID == $id)

					
				
				<!-- /ol-->
				<!--/.carousel-indicator -->

				<!--/.carousel-inner -->
				<div class="carousel-inner" role="listbox">

					<!-- .item -->

					<div class="item active ">


						<div class="container">
						<div class="slideshow-container">
								<div class="welcome-hero-content">
									<div class="row">
									<div class="col-sm-7">
								 <div class="single-welcome-hero">

												<div class="welcome-hero-img">
													<img src="{{URL::asset('storage/images/products/'.$product->Product_Image)}}" style="width:390px;height:500px;">
													<div class="overlay2">Picture #1</div>

												</div>
											</div>
											<div class=" welcome-hero-img primaryPic">
													<img src="/images/populer-products/purpledream.jpg" style="width:190px;height:240px;"/>
													<div class="overlay">Picture #2</div>

												</div>
												
											<div class="welcome-hero-img secondaryPic">
													<img src="/images/populer-products/images.jpg" style="width:190px;height:250px;">
													<div class="overlay">Picture #3</div>

												</div>
										</div>
										<div class="col-sm-5">
											<div class="single-welcome-hero">
												<div class="welcome-hero-txt">
													<h4>Cacti collection</h4>
													<h2 style="color:black;">{{$product->Product_Name}}</h2>
													<p>
													{{$product->Product_Desc}}
													</p>
													<div>
														<h3 style="font-size:33px;color:#32CD32;">
														RM {{$product->Product_Price}}
														</h3>
													</div>
													<button class="btn-cart welcome-add-cart" style=" width:550px;color:white;"onClick="parent.open('{{ url('cart/'.$product->Product_ID) }}')">
														<span class="lnr lnr-plus-circle" ></span>
														add <span>to </span> cart
													</button>
													
													
												</div><!--/.welcome-hero-txt-->
											</div><!--/.single-welcome-hero-->
										</div><!--/.col-->
										
									</div><!--/.row-->
									@endif
									@endforeach
								</div><!--/.welcome-hero-content-->
							</div><!-- /.container-->

						</div><!-- /.single-slide-item-->

					</div><!-- /.item .active-->

					
				</div><!-- /.carousel-inner-->

			</div><!--/#header-carousel-->

		
		</header><!--/.welcome-hero-->
		<div class="def">
					<img src="/images/homepage/bgimage40Pilgrim.jpg"/>
				<div class="centered">
					<a style="color:white; font-size:76px;"href="/product">Shop More</a>
				</div>
		</div>



		
		<!--new-arrivals end -->
	
		<!-- clients end -->
		
		<!-- Include all js compiled plugins (below), or include individual files as needed -->

		<script src="/js/jquery.js"></script>
        
        <!--modernizr.min.js-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
		
		<!--bootstrap.min.js-->
        <script src="/js/bootstrap.min.js"></script>
		
		<!-- bootsnav js -->
		<script src="/js/bootsnav.js"></script>

		<!--owl.carousel.js-->
        <script src="/js/owl.carousel.min.js"></script>


		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
		
        
        <!--Custom JS-->
        <script src="/js/custom.js"></script>

		

	</body>

	@include('footer')


        
    
	
</html>