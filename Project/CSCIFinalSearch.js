$(document).ready(function(){
  $("#duration-slider").slider();
  $("#price-slider").slider();
  $("#year-slider").slider();
  $("#critical-slider").slider();

  $('input[name="search"]').on('keydown', function (e) {
    if (e.keyCode === 13) {
      e.preventDefault();
      searchForMovies();
      $(this).blur();
    }
  });
	//addMovie();
});

function addcart(id){
	let title = searchResults[id].Movie_Title;
	addMovie(title);
	alert("added to cart");
}

function addMovie(title){
	$.post("CartAdd.php", {title: title}, function(data){
	});
}

function searchForMovies(){
  var search = $('input[name="search"]').val();

  var details = ["placeholder"];
  var exclusive = ["placeholder"];

  var availability = ["placeholder"];
  var ratings = ["placeholder"];
  var genres = ["placeholder"];
  var duration = $("#duration-slider").val().split(",").map(Number);
  var price = $("#price-slider").val().split(",").map(Number);
  var year = $("#year-slider").val().split(",").map(Number);
  var critical = $("#critical-slider").val().split(",").map(Number);

  $("input:checkbox[name=detailsFilter]:checked").each(function(){
    details.push($(this).val());
  });
  $("input:checkbox[name=exclusiveFilter]:checked").each(function(){
    exclusive.push($(this).val());
  });

  $("input:checkbox[name=availability]:checked").each(function(){
    availability.push($(this).val());
  });
  $("input:checkbox[name=ratings]:checked").each(function(){
    ratings.push($(this).val());
  });
  $("input:checkbox[name=genres]:checked").each(function(){
    genres.push($(this).val());
  });

  $.post("CSCIFinalSearch.php", {search: search, details: details, exclusive: exclusive, availability: availability, ratings: ratings, genres: genres, duration: duration, price: price, year: year, critical: critical},
  function(data) {
    $('#searchForm')[0].reset();
    console.log(data);
    window.searchResults = JSON.parse(data);
    window.numResults = searchResults.length;
    window.resultsIndex = 0;
    $("#numResults").html(numResults + " Results");
    $(".searchResults").empty();
    displayResults(searchResults);
  });

  $("#search").blur();
}


function displayResults(results){
  let index = 0;
  while(index < 25 && resultsIndex != numResults){
    // Create clone from resultTemplate, add it to the page, and show it
    $("#resultTemplate").clone().attr("id", resultsIndex).appendTo(".searchResults").show();

    // Update title
    let title = results[resultsIndex].Movie_Title;
    $('.title').last().html(title);

    // Update information string
    let genres = results[resultsIndex].Genres;
    let rating = results[resultsIndex].Content_Rating;
    let runtime = results[resultsIndex].Duration;
    let year = results[resultsIndex].Year;
    let price = results[resultsIndex].Price;
    $('.info').last().html(genres + " <br> " + rating + " &#183; " + runtime + " minutes &#183; " + year + " &#183; $" + price);

    // Update Stars
    let numStars = roundHalf(results[resultsIndex].Critical_Rating);
    console.log(numStars);

    // Update stock status
    let stock = results[resultsIndex].Stock;
    if (stock == 0){
      $(".in-stock").last().attr("class", "out-stock").html("Out-of-stock");
    }

    // Update visual resultsIndex and increment it
    $(".resultIndex").last().html(++resultsIndex);

    index++;
  }
}

window.onscroll = function(ev) {
  if ((window.innerHeight + window.pageYOffset + 1) >= document.body.offsetHeight) {
      displayResults(searchResults);
  }
};

function roundHalf(num) {
    return Math.round(num*2)/2;
}
