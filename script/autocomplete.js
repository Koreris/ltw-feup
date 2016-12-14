$( function() {
  var restaurant = [];
  var typeOfData = {'type': 'allRestaurants'}
  $.ajax({
    type: "POST",
    url: "restaurant_actions.php",
    dataType: "json",
    data: JSON.stringify(typeOfData)
  }).done(function(data){
    $(data).each(function(key, value) {
      restaurant.push(value.name);
    });
    $('#restaurant_name').autocomplete({ source: restaurant});
    //console.log(restaurant);
  }).fail(function(error) {
    alert( "error" );
    console.log(error);
  });
} );
