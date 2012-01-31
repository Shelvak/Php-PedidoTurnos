<?php
function validarsql ($valor) {
  return addcslashes(mysql_real_escape_string($valor),'%_');
}

function fecha ($val){
    $fecha = explode('-',$val);
    return $fecha[2].'-'.$fecha[1].'-'.$fecha[0];
}
function fechaserv ($val){
    $fecha = explode('-',$val);
    return $fecha[2].'-'.$fecha[1].'-'.$fecha[0];
}
function hora($val){
    $hora = explode(':', $val);
    return $hora[0].':'.$hora[1];
}

?>
