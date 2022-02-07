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

<?php
    //database connection
    $conn = mysqli_connect("localhost","root","","sofiapro_housinguser");
    //fetching data from database
    $result = mysqli_query($conn, "SELECT * FROM propertys");

?>
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
						<a href="index.php" class="site-logo"><img src="img/logo3.png" alt=""></a>
						<div class="nav-switch">
							<i class="fa fa-bars"></i>
						</div>
						<ul class="main-menu">
							<li><a href="index.php">Home</a></li>
							<li><a href="categories.php"><u>FEATURED LISTING</u></a></li>
							<li><a href="about.php">ABOUT US</a></li>
							<li><a href="contact.php">Contact</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</header>
	<!-- Header section end -->


	<!-- Page top section -->
	<section class="page-top-section set-bg" data-setbg="img/page-top-bg.jpg">
		<div class="container text-white"></div>
	</section>
	<!--  Page top end -->

	<!-- Breadcrumb -->
	<div class="site-breadcrumb">
		<div class="container">
			<a href="index.html"><i class="fa fa-home"></i>Home</a>
			<span><i class="fa fa-angle-right"></i>Featured Listings</span>
		</div>
	</div>


	<!-- page -->
   <section class="page-section categories-page">
		<div class="container">
            <div class="row">
            <?php  
                while ($propertys = mysqli_fetch_object($result)){
            ?>
				<div class="col-lg-4 col-md-6">
					<!-- feature -->
					<div class="feature-item">
						<div class="feature-pic set-bg" data-setbg="admin/upload/<?php echo $propertys->image; ?>">
							<div class="rent-notic"> <?php echo $propertys->description; ?></div>
						</div>
						<div class="feature-text">
							<div class="text-center feature-title">
								<h5><?php echo $propertys->title; ?></h5>
								<p><i class="fa fa-map-marker"></i> <?php echo $propertys->location; ?></p>
							</div>
							<div class="room-info-warp">
								<div class="room-info">
									<div class="rf-left">
										<p><i class="fa fa-th-large"></i> <?php echo $propertys->lotsize; ?> sqm</p>
										<p><i class="fa fa-bed"></i><?php echo $propertys->bedrooms; ?> Bedrooms</p>
									</div>
									<div class="rf-right">
										<p><i class="fa fa-car"></i> <?php echo $propertys->garage; ?> Garages</p>
										<p><i class="fa fa-bath"></i> <?php echo $propertys->bathrooms; ?> Bathrooms</p>
									</div>
								</div>
	                           <div class="room-info">
    								<div class="rf-left">
    										<p>Price: ₱ <?php echo $propertys->price; ?></p>
    									</div>
									</div>
								</div>
							</div>
							<a href="contact.php" class="room-price">More Details</a>
						</div>  
                    </div>  
                 <?php } ?>
              </div>
            </div>
        </div>    
    </section>  
	<!-- page end -->


	<!-- Footer section -->
<?php include'footer.php';?>