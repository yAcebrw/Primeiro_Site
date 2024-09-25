<?php
require_once('../config/conexao.php');
if (!isset($_SESSION)) {
  session_start();
}
class Produto
{

  private int $id;
  private float $preco;
  private String $nome;
  private String $categoria;

  // ---------------------------------------------------------------------------------------------------------
  // ---------------------------------------------------------------------------------------------------------
  // ---------------------------------------------------------------------------------------------------------

  function createProduto($nome, $categoria, $preco)
  {
    $mysqli = new Conn();
    $connection = $mysqli->getConnection();

    $stmt = $connection->prepare("INSERT INTO produtos (nome, preco, categoria) VALUES (?, ?, ?)");

    if ($stmt) {
      $stmt->bind_param("ssd", $nome, $categoria, $preco);

      if ($stmt->execute()) {
        header('Location: ../view/painel.php');

        $_SESSION['mensagem'] = 'Produto criado com sucesso!';
        $_SESSION['sucesso'] = 0;

        header('Location: ../view/painel.php');

        exit;
      } else {
        $_SESSION['mensagem'] = 'Falha ao criar o produto';
        $_SESSION['erro'] = 0;
        echo "Erro ao inserir: " . $stmt->error;
      }

      $stmt->close();
    } else {
      echo "Erro ao preparar a consulta: " . $connection->error;
    }

    $connection->close();
  }

  // ---------------------------------------------------------------------------------------------------------
  // ---------------------------------------------------------------------------------------------------------
  // ---------------------------------------------------------------------------------------------------------


  function editarProduto($nome, $categoria, $preco, $where)
  {

    $mysqli = new Conn();
    $connection = $mysqli->getConnection();


    $stmt = $connection->prepare("UPDATE produtos SET nome = ?, categoria = ?, preco = ? WHERE id = ?");

    if ($stmt) {

      $stmt->bind_param("ssdi", $nome, $categoria, $preco, $where);


      if ($stmt->execute()) {



        $_SESSION['mensagem'] = 'Produto alterado com sucesso!';
        $_SESSION['sucesso'] = 0;


        header('Location: ../view/painel.php');

        exit;
      } else {

        $_SESSION['mensagem'] = 'Falha ao alterar o produto';
        $_SESSION['erro'] = 0;
        echo "Erro ao atualizar: " . $stmt->error;
      }

      $stmt->close();
    } else {

      echo "Erro ao preparar a consulta: " . $connection->error;
    }

    // Fecha a conexão
    $connection->close();
  }

  // ---------------------------------------------------------------------------------------------------------
  // ---------------------------------------------------------------------------------------------------------
  // ---------------------------------------------------------------------------------------------------------

  function deletar($id)
  {
    $mysqli = new Conn();
    $id = $mysqli->getConnection()->real_escape_string($id);

    $sql = "DELETE FROM produtos WHERE id = '$id'";

    $_SESSION['mensagem'] = 'Produto deletado com sucesso!';
    $_SESSION['sucesso'] = 0;

    header('Location: ../view/painel.php');
    

    return $mysqli->getConnection()->query($sql);
  }

  // ---------------------------------------------------------------------------------------------------------
  // ---------------------------------------------------------------------------------------------------------
  // ---------------------------------------------------------------------------------------------------------


  function listProdutos()
  {
    $mysqli = new Conn();
    $sql = "SELECT * FROM produtos";
    return $mysqli->getConnection()->query($sql);
  }

  // ---------------------------------------------------------------------------------------------------------
  // ---------------------------------------------------------------------------------------------------------
  // ---------------------------------------------------------------------------------------------------------


  /**
   * Get the value of id
   */
  public function getId()
  {
    return $this->id;
  }

  /**
   * Set the value of id
   *
   * @return  self
   */
  public function setId($id)
  {
    $this->id = $id;

    return $this;
  }

  /**
   * Get the value of preco
   */
  public function getPreco()
  {
    return $this->preco;
  }

  /**
   * Set the value of preco
   *
   * @return  self
   */
  public function setPreco($preco)
  {
    $this->preco = $preco;

    return $this;
  }


  /**
   * Get the value of categoria
   */
  public function getCategoria()
  {
    return $this->categoria;
  }

  /**
   * Set the value of categoria
   *
   * @return  self
   */
  public function setCategoria($categoria)
  {
    $this->categoria = $categoria;

    return $this;
  }

  /**
   * Get the value of nome
   */
  public function getNome()
  {
    return $this->nome;
  }

  /**
   * Set the value of nome
   *
   * @return  self
   */
  public function setNome($nome)
  {
    $this->nome = $nome;

    return $this;
  }
}
