<?php
session_start();
include "../conexion.php";
extract($_POST);
$fecha = date("Y-m-d");
$hora = date("H: i: s:");

$sql = "INSERT INTO chatbot VALUES ('', '$_SESSION[quien]', '', '', '$fecha', '$hora', 0)";

mysqli_query($conex, $sql);

$max="select max(id) from chatbot";
	$r=mysqli_query($conex,$max);
	$m=mysqli_fetch_array($r);


// con el explode separamos la pregunta en un arreglo
$palabra = explode(" ", $pregunta);
for ($i=0; count($palabra) > $i; $i++) {
  $palabra_clave = $palabra[$i];

  // sentencia SQL
  $sql = "SELECT answer FROM keywords_chatbot WHERE keyword LIKE '$palabra_clave'";
}

// basicamente, selecciona la palabra clave al encontrarla en el arreglo (al hacer el ciclo)

$q = mysqli_query($conex, $sql);

if ($ver = mysqli_fetch_array($q)) {
  $actualizar = "UPDATE chatbot SET answer = '$ver[0]' WHERE id = '$m[0]'";
  mysqli_query($conex, $actualizar);
} else {
  $actualizar = "UPDATE chatbot SET answer = 'Su pregunta no esta en nuestro registro.' WHERE id = '$m[0]'";
  mysqli_query($conex, $actualizar);
}

?>

