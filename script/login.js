$(function() {
  $('form#form_login').submit(function(){//quando este form for submetido executar
    //save valeus
    var userName = $('#username').val();
    var passWord = $('#password').val();

    if( userName == "" || passWord  == ""){
      alert("inserir user");
    }
    else {
      var typeOfData = {'type': 'login',
                        'userName': userName,
                        'passWord': passWord
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
          if (data.request == "successfully")
            document.location.href='index.php',true;
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
