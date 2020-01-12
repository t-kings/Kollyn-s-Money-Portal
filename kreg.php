<?php
$q = $_POST['q'];
$p = $_POST['p'];
$r = $_POST['r'];
$db = mysqli_connect('localhost', 'id8531163_fredkollyns', 'fredkollyns', 'id8531163_portal');
$errors = array();
 /* first check the database to make sure 
   a user does not already exist with the same username */
   
  $user_check_query = "SELECT * FROM admin WHERE username='$p' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $p) {
      array_push($errors, "Username already exists");
  } }


  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
	$r = md5($r);//encrypt the password before saving in the database
  	$query = "INSERT INTO admin (username, password, location) 
  			  VALUES('$p', '$r', '$q')";
 
 
 if ($db->query($query) === TRUE) {
    echo "Admin created successfully <br/> <a href='JavaScript:void(0)' class='btn btn-warning' onclick='window.location.reload()'> Done </a>";
}
  } else {
	   echo "<p style='color:red'>Cashier Already Exists </p> <br/> <a href='JavaScript:void(0)' class='btn btn-warning' onclick='kksubmit()'> Back </a>";
  }


?>