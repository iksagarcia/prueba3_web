<?php

//require './utils/debugin.php';
require 'database.php';
//Debug($_POST);
if (!empty($_POST['rut']) && !empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['valorFactura']) && !empty($_POST['metodoPago'])) {
  Basedata::get_conection()->create_check($_POST['rut'], $_POST['nombre'], $_POST['apellido'], $_POST['valorFactura'], $_POST['metodoPago']);
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <title>Sistema Facturas</title>

<body>

<!-- Este php lo que hace es llamar a la navbar que esta a lojada en otra visa de php-->
  <?php
    require "./utils/navbar.php";
  ?>
  
  <div class="container mt-5">
    <div class="row">

      <div class="col-md-3">
        <h1>Sistema Facturas</h1>
        <h3>Formulario</h3>
        <form action="FacAdmin.php" method="POST">


          <input type="text" class="form-control mb-3" name="rut" placeholder="Rut">
          <input type="text" class="form-control mb-3" name="nombre" placeholder="Nombre">
          <input type="text" class="form-control mb-3" name="apellido" placeholder="Apellido">
          <!--<input type="text" class="form-control mb-3" name="empresa" placeholder="Empresa">-->
          <input type="text" class="form-control mb-3" name="metodoPago" placeholder="Metodo pago">
          <input type="number" class="form-control mb-3" name="valorFactura" placeholder="Valor Facturas">

          <input type="submit" class="btn btn-primary">
        </form>
      </div>



</body>

</html>