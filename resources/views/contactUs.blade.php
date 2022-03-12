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
                     <!-- ##### Contact Area Info Start ##### -->
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
                                    <p><span>Location:</span>  Kuching, Sarawak, Malaysia</p>
                                    <p><span>Email:</span> <a href="mailto:anniepeksf@gmail.com"> anniepeksf@gmail.com</a></p>
                                    <p><span>Open hours:</span> Mon - Sun: 8 AM to 9 PM</p>
                                    <p><span>Happy hours:</span> Sat: 2 PM to 4 PM</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ##### Contact Area Info End ##### -->

                <!-- ##### Contact Area Start ##### -->
                <!-- <section class="contact-area">
                    <div class="container">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-12 col-lg-5"> -->
                                <!-- Section Heading -->
                                <!-- <div class="section-heading">
                                    <h2>GET IN TOUCH</h2>
                                    <p>Send us a message, we will call back later</p>
                                </div> -->
                                <!-- Contact Form Area -->
                                <!-- <div class="contact-form-area mb-100">
                                    <form action="#" method="post">
                                        <div class="row">
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="contact-name" placeholder="Your Name">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="form-group">
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
                                            <div class="col-12">
                                                <button type="submit" class="btn alazea-btn mt-15">Send Message</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div> -->

                            <!-- <div class="col-12 col-lg-6"> -->
                                <!-- Google Maps -->
                                <!-- <div class="map-area mb-100">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d22236.40558254599!2d-118.25292394686001!3d34.057682914027104!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2c75ddc27da13%3A0xe22fdf6f254608f4!2z4Kay4Ka4IOCmj-CmnuCnjeCmnOCnh-CmsuCnh-CmuCwg4KaV4KeN4Kav4Ka-4Kay4Ka_4Kar4KeL4Kaw4KeN4Kao4Ka_4Kav4Ka84Ka-LCDgpq7gpr7gprDgp43gppXgpr_gpqgg4Kav4KeB4KaV4KeN4Kak4Kaw4Ka-4Ka34KeN4Kaf4KeN4Kaw!5e0!3m2!1sbn!2sbd!4v1532328708137" allowfullscreen></iframe>
                                </div> -->
                            </div>
                        </div>
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