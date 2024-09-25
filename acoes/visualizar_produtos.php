<?php
include('../config/conexao.php');

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die('ID inválido.');
}

$id = intval($_GET['id']);

$mysqli = new Conn();
$conn = $mysqli->getConnection();

$sql = "SELECT * FROM produtos WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $id);

if ($stmt->execute()) {
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $produto = $result->fetch_assoc();
        ?>

<!-- ---------------------------------------------- -->
<!-- ---------------------------------------------- -->
<!-- ---------------------------------------------- -->

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detalhes do Produto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .product-card {
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            margin-top: 2rem;
        }
        .product-header {
            padding: 1rem;
            border-bottom: 1px solid #ddd;
            background-color: #007bff;
            color: #fff;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }
        .product-body {
            padding: 1.5rem;
        }
        .product-info {
            display: flex;
            align-items: center; /* Alinha verticalmente no centro */
            border-bottom: 1px solid #ddd;
            padding: 1.5rem 0; /* Aumenta o padding vertical */
        }
        .product-info p {
            margin: 0;
            text-align: left; /* Alinha o texto à esquerda */
            width: 100%;
        }
        .product-info:last-child {
            border-bottom: none; /* Remove a borda inferior da última divisão */
        }
        .product-footer {
            padding: 1rem;
            border-top: 1px solid #ddd;
            text-align: center;
        }
        .btn-back {
            text-decoration: none;
            color: #007bff;
            font-weight: 500;
        }
        .btn-back:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <?php include('../view/navbar.php'); ?>
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card product-card">
                    <div class="card-header product-header">
                        <h3 class="mb-0">Detalhes do Produto</h3>
                    </div>
                    <div class="card-body product-body">
                        <div class="product-info">

                            <!-- Informações sobre o produto -->
                             
                            <p><strong>ID:</strong> <?php echo htmlspecialchars($produto['id']); ?></p>
                        </div>
                        <div class="product-info">
                            <p><strong>Título:</strong> <?php echo htmlspecialchars($produto['nome']); ?></p>
                        </div>
                        <div class="product-info">
                            <p><strong>Preço:</strong> R$ <?php echo number_format($produto['preco'], 2, ',', '.'); ?></p>
                        </div>
                        <div class="product-info">
                            <p><strong>Categoria:</strong> <?php echo htmlspecialchars($produto['categoria']); ?></p>
                        </div>
                    </div>
                    <div class="card-footer product-footer">
                        <a href="../view/painel.php" class="btn btn-primary btn-back m-2">Voltar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
        <?php
    } else {
        echo "<div class='container mt-5'><div class='alert alert-warning'>Produto não encontrado.</div></div>";
    }
} else {
    echo "<div class='container mt-5'><div class='alert alert-danger'>Erro ao executar a consulta: " . $stmt->error . "</div></div>";
}

$stmt->close();
$conn->close();
?>
