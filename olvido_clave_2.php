<?php 
// hacer la conexion a la base de datos
include "conexion.php";
extract($_POST);

// preguntar si ese correo ingresado esté en la base de datos
$sql = "SELECT user_id from usuarios WHERE user_mail = '$correo_para_verificar_contrasena'";

// lo mandamos al mysql con la funcion mysqli_query
$q = mysqli_query($conex, $sql);

if ($ver=mysqli_fetch_array($q)) {
  // despues de tener el id del correo, creo un codigo random para verificar
  $codigo_verificacion = rand(100000, 999999);

  // guardar el codigo_verificacion en user_codigo donde el id coincida
  $sql_1 = "UPDATE usuarios SET user_codigo = $codigo_verificacion WHERE user_id = '$ver[0]'";
  mysqli_query($conex, $sql_1);

  // cuerpo del correo a enviar:
  $cuerpo = "Siga este enlace y coloque el codigo: $codigo_verificacion
  <a href='olvido_clave_3.php'>Recuperar</a>";
  
  // mandamos el codigo al correo:
  mail($correo_para_verificar_contrasena, "Recuperacion de clave", $cuerpo, "From to web");

  echo "Enviado con éxito, revise su correo.";

} else {
  echo "No hay registro de este correo";
}
?>