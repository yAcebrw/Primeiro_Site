<?php
//\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\        /////////////////////////////////\\
//\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\      //////////////////////////////////\\
//\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\    ///////////////////////////////////\\
//\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\  ////////////////////////////////////\\
//\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\/////////////////////////////////////\\

//Só para avisar eu decidi fazer um site de produtos, não somente de livros\\

//////////////////////////////////////\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
/////////////////////////////////////  \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
////////////////////////////////////    \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
///////////////////////////////////      \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
//////////////////////////////////        \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
//\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\
session_start();

include_once './src/model/user.php';

if (isset($_POST['email']) && isset($_POST['senha'])) {
    $email = trim($_POST['email']);
    $senha = trim($_POST['senha']);

    $user = new User();
    $message = $user->login($email, $senha);
    if ($message) {
        echo $message;
    }
} else {
    echo "Por favor, preencha o formulário de login.";
}
?>



<!DOCTYPE html>
<html lang="pt-br">

<link rel="stylesheet" href="style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body class="bg-secondary">

<section class="background-radial-gradient overflow-hidden">
  <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
    <div class="row gx-lg-5 align-items-center mb-5">
      <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
        <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
          o melhor site <br />
          <span style="color: hsl(218, 81%, 75%)">de alguma coisa</span>
        </h1>
        <p class="mb-4 opacity-70" style="color: hsl(218, 81%, 85%)">
          Lorem ipsum dolor, sit amet consectetur adipisicing elit.
          Temporibus, expedita iusto veniam atque, magni tempora mollitia
          dolorum consequatur nulla, neque debitis eos reprehenderit quasi
          ab ipsum nisi dolorem modi. Quos?
        </p>
      </div>

      <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
        <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
        <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

        <div class="card bg-glass" style="height: 400px;">
          <div class="card-body px-4 py-5 px-md-5">
            <form action="" method="POST">
              <!-- 2 column grid layout with text inputs for the first and last names -->
              <!-- Email input -->
              <div data-mdb-input-init class="form-outline mb-4">
                <input type="email" id="form3Example3" class="form-control" name="email" />
                <label class="form-label" for="form3Example3">Email</label>
              </div> 

              <!-- Password input -->
              <div data-mdb-input-init class="form-outline mb-4">
                <input type="password" id="form3Example4" class="form-control" name="senha"/>
                <label class="form-label" for="form3Example4">Senha</label>
                <!-- Submit button -->
              </div class="container">
              <div class="text-center">

                <div><button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary">
                Entrar
              </button></div></div>
              <p class="text-center mt-3">Ainda não tem uma conta? <a href="./view/register.php">Registrar</a></p> <!--LINK_REGISTER------------------------>
          
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>