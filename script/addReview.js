$(function(){
  $('#addReview').on('click', function(){
    var restaurantId = $('#restaurant_id').val();
    var userId = $('#user_id').val();
    var reviewText = $('#review_text').val();
    var reviewDate = $.datepicker.formatDate('yy-mm-dd', new Date());
    var ratingValue =  $('input[name="input_star"]:checked').val();
    var priceRange = 2;

    if(restaurantId == "" || userId == "" || reviewText == "" || reviewDate == "" || ratingValue == "" || priceRange == ""){
      var msgAlert = "All fields are required to register. You didn't enter: ";
      if (restaurantId == "" )
          msgAlert += "\n - restaurantId " ;
      if (userId  == "")
          msgAlert += "\n - userId " ;
      if (reviewText  == "" )
          msgAlert += "\n - reviewText " ;
      if (reviewDate  == "")
          msgAlert += "\n - reviewDate " ;
      if (ratingValue  == "")
          msgAlert += "\n - ratingValue " ;
      if (priceRange  == "")
          msgAlert += "\n - priceRange " ;
      alert(msgAlert);
    }else {
      var typeOfData = {'type': 'addReview',
      'restaurantId': restaurantId,
      'userId': userId,
      'reviewText': reviewText,
      'reviewDate': reviewDate,
      'ratingValue': ratingValue,
      'priceRange': priceRange
    }
    console.log(typeOfData);
    $.ajax({
      type: "POST",
      url: "review_actions.php",
      dataType: "json",
      data: JSON.stringify(typeOfData)
    }).done(function(data){
      if (data.request == "Successfully".toLowerCase() ){
        location.reload();
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

    $("#rating_value").html( $('input[name="input_star"]:checked').val());
  });

});
