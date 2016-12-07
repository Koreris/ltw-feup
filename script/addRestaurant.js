$(function() {
  $('#submit_restaurant').on('click', function(){//quando este form for submetido executar
    //save valeus
    var name = $('#rest_name').val();
    var location = $('#rest_location').val();
    var description = $('#rest_description').val();
    var cuisineType = $('#c_type').val();
    var priceRange = $('#p_range').val();
    var openHour = $('#op_hour').val();
    var closingHour = $('#cl_hour').val();

    if( name == "" || location  == "" || description  == "" || cuisineType  == "" || priceRange  == "" || openHour  == "" || closingHour == ""){
      var msgAlert = "All fields are required to add a restaurant. You didn't enter: ";
      if (name == "" )
          msgAlert += "\n - Name " ;
      if (location  == "")
          msgAlert += "\n - Location " ;
      if (description  == "" )
          msgAlert += "\n - Description " ;
      if (cuisineType  == "")
          msgAlert += "\n - Cuisine Type " ;
      if (priceRange  == "")
          msgAlert += "\n - Price Range " ;
      if (openHour  == "")
          msgAlert += "\n - OpenHour " ;
      if (closingHour  == "")
          msgAlert += "\n - ClosingHour " ;
      alert(msgAlert);
    }
    else {
      var typeOfData = {'type': 'insert',
      'name': name,
      'location': location,
      'description': description,
      'cuisineType': cuisineType,
      'priceRange': priceRange,
      'openHour': openHour,
      'closingHour': closingHour
    }
    $.ajax({
      type: "POST",
      url: "restaurant_actions.php",
      dataType: "json",
      data: JSON.stringify(typeOfData)
    }).done(function(data){
      if (data.request != -1){
        document.location.href='index.php';
        console.log(data);
      }
      else{
        alert(data.msg);
        console.log(data);
      }
    }).fail(function(error) {
      alert( "error" );
      console.log(error);
    });
  }
}); // end of function form submit
});
