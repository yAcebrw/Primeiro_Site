<?php

session_start();

include_once '../src/model/produto.php';


if (isset($_POST['nome']) && isset($_POST['categoria']) && isset($_POST['preco']) ) {


    $nome = trim($_POST['nome']);
    $categoria = trim($_POST['categoria']);
    $preco = trim($_POST['preco']);



    $produto = new Produto();
    $message = $produto->createProduto($nome, $categoria, $preco);
    if ($message) {
        echo $message;
    }
}

?>