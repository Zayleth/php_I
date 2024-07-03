<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Show Products</title>
</head>
<body>
  <h1>Inventory - Product data</h1>
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
    include "conexion.php";
    $sql = "SELECT * FROM productos";
    $guardar_consuta = mysqli_query($conex, $sql);


    // mysqli_fetch_array($guardar_consuta) -> agarrame estos valores de un arreglo -> posiciones
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

</body>
</html>