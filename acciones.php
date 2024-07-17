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

  case 4:
    // para revisar si el nick o correo esta repetido
    $sql_nick_mail = "SELECT count(user_id) from usuarios where user_nick='$nick' or user_mail='$mail'";

    // $nick and $user_mail are NAMES from FORM

    // consulta que va a la base de datos
    $k = mysqli_query($conex,$sql_nick_mail);

    // vector que trae la consulta
    $y = mysqli_fetch_array($k);
    
    if($y[0]>0){
      header("location:registro_usuario.php?respuesta=3");
    }else{
      
      $sql= "INSERT INTO usuarios VALUES ('', '$nick', '$mail', MD5('$password'), 0, 0)";
    

      if (mysqli_query($conex, $sql)) {
      header ("location:registro_usuario.php?respuesta=1");
    } else {
      header ("location:registro_usuario.php?respuesta=2");
    }
    }
    break;

    case 5:
      // sentencia para permitir el login del user con el nick o correo PERO que coincida con la contraseña.
      $sql = "SELECT user_id, user_nick, user_mail from usuarios where user_password = MD5('$password') AND user_nick='$pase' or user_mail='$pase'";

      // (user_nick='$pase' or user_mail='$pase') -> $pase name en el LOG IN -> para que tome ambas entradas del input (tanto mail como user)



      // consulta que va a la base de datos
      $query = mysqli_query($conex,$sql);

      if ($ver=mysqli_fetch_array($query)) {
        session_start();
        $_SESSION["quien"] = $ver['user_id'];
        $_SESSION["nick"] = $ver['user_nick'];
        $_SESSION["correo"] = $ver['user_mail'];
        header("location:mostrar_producto.php");

      } else { 
        header("location:registro_usuario.php?respuesta=5");
      }
      break;

    case 6:
      // cerrar sesion

      // se coloca session_start() para trabajar con SESIONES COMO TAL 
      session_start();

      // se vacia la variable $SESSION 
      session_unset();

      // se elimina la sesion
      session_destroy();

      // lo mandamos a registrarse
      header("location:registro_usuario.php");
      break;
}
?>