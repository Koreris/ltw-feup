$(function() {
  //TODO buscar valor a bd caso já exista
$('.rating label span').on('click mouseover',function(){
    // Remove starOn class from all stars
    $('.rating label span').removeClass('starOn');
    // Save input value
    var value = $(this).prev('input').val();
    // Go through all the stars
    $('.rating label span').each(function(){

        var input = $(this).prev('input'); //Previously saved value
        if(input.val() <= value){
            $(this).addClass('starOn');
        }
    });
});

$('.rating').mouseleave(function(){

    var value = $(this).find('input:checked').val();
    //If no radio input is selected disable all stars
    if(value == undefined ){
        $('.rating label span').removeClass('starOn');
    } else {
        // Go through all the stars
        $('.rating label span').each(function(){

            var input = $(this).prev('input'); //Previously saved value
            if(input.val() > value){
                $(this).removeClass('starOn');
            } else {
                $(this).addClass('starOn');
            }
          //  console.log("val "+val);
          //  console.log("$input"+ $input.val());
        });
    }
    $("#rating_value").html( $('input[name="input_star"]:checked').val()); //TODO guardar este valor na bd
});
});
