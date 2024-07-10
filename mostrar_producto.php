<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Show Products</title>
</head>
<body>
  
  <?php include "menu.php"
  ?>
  
  <h1>Inventory - Product data</h1>
  <table border="1">
    <tr>
      <th>ID</th>
      <th>Name

        <a href="mostrar_producto.php?n=nombre_producto&orden_alfabetico=asc">asc
        </a>

        <a href="mostrar_producto.php?n=nombre_producto&orden_alfabetico=desc">desc
        </a>

      </th>

      <th>Price</th>
      <th>Amount</th>
      <th>Due date</th>
      <th>Image</th>
      <th>Description</th>
      <th colspan="2">Actions</th>

    </tr>

    <?php
    include "conexion.php";

    // para ordenar el nombre_producto en orden alfabetico
    if(isset ($_GET['n'])) {
      $sql = "SELECT * FROM productos WHERE status_producto=0 ORDER BY ".$_GET['n']." ".$_GET['orden_alfabetico'];
    
    } else {
      $sql = "SELECT * FROM productos WHERE status_producto=0";
    }

    $guardar_consuta = mysqli_query($conex, $sql);


    /* BUSCAR como usar para darle click y que se ordene de la a - z y viceversa

    if(@$_GET['n'] == 1) {
      $orden = "asc";
      $ordenar_a_z = 2;
    
    } else if ($ordenar_a_z == 2) {
      $orden = "desc";
    
    } else {
      $sql = "SELECT * FROM productos";
    }
    */


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

      <td>
        <a href="editar.php?editar=<?php echo $ver[0]; ?>">Editar</a>
      </td>

      <td>
        <a href= "#" onclick="confirmar (<?php echo $ver[0]; ?>)">Eliminar</a>
      </td>
    </tr>

    <?php
    }
    ?>
    
  </table>
  
  <script>

    function confirmar(cod) {
      let respuesta = confirm("Do you really want to delete?")

      if (respuesta) {
        window.location.href = "acciones.php?eliminar="+cod+"&hidden=3";
      }
    }

  </script>
  
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>
</html>