<?php

session_start();

include_once '../src/model/user.php';

if (isset($_POST['email']) && isset($_POST['senha'])) {
    $email = trim($_POST['email']);
    $senha = trim($_POST['senha']);

    $user = new User();
    $message = $user->register($email, $senha);
    if ($message) {
        echo $message;
    }
}

?>
<!-- ------------------------------------------------------------------------------------------------------- -->
<!-- ------------------------------------------------------------------------------------------------------- -->
<!-- ------------------------------------------------------------------------------------------------------- -->
<!DOCTYPE html>
<html lang="pt-br">

<link rel="stylesheet" href="style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrar - Site</title>
</head>
<body class="bg-secondary">

<section class="background-radial-gradient overflow-hidden">
  <div class="container px-4 px-md-5 text-center text-center">
    <div class="row gx-lg-5 align-items-center mb-5">
      <div class="py-5 mb-1 mb-lg-0" style="z-index: 10">
        <div class="position-relative"><div><h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
          The best site
          <span style="color: hsl(218, 81%, 75%)">of something</span></div>
        </h1></div>
      </div>

      <div class="mb-5 mb-lg-0 position-relative">
        <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
        <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

        <div class="card bg-glass mx-auto" width="300px" style="height: 500px; width: 650px;"> <!--CARD BRANCO ------------------BASE(LOGIN)-->
          <div class="card-body px-4 py-5 px-md-5">
            <form action="" method="POST">
              

              <!-- --------------------------------------------------------------------------------------------------- -->
              <!-- --------------------------------------------------------------------------------------------------- -->
              <div data-mdb-input-init class="form-outline mb-4">
                <label class="form-label" for="form3Example3">Email</label>
                <input type="email" id="form3Example3" class="form-control" name="email" />

              </div>

              <!-- --------------------------------------------------------------------------------------------------- -->               
              <!-- --------------------------------------------------------------------------------------------------- -->

              <div data-mdb-input-init class="form-outline mb-4">
                <label class="form-label" for="form3Example4">Senha</label>  
                <input type="password" id="form3Example4" class="form-control" name="senha"/>

              <!-- --------------------------------------------------------------------------------------------------- -->
              <!-- --------------------------------------------------------------------------------------------------- -->
              </div class="container">
              <div class="text-center">

                <div><button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary">
                Registrar
              </button></div></div>
              <p class="text-center mt-4">Já tem uma conta? <a href="../index.php">Entrar</a></p>
           
              <!-- --------------------------------------------------------------------------------------------------- -->
              <!-- --------------------------------------------------------------------------------------------------- -->
              <!-- --------------------------------------------------------------------------------------------------- -->
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>