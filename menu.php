<?php
session_start();
if(!isset($_SESSION['quien'])) {
header("location:registro_usuario.php");
} ?>

  <ul>
    <a href="insertar.php"><li>INSERT IN</li></a>
    <a href="mostrar_producto.php"><li>SHOW</li></a>
    <a href="buscador.php"><li>SEARCH</li></a>
  </ul>

