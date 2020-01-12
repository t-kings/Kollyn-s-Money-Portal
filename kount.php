<?php
$db = mysqli_connect('localhost', 'id8531163_fredkollyns', 'fredkollyns', 'id8531163_portal');
$stat = 1;
$queryq = "SELECT * FROM transaction WHERE status = '$stat' ORDER BY id DESC LIMIT 5";
$resultr = mysqli_query($db, $queryq);
if(mysqli_num_rows($resultr) > 0)
{

	echo ('<strong>'.mysqli_num_rows($resultr).'</strong>');
} else { echo (''); }
?>