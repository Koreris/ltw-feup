$(function() {
  $('#submit_login').on('click', function(){//quando este form for submetido executar
    //save valeus
    var restaurantName = $('#restaurant_name').val();

    if( restaurantName == ""){
      var msgAlert = "You didn't enter: ";
      msgAlert += "\n - userName " ;
      alert(msgAlert);
    }
    else {
      var typeOfData = {'type': 'search_restaurant',
      'restaurantName': restaurantName
    }
    $.ajax({
      type: "POST",
      url: "search_action.php",
      dataType: "json",
      data: JSON.stringify(typeOfData)
    }).done(function(data){
      if (data.request == "Successfully".toLowerCase() ){
        //document.location.href='index.php';
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
