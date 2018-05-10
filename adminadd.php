<!-- This file gives the package adding form to the admin-->
<?php
	session_start();
	if(!$_SESSION['Username'])
	{
		header('location:index.php');
	}
?>
<?php
	require_once('conn.php');
	require_once('classdest.php');
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
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); }
	</script>
	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="favicon.ico">

	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'>
	<link href="css/font-awesome.css" rel="stylesheet">
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

	<script src="js/modernizr-2.6.2.min.js"></script>
	<script src="js/jquery-2.2.3.min.js"></script> 
	<script src="jquery.min.js"></script>
	<script src="Scripts/jquery-1.4.1-vsdoc.js" type="text/javascript"></script>
    <script src="Scripts/jquery-1.4.1.js" type="text/javascript"></script>
	
	<link href="//fonts.googleapis.com/css?family=Berkshire+Swash" rel="stylesheet"> 
	<link href="//fonts.googleapis.com/css?family=Yantramanav:100,300,400,500,700,900" rel="stylesheet">
	<!-- //web-fonts -->
	<script language=Javascript>
	       function isNumberKey(evt)
	       {
	          var charCode = (evt.which) ? evt.which : evt.keyCode;
	          if (charCode != 46 && charCode > 31 
	            && (charCode < 48 || charCode > 57))
	             return false;
	          return true;
	       }
	</script>
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
								<li class="active"><a href="index.php">Home</a></li>
								<li><a href="about_us.html">About Us</a></li>
								<li><a href="contact.html">Contact Us</a></li>
								<li><a href="alogout.php">Logout</a></li>
							</ul>
						</nav>
					</div>
				</div>
			</header>

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
							<h3>Add Package</h3>
						</div>
					</div>
					<div class="form-group">
						<form action="classadmin.php" method="POST" enctype="multipart/form-data" name="fo" runat="server"><br>
  							<label for="id" id="dest">Choose Destination</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  							<select class="agile-ltext"  id="2304" name="destname" style="width:100px; height:30px;">
                   				<option value="NULL">SELECT</option>
                    			<?php
                    				$obj=new Destination;
                        			$b=$obj->getdest();
                        			for($i=0;$i<count($b);$i++)
                        			{
										?>
	                			<option value="<?php echo $b[$i];?>"><?php echo $b[$i]; ?></option>
								<?php } ?>
                        		<option value="other">other</option>
							</select><br><br>
				    
				    		<div id="form1">
								<label for="id"><h3>Enter new destination</h3></label>
								<input class="form-control" type="text" name="destname1" placeholder="name of destination"  pattern="[a-zA-Z]*" /><br>
								<h3>Enter Hotel Details </h3><br>
								<label for="id">Enter Hotel name </label>
								<input class="form-control" type ="text" name="hotel" placeholder="Hotel Name" pattern="[a-zA-Z ]*"  /><br>
								<label for="id">Enter Hotel type</label>&nbsp;&nbsp;&nbsp;
		                        <select class="agile-ltext"  name="hoteltype" style="width:100px; height:30px;">
		                        	<option value="NULL">SELECT</option>
									<option value="2">two star</option>
		                        	<option value="3">three star</option>
									<option value="4">four star</option> 
									<option value="5">five star</option>
								</select><br><br>
						        <label for="id">Enter Number of single rooms </label>&nbsp;&nbsp;&nbsp;
								<input input class="form-control" type ="number" min="0" name="snr" placeholder="" /><br>
								<label for="id">Price of a single room/day </label>&nbsp &nbsp &nbsp
								<input class="form-control" id="txtChar" onkeypress="return isNumberKey(event)" type="text" name="psnr"><br>
								<label for="id">Enter Number of double rooms </label>&nbsp &nbsp &nbsp
								<input input class="form-control" type ="number" min="0" name="dnr" placeholder="" ><br>
								<label for="id">Price of a double room/day </label>&nbsp;&nbsp;&nbsp;
								<input class="form-control" id="txtChar" onkeypress="return isNumberKey(event)" type="text" name="pdnr"><br>
								<label for="id">Enter Number of minisuites </label>&nbsp;&nbsp;&nbsp;
								<input input class="form-control" type ="number" min="0" name="mns" placeholder="" ><br>
								<label for="id">Price of a minisuite/day </label>&nbsp;&nbsp;&nbsp;
								<input class="form-control" id="txtChar" onkeypress="return isNumberKey(event)" type="text" name="pmns"><br>
								<label for="id">Contact Details: </label>&nbsp;&nbsp;&nbsp;
								<input class="form-control" maxlength="10" pattern="^([+][9][1]|[9][1]|[0]){0,1}([7-9]{1})([0-9]{9})$" type="text" name="hcon" placeholder="9876543210"><br><br>
							    <h3> Enter Vehicle Details </h3><br>
								<label for="id">Enter Number of Scooty </label>&nbsp;&nbsp;&nbsp;
								<input input class="form-control" type ="number" min="0" name="tsnr" placeholder=""  ><br>
								<label for="id">Price of a scooty/day </label>&nbsp;&nbsp;&nbsp;
								<input class="form-control" id="txtChar" onkeypress="return isNumberKey(event)" type="text" name="ctsnr">
								<br>
		                        <label for="id">Enter Number of Sedan </label>&nbsp;&nbsp;&nbsp;
								<input input class="form-control"type ="number" min="0" name="tsenr" placeholder="" >
								<br>
								<label for="id">Price of a sedan/day </label>&nbsp;&nbsp;&nbsp;
								<input class="form-control" id="txtChar" onkeypress="return isNumberKey(event)" type="text" name="ctsenr">
								<br>
								<label for="id">Enter Number of SUV </label>&nbsp;&nbsp;&nbsp;
								<input input class="form-control"type ="number" min="0" name="tsuv" placeholder="" >
								<br>
								<label for="id">Price of a SUV/day </label>&nbsp;&nbsp;&nbsp;
								<input class="form-control" id="txtChar" onkeypress="return isNumberKey(event)" type="text" name="ctsuv">
								<br><br>
								<h3> Insert Package Information </h3><br> 
					    		<label for="id">Select type of room in package </label> 
								<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<select name="typeroom[]" multiple="multiple" size="3">&nbsp;&nbsp;
									<option value="Null" selected>select type of room</option>	
									<option value="single">Single room</option>
									<option value="double">Double room</option>
									<option value="minisuite">Minisuite</option>
								</select>
								<br>
								<br>
								<label for="id">Select type of vehicle in package </label>&nbsp;&nbsp;&nbsp;
								<select name="typevehicle">
									<option value="scooty">Scooty</option>
									<option value="Sedan">Sedan</option>
									<option value="SUV">SUV</option>
								</select>
								<br>
								<br>
								<label for="id">Enter number of days in package</label>&nbsp;&nbsp;&nbsp;
								<input class="form-control" class="form-control" name="day" type="number" min="2" >
								<br><label for="id">Upload Image</label>&nbsp;&nbsp;&nbsp;
								<input class="form-control" type="file" name="foto" accept=".jpg,.png,.jpeg">
								<br>
							</div>
							<div id="form2">
								<label for="id" id="dest">Choose Hotels </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<select class="agile-ltext"  id="hchoose" name="ehname" style="width:100px; height:30px;"></select><br><br>
								<div id="form2nh">
									<h3>Enter Hotel Details </h3><br>
									<label for="id">Enter Hotel name </label>
									<input class="form-control" type ="text" name="hotel1" placeholder=""  pattern="[a-zA-Z ]*"/>
									<br>
									<label for="id">Enter Hotel type</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						            <select class="agile-ltext"  name="hoteltype1" style="width:100px; height:30px;">
						                <option value="NULL">SELECT</option>
										<option value="2">two star</option>
						                <option value="3">three star</option>
										<option value="4">four star</option> 
										<option value="5">five star</option>
									</select><br><br>
						            <label for="id">Enter Number of single rooms </label>&nbsp;&nbsp;&nbsp;
									<input class="form-control" type ="number"  min="0" name="snr1" placeholder="" >
							        <br>
									<br>
									<label for="id">Price of a single room/day </label>&nbsp;&nbsp;&nbsp;
									<input class="form-control" id="txtChar" type="text" name="psnr1">
									<br>
									<br>
						            <label for="id">Enter Number of double rooms </label>&nbsp;&nbsp;&nbsp;
									<input class="form-control" type ="number" min="0" name="dnr1" placeholder="" >
									<br>
									<br>
									<label for="id">Price of a double room/day </label>&nbsp;&nbsp;&nbsp;
									<input class="form-control" id="txtChar" type="text" name="pdnr1">
							        <br>
									<br>
									<label for="id">Enter Number of minisuites </label>&nbsp;&nbsp;&nbsp;
									<input class="form-control" type ="number" min="0" name="mns1" placeholder="" ><br><br>
									<label for="id">Price of a minisuite/day </label>&nbsp;&nbsp;&nbsp;
									<input class="form-control" id="txtChar" type="text" name="pmns1"><br><br>
									<label for="id"> Enter Contact Number: </label>&nbsp;&nbsp;&nbsp;
									<input class="form-control" maxlength="10" pattern="^([+][9][1]|[9][1]|[0]){0,1}([7-9]{1})([0-9]{9})$" type="text" name="hcon1"><br><br>
									<br><br>
									<h3>Insert package information </h3> <br>
									<label for="id">select type of room in package </label><br>
									<select name="typeroom1[]" multiple="multiple" size="3">&nbsp;&nbsp;&nbsp;
										<option value="Null" selected>select type of room</option><br><br>
										<option value="single">Single room</option>
										<option value="double">Double room</option>
										<option value="minisuite">Minisuite</option>
									</select><br><br>
									<label for="id">Select type of vehicle in package </label>&nbsp;&nbsp;&nbsp;
									<select name="typevehicle1">
										<option value="scooty">Scooty</option>
										<option value="Sedan">Sedan</option>
										<option value="SUV">SUV</option>
									</select><br><br>
									<label for="id">Enter no of days in package </label>&nbsp;&nbsp;&nbsp;
									<input class="form-control" name="day1" placeholder="...." type="number" min="2" ><br>
									<label for="id">Upload Image</label>&nbsp;&nbsp;&nbsp;
								</div>
								<div id="form2eh"><br>
									<h3> Insert Package Infomation </h3> <br>
							    	<label for="id">Select type of room in package </label>
									<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<select name="typeroom2[]" multiple="multiple" size="3"><br> 
                                    	<option value="Null" selected>select type of room</option>	
										<option value="single">Single room</option>
										<option value="double">Double room</option>
										<option value="minisuite">Minisuite</option>
									</select><br><br>
									<label for="id">Select type of vehicle in package </label>&nbsp;&nbsp;&nbsp;
									<select name="typevehicle2">
										<option value="scooty">Scooty</option>
										<option value="Sedan">Sedan</option>
										<option value="SUV">SUV</option>
									</select><br><br><label for="id">Enter no of days in package </label>&nbsp;&nbsp;&nbsp;
									<input class="form-control" min="2" name="day2" placeholder="...." type="number"  ><br>
									<label for="id">Upload Image</label>&nbsp;&nbsp;&nbsp;
									<input class="form-control"type="file" name="foto2" accept=".jpg,.png,.jpeg" /><br>
								</div>
							</div><br><br>
  							<button type="submit" class="btn btn-default" name="add">Submit</button>
  						</form>
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

	<script src="js/jquery.min.js"></script>
	<script src="js/jquery.easing.1.3.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.waypoints.min.js"></script>
	<script src="js/sticky.js"></script>
	<script src="js/jquery.stellar.min.js"></script>
	<script src="js/hoverIntent.js"></script>
	<script src="js/superfish.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/magnific-popup-options.js"></script>
	<script src="js/bootstrap-datepicker.min.js"></script>
	<script src="js/classie.js"></script>
	<script src="js/selectFx.js"></script>
	<script src="js/main.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/owl.carousel.js"></script>
	<script src="js/SmoothScroll.min.js"></script>  
	<script type="text/javascript" src="js/easing.js"></script>
	<script>
        w3ls.render();

        w3ls.cart.on('w3sb_checkout', function (evt) {
        	var items, len, i;

        	if (this.subtotal() > 0) {
        		items = this.items();

        		for (i = 0, len = items.length; i < len; i++) { 
        		}
        	}
        });
    </script>  
	<script>
		$(document).ready(function() {
			$("#owl-demo").owlCarousel ({
				items : 3,
				lazyLoad : true,
				autoPlay : true,
				pagination : true,
			});
		});
	</script>
	<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
			
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
				});
			});
	</script>
	<script type="text/javascript">
		$(document).ready(function() {
			$().UItoTop({ easingType: 'easeOutQuart' });
		});
	</script>
	<script>
		$(document).ready(function(){
		$("#form2eh").hide();
		$("#form2nh").hide();
		$("#form1").hide();
		$("#form2").hide();
		$("#2304").change(function(){
			$.post("submit.php", 
			{fname: $(this).val()}, 
			function(data){
				$('#hchoose').html(data);
			}
		);
			if($(this).val()=='NULL')
			{
				$("#form1").hide();
		$("#form2").hide();
			}
		if(($(this).val()=='other')&& ($(this).val()!='NULL'))
		{
			$("#form2").hide();
			$('#form1').show();
		}else if(($(this).val()!='NULL')&& ($(this).val()!='other'))
		{
			$('#form1').hide();
			$('#form2').show();
		}
		
		});
		$("#hchoose").click(function(){
			if($(this).val()=='NULL')
			{
				$("#form2nh").hide();
				$("#form2eh").hide();
		
			}
			
			if($(this).val()=='hother'&& ($(this).val()!='NULL'))
			{
        $("#form2nh").show();
		$("#form2eh").hide();
			}
			else if(($(this).val()!='NULL')&& ($(this).val()!='hother'))
		{
			$('#form2nh').hide();
			$('#form2eh').show();
		}
				});
	});
	</script>
	<script>
		$(document).ready(function() {
			$("#owl-demo").owlCarousel ({
				items : 3,
				lazyLoad : true,
				autoPlay : true,
				pagination : true,
			});
		});
	</script>
	<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
			
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
				});
			});
	</script>
	<script type="text/javascript">
		$(document).ready(function() {
			$().UItoTop({ easingType: 'easeOutQuart' });
		});
	</script>
	<script language=Javascript>
       
       function isNumberKey(evt)
       {
          var charCode = (evt.which) ? evt.which : evt.keyCode;
          if (charCode != 46 && charCode > 31 
            && (charCode < 48 || charCode > 57))
             return false;
          return true;
       }
    </script>
</body>
</html>