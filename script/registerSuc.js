$(function() {
    $("#submit").on('click', function() {
        setTimeout(function() {
            window.location = "index.php";
        }, 2000); // 1000 = 1 second
        alert('Registo feito com sucesso\nSerá redirecionado em 2 segundos');
    });
});
//Não estou a usar 
