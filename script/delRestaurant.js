$(function() {
  $('#delRestaurant').on('click', function(){
    var name = $('#name').val();
    var location = $('#location').val();

   
      if( name == "" ){
      var msgAlert = "This operation cannot be reversed, so proceed with caution.";
      alert(msgAlert);
    }
    else {
      var typeOfData = {'type': 'delete',
      'name': name,
      'location': location
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
