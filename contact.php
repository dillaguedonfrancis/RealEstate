<!DOCTYPE html>
<html lang="en">
<head>
	<title>Sofia Properties</title>
	<meta charset="UTF-8">
	<meta name="description" content="LERAMIZ Landing Page Template">
	<meta name="keywords" content="LERAMIZ, unica, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->   
	<link href="img/favicon.ico" rel="shortcut icon"/>

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/animate.css"/>
	<link rel="stylesheet" href="css/owl.carousel.css"/>
	<link rel="stylesheet" href="css/style.css"/>


	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>
	
	<!-- Header section -->
	<header class="header-section">
		<div class="header-top">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 header-top-left">
						<div class="top-info">
							<i class="fa fa-phone"></i>
							0945 493 4091
						</div>
						<div class="top-info">
							<i class="fa fa-envelope"></i>
							sofia_properties@hotmail.ph
						</div>
					</div>
					<div class="col-lg-6 text-lg-right header-top-right">
						<div class="top-social">
							<a href="https://www.facebook.com/sofiaproperties/"><i class="fa fa-facebook"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="site-navbar">
						<a href="index.php" class="site-logo"><img src="img/logo2.png" alt=""></a>
						<div class="nav-switch">
							<i class="fa fa-bars"></i>
						</div>
						<ul class="main-menu">
							<li><a href="index.php">Home</a></li>
							<li><a href="categories.php">FEATURED LISTING</a></li>
							<li><a href="about.php">ABOUT US</a></li>
							<li><a href="contact.php"><u>Contact</u></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</header>
	<!-- Header section end -->


	<!-- Page top section -->
	<section class="page-top-section set-bg" data-setbg="img/page-top-bg.jpg">
		<div class="container text-white">
		</div>
	</section>
	<!--  Page top end -->

	<!-- Breadcrumb -->
	<div class="site-breadcrumb">
		<div class="container">
			<a href="index.php"><i class="fa fa-home"></i>Home</a>
			<span><i class="fa fa-angle-right"></i>Contact</span>
		</div>
	</div>

	<!-- page -->
	<section class="page-section blog-page">
		<div class="container">
			<div class="well"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d123729.24164712068!2d121.01818299214227!3d14.280097731482876!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397d9b37741cb8b%3A0x6190465ce35ff477!2sSanta%20Rosa%2C%20Laguna!5e0!3m2!1sen!2sph!4v1584283569361!5m2!1sen!2sph" width="1140" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe></div>
			<div class="contact-info-warp">
				<p><i class="fa fa-map-marker"></i>Sta. Rosa Laguna</p>
				<p><i class="fa fa-envelope"></i>sofia_properties@hotmail.ph</p>
				<p><i class="fa fa-phone"></i>0945 493 4091</p>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<img src="img/contact.jpg" alt="">
				</div>
				<div class="col-lg-6">
					<div class="contact-right">
						<div class="section-title">
							<h3>Get in touch</h3>
							<p>Browse houses and flats for sale and to rent in your area</p>
						</div>
						<form class="contact-form" method="post">
							<div class="row">
								<div class="col-md-6">
									<input type="text" name="name" class="form-control" placeholder="Full Name" required>
								</div>
								<div class="col-md-6">
									<input type="email" name="email" class="form-control" placeholder="Email Address" required>
								</div>
								<div class="col-md-12">
									<textarea rows="6" name="msg" class="form-control" placeholder="Message" ></textarea required>
									 
									 <button type="submit" class="btn btn-success" name="submit">Send Message</button><br><br>
								
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- page end -->

	<!-- Footer section -->

	<!-- Footer section end -->
                                        
	<!--====== Javascripts & Jquery ======-->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/masonry.pkgd.min.js"></script>
	<script src="js/magnific-popup.min.js"></script>
	<script src="js/main.js"></script>

	<!-- load for map -->
	<script src="https://goo.gl/maps/zopsYgS5PSjd9nhu7"></script>
	<script src="js/map.js"></script>

    <!-- message -->
    <script type="text/javascript">
	$(function(){
		$('#send_message_btn').click(function(e){

			var valid = this.form.checkValidity();

			if(valid){

			var name 	= $('#name').val();
			var email 		= $('#email').val();
			var msg 	= $('#msg').val();
			
				e.preventDefault();	

				$.ajax({
					type: 'POST',
					url: 'send_script.php',
					data: {name: name,email: email,msg: msg},
					success: function(data){
					Swal.fire({
								'title': 'Successful',
								'text': Message Sent,
								'type': 'success'
								})
							
					},
					error: function(data){
						Swal.fire({
								'title': 'Errors',
								'text': 'There were errors while sending message.',
								'type': 'error'
								})
					}
				});
			}else{
			}
		});		
	});
	
	
        <?php
          if(isset($_POST['submit'])){
            $name=$_POST['name'];
            $email=$_POST['email'];
            $msg=$_POST['msg'];
        
            $to='gr3capstone@gmail.com'; // Receiver Email ID, Replace with your email ID
            $subject='Form Submission';
            $message="Name :".$name."\n"."Wrote the following :"."\n\n".$msg;
            $headers="From: ".$email;
        
            if(mail($to, $subject, $message, $headers)){
              echo "<h1>Sent Successfully! Thank you"." ".$name.", We will contact you shortly!</h1>";
              header('Location: contact.php');
            }
            else{
              echo "Something went wrong!";
            }
          }
        ?>
        
</script>

<?php include'footer.php';?>
