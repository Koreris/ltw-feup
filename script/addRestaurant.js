$(function() {
  $('#submit_restaurant').on('click', function(){//quando este form for submetido executar
    //save valeus
    var name = $('#rest_name').val();
    var location = $('#rest_location').val();
    var description = $('#rest_description').val();
    var c_type = $('#c_type').val();
    var price_range = $('#price_range').val();
    var opening_time = $('#opening_time').val();
    console.log(opening_time);  
    var closing_time = $('#opening_time').val();

    if( name == "" || location  == "" || description  == "" || c_type  == "" || price_range  == "" || opening_time  == "" || closing_time == ""){
      var msgAlert = "All fields are required to add a restaurant. You didn't enter: ";
      if (name == "" )
          msgAlert += "\n - Name " ;
      if (location  == "")
          msgAlert += "\n - Location " ;
      if (description  == "" )
          msgAlert += "\n - Description " ;
      if (type  == "")
          msgAlert += "\n - Cuisine Type " ;
      if (price_range  == "")
          msgAlert += "\n - Price Range " ;
      if (opening_time  == "")
          msgAlert += "\n - Opening Time " ;
      if (closing_time  == "")
          msgAlert += "\n - Closing Time " ;
      alert(msgAlert);
    }
    else {
      var typeOfData = {'type': 'insert',
      'name': name,
      'location': location,
      'description': description,
      'c_type': c_type,
      'price_range': price_range,
      'opening_time': opening_time,
      'closing_time': closing_time
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
