<?php 

include('../config/conexao.php');
include_once '../src/model/produto.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die('ID inválido.');
}

$id = intval($_GET['id']);

$mysqli = new Conn();
$conn = $mysqli->getConnection();

$produto = new Produto();
$message = $produto->deletar($id);
if ($message) {
    echo $message;
}

?>