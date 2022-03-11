<?php use Illuminate\Support\Facades\Auth;
	$user=Auth::check();
    // $userProfile=User::where(['id'=>$id]);
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
    <section id="user-profile" class="user-profile">
            <div class="container">
                <div class="section-header">
                    <h2><br>My Profile</h2>
                </div><!--/.section-header-->
                <div class="carousel-inner" role="listbox">
                    <div>
                    @if(Auth::check())
                    <br>
                    <!-- <div class="col-sm-3">
							<div class="homepage-products">
								<div class="homepage-products-bg" style="border-radius:50%;">
									<img src="images/homepage/bgimage10.jpeg">
								</div>  
							</div>
					</div> This section is for the profile picture. -->
                    <br>
                    <br>


                    <!-- Basic Information -->
                    <div style="border-style:groove;border-width:2px;border-radius:10px;height:140px;">
                    <h1 style="margin:10px 0px 0px 10px;">Basic Information</h1>
                    <br>

                    <!-- <h2 style="text-align:left; font-size: 18px; display:inline; margin-left:10px;"> Name: </h2> <input style="text-align:left; font-size: 18px; display:inline; margin-left:10px;" type="text" name="" placeholder="{{Auth::user()->name}}"> -->
                    <h2 style="text-align:left; font-size: 18px; display:inline; margin-left:10px;"> Name: </h2><h2 style="display:inline; color: #32CD32;">{{Auth::user()->name}}</h2> <h2 style=" text-align:left; display:inline; color: #32CD32;"><a style=" display:inline; color: #aeaeae; font-size:14px" href="{{ route('logout') }}" onclick="event.preventDefault();
															document.getElementById('logout-form').submit();">&nbsp;&nbsp;&nbsp;edit</a></h2>
                    <br>
                    <br>
                    <h2 style="text-align:left; font-size: 18px; display:inline; margin:10px 0px 10px 10px;"> Home Address: </h2><h2 style="display:inline; color: #32CD32; font-size: 18px;">{{Auth::user()->cust_address}} </h2> <h2 style=" text-align:left; display:inline; color: #32CD32;"><a style=" display:inline; color: #aeaeae; font-size:14px" href="{{ route('logout') }}" onclick="event.preventDefault();
															document.getElementById('logout-form').submit();">&nbsp;&nbsp;&nbsp;edit</a></h2>
                    <br>
                    </div>
                    <!--  -->

                    <br>

                    <!-- Contact Information -->
                    <div style="border-style:groove;border-width:2px;border-radius:10px;height:140px;">
                    <h1 style="margin:10px 0px 0px 10px;">Contact Information<h1>
                    <br>
                    <h2 style="text-align:left; font-size: 18px; display:inline; margin-left:10px;"> Email Address: </h2><h2 style="display:inline; color: #32CD32; font-size: 18px">{{Auth::user()->email}}</h2> <h2 style=" text-align:left; display:inline; color: #32CD32;"><a style=" display:inline; color: #aeaeae; font-size:14px" href="{{ route('logout') }}" onclick="event.preventDefault();
															document.getElementById('logout-form').submit();">&nbsp;&nbsp;&nbsp;edit</a></h2>
                    <br>
                    <br>
                    <h2 style="text-align:left; font-size: 18px; display:inline; margin:10px 0px 10px 10px;"> Phone Number: </h2><h2 style="display:inline; color: #32CD32;">{{Auth::user()->cust_phone_number}}</h2> <h2 style=" text-align:left; display:inline; color: #32CD32;"><a style=" display:inline; color: #aeaeae; font-size:14px" href="{{ route('logout') }}" onclick="event.preventDefault();
															document.getElementById('logout-form').submit();">&nbsp;&nbsp;&nbsp;edit</a></h2>
                    </div>
                    <!--  -->
                    
                    
                    <br>
                    <div>
                    <a href="/editUserProfile">
                        <button style="border-color:#32CD32; background:#32CD32;" class="btn btn-primary btn-block text-uppercase">Edit Profile</button>
                    </a>
                    </div>
                    <br>
                    <div>
                                            <h2 style=" text-align:left; display:inline; color: #32CD32;"><a style=" text-align:left; display:inline; color: #32CD32; font-size:18px" href="{{ route('logout') }}" onclick="event.preventDefault();
															document.getElementById('logout-form').submit();">Logout</a></h2>
                        <a href></a>
                    </div>
                    <br>
                    <br>
                    @endif
                        <br>							
                    </div>
                </div>	
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
		
        @include('footer')
        <!--Custom JS-->
        <script src="js/custom.js"></script>
	</body>
</html>