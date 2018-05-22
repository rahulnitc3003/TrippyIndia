<?php
	include_once 'glogin/gpConfig.php';
	include_once 'glogin/User.php';
	require_once('conn.php');
	$output="";

	if(isset($_GET['code'])){
		$gClient->authenticate($_GET['code']);
		$_SESSION['token'] = $gClient->getAccessToken();
		header('Location: ' . filter_var($redirectURL, FILTER_SANITIZE_URL));
	}

	 if (isset($_SESSION['token'])) {
		$gClient->setAccessToken($_SESSION['token']);
	}

	if($gClient->getAccessToken()) {
		//Get user profile data from google
		$gpUserProfile = $google_oauthV2->userinfo->get();
		
		//Initialize User class
		$user = new User();
		
		//Insert or update user data to the database
	    $gpUserData = array(
	        'oauth_provider'=> 'google',
	        'oauth_uid'     => $gpUserProfile['id'],
	        'fname'    => $gpUserProfile['given_name'],
	        'lname'     => $gpUserProfile['family_name'],
	        'email'         => $gpUserProfile['email'],
	        //'gender'        => $gpUserProfile['gender'],
	        'locale'        => $gpUserProfile['locale'],
	        'picture'       => $gpUserProfile['picture'],
	        'link'          => $gpUserProfile['link']
	    );
	    $userData = $user->checkUser($gpUserData);
		
		//Storing user data into session
		$_SESSION['google_data'] = $userData;
		
		
	    if(!empty($userData)){
	    header('location:account.php');
	       
	}else{
	        echo '<h3 style="color:red">Some problem occurred, please try again.</h3>';
	    }
	} else {
		$authUrl = $gClient->createAuthUrl();
		$output= '<a href="'.filter_var($authUrl, FILTER_SANITIZE_URL).'">User Login</a>';
		$outputlog="";
	}
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
									<li><a href="offers.php"><i class="fa fa-gift" aria-hidden="true"></i>New Offers</a></li>
									<li class="active"><a href="index.php">Home</a></li>
									<li><a href="about_us.html">About Us</a></li>
									<li><a href="contact.html">Contact Us</a></li>
									<li>
										<a href="#" class="fh5co-sub-ddown">Login</a>
										<ul class="fh5co-sub-menu">
											<li><?php echo $output;?></li>
											<li><a href="login.html">Admin Login</a></li>
										</ul>
									</li>
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
															
															<form action="index.php" method="GET">
																<div class="input-field">
																	<input type="text" class="form-control" id="from-place" placeholder="Enter Destination" name="destination"/>
																</div><br>
																<!--input name="destination" type="text" placeholder="Enter Destination Name"--> 
																	<!--select id="agileinfo_search" name="agileinfo_search"-->
																	<section>
																		<select id="agileinfo_search" name="agileinfo_search" class="cs-select cs-skin-border" >
																			<option value="">Enter budget </option>
																			<?php 
								   												class Budget extends Connect{
																				public function display()
																				{								
																			  $x=new Connect;
																		      $sql = "SELECT * FROM budget";
																			  $c= $x->getconnect();
													                          $result = $c->query($sql);
																			  if ($result->num_rows > 0) {
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
	  																</section><br>
	  																<div class="col-xs-12">
																		<input type="submit" name="vsub" class="btn btn-primary" value="Search">
																	</div>
																	<!--input type="submit" name="vsub" value="Search"-->
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

				<div id="fh5co-features">
					<div class="container">
						<div class="row">
							<div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
								<h3>Our Support</h3>
								<p>Get to your favourite destination in just 4 steps.</p>
							</div>
							<div class="col-md-4 animate-box">
								<div class="feature-left">
									<span class="icon">
										<i class="icon-hotairballoon"></i>
									</span>
									<div class="feature-copy">
										<h3>Family Travel</h3>
										<p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit.</p>
										<p><a href="#">Learn More</a></p>
									</div>
								</div>
							</div>
							<div class="col-md-4 animate-box">
								<div class="feature-left">
									<span class="icon">
										<i class="icon-search"></i>
									</span>
									<div class="feature-copy">
										<h3>Travel Plans</h3>
										<p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit.</p>
										<p><a href="#">Learn More</a></p>
									</div>
								</div>
							</div>
							<div class="col-md-4 animate-box">
								<div class="feature-left">
									<span class="icon">
										<i class="icon-wallet"></i>
									</span>
									<div class="feature-copy">
										<h3>Honeymoon</h3>
										<p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit.</p>
										<p><a href="#">Learn More</a></p>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4 animate-box">

								<div class="feature-left">
									<span class="icon">
										<i class="icon-wine"></i>
									</span>
									<div class="feature-copy">
										<h3>Business Travel</h3>
										<p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit.</p>
										<p><a href="#">Learn More</a></p>
									</div>
								</div>

							</div>

							<div class="col-md-4 animate-box">
								<div class="feature-left">
									<span class="icon">
										<i class="icon-genius"></i>
									</span>
									<div class="feature-copy">
										<h3>Solo Travel</h3>
										<p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit.</p>
										<p><a href="#">Learn More</a></p>
									</div>
								</div>
							</div>
							<div class="col-md-4 animate-box">
								<div class="feature-left">
									<span class="icon">
										<i class="icon-chat"></i>
									</span>
									<div class="feature-copy">
										<h3>Explorer</h3>
										<p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit.</p>
										<p><a href="#">Learn More</a></p>
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
								<h3>Discover Hot Deals</h3>
								<p>Get to your favourite destination in just 4 steps.</p>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4 col-sm-6 fh5co-tours animate-box" data-animate-effect="fadeIn">
								<div href="#"><img src="images/hot_deal1.jpeg" alt="Free HTML5 Website Template by FreeHTML5.co" class="img-responsive">
									<div class="desc" align="center">
										<span></span>
										<span class="price">JAIPUR</span>
										<h3>Lebua Resort Jaipur</h3>
										<span class="price">$1,000</span>
										<a class="btn btn-primary btn-outline" href="#">Book Now <i class="icon-arrow-right22"></i></a>
									</div>
								</div>
							</div>
							<div class="col-md-4 col-sm-6 fh5co-tours animate-box" data-animate-effect="fadeIn">
								<div href="#"><img src="images/hot_deal1.jpeg" alt="Free HTML5 Website Template by FreeHTML5.co" class="img-responsive">
									<div class="desc">
										<span></span>
										<h3>New York</h3>
										<span>3 nights + Flight 5*Hotel</span>
										<span class="price">$1,000</span>
										<a class="btn btn-primary btn-outline" href="#">Book Now <i class="icon-arrow-right22"></i></a>
									</div>
								</div>
							</div>
							<div class="col-md-4 col-sm-6 fh5co-tours animate-box" data-animate-effect="fadeIn">
								<div href="#"><img src="images/hot_deal1.jpeg" alt="Free HTML5 Website Template by FreeHTML5.co" class="img-responsive">
									<div class="desc">
										<span></span>
										<h3>New York</h3>
										<span>3 nights + Flight 5*Hotel</span>
										<span class="price">$1,000</span>
										<a class="btn btn-primary btn-outline" href="#">Book Now <i class="icon-arrow-right22"></i></a>
									</div>
								</div>
							</div>
							<div class="col-md-4 col-sm-6 fh5co-tours animate-box" data-animate-effect="fadeIn">
								<div href="#"><img src="images/hot_deal1.jpeg" alt="Free HTML5 Website Template by FreeHTML5.co" class="img-responsive">
									<div class="desc">
										<span></span>
										<h3>New York</h3>
										<span>3 nights + Flight 5*Hotel</span>
										<span class="price">$1,000</span>
										<a class="btn btn-primary btn-outline" href="#">Book Now <i class="icon-arrow-right22"></i></a>
									</div>
								</div>
							</div>
							<div class="col-md-4 col-sm-6 fh5co-tours animate-box" data-animate-effect="fadeIn">
								<div href="#"><img src="images/hot_deal1.jpeg" alt="Free HTML5 Website Template by FreeHTML5.co" class="img-responsive">
									<div class="desc">
										<span></span>
										<h3>New York</h3>
										<span>3 nights + Flight 5*Hotel</span>
										<span class="price">$1,000</span>
										<a class="btn btn-primary btn-outline" href="#">Book Now <i class="icon-arrow-right22"></i></a>
									</div>
								</div>
							</div>
							<div class="col-md-4 col-sm-6 fh5co-tours animate-box" data-animate-effect="fadeIn">
								<div href="#"><img src="images/hot_deal1.jpeg" alt="Free HTML5 Website Template by FreeHTML5.co" class="img-responsive">
									<div class="desc">
										<span></span>
										<h3>New York</h3>
										<span>3 nights + Flight 5*Hotel</span>
										<span class="price">$1,000</span>
										<a class="btn btn-primary btn-outline" href="#">Book Now <i class="icon-arrow-right22"></i></a>
									</div>
								</div>
							</div>
							<div class="col-md-4 col-sm-6 fh5co-tours animate-box" data-animate-effect="fadeIn">
								<div href="#"><img src="images/hot_deal1.jpeg" alt="Free HTML5 Website Template by FreeHTML5.co" class="img-responsive">
									<div class="desc">
										<span></span>
										<h3>New York</h3>
										<span>3 nights + Flight 5*Hotel</span>
										<span class="price">$1,000</span>
										<a class="btn btn-primary btn-outline" href="#">Book Now <i class="icon-arrow-right22"></i></a>
									</div>
								</div>
							</div>
							<div class="col-md-4 col-sm-6 fh5co-tours animate-box" data-animate-effect="fadeIn">
								<div href="#"><img src="images/hot_deal1.jpeg" alt="Free HTML5 Website Template by FreeHTML5.co" class="img-responsive">
									<div class="desc">
										<span></span>
										<h3>New York</h3>
										<span>3 nights + Flight 5*Hotel</span>
										<span class="price">$1,000</span>
										<a class="btn btn-primary btn-outline" href="#">Book Now <i class="icon-arrow-right22"></i></a>
									</div>
								</div>
							</div>
							<div class="col-md-4 col-sm-6 fh5co-tours animate-box" data-animate-effect="fadeIn">
								<div href="#"><img src="images/hot_deal1.jpeg" alt="Free HTML5 Website Template by FreeHTML5.co" class="img-responsive">
									<div class="desc">
										<span></span>
										<h3>Philippines</h3>
										<span>4 nights + Flight 5*Hotel</span>
										<span class="price">$1,000</span>
										<a class="btn btn-primary btn-outline" href="#">Book Now <i class="icon-arrow-right22"></i></a>
									</div>
								</div>
							</div>
							<div class="col-md-12 text-center animate-box">
								<p>
								<a class="btn btn-primary btn-outline btn-lg" href="#">Load More<i class="icon-arrow-down22"></i></a>
								<a class="btn btn-primary btn-outline btn-lg" href="#">New Packages</a>
								</p>
							</div>
						</div>
					</div>
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