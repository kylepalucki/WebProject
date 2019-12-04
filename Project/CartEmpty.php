<?php
// Connect to database
$servername = "localhost";
$username = "root";
$password = "";
$db = "csci330";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

//all this script does is delete all rows from cart table
$delete = "DELETE FROM cart;";
if ($conn->query($delete) === true) {
	echo "Cart Entries Deleted";
} else {
	echo $conn->error;
}		

?>
