function goDoSomething(id_review){

    var userId = $('#user_id'+id_review).val();
    var reviewId = $('#review_id'+id_review).val();
    var commentText = $('#comment_text'+id_review).val();
    var commentDate = $.datepicker.formatDate('yy-mm-dd', new Date());

    if(userId == "" || reviewId == "" || commentText == "" || commentDate == ""){
      var msgAlert = "All fields are required to register. You didn't enter: ";
      if (userId == "" )
          msgAlert += "\n - userId " ;
      if (reviewId  == "")
          msgAlert += "\n - reviewId " ;
      if (commentText  == "" )
          msgAlert += "\n - commentText " ;
      if (commentDate  == "")
          msgAlert += "\n - commentDate " ;
      alert(msgAlert);
    }else {
      var typeOfData = {'type': 'addComment',
      'userId': userId,
      'reviewId': reviewId,
      'commentText': commentText,
      'commentDate': commentDate
    }
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
  }
//  });

//});
