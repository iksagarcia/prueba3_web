<?php
include "database.php";

?>
<!DOCTYPE html>
<meta charset="UTF-8">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
<link rel="stylesheet" href="css/style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<title> Usuarios</title>



<html>

<head>
  <?php
  require "./utils/navbar.php";
  ?>

</head>

<body>

  <div class="container mt-16">
    <div class="row">

      <div class="col-md-16">
        <h2>Listado de Usuarios</h2>


        <a href="registro.php" class="btn_new">Crear un nuevo usuario</a>
        <table>
          <?php
          $result = Basedata::get_conection()->get_users();
          while ($row = $result->fetch()) {

          ?>
            <tr>
              <td><?php echo $row['id'] ?></td>
              <td><?php echo $row['nombreusuario'] ?></td>
              <td><?php echo $row['email'] ?></td>
              <td><?php echo $row['password'] ?></td>
              <td>
                <a class="link_edit" href="#">Editar</a>
                <a class="link_delete" href="#">Eliminar</a>
              </td>
            </tr>
          <?php


          }

          ?>
        </table>
</body>

</html>