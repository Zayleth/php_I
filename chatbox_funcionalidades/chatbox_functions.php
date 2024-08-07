<?php
function chat() {
  $conex = mysqli_connect("localhost", "root", "", "cedulas_database") or die("Could not connect to database. Try later");
  $fecha = date("Y-m-d");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>CHATBOX</title>
</head>
<body>

  <div id="chatbox" class="chatbox">
    <div id="cabecera">
    <div id="imagen" class="logo">
      <img src="./chatbot_img/chatbot.jpg" alt="Chatbot Logo">
      <div class="header-container">
        <div class="name">CHISTRI-BOT</div>
        <div class="greeting">Welcome! How can I help you?</div>
      </div>
    </div>
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
</body>
</html>