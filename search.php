<!--
author: W3layouts
author URL: http://w...content-available-to-author-only...s.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://c...content-available-to-author-only...s.org/licenses/by/3.0/
-->
<?php

if (!isset($_SESSION)) {
   include('server.php') ;

$email=$_SESSION['email'] ;
$name=$_SESSION['name'] ;
$loggedin=$_SESSION['loggedin'];
if ($loggedin!="1") {
	header( "Location: login.php" );
}
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['postdata'] = $_POST;
    unset($_POST);
    header("Location: ".$_SERVER['PHP_SELF']);
    exit;
}
?>

<?php 
$conn   = new mysqli('localhost', 'root', '', 'food_ordering_system');
if(isset($_GET['search'])){
     $searchKey = $_GET['search']; // grab keyword
     $sql    = "SELECT * FROM food_item WHERE food_name LIKE '%$searchKey%'";
}else
    $sql    = "SELECT * FROM food_item";
			
    $result = $conn->query($sql);
?>


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
	<style>
h2{
    text-align:center;
}
</style>
<body>
<!-- header -->
	<div class="agileits_header">
		<div class="w3l_offers">
			
		</div>
		<div class="product_list_header">  
			<form action="#" method="post" class="last">
                <fieldset>
                    <input type="hidden" name="cmd" value="_cart" />
                    <input type="hidden" name="display" value="1" />
                    <input type="submit" name="submit" value="View your cart" class="button" />
                </fieldset>
            </form>
		</div>
		<div class="w3l_header_right1">
			 <ul>
				<li class="dropdown profile_details_drop">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user" aria-hidden="true"></i><span class="caret"></span></a>
					<div class="mega-dropdown-menu">
						<div class="w3ls_vegetables">
							<ul class="dropdown-menu drp-mnu">
								<li><a href="#">My profile</a></li>
							    <form action="login.php" method="post" class="last"> 
								<input type="submit" name="logout" value="logout" class="button" />
							</form>
							</ul>
						</div>   

					</div>

				</li>
			</ul>
			<?php echo '<font color="white">'.$name.'</font>';?>
		</div>
		<div class="clearfix"> </div>
	</div>
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
				<h1><a href="index.html"><span>HIDDEN</span> CHEF</a></h1>
			</div>
			<div class="w3ls_logo_products_left1">
				<ul class="special_items">
					<li><a href="search.php">Click to Search</a><i>||</i></li>
					<li><a href="ordered.php">Ordered Item</a><i>||</i></li>
					<li><a href="review.php">Review</a><i>||</i></li>
					<li><a href="about.html">About Us</a></li>
					
				</ul>
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
<!-- products-breadcrumb -->
	<div class="products-breadcrumb">
		<div class="container">
			<ul>
				<li><i class="fa fa-home" aria-hidden="true"></i><a href="household.php">Home</a></li>
			</ul>
		</div>
	</div>
<!-- //products-breadcrumb -->

 <div align="center">
					<h2>Search food </h2>
					<br><br>
					<form action="" method="GET"> 
                    <div class="col-md-6">
              <input type="text" name="search" class='form-control' placeholder="Search By Name" value=<?php echo @$_GET['search']; ?> > 
     </div>
     <div class="col-md-6 text-left">
      <button class="btn" style="background-color:red; border-color:blue; color:white">Search</button>
     </div>
   </form>
				  </div>
		

   <br> 
   <br>
</div>

<table class="table table-bordered">
  <tr>
  	<th>Code</th>
     <th>Name</th>
     <th>Catagory</th>
     <th>Available</th>
     <th>Price</th>
  </tr>
  <?php while( $row = $result->fetch_object() ): ?>
  <tr>
  	<td><?php echo $row->food_code ?></td>
     <td><?php echo $row->food_name ?></td>
     <td><?php echo $row->catagory ?></td>
     <td><?php echo $row->quantity ?></td>
     <td><?php echo $row->unit_price ?></td>
  </tr>
  <?php endwhile; ?>
</table>

				  </div>

                <div class="module form-module">
                  <div class=""><i class=""></i>
                    <div class="tooltip"></div>
                  </div>
                  <div class="form">

                    <form action="#" method="post">
                      <input type="text" name="food_code" placeholder="Enter serial number" required=" ">
                       <input type="text" name="quantity" placeholder="Enter quantity" required=" ">
                      
                      <input type="submit" class="btn" value="Order Now" name="buy"> 
                                         <br>
                      <br>
                      
                    
                </div>


<script src="js/bootstrap.min.js"></script>
<script>




$(document).ready(function(){
    $(".dropdown").hover(            
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideDown("fast");
            $(this).toggleClass('open');        
        },
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideUp("fast");
            $(this).toggleClass('open');       
        }
    );
});
</script>



<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
<!-- //here ends scrolling icon -->

</body>
</html>
