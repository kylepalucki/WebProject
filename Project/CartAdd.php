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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$title = $_POST['title'];
	echo $title.'<br>';
	$query = "SELECT * FROM movie_rental WHERE Movie_Title='".$title."';";
	$result = mysqli_query($conn, $query);
	$info = mysqli_fetch_all($result, MYSQLI_ASSOC);
	//print_r($info);
	$countquery = "SELECT COUNT(*) FROM cart";
	$countresult = mysqli_query($conn, $countquery);
	$nums = mysqli_fetch_all($countresult, MYSQLI_ASSOC);
	print_r($nums);
	$count = $nums[0]['COUNT(*)']+1;
	echo $count;
	
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
	
	$add = "INSERT INTO cart VALUES(".$count.",".$movie_title.",".$genres.",".$content_rating.",".$duration.",".$year.",".$director.",".$imdb.",".$rating.",".$price.",".$stock.",".$numorders.");";
	echo $add;
	
	if ($conn->query($add) === true) {
		echo 'added to cart';
	} else {
		echo $conn->error;
	}
	
	
}

?>
