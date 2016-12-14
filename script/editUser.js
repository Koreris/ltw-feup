$(function() {
  $('#submit_editUser').on('click', function(){//quando este form for submetido executar
    //save valeus
    var userName = $('#username').val();
    var passWord = $('#password').val();
    var isOwner = 0;
    var isReviewer = 0;
    var name = $('#name').val();
    var email = $('#email').val();
    var location = $('#location').val();
    var nationality = $('#nationality').val();
    var userType = $('input[name="user_type"]:checked').val();

    if (userType == "owner"){
      isOwner = 1;
    }
    else{
      isReviewer = 1;
    }

    if( userName == ""|| name  == "" || email  == "" || location  == "" || nationality  == ""){ // || passWord  == ""
      var msgAlert = "All fields are required to register. You didn't enter: ";
      if (userName == "" )
          msgAlert += "\n - userName " ;
      //if (passWord  == "")
      //    msgAlert += "\n - password " ;
      if (name  == "" )
          msgAlert += "\n - name " ;
      if (email  == "")
          msgAlert += "\n - email " ;
      if (location  == "")
          msgAlert += "\n - location " ;
      if (nationality  == "")
          msgAlert += "\n - nationality " ;
      alert(msgAlert);
    }
    else {
      var typeOfData = {'type': 'update',
      'userName': userName,
      'passWord': passWord,
      'isOwner': isOwner,
      'isReviewer': isReviewer,
      'name': name,
      'email': email,
      'location': location,
      'nationality': nationality
    }
    $.ajax({
      type: "POST",
      url: "user_actions.php",
      dataType: "json",
      data: JSON.stringify(typeOfData)
    }).done(function(data){
      if (data.request == "Successfully".toLowerCase() ){
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
