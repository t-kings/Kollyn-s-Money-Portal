<?php
$klid  = $_POST['kdp'];  
$db = mysqli_connect('localhost', 'id8531163_fredkollyns', 'fredkollyns', 'id8531163_portal');
$kleear = "cleared";

$update_query = "UPDATE transaction SET cleared = '$kleear' WHERE id = '$klid' ";
if ($db->query($update_query) === TRUE) {
    echo "Withdrawn successfully <br/>  <a href='JavaScript:void(0)' class='btn btn-warning' style='margin-top:20px;' onclick='kouttt()'>Done </a>" ;
} else {
    echo "Error Withdrawing" . $db->error . "<a href='JavaScript:void(0)' class='btn btn-warning' style='margin-top:20px;' onclick='kouttt()'>Done </a>";
}
?>