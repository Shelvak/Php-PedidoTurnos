<?php
include ('connections/conect.php');
require('funciones.php');
mysql_select_db($db, $conect);
$query_dias = "SELECT * FROM turno ORDER BY dia";
$dias = mysql_query($query_dias) or die(mysql_error());

if($_GET['dia']){
    $query_turnos = sprintf("SELECT * FROM turno LEFT JOIN medicos ON turno.medico_id = medicos.id 
                            LEFT JOIN pacientes ON turno.paciente_id = pacientes.id
                            WHERE dia='%s' ORDER BY hora",fechaserv(validarsql($_GET['dia'])) );
    $turnos = mysql_query($query_turnos) or die(mysql_error());
    
}


?>


<!DOCTYPE HTML>
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" media="screen" href="css/general.css" />
<script type="text/javascript" src="./js/jquery-1.6.1.js"></script>
<script type="text/javascript" src="./js/general.js"></script>
<title>Pagina de Turnos</title>
</head>
<body>
    
<table class="cuerpo">
 <tr>
    <td class="tdmenu"><img src="images/logo.jpg" width="167" height="170" /></td>
    <td width="75%">Turnos</td>
  </tr>
  <tr>
    <td class="menuizq">
        <ul class="menu">
          <li><a href="index.php">Inicio</a></li>
          <li><a href="crea-pac.php">Crear Paciente</a></li>
          </li>
          <li>Turnos =>
            <ul>
              <li><a href="todos.php">Mostrar Personas</a></li>
              <li><a href="pedir.php">Pedir turno</a></li>
              <li><a href="turnos.php">Mostrar turnos</a></li>
            </ul>
           </li>
        </ul>
      </td>
      <td>
         
          <form name="form1" action="">
            
              <select name="dia" id="select-dia">
                  <option value="">Seleccione fecha:</option>
                  <?php
                    $ar = array();
                    while($arr = mysql_fetch_assoc($dias))
                    {
                    
                    $dia = fecha($arr['dia']); 

                    if (!in_array($dia, $ar)) {
                    $ar[] = $dia; 
                    echo "<option value='$dia'>$dia</option>"; 
                    }
                }
               
                  ?>
              </select>
          </form>
          
          
     <?php if (mysql_num_rows($turnos) >0){ ?>
          <span class="titulo">Lista  </span>
          <h6><?= $_GET['dia']; ?></h6>
          
        <table class="lista">
          <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Médico</th>
            <th>Hora</th>
          </tr>
          <?php  while ($row_turno = mysql_fetch_assoc($turnos)) { ?>
          <tr> 
            <td><?= $row_turno ['nombre']; ?></td>
            <td><?= $row_turno ['apellido']; ?></td>
            <td><?= $row_turno ['nombreMed']; ?></td>
            <td><?= hora($row_turno ['hora']); ?></td>
           
            
          </tr>
          <?php } echo '</table> </form>'; } ?>
        
          
      </td>
  </tr>
  <tr>  
    <td colspan="2" align="right">Por ®RotseN-Shelvak® - 2012</td>
  </tr>
</table>
    
</body>
</html>
