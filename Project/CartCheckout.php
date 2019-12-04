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
$cart = "SELECT Movie_Title FROM cart;";
$cartresult = mysqli_query($conn, $cart);
$movies = mysqli_fetch_all($cartresult, MYSQLI_ASSOC);
//print_r($movies);

//loops through every movie in cart and runs a query in movie_table to decrement Stock by 1
for ($i=0; $i<count($movies); $i++){
	$unstock = "UPDATE movie_rental SET Stock = Stock - 1 WHERE Stock > 0 AND Movie_Title='".$movies[0]['Movie_Title']."';"; //will only decrement stock if stock>0
	if ($conn->query($unstock) === true) {																					//however if stock>0 you shouldn't be able to add a movie to the cart in the first place
		echo "Movies Unstocked";
	} else { 
		echo $conn->error;
	}
}

//same as CartEmpty.php
$delete = "DELETE FROM cart;";
echo $delete;
if ($conn->query($delete) === true) {
	echo "Cart Entries Deleted";
} else {
	echo $conn->error;
}	

?>
