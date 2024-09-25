?>

<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastrar Produto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body class="bg-secondary">

  <?php include("../view/navbar.php") ?>

    <section class="vh-100 bg-image"
    style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
      <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-12 col-md-9 col-lg-7 col-xl-6">
            <div class="card" style="border-radius: 15px; margin-top: -475px !important;">
              <div class="card-body p-5">
                <h2 class="text-uppercase text-center mb-5">Cadastrar um Produto</h2>
  
                <form action="" method="POST">

                  <label class="form-label" >Nome</label>
                  <div data-mdb-input-init class="form-outline mb-4">
                    <input type="text" class="form-control form-control-lg" name="nome" value="<?=$produto['nome']; ?>"  />

                    <!-- Categorias -->
                    <label class="form-label" >Categoria</label>
                  <select class="form-select form-control form-control-lg mb-4" aria-label="Default select example" name="categoria" >
                    <option value="Livros">Livros</option>
                    <option value="Roupas">Roupas</option>
                    <option value="Eletrônicos">Eletrônicos</option>
                    <option value="Alimento">Alimentos</option>
                    <option value="Brinquedos">Brinquedos</option>
                    <option value="Carros">Carros</option>
                    <option value="Fitness">Fitness</option>
                    <option value="Colecionáveis">Colecionáveis</option>
                    <option value="Decoração Festiva">Decoração Festiva</option>
                    <option value="Jardinagem">Jardinagem</option>
                    <option value="Produtos de Limpeza">Produtos de Limpeza</option>
                    <option value="Eletrodomésticos">Eletrodomésticos</option>
                    <option value="Acessórios para Pets">Acessórios para Pets</option>
                    <option value="Produtos de Cabelo">Produtos de Cabelo</option>
                    <option value="Instrumentos Musicais">Instrumentos Musicais</option>
                  </select>
                    
                    <div class="mb-4 mt-4 ms-2">
                      <span class="currency-symbol">R$</span>
                      <input type="text" class="currency-input" value="<?=$produto['preco']; ?>" aria-label="Preço em Reais" oninput="formatPrice(this)" name="preco" />
                  </div>
              
                  <script>
                    
                    //Muda o formato do input do preço do produto
                    
                      function formatPrice(input) {
                          let value = input.value.replace(/\D/g, ''); 
                          if (value.length > 9) {
                              value = value.slice(0, 9);
                          }
                          
                          let integerPart = value.slice(0, -2);
                          let decimalPart = value.slice(-2);
              
                          if (integerPart.length > 7) {
                              integerPart = integerPart.slice(0, 7);
                              decimalPart = value.slice(-2);
                          }
                          
                          integerPart = integerPart.replace(/\B(?=(\d{3})+(?!\d))/g, '.'); // Adiciona pontos para milhar
                          input.value = integerPart + ',' + decimalPart.padEnd(2, '0'); // Garante 2 casas decimais
                      }
                  </script>


                  <div class="d-flex justify-content-center">
                    <button  href="../view/painel.php" class="btn btn-secondary btn-block btn-lg gradient-custom-4 text-body me-4">Voltar</button>

                       <button  type="submit" data-mdb-button-init
                      data-mdb-ripple-init class="btn btn-primary btn-block btn-lg gradient-custom-4 text-body">Confirmar</button>

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