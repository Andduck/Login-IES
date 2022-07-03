<?php

  require 'database.php';

  $message = '';

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password);

    if ($stmt->execute()) {
      //$message = 'Successfully created new user';
      echo("<script> alert('Usuario creado exitosamente')</script>");
    } else {
      //$message = 'Sorry there must have been an issue creating your account';
      echo("<script> alert('Hubo algun error al crear la cuenta')</script>");
    }
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="icon"  href="img/logo.png">
    <title>IES-Registrate</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        body
        {
            background: #DEDEDE;
            background: linear-gradient(to right, #DEDEDE, #DEDEDE);
            font-family: 'Poppins', sans-serif;
      
        }
        .bg
        {
            background-image: url(img/about.jpg);
            background-position: center center;
        }
    </style>
  </head>
  <body>
    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>

    <div class="container w-75 bg-primary mt-5 rounded shadow">
        <div class="row align-items-stretch">
            <div class="col bg d-none d-lg-block col-md-5 col-lg-5 col-xl-6 rounded">

            </div>
            <div class="col bg-white p-5 rounded-end">
                <div class="text-end">
                    <a href="default.php"><img src="img/logoemiliani.png"width="48" alt=""></a>
                </div>

                <h2 class="fw-bold text-center py-5">Registrar Cuenta</h2>
                <!-- LOGIN-->

    <form action="signup.php" method="POST">
      <div class="input-group mb-3">
      <span class="input-group-text" id="basic-addon1">@</span>
      <input name="email" type="email" class="form-control" placeholder="ejemplo@ejemplo.com" aria-label="Username" aria-describedby="basic-addon1">
      </div>
      <div class="mb-4">
      <label for="password" class="form-label">Contraseña</label>
      <input name="password" type="password"  class="form-control" placeholder="Ingresar contraseña">
      </div>
      <div class="d-grid">
      <input style="background-color: #07528D" type="submit" value="Registrarme" class="btn btn-primary ">
      </div>
      <div class="my-3 d-grid">
         <span class="text-center"><a href="login.php">Iniciar Sesión</a></span>
      </div>
    </form>
    </div>
  </div>
</div>
</div>
<br>
<br>
<br>
      <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>
