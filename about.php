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
						<a href="index.php" class="site-logo"><img src="img/logo2.png" alt=""></a>
						<div class="nav-switch">
							<i class="fa fa-bars"></i>
						</div>
						<ul class="main-menu">
							<li><a href="index.php">Home</a></li>
							<li><a href="categories.php">FEATURED LISTING</a></li>
							<li><a href="about.php"><u>ABOUT US</u></a></li>
							<li><a href="contact.php">Contact</a></li>
						</ul>
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
			<a href="index.php"><i class="fa fa-home"></i>Home</a>
			<span><i class="fa fa-angle-right"></i>About us</span>
		</div>
	</div>

	<!-- page -->
	<section class="page-section">
		<div class="container">
			<img class="mb-5" src="img/about.jpg" alt="">
			<div class="row about-text">
				<div class="section-title text-center">
					<h5>ABOUT US</h5>
					<p align="justify">Sofia Properties was established in 2010 and is based in the City of Sta. Rosa, Laguna. The company is involved in real estate trading, renovation of pre-owned houses and recently, construction of new houses as well. Since 2010, the company has already renovated and constructed many properties around the Sta. Rosa City area and the neighbouring towns and cities.</p>
				</div>
			</div>
		</div>
		
		<hr><br>	

		<!-- Team section -->
		<section class="team-section spad pb-0">
			<div class="container">
				<div class="section-title text-center">
					<h3>OUR FINISHED PROJECTS</h3>
					<p>Here you can see our finished projects and successfully sold or rented properties</p>
				</div>
            <div class="row">
            <?php  
                while ($finished_project  = mysqli_fetch_object($result)){
            ?>
				<div class="col-lg-4 col-md-6">
					<!-- feature -->
					<div class="feature-item">
						<div class="feature-pic set-bg" data-setbg="admin/finished_project/upload/<?php echo $finished_project->image; ?>">
						</div>
						<div class="feature-text">
							<div class="text-center feature-title">
								<p><i class="fa fa-map-marker"></i> <?php echo $finished_project->location; ?></p>
							</div>
							<div class="room-info-warp">
								<div class="room-info">
									<div class="rf-left">
										<p><i class="fa fa-th-large"></i> <?php echo $finished_project->lotsize; ?> sqm</p>
										<p><i class="fa fa-th-large"></i> <?php echo $finished_project->floorarea; ?> sqm</p>
									</div>
								</div>
							</div>
						</div>  
                    </div>  
                </div>
                <?php } ?>
            </div>
			</div>
		</section>
		<!-- Team section end-->
	</section>
	<!-- page end -->

	<!-- Footer section -->
<?php include'footer.php';?>