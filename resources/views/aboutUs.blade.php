<?php use Illuminate\Support\Facades\Auth;
	$user=Auth::check();
?>

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
        <title>About Us</title>

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
    <section id="about-us" class="about-us">
        <div class="container">
                <div class="section-header">
                    <h2 style="color:#32CD32; font-size: 50px;"><br>About Us</h2>
                </div><!--/.section-header-->
                <div class="carousel-inner" role="listbox">
                    <div>
                        <br>
                        <br>
                        <br>
                        <p style="color:black; text-align:center; font-size:30px;">Cacti Succulent KCH is a home-based business with 30 years of experience in Kuching.</p>
                        <p style="color:black; text-align:center; font-size:30px;">We are passionate about growing succulents!</p>
                        <br>
                        <br>
                        <br>							
                    </div>
                </div>	
        </div>
        <div class="container">
            <div class="row">
                <div class="description-area section-padding-100-0">
                        <!-- Description Benefits Area -->
                        <div class="col-12 col-sm-6 col-lg-3">
                            <div class="description-benefits-area text-center mb-100">
                                <img src="images/about/b1.png">
                                <h5><br>Quality Product</h5>
                                <p>We provided the best quality pots, plants, and soils in Kuching.<p>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6 col-lg-3">
                            <div class="description-benefits-area text-center mb-100">
                                <img src="images/about/b2.png">
                                <h5><br>Prefect Service</h5>
                                <p>Our specialties lie in the natural setting, and we are primarily experts in selling luscious cacti, various succulent plants, and other plant-like products.<p>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6 col-lg-3">
                            <div class="description-benefits-area text-center mb-100">
                                <img src="images/about/b3.png">
                                <h5><br>100% Natural</h5>
                                <p>We occupy a beautiful natural nursery and garden center, offering extravagant cacti and other such succulents.<p>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6 col-lg-3">
                            <div class="description-benefits-area text-center mb-100">
                                    <img src="images/about/b4.png">
                                    <h5><br>Environmentally Friendly</h5>
                                    <p>Our residence feeds visuals of mass and size as it covers quite a large piece of land which leaves customers engaged, lingering around the location for hours on end, all in the spectacle of awe.<p>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class = "about us button">
                <button class="our-product" onclick="window.location.href='/product'">Our Product</button>
                <button class="about-contact" onclick="window.location.href='/contactUs'">Contact Us</button>
        </div>
    </section>

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