<?php 

if(!isset($_SESSION)){
    session_start();
}
if(!isset($_SESSION['login'])) {
    die("<h2>Essa página não pode ser acessada. Favor realizar login.</h2><br><button><a href=\"index.php\"<a/>Voltar</button>");
}

?>