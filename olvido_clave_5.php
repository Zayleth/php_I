<?php

include "conexion.php";
extract($_POST);

$sql= "UPDATE usuarios SET user_password=MD5('$clave'), user_codigo='0' WHERE user_id = '$codigo_user'";

mysqli_query($conex, $sql);

header("location:registro_usuario.php");
?>
