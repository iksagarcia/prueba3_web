<?php

  require 'database.php';

  $message = '';
  //var_dump($_REQUEST);
  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $sql = "INSERT INTO users (email, password,nombreusuario) VALUES (:email, :password ,:nombreusuario )";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':nombreusuario',$_POST['nombreusuario']);
    if ($stmt->execute()) {
      $message = 'Se creo la cuenta con exito';
    } else {
      $message = 'error al crear la cuenta';
    }
  }
  echo $message;
?>
<!DOCTYPE html>
<html>
     <head>
        <meta charset="UTF-8">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="css/style.css">
        <title>Inicio</title>

    </head>
    <body>
        <h1>Registrar Cuenta</h1>
        
        <?php if(!empty($message)):?>
        <p><?php $message ?></p>
        <?php endif?>
        
            <span>o <a href="login.php">Login</a></span>
            <form action="registro.php" method="post">
                
            <input type="text" name="nombreusuario" placeholder="Nombre usuario"> 
            <input type="text" name="email" placeholder="Ingrese su correo"> 
            <input type="password" name="password" placeholder="Ingrese su Contraseña">
            <input type="password" name="confirm_password" placeholder="Repetir Contraseña">
            <input type="submit"  value="Registrar" >
        </form>
    </body>
    
    
    
    
</html>