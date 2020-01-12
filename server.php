 <?php
$servername = "localhost";
$username = "id8531163_fredkollyns";
$password = "fredkollyns";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected to server successfully";

// Create database
$sql = "CREATE DATABASE id8531163_portal";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}

// connect to the database
$db = mysqli_connect('localhost', 'id8531163_fredkollyns', 'fredkollyns', 'id8531163_portal');

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected to database successfully";

// sql to create table
$sql1 = "CREATE TABLE  admin(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(10) NOT NULL,
location VARCHAR(20) NOT NULL,
password VARCHAR(3000) NOT NULL
)";

if ($db->query($sql1) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}


// sql to create table
$sql2 = "CREATE TABLE  transaction(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
fromname VARCHAR(30) NOT NULL,
toname VARCHAR(30) NOT NULL,
transdate VARCHAR(30) NOT NULL,
transagent VARCHAR(30) NOT NULL,
destination VARCHAR(30) NOT NULL,
location VARCHAR(30) NOT NULL,
commission VARCHAR(30) NOT NULL,
amount INT(10) NOT NULL,
status INT(2) NOT NULL,
cleared VARCHAR(30) NOT NULL
)";


if ($db->query($sql2) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

?> 