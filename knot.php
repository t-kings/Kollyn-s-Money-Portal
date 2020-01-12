<?php
$db = mysqli_connect('localhost', 'id8531163_fredkollyns', 'fredkollyns', 'id8531163_portal');
$stat = 1;
$queryq = "SELECT * FROM transaction ORDER BY id DESC LIMIT 5";
$resultr = mysqli_query($db, $queryq);

$kount = mysqli_num_rows($resultr);
if(mysqli_num_rows($resultr) > 0)
{

while($rowo = mysqli_fetch_array($resultr))

{
	echo (
  '<li>

  <strong style="color: green;">'.$rowo["fromname"]. '</strong> sent <strong style="color: green;"> '.$rowo["amount"].' </strong> to <strong style="color: green;"> '.$rowo["toname"].' </strong> through <strong style="color: green;"> '.$rowo["transagent"].' </strong> on <strong style="color: green;"> '.$rowo["transdate"].' </strong>

  </li>' );

}
} else { echo ('no  new notification'); }
?>