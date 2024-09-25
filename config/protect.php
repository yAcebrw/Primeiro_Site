<?php
//Proteção para não abrir uma aba sem ter uma sessão iniciada
if(!isset($_SESSION)){
  session_start();
}

if(!isset($_SESSION['id'])){
  die("Você não pode acessar essa pagina!");
}

?>