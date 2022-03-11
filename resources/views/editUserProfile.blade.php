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
                    <br>
                </div><!--/.section-header-->
                <div class="carousel-inner" role="listbox">
                    <div>
                    @if(Auth::check())
                    <!-- Basic Information -->
                    <div style="border-style:groove;border-width:2px;border-radius:10px;height:400px;">
                    <h1 style="margin:10px 0px 0px 10px;">Basic Information</h1>
                    <br>

                    <form action="updateUser/{{Auth::id()}}" method="POST" enctype="multipart/form-data">                  
                        <div class="form-group mb-3 {{$errors->get('email')?'has-error':''}}">
                            <label
                            for="name">Name
                            </label>
                                <input
                                id="name"
                                name="name"
                                type="text"
                                class="form-control validate"
                                value="{{Auth::user()->name}}"
                                />
                            <label
                            for="name">Home Address
                            </label>
                                <input
                                id="cust_address"
                                name="cust_address"
                                type="text"
                                class="form-control validate"
                                value="{{Auth::user()->cust_address}}"
                                />
                                <label
                                for="name">Email
                                </label>
                                    <input
                                    id="email"
                                    name="email"
                                    type="text"
                                    class="form-control validate"
                                    value="{{Auth::user()->email}}"
                                    />
                                    @foreach($errors->get('email') as $error)
                                        <small id="emailhelpblock" style="font-size:15px; color:red;">This email is already taken or is your current email.</small>
                                    @endforeach
                                <label
                                for="name">Phone Number
                                </label>
                                    <input
                                    id="cust_phone_number"
                                    name="cust_phone_number"
                                    type="text"
                                    class="form-control validate"
                                    value="{{Auth::user()->cust_phone_number}}"
                                    />
                                <div class="col-12">
                                    <button type="submit" style="border-color:#32CD32; background:#32CD32;" class="btn btn-primary btn-block text-uppercase">Edit Profile</button>
                                </div>  
                                        {{ csrf_field() }}
                                </div>
                                
                            </form>
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