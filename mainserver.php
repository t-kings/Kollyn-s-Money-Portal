<?php 

// LOGIN USER

// connect to the database
$db = mysqli_connect('localhost', 'id8531163_fredkollyns', 'fredkollyns', 'id8531163_portal');

$error5 = "";
$error6 = "";
$error7 = "";
$errors = array();


if (isset($_POST['login'])) {
  $logusername = mysqli_real_escape_string($db, $_POST['logusername']);

  $logpassword = mysqli_real_escape_string($db, $_POST['logpassword']);

  if ($logusername == "username") {
  	array_push($errors, "Username is required");
	$error5 = "Please Select Cashier";
  }
  if (empty($logpassword)) {
  	array_push($errors, "Password is required");
	$error6 = "Password is required";
  }

  if (count($errors) == 0) {
  	$logpassword = md5($logpassword);
  	$logquery = "SELECT * FROM admin WHERE username='$logusername' AND password='$logpassword'";
  	$logresults = mysqli_query($db, $logquery);
$rowlog = $logresults->fetch_assoc();

	
  	if (mysqli_num_rows($logresults) == 1) {
		$loglocation = $rowlog["location"];
		session_start();
  	  $_SESSION['username'] = $logusername;
	  $_SESSION['location'] = $loglocation;
  	  header('location: home.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
		$error7 = "Wrong username/password combination";
  	}
  }
}

?>