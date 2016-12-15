$(function() {

  $('#delRestaurant').on('click', function() {

    var restaurant_id = $('#restaurant_id').val();
    var user_id = $('#user_id').val();

    if (user_id == "" || restaurant_id == "") {
      alert("You're not logged in or this restaurant isn't valid.");
      return;
    } else {
      var typeOfData = {
        'type': 'delete',
        'restaurant_id': restaurant_id,
        'user_id': user_id
      }

      $.ajax({
        type: "POST",
        url: "restaurant_actions.php",
        dataType: "json",
        data: JSON.stringify(typeOfData)
      }).done(function (data) {
        if (data.request != -1) {
          document.location.href = 'index.php';
          console.log(data);
        } else {
          alert(data.msg);
          console.log(data);
        }
      }).fail(function (error) {
        alert("error");
        console.log(error);
      });
    }
  }); // end of function form submit
});