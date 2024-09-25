<?php

//Verifica se não tem uma sessão aberta
if(!isset($_SESSION)){
  session_start();
}

//Finaliza a sessão
session_destroy();
header("Location: ../index.php");

