$(function() {
  $('#submit_login').on('click', function(){//quando este form for submetido executar
    //save valeus
    var userName = $('#username').val();
    var passWord = $('#password').val();

    if( userName == "" || passWord  == ""){
      var msgAlert = "You didn't enter: ";
      if (userName == "" )
        msgAlert += "\n - userName " ;
      if (passWord  == "")
        msgAlert += "\n - password " ;
      alert(msgAlert);
    }
    else {
      var typeOfData = {'type': 'login',
      'userName': userName,
      'passWord': passWord
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
