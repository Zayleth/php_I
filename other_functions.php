<?php
function fix_date_order($fecha_v_producto) {
  $date = substr($fecha_v_producto, 8, 2).substr($fecha_v_producto, 4, 4).substr($fecha_v_producto, 0, 4);
  return $date;

  # 1er parametro -> cadena que voy a cortar
  # inicio de la cadena
  # cantidad de caracteres
  
}
?>