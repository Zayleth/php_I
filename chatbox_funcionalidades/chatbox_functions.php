<?php
function chat() {
  $conex = mysqli_connect("localhost", "root", "", "cedulas_database") or die("Could not connect to database. Try later");
  $fecha = date("Y-m-d");
?>


<div id="chatbox">
<div id="cabecera">
<div id="imagen"></div>
<div id="nombre"></div>
</div>

<div id="hablar">
<form action="chatbox_funcionalidades/respuesta_chatbot.php" method="post">
  <input type="text" name="pregunta">
  <button type="submit">ASK</button>
</form>
</div>

<div id="conversacion">
  
  <?php 

  $conversacion = "SELECT question, answer, date_day, hour_day FROM chatbot WHERE id_usuario = '$_SESSION[quien]' AND date_day = '$fecha' ORDER BY id DESC";

  $qq = mysqli_query($conex, $conversacion);

  while($k = mysqli_fetch_array($qq)) {
    ?>

    <p><?php echo $_SESSION['nick'].": ".$k[0];?></p>	
    <p><?php echo "Robot: ".$k[1];?></p>	<?php 	
    }
    ?>

  <?php
  }
  ?>
  

</div>
</div>