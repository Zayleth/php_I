<?php
/* CAMPOS DE LA BASE DE DATOS
user_id 
user_nick -> apodo unico
user_mail -> mail unico
user_password	
confirm_password
user_codigo	-> en caso de no saber la contraseña, mandar codigo para recuperar
user_status -> usuario activo () inactivo ()
*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Register</title>
</head>
<body>
  <!--VARIABLES GET Y POST - BUSCAR DIFERENCIA-->
  <!--APARTADO DE LOGIN-->
  <h1>Login:</h1>

  <form method="post" action="acciones.php">
    <label for="login">Nick or mail:</label>
    <input type="text" id="pase" name="pase" required>
    <br><br>

    <label for="clave">Clave:</label>
    <input type="password" id="password" name="password" required>
    <input type="hidden" name="hidden" value="5">
    <br><br>

    <button type="submit">Enter</button>
  </form>




  <h1>User Register</h1>

  <?php
  if (@$_GET['respuesta'] == 1) { ?>
  <h2>Successful registration!</h2>
  <?php }
  ?>

  <?php
  if (@$_GET['respuesta'] == 2) { ?>
  <h2>Failed to register</h2>
  <?php }
  ?>

  <?php
  if (@$_GET['respuesta'] == 3) { ?>
  <h2>Nick or email already registered, try another</h2>
  <?php }
  ?>




  <form action="acciones.php" method="post">
    <label for="user_nick">Nick:</label>
    <input type="text" id="user_nick" name="nick" required>
    <br><br>

    <label for="user_mail">Mail:</label>
    <input type="email" id="user_mail" name="mail" required>
    <br><br>

    <label for="user_password">Password:</label>
    <input type="password" id="user_password" name="password" required>
    <br><br>

    <label for="confirm_password">Confirm Password:</label>
    <input type="password" id="confirm_password" name="confirm_password" required>

    <input type="hidden" name="hidden" value="4"> 

    <button type="submit">Sign In</button>
  </form>

  <script>
    const formulario= document.querySelector('form');
    const clave = document.getElementById('user_password')
    const repetirClave = document.getElementById('confirm_password');

    formulario.addEventListener('submit', (event) => {
      event.preventDefault(); // evita el envio automatico del formulario

      if (clave.value !== repetirClave.value) {
        alert("Las contraseñas no coinciden");
        repetirClave.focus() // pone el foco en el campo de repetir contraseña

        return; // detiene la ejecucion del codigo si las contraseñas no coinciden.
      }

      // si las contraseñas coinciden, se envia el formulario
      formulario.submit();
    });
  </script>
</body>
</html>
