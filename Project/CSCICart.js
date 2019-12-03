$(document).ready(function(){

});

var data;
var length = 0;
function reqListener () {
      console.log(this.responseText);
    }
    var oReq = new XMLHttpRequest();
    oReq.onload = function() {
		data = this.responseText;
		var results = JSON.parse(data);
		length = results.length;
		displayResults(results);
		$("#numResults").html("Your Cart: " + length);
    };
    oReq.open("get", "CSCICart.php", true);
    oReq.send();

function displayResults(results){
  for (var i=0; i<length; i++) {
	  
    // Create clone from resultTemplate, add it to the page, and show it
    $("#resultTemplate").clone().attr("id", i).appendTo(".searchResults").show();

    // Update title
    let title = results[i].Movie_Title;
    $('.title').last().html(title);

    // Update information string
    let genres = results[i].Genres;
    let rating = results[i].Content_Rating;
    let runtime = results[i].Duration;
    let year = results[i].Year;
    let price = results[i].Price;
    $('.info').last().html(genres + " <br> " + rating + " &#183; " + runtime + " minutes &#183; " + year + " &#183; $" + price);

    // Update Stars
    let numStars = roundHalf(results[i].Critical_Rating);
    console.log(numStars);

    // Update stock status
    let stock = results[i].Stock;
    if (stock == 0){
      $(".in-stock").last().attr("class", "out-stock").html("Out-of-stock");
    }

    // Update visual i and increment it
    $(".resultIndex").last().html(i+1);

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
