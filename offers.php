<?php
	include_once('conn.php'); 
	include_once('classpackage.php');
	require_once('classhotel.php');
	require_once('classvehicle.php');
	$packobj=new Package;
	$b=array();
	$b=$packobj->getoffer();
?>

<!DOCTYPE html>
<html class="no-js">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>TrippyIndia</title>
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
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

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
							<h1 id="fh5co-logo"><a href="index.php"><i class="icon-airplane"></i>TrippyIndia</a></h1>
							<!-- START #fh5co-menu-wrap -->
							<nav id="fh5co-menu-wrap" role="navigation">
								<ul class="sf-menu" id="fh5co-primary-menu">
									<li class="active"><a href="index.php">Home</a></li>
									<li><a href="about_us.html">About Us</a></li>
									<li><a href="contact.html">Contact Us</a></li>
									<!--li><a href="#" class="fh5co-sub-ddown">Account</a>
										<ul class="fh5co-sub-menu">
											<li><?php //echo "<b>&nbsp;&nbsp;&nbsp;&nbsp;".$_SESSION['google_data']['fname'];?></li>
											<li><a href="viewbdetails.php">Your Booking</a></li>
											<li><a href="glogin/logout.php?logout">Logout</i></a></li>
										</ul>
									</li-->
								</ul>
							</nav>
						</div>
					</div>
				</header>

				<div class="fh5co-hero">
					<div class="fh5co-overlay"></div>
					<div class="fh5co-cover" data-stellar-background-ratio="0.5" style="background-image: url(images/main.jpg);">
						<div class="desc">
							<div class="container">
								<div class="row">
									<div class="col-sm-5 col-md-5">
										<div class="tabulation animate-box">
											<div class="tab-content">
												<div class="row">
													<div class="col-xxs-12 col-xs-12 mt alternate">
														<form action="account.php" method="GET">
															<div class="input-field">
																<input type="text" name="destination" class="form-control" id="from-place" placeholder="Enter Destination"/>
															</div>
															<br>
															<!--input name="destination" type="text" placeholder="Enter Destination Name"--> 
															<section>
																<select id="agileinfo_search" name="agileinfo_search" class="cs-select cs-skin-border">
																	<option value="">Enter budget </option>
																		<?php 
																			class Budget extends Connect
																			{
												                	           	public function display()
																				{								
																			  		$x=new Connect;
																				    $sql = "SELECT * FROM budget order by price asc";
																					$c= $x->getconnect();
																    	            $result = $c->query($sql);
																					if ($result->num_rows > 0)
																					{
																			  			while($row = $result->fetch_assoc()) 
																			  			{
																				 			?>
																							<option value="<?php echo $row['price']?>">within &nbsp &nbsp<?php echo $row['price']; ?></option>
																							<?php 
																			  			}
																			  		}
																			  	}
																		    }
																			$obj=new Budget;
																			$obj->display();
																		?>
																</select>
															</section>
															<br>
															<input type="submit" name="vsub" value="Search" class="btn btn-block">
														</form>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="desc2 animate-box">
										<div class="col-sm-7 col-sm-push-1 col-md-7 col-md-push-1">
											<!--p>HandCrafted by FreeHTML5.co</a></p-->
											<h3>Travel Along With Us</h3>
											<h3>Before you run out of the time</h3>
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
								<h3>New Offers</h3>
								<p>Get to your favourite destination in just 4 steps.</p>
							</div>
						</div>
						<?php
						for($k=0;$k<$b[1];$k++)
                  		{
							$packid=$b[0][$k][0];
	                		?>

							<div class="row">
								<div class="col-md-4 col-sm-6 fh5co-tours animate-box" data-animate-effect="fadeIn">
									<div href="#"><img src="<?php echo $b[0][$k][8]?>" class="img-responsive" alt="img"><br><br><br><br><br><br><br><br>
										<div class="desc" align="center">
											<h3><?php $hid= $b[0][$k][2];
											$hotelobj=new Hotel;
											$y=array();
											$y=$hotelobj->gethotelDetails($hid);
											$star=$y[0][3];
											echo $y[0][2].'<br>';?><span class="price"><?php echo $b[0][$k][1]?></span><img src="images/star<?php echo $star?>.png" width="75" height="20">
											</h3>
											<p><?php $vid= $b[0][$k][3];
												$vehicleobj=new Vehicle;
												$x=array();
												$x=$vehicleobj->getvehicleDetails($vid);?>Vehicle in package:
												<?php echo $x[0][2];?>
											</p>
											<p><?php echo $b[0][$k][7]?> Nights and <?php echo $b[0][$k][6]?> Days.</p>
								   			<p><?php echo $b[0][$k][5]?></p>
											<a class="btn btn-primary btn-outline" href="#" data-toggle="modal" data-target="#<?php echo $packid?>">View Details</a>
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
					</div><br><br><br> 
				</div>

				
				<div id="fh5co-blog-section">
					<div class="container">
						<div class="row">
							<div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
								<h3>How To book package online</h3>
								<p>Get to your favourite destination in just 4 steps.</p>
							</div>
						</div>
					</div>
					<div class="container">
						<div class="row row-bottom-padded-md">
							<div class="col-md-3 col-sm-6 fh5co-tours animate-box" data-animate-effect="fadeIn">
								<div href="#"><img src="images/goa.jpg" alt="Free HTML5 Website Template by FreeHTML5.co" class="img-responsive">
									<div class="desc">
										<center><span class="price">Select Area</span></center>
										
									</div>
								</div>
							</div>
							<div class="col-md-3 col-sm-6 fh5co-tours animate-box" data-animate-effect="fadeIn">
								<div href="#"><img src="images/goa.jpg" alt="Free HTML5 Website Template by FreeHTML5.co" class="img-responsive">
									<div class="desc">
										
										<center><span class="price">Packages</span></center>
								</div>
								</div>
							</div>
							<div class="col-md-3 col-sm-6 fh5co-tours animate-box" data-animate-effect="fadeIn">
								<div href="#"><img src="images/goa.jpg" alt="Free HTML5 Website Template by FreeHTML5.co" class="img-responsive">
									<div class="desc">
										<span></span>
										
										<center><span class="price">Booking</span></center>
									</div>
								</div>
							</div>
							<div class="col-md-3 col-sm-6 fh5co-tours animate-box" data-animate-effect="fadeIn">
								<div href="#"><img src="images/goa.jpg" alt="Free HTML5 Website Template by FreeHTML5.co" class="img-responsive">
									<div class="desc">
										<span></span>
										
										<center><span class="price">Enjoy</span></center>
									</div>
								</div>
							</div>
							<div class="clearfix visible-md-block"></div>
						</div>

						
					</div>
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

	

	</div>
	<!-- END fh5co-page -->

	</div>
	<!-- END fh5co-wrapper -->

	<!-- jQuery -->


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

	<script src="js/SmoothScroll.min.js"></script>  
	<!--script type="text/javascript" src="js/move-top.js"></script-->
	<script type="text/javascript" src="js/easing.js"></script>	
	<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
			
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
				});
			});
	</script>
	<!-- //end-smooth-scrolling -->	  
	<!-- smooth-scrolling-of-move-up -->
	<script type="text/javascript">
		$(document).ready(function() {
		$().UItoTop({ easingType: 'easeOutQuart' });
		});
	</script>
	<script src="js/bootstrap.js"></script>

<?php
if(isset($_GET['vsub']))
{
	$a=$_GET['agileinfo_search'];
	$b=$_GET['destination'];
	if($_GET['agileinfo_search'] or $_GET['destination'])
	{
		echo "<script>window.open('view.php?destination=$b&agileinfo_search=$a','_self')</script>";
	}
	else
	{
		echo "<script>alert('Enter some Field')</script>";
	}
}
?>


</body>
</html>