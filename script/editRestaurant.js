$(function() {
  $('#editRestaurant').on('click', function(){
    var name = $('#name').val();
    var location = $('#location').val();
    var description = $('#description').val();
    var cuisine_type = $('#cuisine_type').val();
    var price_range = $('#price_range').val();
    var opening_time = $('#opening_time').val();
    var closing_time = $('#closing_time').val();
    var user_id = $('#user_id').val();
    console.log(user_id);

    if( name == "" || location  == "" || description  == "" || cuisine_type  == "" || price_range  == "" || opening_time  == "" || closing_time == ""){
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
      'user_id': user_id,
      'location': location,
      'description': description,
      'cuisine_type': cuisine_type,
      'opening_time': opening_time,
      'closing_time': closing_time,
      'price_range': price_range
    }
    
    //console.log(typeOfData);
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
