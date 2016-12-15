$( function() {
  var location = [];
  var typeOfData = {'type': 'allRestaurants'}
  $.ajax({
    type: "POST",
    url: "restaurant_actions.php",
    dataType: "json",
    data: JSON.stringify(typeOfData)
  }).done(function(data){
    $(data).each(function(key, value) {
      location.push(value.location);
    });
    $('#restaurant_location').autocomplete({ source: location});
    //console.log(restaurant);
  }).fail(function(error) {
    alert( "error" );
    console.log(error);
  });
} );
