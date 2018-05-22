<!-- This file is for deleting the desired package from the database-->
<?php
	session_start();
	if(!$_SESSION['Username'])
	{
		header('location:index.php');
	}
?>

<?php 
	include_once('conn.php'); 
	include_once('classpackage.php');
	require_once('classhotel.php');
	require_once('classvehicle.php');
	$packobj=new Package;
	$b=array();
	$var1=$_GET['destination'];
	$var2=$_GET['price'];
	$b=$packobj->displayPackageDetails($var1,$var2);
	if(!$b)
	{
	 echo "<script>alert('sorry!!!! no package available..for your choices')</script>";
			       echo "<script>window.open('admin.php','_self')</script>";
	}
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Travel &mdash; 100% Free Fully Responsive HTML5 Template by FREEHTML5.co</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Template by FREEHTML5.CO" />
	<meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive" />
	<meta name="author" content="FREEHTML5.CO" />

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="favicon.ico">

	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'>
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Superfish -->
	<link rel="stylesheet" href="css/superfish.css">
	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/magnific-popup.css">
	<!-- Date Picker -->
	<link rel="stylesheet" href="css/bootstrap-datepicker.min.css">
	<!-- CS Select -->
	<link rel="stylesheet" href="css/cs-select.css">
	<link rel="stylesheet" href="css/cs-skin-border.css">
	
	<link rel="stylesheet" href="css/style.css">


	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

</head>
<body>
	<div id="fh5co-wrapper">
		<div id="fh5co-page">
			<header id="fh5co-header-section" class="sticky-banner">
				<div class="container">
					<div class="nav-header">
						<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle dark"><i></i></a>
						<h1 id="fh5co-logo"><a href="index.html"><i class="icon-airplane"></i>Travel</a></h1>
						<!-- START #fh5co-menu-wrap -->
						<nav id="fh5co-menu-wrap" role="navigation">
							<ul class="sf-menu" id="fh5co-primary-menu">
								<li class="active"><a href="admin.php">Home</a></li>
								<li><a href="about_us.html">About Us</a></li>
								<li><a href="contact.html">Contact Us</a></li>
								<li><a href="alogout.php">Logout</a></li>
							</ul>
						</nav>
					</div>
				</div>
			</header>
			<!-- end:header-top -->
			<div class="fh5co-hero">
				<div class="fh5co-overlay"></div>
				<div class="fh5co-cover" data-stellar-background-ratio="0.5" style="background-image: url(images/about_main.jpg);">
					<div class="desc">
						<div class="container">
							<div class="row">
								<div class="desc2 animate-box">
									<div class="col-sm-7 col-sm-push-1 col-md-7 col-md-push-1">
										<p>HandCrafted by FreeHTML5.co</a></p>
										<h2>Exclusive Limited Time Offer</h2>
										<h3>Fly to Hong Kong via Los Angeles, USA</h3>
										<!-- <p><a class="btn btn-primary btn-lg" href="#">Get Started</a></p> -->
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div id="fh5co-tours" class="fh5co-section-gray">
				<div class="container">
					<div class="row">
						<div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
							<h3>Available Packages</h3>
						</div>
					</div>
					
					<?php
						for($k=0;$k<$b[1];$k++)
                  		{
							$packid=$b[0][$k][0];
	                		?>
							<div class="row">
								<div class="col-md-4 col-sm-6 fh5co-tours animate-box" data-animate-effect="fadeIn">
									<div href="#">
										<form action="classpackage.php" name="formdelete" method="GET">
											<img src="<?php echo $b[0][$k][8]?>" class="img-responsive" alt="img"><br><br><br><br><br><br><br><br>
											<div class="desc" align="center">
											<h3>
												<?php
													$hid= $b[0][$k][2];
													$hotelobj=new Hotel;
													$y=array();
													$y=$hotelobj->gethotelDetails($hid);
													$star=$y[0][3];
													echo $y[0][2].'<br>';
												?>
												<img src="images/star<?php echo $star?>.png" width="75" height="20">
											</h3>
											
											<h3>
											  	vehicle included:
											  	<?php $vid= $b[0][$k][3];
												$vehicleobj=new Vehicle;
												$x=array();
												$x=$vehicleobj->getvehicleDetails($vid);
												echo $b[0][$k][4]." ". $x[0][2];?>
											</h3><br>
											<h3><?php echo $b[0][$k][7]?> Nights and <?php echo $b[0][$k][6]?> Days.</h3>
											<h3>Rs&nbsp;<?php echo $b[0][$k][5]?>/-</h3><br><br>
											<input type="hidden" name="destination" value="<?php echo $var1 ?>">
											<input type="hidden" name="packid" value="<?php echo $packid ?>">
											<button type="submit" class="btn btn-primary" name="delete">Delete Package</button>
											<a class="btn btn-primary btn-outline" href="#" data-toggle="modal" data-target="#<?php echo $packid?>">View Details</a>
										</form>
									</div>
								</div>
							</div>
							<div class="modal fade" id="<?php echo $packid?>" role="dialog">
    							<div class="modal-dialog">
									<!-- Modal content-->
      								<div class="modal-content">
        								<div class="modal-header">
          									<button type="button" class="close" data-dismiss="modal">&times;</button>
          									<center><b><h3 class="modal-title">Details of Package</h3></b></center>
        								</div>
        								<div class="modal-body">
          									<center><h4><b>Package:&nbsp;</b><?php echo $b[0][$k][6]?> Days and <?php echo $b[0][$k][7]?> Nights</h4>
											<h4><b>Destination Name:&nbsp;</b><?php echo $b[0][$k][1]?></h4>
											<h4><b>Hotel Name:&nbsp;</b><?php echo $y[0][2]?></h4>
											<h4><b>Rooms Provided:&nbsp;</b><?php $a=array();
											$a=$packobj->getpackage_room($packid);?>
											<?php if($a[0][1]!=0) {echo $a[0][1]." "."Single Room"."<br>";}?>
											<?php if($a[0][2]!=0) {echo $a[0][2]." "."Double Room"."<br>";}?>
											<?php if($a[0][3]!=0) {echo $a[0][3]." "."Mini Suite"."<br>";}?>
											</h4>
											<h4><b>Contact Number:&nbsp;</b><?php echo $y[0][4]?></h4>		 
											<h4><b>Vehicle included:&nbsp;</b><?php echo $b[0][$k][4]." ". $x[0][2];?> </h4>		 
											<h4><b>Worth:&nbsp;</b>Rs &nbsp;<?php echo $b[0][$k][5]?>/-</h4></center>
										</div>
									    <div class="modal-footer">
   											<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        								</div>
      								</div>
      							</div>
  							</div>
							<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
							<link rel="stylesheet" href="/resources/demos/style.css">
							<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
							<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
							<script>
								$(document).ready(function(){
								$("#<?php echo $k?>").hide();
								$("#<?php echo $packid ?>").hide();
								$("#bu<?php echo $k ?>").click(function(){
								$("#<?php echo $k?>").show();
								});
								$( function() {
							    $( "#datepicker<?php echo $k?>" ).datepicker();
								} );
								$("#view").click(function(){
								$("#<?php echo $packid?>").show();
								});		
								});
							</script>
						<?php
						}
					?>
					<div class="clearfix"></div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
		<footer>
			<div id="footer">
				<div class="container">
					<div class="row">
						<div class="col-md-6 col-md-offset-3 text-center">
							<p class="fh5co-social-icons">
								<a href="#"><i class="icon-twitter2"></i></a>
								<a href="#"><i class="icon-facebook2"></i></a>
								<a href="#"><i class="icon-instagram"></i></a>
								<a href="#"><i class="icon-dribbble2"></i></a>
								<a href="#"><i class="icon-youtube"></i></a>
							</p>
							<p>Copyright© 2018 <a href="http://www.trippyindia000webhostapp.com/" target="_blank">TrippyIndia</a>. All Rights Reserved.</p>
						</div>
					</div>
				</div>
			</div>
		</footer>

		<script src="js/jquery.min.js"></script>
			<!-- jQuery Easing -->
		<script src="js/jquery.easing.1.3.js"></script>
		<!-- Bootstrap -->
		<script src="js/bootstrap.min.js"></script>
		<!-- Waypoints -->
		<script src="js/jquery.waypoints.min.js"></script>
		<script src="js/sticky.js"></script>

		<!-- Stellar -->
		<script src="js/jquery.stellar.min.js"></script>
		<!-- Superfish -->
		<script src="js/hoverIntent.js"></script>
		<script src="js/superfish.js"></script>
		<!-- Magnific Popup -->
		<script src="js/jquery.magnific-popup.min.js"></script>
		<script src="js/magnific-popup-options.js"></script>
		<!-- Date Picker -->
		<script src="js/bootstrap-datepicker.min.js"></script>
		<!-- CS Select -->
		<script src="js/classie.js"></script>
		<script src="js/selectFx.js"></script>
		<!-- Main JS -->
		<script src="js/main.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				$().UItoTop({ easingType: 'easeOutQuart' });
				
			});
		</script>
		<script src="js/bootstrap.js"></script>
	</body>
</html>

