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
     $sql    ="SELECT * FROM cust_info WHERE email LIKE '%$searchKey%'";
}else
    $sql    = "SELECT * FROM cust_info";
            
    $result = $conn->query($sql);
?>




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
                <h1><a href="adminindex.php"><span>Hidden</span> Chef</a></h1>
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
            <h3>Welcome Admin || Manage User Account</h3>
            
                <table class="table table-bordered">
  <tr>
    <th>Username</th>
     <th>Email</th>
     <th>Status</th>
  </tr>
  <?php 
        /* fetch object array */
        while( $row = $result->fetch_object() ):
     ?>
  <tr>
    <td><?php  echo $row->username ;?></td>
     <td><?php   echo $row->email ?></td>
     <td><?php if($row->status=='0')echo"Blocked";else echo"Active"; ?></td>
  </tr>
  <?php endwhile; ?>
</table>

<marquee   style="color: ##FF0000; font-family: Book Antiqua" behavior="scroll" >
                     <?php include('errors.php'); ?></marquee>
            <div class="w3_login_module">
                <div class="module form-module">
                  <div class=""><i class=""></i>
                    <div class="tooltip"></div>
                  </div>

                  <div align="center">
                    <form action="" method="GET"> 
                    <div >
              <input type="text" name="search" class='form-control' placeholder="Search By email" value=<?php echo @$_GET['search']; ?> > 
     </div>
     <div class="col-md-6 text-left">
      <button class="btn" style="background-color:red; border-color:blue; color:white">Search</button>
     </div>
   </form>

<div class="form">
                    <form action="#" method="post">
                      <input type="text" name="uemail" placeholder="enter email to Block/Delete/Unblock user" required=" ">
                      <input type="submit" class="btn" value="Block" name="block"> 
                                           <br><br>
                                     <input type="submit" class="btn" value="Delete" name="delete">        
                        <br><br>
                       <input type="submit" class="btn" value="Unblock" name="unblock"> 
                    </form>
                  </div>



                  </div>
                     </div>
                </div>
            </div>

            <script>
            </script>
        </div>
<!-- //login -->
<script src="js/minicart.js"></script>
<script>
    </script>
</body>
</html>
