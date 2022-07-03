<?php
  session_start();

  if (isset($_SESSION['user_id'])) {
    header('Location: default.php');
  }
  require 'database.php';

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE email = :email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';

    if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
      $_SESSION['user_id'] = $results['id'];
      header("Location: default.php");
    } else {
      //$message = 'Sorry, those credentials do not match';
      echo("<script> alert('Los datos no coinciden')</script>");
    }
  }

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>IES-Incia Sesion</title>
    <link rel="icon"  href="img/logo.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  </head>
  <body>
    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>

    <style>
        body
        {
            background: #DEDEDE;
            background: linear-gradient(to right, #DEDEDE, #DEDEDE);
            font-family: 'Poppins', sans-serif;
      
        }
      body{
        font-family: 'Poppins', sans-serif;
      }
      .bg
        {
            background-image: url(img/bg_1.jpg);
            background-position: center center;
        }
    </style>
    <div class="container w-75 bg-primary mt-5 rounded shadow">
        <div class="row align-items-stretch">
        <div class="col bg d-none d-lg-block col-md-5 col-lg-5 col-xl-6 rounded">

        </div>
        <div class="col bg-white p-5 rounded-end">
            <div class="text-end">
                <a href="default.php"><img src="img/logoemiliani.png"width="48" alt=""></a>
            </div>
            <h2 class="fw-bold text-center py-5">Bienvenido</h2>

            <!-- LOGIN-->

    <form action="login.php" method="POST">
    <div class="input-group mb-3">
      <span class="input-group-text" id="basic-addon1">@</span>
      <input name="email" type="email" class="form-control" placeholder="ejemplo@ejemplo.com" aria-label="Username" aria-describedby="basic-addon1">
      </div>
      <div class="mb-4">
      <label for="password" class="form-label">Contraseña</label>
      <input type="password" class="form-control" name="password" placeholder="Ingrese su Contraseña">
      </div>
      <div class="mb-4 form-check">
      <input type="checkbox" name="connected" class="form-check-input">
      <label for="connected" class="form-check-label">Mantenerme Conectado</label>
      </div> 
      <div class="d-grid">
      <input style="background-color: #07528D" type="submit" value="Iniciar Sesión" class="btn btn-primary ">
      </div>

      <div class="my-3">
          <span>¿No tienes cuenta? <a href="signup.php">Regístrate</a></span><br>
          <span><a href="#">Recuperar Contraseña</a></span>
      </div>
    </form>

    <div class="container w-100 my-5">
                    <div class="row text-center">
                        <div class="col-12">Iniciar Sesión</div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <button class="btn btn-outline-primary w-100 my-1">
                                <div class="row align-items-center">
                                    <div class="col-2 d-none d-md-block">
                                        <img src="img/fb.png" width="32" alt="">
                                    </div>
                                    <div class="col-12 col-md-10 text-center">
                                        Facebook
                                    </div>
                                </div>
                            </button>
                        </div>
                        <div class="col">
                            <button class="btn btn-outline-danger w-100 my-1">
                                <div class="row align-items-center">
                                    <div class="col-2 d-none d-md-block">
                                        <img src="img/google.png" width="32" alt="">
                                    </div>
                                    <div class="col-12 col-md-10 text-center">
                                        Google
                                    </div>
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
  
      <footer style="background-color: #FDBE34" class="text-center footer-style">
      <br>
        <div class="container">
            <div class="row">
                <div style="color: white;" class="col-md-4 footer-col">
                    <h3>Acerca de</h3>
                    <p style="font-size:13px; text-align: left;">"Somos una Institución Educativa Católica, Técnica, inspirada en el Carisma de la Congregación Somasca que promueve la devoción, la caridad y el trabajo, inspirada en los valores evangélicos del Reino de Dios."
                    </p>
                </div>
                <div class="col-md-4 footer-col">
                    <h3 style="color: white;">Ubicaciones</h3>
                    <a style="color: white; font-size:13px; text-align: left;" href="#">Instituto Emiliani Somascos - Calz. San Juan 2-30</a><p></p>
                    <a style="color: white; font-size:13px; text-align: left;" href="#">Instituto Emiliani Somascos - San Miguel Petapa</a><p></p>
                    <a style="color: white; font-size:13px; text-align: left;" href="#">Instituto Emiliani Somascos - Zona 5</a><p></p>
                </div>
                <div class="col-md-4 footer-col">
                    <h3 style="color: white;">Derechos</h3>
                    <div style="color: white; font-size: 13px;" class="container-fluid  text-center p-3">
                      <p class="small">&copy: Todos los derechos reservados :<a style="color: white;" href="https://github.com/Andduck">Instituto Emiliani Somascos</a> - Guatemala 2022</p>
                    </div>
                </div>
                <div class="col-md-4 footer-col">
                    <h3 style="color: white;">Creditos</h3>
                    <div style="color: white; font-size: 13px;" class="container-fluid  text-center p-3">
                    <p>Nombre 1,Nombre 1,Nombre 1,Nombre 1,Nombre 1,Nombre 1,Nombre 1,Nombre 1,Nombre 1,Nombre 1,Nombre 1,Nombre 1,Nombre 1,Nombre 1,</p>
                  </div>
                </div>
            </div>
        </div>
    </footer> 
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  </body>
</html>
