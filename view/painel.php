<?php
include("../config/protect.php");
include("../src/model/produto.php");
include('../src/model/mensagem.php');

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lista de Produtos</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../style.css">
</head>

<body>
  <?php include('navbar.php'); ?>

  <div class="container mt-4">
    <div class="row">
      <div class="card">
        <div class="card-header">
          <h4>Lista de Produtos <a href="register_produto_view.php" class="btn btn-primary float-end">Cadastrar Produto</a></h4>
        </div>
        

        
        <?php

                           //Setup de mensagens

        if (isset($_SESSION['sucesso']) && isset($_SESSION['mensagem'])) {
          mensagem('sucesso');                                                         
        } elseif (isset($_SESSION['erro']) && isset($_SESSION['mensagem'])) {
          mensagem('erro');
        }
        ?>

        <div class="card-body">
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                           <!-- Cabeçalho da tabela de produtos -->
                <th>ID</th>
                <th>Preço</th>
                <th>Categoria</th>
                <th>Nome</th>
                <th>Ações</th>
              </tr>
            </thead>
            <tbody>
              <?php

              //                          Mostra todos os produtos
              $produto = new Produto();
              $produtos = $produto->listProdutos();

              if (mysqli_num_rows($produtos) > 0) {
                foreach ($produtos as $produto) {
                  ?>
                  <tr>
                    <td><?= $produto['id']; ?></td>
                    <td><?= 'R$ ' . number_format($produto['preco'], 2, ',', '.'); ?></td>
                    <td><?= htmlspecialchars($produto['categoria']); ?></td>
                    <td><?= htmlspecialchars($produto['nome']); ?></td>
                    <td>

                      <!-- Botões de ações -->
                      <a href="../acoes/visualizar_produtos.php?id=<?= htmlspecialchars($produto['id']); ?>" class="btn btn-secondary">Visualizar</a>
                      <a href="../acoes/editar_produtos.php?id=<?= htmlspecialchars($produto['id']); ?>" class="btn btn-success">Editar</a>
                      <a href="?id=<?= $produto['id']; ?>" class="btn btn-danger">Excluir</a>
                      <!-- ---------------- -->
                    </td>
                  </tr>
                  <?php
                }
              } else {
                echo "<tr><td colspan='5'>Nenhum produto encontrado.</td></tr>";
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <?php

  $id = isset($_GET['id']) ? intval($_GET['id']) : null;

  if ($id) { 

    //Se um número for adicionado para o URL o programa irá chamar esse algorítimo
    $mysqli = new Conn();
    $conn = $mysqli->getConnection();
    
    $sql = "SELECT * FROM produtos WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);
    
    // -------------------------------------------------------------------------------------------------------------------------------
    // -------------------------------------------------------------------------------------------------------------------------------
    // -------------------------------------------------------------------------------------------------------------------------------

    if ($stmt->execute()) {
      $result = $stmt->get_result();
      if ($result->num_rows > 0) {
        $produto_modal = $result->fetch_assoc();
        ?>


        <!-- Modal de Confirmação -->
        <div class="modal fade show" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="false" style="display: block;">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="confirmModalLabel">Confirmar Exclusão</h5>
              </div>
              <div class="modal-body">
                <p class="text-center">Tem certeza de que deseja excluir este produto?</p>
                <div class="container mt-4">
                  <div class="row justify-content-center">
                    <div class="align-left">
                      <div class="product-info">


                        <!-- Informações do produto antes da confirmação da exclusão -->

                        <p><strong>ID:</strong> <?= $produto_modal['id']; ?></p>
                      </div>
                      <div class="product-info">
                        <p><strong>Título:</strong> <?= htmlspecialchars($produto_modal['nome']); ?></p>
                      </div>
                      <div class="product-info">
                        <p><strong>Preço:</strong> R$ <?= number_format($produto_modal['preco'], 2, ',', '.'); ?></p>
                      </div>
                      <div class="product-info">
                        <p><strong>Categoria:</strong> <?= htmlspecialchars($produto_modal['categoria']); ?></p>

                        <!-- ------------------------------------------------------- -->

                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Confirmação de exclusão do produto -->
              <div class="modal-footer">
                <a href="javascript:history.back()" class="btn btn-secondary">Cancelar</a>
                <a href="../acoes/excluir.php?id=<?= $produto_modal['id']; ?>" class="btn btn-danger">Excluir</a>
                <!-- -------------------------------- -->
              </div>
            </div>
          </div>
        </div>
        <?php
        // -------------------------------------------------------------------------------------------------------------------------------
      }
    }
  }
  ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
