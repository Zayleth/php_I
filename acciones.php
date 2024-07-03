<?php
// llamamos a la conexion de la base de datos
include "conexion.php";

// extract -> funcion que toma todas las variables POST y las asigna con su nombre $_POST -> $_nombreVariable
extract($_POST);

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
}
?>