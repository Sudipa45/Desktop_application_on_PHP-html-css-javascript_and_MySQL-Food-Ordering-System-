<!--
author: W3layouts
author URL: http://w...content-available-to-author-only...s.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://c...content-available-to-author-only...s.org/licenses/by/3.0/
-->

<?php 
    include('server.php');
    if (!isset($_SESSION)) {
    $loggedin=$_SESSION['loggedin'];
    if ($loggedin=="1") {
	header( "Location: household.php" );}
	
}?>


<!DOCTYPE html>
<html>
<head>
<title>Hidden Chef</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Grocery Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet" type="text/css" media="all" /> 
<!-- //font-awesome icons -->
<!-- js -->
<script src="js/jquery-1.11.1.min.js"></script>
<!-- //js -->
<link href='//fonts.googleapis.com/css?family=Ubuntu:400,300,300italic,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
</head>
	
<body>
<!-- header -->
<!-- script-for sticky-nav -->
	<script>
	$(document).ready(function() {
		 var navoffeset=$(".agileits_header").offset().top;
		 $(window).scroll(function(){
			var scrollpos=$(window).scrollTop(); 
			if(scrollpos >=navoffeset){
				$(".agileits_header").addClass("fixed");
			}else{
				$(".agileits_header").removeClass("fixed");
			}
		 });
		 
	});
	</script>
<!-- //script-for sticky-nav -->
	<div class="logo_products">
		<div class="container">
			<div class="w3ls_logo_products_left">
				<h1><a href="#"><span>Hidden</span> Chef</a></h1>
			</div>
			<div class="w3ls_logo_products_left1">
			</div>
			<div class="w3ls_logo_products_left1">
				<ul class="phone_email">
					<li><i class="fa fa-phone" aria-hidden="true"></i>(+880) 1755836494</li>
					<li><i class="fa fa-envelope-o" aria-hidden="true"></i><a href="mailto:store@grocery.com">hiddenchef@gmail.com</a></li>
				</ul>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //header -->
		
<!-- login -->
		<div class="w3_login">
			<h3>Log In & Registration</h3>
             <marquee   style="color: ##FF0000; font-family: Book Antiqua" behavior="scroll" >
					<?php include('errors.php'); ?></marquee>

			<div class="w3_login_module">
				<div class="module form-module">
				  <div class="toggle"><i class="fa fa-times fa-pencil"></i>
					<div class="tooltip">Clik to Switch</div>
				  </div>
				  <div class="form">
					<h2>Login to your account</h2>
					<form action="login.php" method="post">
					  <input type="text" name="email" placeholder="email" required=" ">
					  <input type="password" name="password" placeholder="password" required=" ">
					  <input type="submit" class="btn" value="Procced" name="login_user">
					  <br>
					  <br>
					<div class="cta"><a href="resetpass.php">Forgot your password?</a></div>
					</form>
				  </div>


				  
		
				  <div class="form">

					<h2>Create an account</h2>
                    
					
					<form action="login.php" method="post">
					  <input type="text" name="username" placeholder="Username">
					  <input type="email" name="email" placeholder="Email Address">
					  <input type="text" name="address" placeholder="Address">
					  <input type="text" name="phn_num" placeholder="Phone Number">
					  <input type="password" name="password_1" placeholder="Password">
					  <input type="password" name="password_2" placeholder="Confirm Password">
		             <input type="submit" class="btn" value="Register" name="reg_user">
                     
					</form>
				     </div>
				</div>
			</div>
			<script>
				$('.toggle').click(function(){
				  // Switches the Icon
				  $(this).children('i').toggleClass('fa-pencil');
				  
				  // Switches the forms  
				  $('.form').animate({
					height: "toggle",
					'padding-top': 'toggle',
					'padding-bottom': 'toggle',
					opacity: "toggle"
				  }, "slow");
				});
			</script>
		</div>
<!-- //login -->
<script src="js/minicart.js"></script>
<script>
	</script>
</body>
</html>
