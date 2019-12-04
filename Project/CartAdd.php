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

if ($_SERVER["REQUEST_METHOD"] == "POST") { 
	$title = $_POST['title']; //read in movie title from js method
	$query = "SELECT * FROM movie_rental WHERE Movie_Title='".$title."';"; //run query using title to get movie from movie_rental table
	$result = mysqli_query($conn, $query);
	$info = mysqli_fetch_all($result, MYSQLI_ASSOC);
	$countquery = "SELECT COUNT(*) FROM cart"; //i used this to assign an ID when adding to cart
	$countresult = mysqli_query($conn, $countquery);
	$nums = mysqli_fetch_all($countresult, MYSQLI_ASSOC);
	$count = $nums[0]['COUNT(*)']+1; //<-ID of next item inserted in cart
	
	
	//parsed movie elements, converted to appropriate types to be inserted into cart database
	$movie_title = "'".$info[0]['Movie_Title']."'";
	$genres = "'".$info[0]['Genres']."'";
	$content_rating = "'".$info[0]['Content_Rating']."'";
	$duration = "'".$info[0]['Duration']."'";
	$year = "'".$info[0]['Year']."'";
	$director = "'".$info[0]['Director']."'";
	$imdb = "'".$info[0]['IMDB_Link']."'";
	$rating = $info[0]['Critical_Rating'];
	$price = $info[0]['Price'];
	$stock = $info[0]['Stock'];
	$numorders = $info[0]['NumOrders'];
	
	$add = "INSERT INTO cart VALUES(".$count.",".$movie_title.",".$genres.",".$content_rating.",".$duration.",".$year.",".$director.",".$imdb.",".$rating.",".$price.",".$stock.",".$numorders.");"; //insert movie into cart table
	
	if ($conn->query($add) === true) {
		echo 'added to cart';
	} else {
		echo $conn->error;
	}
	
	
}

?>
