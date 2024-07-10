<?php
// llamamos a la conexion de la base de datos
include "conexion.php";

// extract -> funcion que toma todas las variables POST y las asigna con su nombre $_POST -> $_nombreVariable
extract($_POST);
extract($_GET);

// creamos una estructura de control de flujo (switch) para que al insertar productos se muestre en la cabecera (header) una respuesta (sea 1 o 2)

switch($hidden) {
  case 1:
  $sql = "INSERT INTO productos VALUES ('', '$product_name', '$price', '$amount', '$due_date', '$image', '$description', '$status')";

  if (mysqli_query($conex, $sql)) {
    header("location:insertar.php?respuesta=1");
  } else {
    header("location:insertar.php?respuesta=2");
  }
  break;

  case 2:
  $sql = "UPDATE productos set nombre_producto = '$product_name', precio_producto = '$price', cantidad_producto = '$amount', fecha_v_producto = '$due_date', imagen_producto = '$image', descripcion_producto = '$description', status_producto = '$status' WHERE id_producto = '$identificacion'";
  
  if (mysqli_query($conex, $sql)) {
    header("location:editar.php?respuesta=1");
  } else {
    header("location:editar.php?respuesta=2");
  }

  case 3:
    # para eliminar de forma fisica, visual
    # $sql = "DELETE FROM productos WHERE id_producto = $eliminar";

    # para eliminar de forma logica
    $sql = "UPDATE productos SET status_producto = 1 where id_producto=$eliminar";
    
    if (mysqli_query($conex, $sql)) {
      header("location:mostrar_producto.php?");
    } else {
      ?>
      <script>
        alert ("No se borraron los datos")
      </script>

      <?php
      header("location:mostrar_producto.php?");
    }
  break;
}
?>