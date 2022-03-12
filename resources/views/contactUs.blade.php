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
    <section id="contact-us" class="contact-us">
            <div class="container">
                <div class="section-header">
                    <h2 style="color:#32CD32; font-size: 50px;"><br>Contact Us</h2>
                </div><!--/.section-header-->
                
                    <div class="carousel-inner" role="listbox">
                        <br>
                        <br>
                        <br>
                        <!-- Contact Area Information Start -->
                        <div class="contact-area-info section-padding-0-100">
                            <div class="container">
                                <div class="row align-items-center justify-content-between">
                                    <!-- Contact Thumbnail -->
                                    <div class="col-12 col-md-6">
                                        <div class="contact-thumbnail">
                                            <img src="images/contact/contact1.jpg" alt="contact thumbnail pic">
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-5">
                                        <!-- Section Heading -->
                                        <div class="section-heading">
                                            <br>
                                            <br>
                                            <h2>CONTACT US</h2>
                                            <p>Any questions? Feel free to contact us. We will provide our best services to solve your concerns!</p>
                                        </div>
                                        <!-- Contact Information -->
                                        <div class="contact-information">
                                            <p><span>Phone:</span> <a href="tel:+60198182384">(+60)19-818-2384</a></p>
                                            <p><span>Location:</span> Kuching Metropolian Area, Kuching, Sarawak, Malaysia</p>
                                            <p><span>Email:</span> <a href="mailto:anniepeksf@gmail.com">anniepeksf@gmail.com</a></p>
                                            <p><span>Open Hours:</span> Mon - Sun: 8am - 5am</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!-- Contact Area Information End -->
                    </div>
                </div>	
            </div>
        </section>

        <!-- Contact Area Start -->
        <section class="contact-area">
            <div class="container">
                <div class="row align-items-center justify-content-between">                                <div class="col-12 col-lg-5">
                    <!-- Section Heading -->
                    <div class="section-heading-touch">
                        <h2>GET IN TOUCH</h2>
                        <p>Send us a message, we will call back later</p>
                    </div>
                        <!-- Contact Form Area -->
                        <div class="contact-form-area mb-100">
                            <form action="#" method="post">
                            <div class="row">
                                <div class="col-12 col-md-7">
                                    <div class="form-group-1">
                                        <input type="name" class="form-control" id="contact-name" placeholder="Your Name">
                                    </div>
                                </div>
                                <div class="col-12 col-md-5">
                                    <div class="form-group-2">
                                        <input type="email" class="form-control" id="contact-email" placeholder="Your Email">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="contact-subject" placeholder="Subject">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea class="form-control" name="message" id="message" cols="30" rows="10" placeholder="Message"></textarea>
                                    </div>
                                </div>
                                <div class="send-message">
                                    <button type="submit" class="btn mt-15">Send Message</button>
                                    <!-- <button class="our-product" onclick="window.location.href='/product'">Our Product</button> -->
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-12 col-lg-6">
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <!-- Google Maps -->
                            <div class="map-area mb-100">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.4560447005656!2d110.31118131475417!3d1.4972899989080632!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x25b31bf5fe5b2d95!2zMcKwMjknNTAuMiJOIDExMMKwMTgnNDguMSJF!5e0!3m2!1sen!2smy!4v1647103966368!5m2!1sen!2smy" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
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
		
        
        <!--Custom JS-->
        <script src="js/custom.js"></script>
	</body>

	<!--footer start -->
    @include('footer')
	<!--footer end -->
	
</html>