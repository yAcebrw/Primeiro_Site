<?php
include('../config/conexao.php');
include_once '../src/model/produto.php';

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
    } else {
        die('Produto não encontrado.');
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nome'], $_POST['categoria'], $_POST['preco'])) {
    $nome = trim($_POST['nome']);
    $categoria = trim($_POST['categoria']);
    $preco = trim($_POST['preco']);

    $produto = new Produto();
    $message = $produto->editarProduto($nome, $categoria, $preco, $id);
    if ($message) {
        echo $message;
    }
}
?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Produto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="bg-secondary">

<?php include("../view/navbar.php"); ?>

<section class="vh-100 bg-image" style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                    <div class="card" style="border-radius: 15px; margin-top: -475px !important;">
                        <div class="card-body p-5">
                            <h2 class="text-uppercase text-center mb-5">Editar Produto</h2>

                            <form action="" method="POST">
                                <label class="form-label">Nome</label>
                                <div class="form-outline mb-4">
                                    <input type="text" class="form-control form-control-lg" name="nome" value="<?= htmlspecialchars($produto['nome']); ?>" required />
                                </div>
                                          <!-- Categorias de produtos -->
                                <label class="form-label">Categoria</label>
                                <select class="form-select form-control form-control-lg mb-4" name="categoria" required>
                                    <option value="Livros" <?= $produto['categoria'] == 'Livros' ? 'selected' : ''; ?>>Livros</option>
                                    <option value="Roupas" <?= $produto['categoria'] == 'Roupas' ? 'selected' : ''; ?>>Roupas</option>
                                    <option value="Eletrônicos" <?= $produto['categoria'] == 'Eletrônicos' ? 'selected' : ''; ?>>Eletrônicos</option>
                                    <option value="Alimentos" <?= $produto['categoria'] == 'Alimentos' ? 'selected' : ''; ?>>Alimentos</option>
                                    <option value="Brinquedos" <?= $produto['categoria'] == 'Brinquedos' ? 'selected' : ''; ?>>Brinquedos</option>
                                    <option value="Carros" <?= $produto['categoria'] == 'Carros' ? 'selected' : ''; ?>>Carros</option>
                                    <option value="Fitness" <?= $produto['categoria'] == 'Fitness' ? 'selected' : ''; ?>>Fitness</option>
                                    <option value="Colecionáveis" <?= $produto['categoria'] == 'Colecionáveis' ? 'selected' : ''; ?>>Colecionáveis</option>
                                    <option value="Decoração Festiva" <?= $produto['categoria'] == 'Decoração Festiva' ? 'selected' : ''; ?>>Decoração Festiva</option>
                                    <option value="Jardinagem" <?= $produto['categoria'] == 'Jardinagem' ? 'selected' : ''; ?>>Jardinagem</option>
                                    <option value="Produtos de Limpeza" <?= $produto['categoria'] == 'Produtos de Limpeza' ? 'selected' : ''; ?>>Produtos de Limpeza</option>
                                    <option value="Eletrodomésticos" <?= $produto['categoria'] == 'Eletrodomésticos' ? 'selected' : ''; ?>>Eletrodomésticos</option>
                                    <option value="Acessórios para Pets" <?= $produto['categoria'] == 'Acessórios para Pets' ? 'selected' : ''; ?>>Acessórios para Pets</option>
                                    <option value="Produtos de Cabelo" <?= $produto['categoria'] == 'Produtos de Cabelo' ? 'selected' : ''; ?>>Produtos de Cabelo</option>
                                    <option value="Instrumentos Musicais" <?= $produto['categoria'] == 'Instrumentos Musicais' ? 'selected' : ''; ?>>Instrumentos Musicais</option>
                                </select>

                                <div class="mb-4 mt-4 ms-2">
                                    <span class="currency-symbol">R$</span>
                                    <input type="text" class="currency-input" value="<?= htmlspecialchars($produto['preco']); ?>" aria-label="Preço em Reais" oninput="formatPrice(this)" name="preco" required />
                                </div>

                                <script>
    function formatPrice(input) {
        // Remove caracteres não numéricos
        let value = input.value.replace(/\D/g, '');
        
        // Converte para float
        let numberValue = parseFloat(value) / 100 || 0;

        // Formata o valor em reais
        input.value = numberValue.toLocaleString('pt-BR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
    }
</script>


                                <div class="d-flex justify-content-center">
                                    <a href="../view/painel.php" class="btn btn-secondary btn-block btn-lg gradient-custom-4 text-body me-4">Voltar</a>
                                    <button type="submit" class="btn btn-primary btn-block btn-lg gradient-custom-4 text-body">Confirmar</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
