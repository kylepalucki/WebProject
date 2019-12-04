<?php
// Grab values from server

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
$cart = "SELECT Movie_Title FROM cart;";
$cartresult = mysqli_query($conn, $cart);
$movies = mysqli_fetch_all($cartresult, MYSQLI_ASSOC);
//print_r($movies);

for ($i=0; $i<count($movies); $i++){
	$unstock = "UPDATE movie_rental SET Stock = Stock - 1 WHERE Stock > 0 AND Movie_Title='".$movies[0]['Movie_Title']."';";
	if ($conn->query($unstock) === true) {
		echo "Movies Unstocked";
	} else { 
		echo $conn->error;
	}
}

$delete = "DELETE FROM cart;";
echo $delete;
if ($conn->query($delete) === true) {
	echo "Cart Entries Deleted";
} else {
	echo $conn->error;
}	

?>
