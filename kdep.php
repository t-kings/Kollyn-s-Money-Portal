<?php session_start();
$dq = $_POST['dq'];
$dp = $_POST['dp'];
$dr = $_POST['dr'];
$ds = $_POST['ds'];
$dt = $_POST['dt'];
$db = mysqli_connect('localhost', 'id8531163_fredkollyns', 'fredkollyns', 'id8531163_portal');
//Depositing code

	$transdate = date("Y-m-d");
	$transagent = $_SESSION['username'];
	$translocation  = $_SESSION['location'];
	$status = "1";
	$cleared = "Not Cleared";
	
  // Finally, Deposit

	  
$depquery = "INSERT INTO transaction (fromname, toname, amount, transdate, transagent, destination, commission, location, status, cleared) 
  			  VALUES('$dp', '$dq', '$dr', '$transdate', '$transagent', '$dt', '$ds', '$translocation', '$status', '$cleared')";
   if ($db->query($depquery) === TRUE) {
    echo "Record deposited successfully <br/> <a href='JavaScript:void(0)' class='btn btn-warning' onclick='window.location.reload()'> Done </a>";
}

?>