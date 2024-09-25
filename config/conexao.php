<?php

class Conn
{
    private $usuario = 'root';
    private $senha = '';
    private $database = 'banco_de_dados';
    private $host = 'localhost';

    public function getConnection()
    { 
        // Criação da conexão com o banco de dados
        $mysqli = new mysqli($this->host, $this->usuario, $this->senha, $this->database);

        // Verifique se houve erro na conexão
        if ($mysqli->connect_error) {
            // Log o erro para análise posterior
            error_log("Erro na conexão com o banco de dados: " . $mysqli->connect_error, 3, "/var/log/php_errors.log");
            
            echo "Desculpe, houve um problema interno. Por favor, tente novamente mais tarde.";
            exit();
        }

        return $mysqli;
    }
}
?>