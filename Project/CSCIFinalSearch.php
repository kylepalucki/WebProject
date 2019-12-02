<?php
  // Grab values from server
  $searchTerm = $_POST['search'];

  $details = $_POST['details'];
  $exclusive = $_POST['exclusive'];

  $availability = $_POST['availability'];
  $ratings = explode(",", join(',', $_POST['ratings']));
  $genres = $_POST['genres'];
  $duration = $_POST['duration'];
  $price = $_POST['price'];
  $year = $_POST['year'];
  $critical = $_POST['critical'];

  // Remove the "placeholder" that allowed them to be passed when no checkboxes were checked
  array_shift($details);
  array_shift($exclusive);
  array_shift($availability);
  array_shift($ratings);
  array_shift($genres);

  // Check for hiding movies with missing details and genres both/and filter
  $hideMissingDetails = !empty($details);
  $makeGenresBothAnd = !empty($exclusive);

  // Connect to database
  $servername = "localhost";
  $username = "root";
  $password = "";
  $db = "movie_rental";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $db);

  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

  // Create query
  $query = "SELECT * FROM movie_metadata WHERE Movie_Title LIKE '%".$searchTerm."%'";

  // Append filters to query
  $query = filterAvailability($query, $availability);
  $query = filterCheckboxQuery($query, $ratings, "Content_Rating", 15, $hideMissingDetails, $makeGenresBothAnd);
  $query = filterCheckboxQuery($query, $genres, "Genres", 20, $hideMissingDetails, $makeGenresBothAnd, "%");
  $query = filterSliderQuery($query, $duration, "Duration", $hideMissingDetails);
  $query = filterSliderQuery($query, $price, "Price", $hideMissingDetails);
  $query = filterSliderQuery($query, $year, "Year", $hideMissingDetails);
  $query = filterSliderQuery($query, $critical, "Critical_Rating", $hideMissingDetails);

  $query .= " ORDER BY Critical_Rating DESC";
  //var_dump($query);

  // Execute query
  $result = mysqli_query($conn, $query);
  $info = mysqli_fetch_all($result, MYSQLI_ASSOC);

  $conn->close();

  $js_array = json_encode($info);
  echo $js_array;

 // ----------------------------------------------------------------------------
  function filterAvailability($s, $arrFilter){
    if(!empty($arrFilter)){
      if(count($arrFilter)==2){}
      else{
        $s .= " AND" ."(";
        for ($i=0; $i<count($arrFilter); $i++){
          if($arrFilter[$i] == "Available"){
            $s .= "Stock > 0";
          }
          else{
            $s .= "Stock = 0";
          }
        }
        $s .= ")";
      }
    }
    return $s;
  }

  function filterCheckboxQuery($s, $arrFilter, $col, $max, $hideMissingDetails, $makeGenresBothAnd, $wildcard = ""){
    if((count($arrFilter) == $max && !$hideMissingDetails) || ($col == "Content_Rating" && !$hideMissingDetails && empty($arrFilter))){}
    else{
      if((empty($arrFilter) || count($arrFilter) == $max) && $col == "Content_Rating" && $hideMissingDetails){
        $s .= "AND (Content_Rating NOT LIKE '%N/A%')";
      }
      else{
        if(!$hideMissingDetails && $col == "Content_Rating"){
          array_push($arrFilter, 'N/A');
        }
        if (!empty($arrFilter)){
          $s .= " AND " ."(";
          $s .= $col." LIKE '".$wildcard.$arrFilter[0].$wildcard."'";
        }
        if($makeGenresBothAnd && $col == "Genres"){
          for ($i=1; $i<count($arrFilter); $i++){
            $s .= " AND ".$col." LIKE '".$wildcard.$arrFilter[$i].$wildcard."'";
          }
        }
        else{
          for ($i=1; $i<count($arrFilter); $i++){
            $s .= " OR ".$col." LIKE '".$wildcard.$arrFilter[$i].$wildcard."'";
          }
        }
        if(!empty($arrFilter)){
          $s .= ")";
        }
      }
    }
    return $s;
  }

  function filterSliderQuery($s, $arrFilter, $col, $hideMissingDetails){
    $s .= " AND " ."(".$col." BETWEEN ".$arrFilter[0]." AND ".$arrFilter[1];
    if(!$hideMissingDetails){
      $s .= " OR ".$col." LIKE 'N/A')";
    }
    else{
      $s .= ")";
    }
    return $s;
  }
?>
