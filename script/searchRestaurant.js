$(function() {
  $('#search_rest_submit').on('click', function(){//quando este form for submetido executar
    //save valeus
    var restaurantName = $('#restaurant_name').val();

    if( restaurantName == ""){
      var msgAlert = "You didn't enter the restaurant name!";
      alert(msgAlert);
    }
    else {
      var typeOfData = {'type': 'search_restaurant',
      'restaurantName': restaurantName
    }
    $.ajax({
      type: "POST",
      url: "restaurant_actions.php",
      dataType: "json",
      data: JSON.stringify(typeOfData)
    }).done(function(data){
        document.location.href='index.php?p=src/viewRestaurant&r='+data;
        console.log(data);
    }).fail(function(error) {
      alert( "error" );
      console.log(error);
    });
  }
}); // end of function form submit
});
