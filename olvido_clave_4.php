<?php

include "conexion.php";
extract($_POST);

$sql = "SELECT user_id from usuarios WHERE user_mail = '$mail' and user_codigo = '$code'";

$q = mysqli_query($conex, $sql);

// condicion que pide al usuario la nueva contraseña y la toma en un input oculto: 
if ($ver=mysqli_fetch_array($q)) {
  ?>

  <form method="post" action="olvido_clave_5.php">
    <label for="password" name="clave"></label>
    Password: <input type="password" id='clave' name="clave">
    <br>

    <label for="confirm_password">Confirm Password:</label>
    <input type="password" id="confirm_password" name="confirm_password" required>
    <br>

    <input type="hidden" name="codigo_user" value="<?php echo $ver[0]; ?>">
    
    <br>
    <br>

    <button type="submit">New Password</button>

    <?php

  } else {
    header("location:olvido_clave_3.php?no=1");
  }
?>

  </form>


<script>
    const formulario = document.querySelector('form');
    const clave = document.getElementById('clave');
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