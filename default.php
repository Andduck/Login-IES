<?php
  session_start();

  require 'database.php';

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
      $user = $results;
    }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>IES-Inicio</title>
    <link rel="icon"  href="./img/logo.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <style>
    body
        {
            background: #ffe259;
            background: linear-gradient(to right, #FFFFFF, #FFFFFF);
            font-family: 'Poppins', sans-serif;
        }
     
  </style>
  <body>
    <?php require 'partials/header.php' ?>

    <?php if(!empty($user)): ?>
      <br> Bienvenido <?= $user['email']; ?>
      <br>Has iniciado sesión correctamente
      <a href="logout.php">
        Cerrar Sesión
      </a><br><br><br><br>
    <?php else: ?>
      <h1>Por favor Inicie Sesión o Registrese</h1>

      <a href="login.php">Iniciar Sesión</a> or
      <a href="signup.php">Registrate</a>
    <?php endif; ?>

    <style>
      footer {
  position: absolute;
  bottom: 0;
  width: 100%;
  height: 40px;
  font-size:20px;}
    </style>
      <footer class="text-center footer-style">
      <div class="container">
          <div class="row">
              <div class="col-md-4 footer-col">
                  <h3 style="color: black;">Derechos</h3>
                  <div style="color: black; font-size: 10px;" class="container-fluid  text-center p-3">
                    <p class="small">&copy: Todos los derechos reservados :<a style="color: black;" href="https://github.com/Andduck">Instituto Emiliani Somascos</a> - Guatemala 2022</p>
                  </div>
              </div>
          </div>
      </div>
  </footer>

    
  </body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>
