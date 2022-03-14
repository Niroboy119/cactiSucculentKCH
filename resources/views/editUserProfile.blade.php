<?php use Illuminate\Support\Facades\Auth;
use App\Models\User;
	$user=Auth::check();
    $id=Auth::id();
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
                    <h2><br>Edit Profile</h2>
                    <br>
                    <h3 style="color: #32CD32;"> Enter new details to update </h3>
                </div><!--/.section-header-->
                <br>
                <br>
                <br>
				<form action="updateUser/{{Auth::id()}}" method="POST" enctype="multipart/form-data">
				{{ csrf_field() }}
                <div class="row gutters-sm">
            		<div class="col-md-12" style="margin-top:25px">
              			<div class="card mb-3">
							<div class="card-body">
							<div class="row">
								<div class="col-sm-3">
								<h6 class="mb-0">Full Name</h6>
								</div>
								<div class="col-sm-9 text-secondary">
								<input id="name" name="name" type="text" class="form-control" value="{{Auth::user()->name}}">
								</div>
							</div>
							<hr>
								<div class="row">
									<div class="col-sm-3">
									<h6 class="mb-0">Email</h6>
									</div>
									<div class="col-sm-9 text-secondary">
									<input id="email" name="email" type="email" class="form-control" value="{{Auth::user()->email}}">
									</div>
								</div>
								<hr>
								<div class="row">
									<div class="col-sm-3">
									<h6 class="mb-0">Phone Number</h6>
									</div>
									<div class="col-sm-9 text-secondary">
									<input id="cust_phone_number" name="cust_phone_number" type="text" class="form-control" value="{{Auth::user()->cust_phone_number}}">
									</div>
								</div>
								<hr>
								<div class="row">
									<div class="col-sm-3">
									<h6 class="mb-0">Home Address</h6>
									</div>
									<div class="col-sm-9 text-secondary">
									<input id="cust_address" name="cust_address" type="text" class="form-control" value="{{Auth::user()->cust_address}}">
									</div>
								</div>
								<hr>
                  		<div class="row">
                    <div class="col-sm-3">
                            <button type="submit" style="border-color:#32CD32; background:#32CD32;float:center;" class="btn btn-primary btn-block text-uppercase">Edit Profile</button>
                    </div>
                    <br><br><br><br>
                  </div>
                </div>
              </div>
			  
			</form>
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