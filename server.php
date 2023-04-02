<?php 
	session_start();

	// variable declaration
	$username = "";
	$name ="";
	$email    = "";
	$address = "";
	$phn_num = "";
	$status = "";
	$food_code="";
	$quantity="";
	$amount="";
	$errors = array(); 
	$data = array();
	$_SESSION['success'] = "";

	// connect to database
	$db = mysqli_connect('localhost', 'root', '', 'food_ordering_system');

	// REGISTER USER
	if (isset($_POST['reg_user'])) {
		// receive all input values from the form
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$address = mysqli_real_escape_string($db, $_POST['address']);
		$phn_num = mysqli_real_escape_string($db, $_POST['phn_num']);
		$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
		

		// form validation: ensure that the form is correctly filled
		if (empty($username)) { array_push($errors, "Username is required"); }
		if (empty($email)) { array_push($errors, "Email is required"); }
		if (empty($password_1)) { array_push($errors, "Password is required"); }
		if (empty($address)) { array_push($errors, "Address is required"); }
		if (empty($phn_num)) { array_push($errors, "Password is required"); }
	    

		if ($password_1 != $password_2) {
			array_push($errors, "The two passwords do not match");
		      
		}

		// register user if there are no errors in the form
		if (count($errors) == 0) {

           $qr = "SELECT * FROM cust_info WHERE email='$email'";
			$res = mysqli_query($db, $qr);

		  if (mysqli_num_rows($res) == 1){
		  	    array_push($errors, "Account is already registered");
				}
			else{

			$password = md5($password_1);
			$query = "INSERT INTO cust_info (email,password,username,address,phn_num,status) 
					  VALUES('$email','$password','$username','$address','$phn_num','1')";
			mysqli_query($db, $query);

			$_SESSION['username'] = $username;
			$_SESSION['success'] = "You are now registered";
			header('location: login.php');
		  }
		}

	}

	// ... 

	// LOGIN USER
	if (isset($_POST['login_user'])) {
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		if (empty($email)) {
			array_push($errors, "Email is required");

		}
		if (empty($password)) {
			array_push($errors, "Password is required");

		}


		if (count($errors) == 0) {
			$password = md5($password);
			$query = "SELECT username,status FROM cust_info WHERE email='$email' AND password='$password' AND email not like 'admin@gmail.com' ";
			$results = mysqli_query($db, $query);
             while ($row=mysqli_fetch_assoc($results)) {
             	$name=$row['username'];
             	$status=$row['status'];
             }
			

			if (mysqli_num_rows($results) == 1 and $status=="1") {
				$_SESSION['email'] = $email;
				$_SESSION['success'] = "You are now logged in";
				$_SESSION['name']=$name;
				$loggedin="1";
				$_SESSION['loggedin']=$loggedin;
				header('location: household.php');
			}
            elseif ($status=="0") {
            	array_push($errors, "Restricted user");
            }
			else {
				array_push($errors, "Wrong username/password combination");
			
			}
		}
	}

   //Log out
  if (isset($_POST['logout'])) {
  session_unset(); // unset all var data
  session_destroy(); // destroying current session
  }




 //food cart

     if (isset($_POST['buy'])) {
     	    
            $food_code= mysqli_real_escape_string($db, $_POST['food_code']);
	        $quantity= mysqli_real_escape_string($db, $_POST['quantity']);
            $email=$_SESSION['email'] ;
            $quer = "SELECT unit_price FROM food_item WHERE food_code='$food_code'";
             $res=mysqli_query($db, $quer);
             while ($row=mysqli_fetch_assoc($res)) {
             	$unit=$row['unit_price'];
             }
             $amount=(int) $unit* (int)$quantity;
             $r=(int)$quantity;

		    $t=date('Y-m-d h:i:s');
		    $status="pending";
			$QR = "INSERT INTO order_payment (email,food_code,quantity,Order_status,timee,amount) 
					  VALUES('$email','$food_code','$quantity','$status','$t','$amount')";
				mysqli_query($db, $QR);


			 $quer = "SELECT * FROM food_item WHERE food_code='$food_code'";
             $res=mysqli_query($db, $quer);
             while ($row=mysqli_fetch_assoc($res)) {
             	$n=$row['quantity'];
             }
              
              (int)$avail=((int)$n-(int)$r);
              $qr = "UPDATE food_item
              SET quantity = '$avail'
              WHERE food_code = '$food_code' ";
              mysqli_query($db, $qr);

			$loggedin="1";
			$_SESSION['loggedin']=$loggedin;

		
       
	}



	
      




          
      //reset/update password
	if (isset($_POST['reset'])) {
		$resetted="0";
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$phn_num= mysqli_real_escape_string($db, $_POST['phn_num']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		if (empty($email)) {
			array_push($errors, "Email is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}

        if (empty($phn_num)) {
			array_push($errors, "Phone is required");
		}

		if (count($errors) == 0) {
			$password = md5($password);
			$query = "SELECT * FROM cust_info WHERE email='$email' AND phn_num='$phn_num' ";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) {

             $qr = "UPDATE cust_info
             SET password = '$password'
             WHERE email = '$email' ";
             mysqli_query($db, $qr);
				array_push($errors, "Password resetted successfully....");
                
			}else {

				array_push($errors, "No user exist....");
			}
		}
	}


//delete
	if (isset($_POST['delete'])) {
		$uemail = ($_POST['uemail']);
        if (empty($uemail)) {
			array_push($errors, "Email is required");
		}
 
		if (count($errors) == 0) {
 
             $sql = "DELETE FROM cust_info WHERE email='$uemail'";
if(mysqli_query($db, $sql)){
    echo "Records deleted successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
}
 
                }
 
	}
 
 
	//block
if (isset($_POST['block'])) {
		$uemail = ($_POST['uemail']);
        if (empty($uemail)) {
			array_push($errors, "Email is required");
		}
 
		if (count($errors) == 0) {
			$query = "SELECT * FROM cust_info WHERE email='$uemail'";
			$results = mysqli_query($db, $query);
 
			if (mysqli_num_rows($results) == 1) {
 
             $qr = "UPDATE cust_info
             SET status = 0 WHERE email = '$uemail' ";
             mysqli_query($db, $qr);
 
				array_push($errors, "Blocked successfully....");
                }
			else {
 
				array_push($errors, "No user exist....");
		}
	}
 
}
//unblock
if (isset($_POST['unblock'])) {
		$uemail = ($_POST['uemail']);
        if (empty($uemail)) {
			array_push($errors, "Email is required");
		}
 
		if (count($errors) == 0) {
			$query = "SELECT * FROM cust_info WHERE email='$uemail' AND status='$status'";
			$results = mysqli_query($db, $query);
 
			if (mysqli_num_rows($results) == 1) {
 
             $qr = "UPDATE cust_info
             SET status = 1 WHERE email = '$uemail' ";
             mysqli_query($db, $qr);
 
				array_push($errors, "Unblocked successfully....");
                }
			else {
 
				array_push($errors, "No user exist....");
		}
	}
 
}





    	// LOGIN admin
	if (isset($_POST['login_admin'])) {
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		if (empty($email)) {
			array_push($errors, "Email is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}


		if (count($errors) == 0) {
			$password = md5($password);
			$query = "SELECT * FROM cust_info WHERE email='$email' AND password='$password' AND email like 'admin@gmail.com' ";
			$results = mysqli_query($db, $query);
			 while ($row=mysqli_fetch_assoc($results)) {
             	$name=$row['username'];
             }

			if (mysqli_num_rows($results) == 1) {
				$_SESSION['email'] = $email;
				$_SESSION['name']=$name;
				$loggedin="1";
				$_SESSION['loggedin']=$loggedin;
				header('location: adminindex.php');
			}else {
				array_push($errors, "Wrong username/password combination");
			}
		}
	}

?>
