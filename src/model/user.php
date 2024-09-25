<?php

include_once __DIR__ . '/../../config/conexao.php';

class User {
    private $conn;
    
    public function __construct() {
        $database = new Conn();
        $this->conn = $database->getConnection();
    }

    public function register($email, $senha) {
        if (empty($email) || empty($senha)) {
            return "Informe seu email e senha";
        }

        $email = $this->conn->real_escape_string($email);
        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

        $stmt = $this->conn->prepare("INSERT INTO users (email, senha) VALUES (?, ?)");
        $stmt->bind_param("ss", $email, $senhaHash);

        if ($stmt->execute()) {
            header('Location: ../index.php');
            include_once '../';
            exit();
        } else {
            return "Erro ao registrar usuário: " . $stmt->error;
        }
    }
// ------------------------------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------------------------------

    public function login($email, $senha) {
        if (empty($email) || empty($senha)) {
            return "Informe seu email e senha";
        }

        $email = $this->conn->real_escape_string($email);

        $stmt = $this->conn->prepare("SELECT * FROM users WHERE email = ?");
        if (!$stmt) {
            error_log("Erro na preparação da consulta: " . $this->conn->error, 3, "/var/log/php_errors.log");
            return "Desculpe, houve um problema interno. Por favor, tente novamente mais tarde.";
        }

        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $usuario = $result->fetch_assoc();
            if (password_verify($senha, $usuario['senha'])) {
                $_SESSION['id'] = $usuario['id'];
                $_SESSION['nome'] = $usuario['nome'];
                header('Location: view/painel.php');
                exit();
            } else {
                return 'Email ou senha inválidos';
            }
        } else {
            return 'Email ou senha inválidos';
        }
    }
}
?>
