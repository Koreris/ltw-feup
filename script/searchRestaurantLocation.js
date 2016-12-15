$(function() {
  $('#search_rest_loc_submit').on('click', function(){//quando este form for submetido executar
    //save valeus
    var restaurantLocation = $('#restaurant_location').val();

    if( restaurantLocation == ""){
      var msgAlert = "You didn't enter the restaurant location!";
      alert(msgAlert);
    }
    else {
      var typeOfData = {'type': 'search_restaurant_location',
      'restaurantLocation': restaurantLocation
    }
    $.ajax({
      type: "POST",
      url: "restaurant_actions.php",
      dataType: "json",
      data: JSON.stringify(typeOfData)
    }).done(function(data){
        if (data != null){
          document.location.href='index.php?p=src/locationRestaurant&r='+data;
          //console.log(data);
        }
    }).fail(function(error) {
      alert( "error" );
      console.log(error);
    });
  }
}); // end of function form submit
});
