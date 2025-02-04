<?php
  session_start();
  if(isset($_SESSION['quien'])) {
  ?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Search Products</title>
</head>
<body>
  <?php 
  include "menu.php"
  ?>
  
  <h1>Search - Products data</h1>

  <form action="" method="post">
  <?php include "conexion.php"; ?>
    <input list="productos" type="text" name="search">
      
    <datalist id="productos">
    
      <?php
      $sql = "SELECT nombre_producto FROM productos";
      $guardar_consuta = mysqli_query($conex, $sql);

      while ($ver = mysqli_fetch_array($guardar_consuta)) {
      ?>
        
        <option value="<?php echo $ver[0]; ?>"></option>
        <?php } ?>

      </datalist>

      <button type="submit">Search product name</button>
  </form>

  <br><br>

  <table border="1">
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Price</th>
      <th>Amount</th>
      <th>Due date</th>
      <th>Image</th>
      <th>Description</th>
    </tr>

    <?php
    // buscador de productos: 

    if(isset($_POST['search'])) {
      $sql = "SELECT * FROM productos where nombre_producto like '$_POST[search]%'";
    
    } else {
      $sql = "SELECT * FROM productos";
    }

    $guardar_consuta = mysqli_query($conex, $sql);

    while ($ver = mysqli_fetch_array($guardar_consuta)) {
    ?>

    <tr>
      <td>
        <?php echo $ver[0]; ?>
      </td>

      <td>
        <?php echo $ver[1]; ?>
      </td>

      <td>
        <?php echo $ver[2]; ?>
      </td>

      <td>
        <?php echo $ver[3]; ?>
      </td>

      <td>
        <?php echo $ver[4]; ?>
      </td>

      <td>
        <img src="product_img/camisa.jpg ?php echo $ver[5]; ?>" width="120">
      </td>

      <td>
        <?php echo $ver[6]; ?>
      </td>
    </tr>

    <?php
    }
    ?>
    
  </table>
  
  
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>
</html>

<?php
  } else {
    header("location:registro_usuario.php");
  }
?>