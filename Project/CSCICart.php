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
	
	//select everything in the cart so that in can be displayed on CSCICart.html
	$query = "SELECT * FROM cart";
	$result = mysqli_query($conn, $query);
	$info = mysqli_fetch_all($result, MYSQLI_ASSOC);
	echo json_encode($info);

?>
