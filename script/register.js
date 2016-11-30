$(function() {
  $('#submit_register').on('click', function(){//quando este form for submetido executar
    //save valeus
    var userName = $('#username').val();
    var passWord = $('#password').val();
    var name = $('#name').val();
    var email = $('#email').val();
    var location = $('#location').val();
    var nationality = $('#nationality').val();

    if( userName == "" || passWord  == "" || name  == "" || email  == "" || location  == "" || nationality  == ""){
      alert("All fields are required to register");
    }
    else {
      var typeOfData = {'type': 'register',
                        'userName': userName,
                        'passWord': passWord,
                        'name': name,
                        'email': email,
                        'location': location,
                        'nationality': nationality
                      }
    $.ajax({
            type: "POST",
            url: "user_actions.php",
            //contentType: "application/json",
            dataType: "json",
            data: JSON.stringify(typeOfData)
            /*data:{
            username: userName,
            password: passWord
          }*/
        }).done(function(data){
          if (data.request == "successfully"){
            //document.location.href='index.php?p=src/login';
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
