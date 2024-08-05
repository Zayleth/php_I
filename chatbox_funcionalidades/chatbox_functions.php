<?php
function chat() {
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

</div>




<?php
}

// 
?>