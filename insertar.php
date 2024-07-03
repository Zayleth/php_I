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
    <h2 style="color: #0f0;">Data was inserted correctly</h2>
  
  <?php 
  }
  ?>

  <?php
  if (@$_GET['respuesta'] == 2) { ?>
    <h2 style="color: #f03;">System under maintenance. Try again later</h2>
  
  <?php 
  }
  ?>



  <!--FORM-->
  <form method="post" action="acciones.php">
    <label>Product Name</label>
    <input type="text" name="product_name" id="product_name">
    <br><br>

    <label>Price</label>
    <input type="text" name="price" id="price">
    <br><br>

    <label>Amount</label>
    <input type="number" name="amount" id="amount">
    <br><br>

    <label>Due date</label>
    <input type="date" name="due_date" id="due_date">
    <br><br>

    <label>Image</label>
    <input type="text" name="image" id="image">
    <br><br>

    <label>Description</label>
    <textarea name="description" cols="30" rows="10"></textarea>
    <br><br>

    <label>Status</label>
    <select name="status">
    <option value="0">Current</option>
    <option value="1">Not Current</option>
    </select>
    <br><br>

    <input type="hidden" name="hidden" value="1">
    <button type="submit">Enter data</button>

  </form>
  
</body>
</html>
