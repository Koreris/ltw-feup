function RegSuc() {
   alert('Registo feito com sucesso');
   alert('Será redirecionado em 3 segundos');
   setTimeout(function(){
     window.location="../index.php";
   },3000); /* 1000 = 1 second*/
}