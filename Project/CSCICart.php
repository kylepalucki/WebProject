<?php
	// Grab values from server


	//$s_cart_movies = array("Goodfellas", "Braveheart", "Das Boot", "U2 3D", "Toy Story 3", "Scarface");


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
	
	$query = "SELECT * FROM cart";
	$result = mysqli_query($conn, $query);
	$info = mysqli_fetch_all($result, MYSQLI_ASSOC);
	echo json_encode($info);

?>
