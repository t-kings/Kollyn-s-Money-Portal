<?php
$db = mysqli_connect('localhost', 'id8531163_fredkollyns', 'fredkollyns', 'id8531163_portal');
$update_query = "UPDATE transaction SET status = 0 WHERE status=1";
if ($db->query($update_query) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $db->error;
}
?>