<?php
    session_start();

  
require 'database.php';

if (!empty($_POST['email']) && !empty($_POST['password'])) {
  $results = Basedata::get_conection()->login($_POST['email']);

    $message = '';

    if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
      $_SESSION['user_id'] = $results['id'];
      header("Location: FacAdmin.php");
    } else {
      $message = 'No coinciden las credenciales ';
    }
  }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="css/style.css">
        <title>Administrador</title>

    </head>
    <body>
        <h1>Login Administrador</h1>
        <form action="Administrador.php" method="post">
            <input type="text" name="email" placeholder="Ingrese su correo"> 
            <input type="password" name="password" placeholder="Ingrese su Contraseña">
            
            <input type="submit"  value="Login" >
            <span><a href="registro.php">Registrate aqui</a></span>
        </form>
    </body>
</html>

