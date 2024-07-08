<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Products Database</title>
</head>
<body>

  <!--insertar.php -> archivo creado para el formulario para ingresar datos de productos-->

  <h1>Insert Products</h1>
  <?php 
  if (@$_GET['respuesta'] == 1) { ?>
    <h2 style="color: #0f0;">Data was edited successfully.</h2>
  
  <?php 
  }
  ?>

  <?php
  if (@$_GET['respuesta'] == 2) { ?>
    <h2 style="color: #f03;">System under maintenance. Try again later</h2>

  <?php 
  }
  if (isset($_GET['respuesta'])) {} else {
  ?>



  <!--FORM-->
  <form method="post" action="acciones.php">
    <?php
    include "conexion.php";
    $sql = "SELECT * FROM productos WHERE id_producto = '$_GET[editar]'";
    $guardar_consuta = mysqli_query($conex, $sql);
    $ver = mysqli_fetch_array($guardar_consuta)
    ?>


    <input type="hidden" name="identificacion" value="<?php echo $ver[0]; ?>">
    <label>Product Name</label>
    <input type="text" name="product_name" id="product_name" 
    value="<?php 
    echo $ver[1];
    ?>">
    <br><br>

    <label>Price</label>
    <input type="text" name="price" id="price"
    value="<?php 
    echo $ver[2];
    ?>">
    <br><br>

    <label>Amount</label>
    <input type="number" name="amount" id="amount"
    value="<?php 
    echo $ver[3];
    ?>">
    <br><br>

    <label>Due date</label>
    <input type="date" name="due_date" id="due_date"
    value="<?php 
    echo $ver[4];
    ?>">
    <br><br>

    <label>Image</label>
    <input type="text" name="image" id="image"
    value="<?php 
    echo $ver[5];
    ?>">
    <br><br>

    <label>Description</label>
    <textarea name="description" cols="30" rows="10">
      <?php 
      echo $ver[6];
      ?>
    </textarea>
    <br><br>

    <label>Status</label>
    <select name="status">
      
      <?php 
      if ($ver[7] == 0) { 
      ?>

      <option value="0" selected>Vigente</option>

      <?php } else { ?>
        <option value="1" seleted>No Vigente</option>

      <?php
      }
      ?>

    <option value="0">Current</option>
    <option value="1">Not Current</option>
    </select>
    <br><br>

    <input type="hidden" name="hidden" value="2"> <!--CASO 2 - EDITAR -->
    <button type="submit">Edit data</button>

  </form>
  
  <?php
  }
  ?>
</body>
</html>
