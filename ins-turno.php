<!DOCTYPE html>
<html>
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
        <?php
        include ('connections/conect.php');
        require ('funciones.php');
        mysql_select_db($db, $conect);
        $paciente = validarsql($_POST['paciente']);
        $medico = validarsql($_POST['medico']);
        $dia = validarsql($_POST['anio'].'-'.$_POST['mes'].'-'.$_POST['dia']);
        $hora = validarsql($_POST['hora'].':'.$_POST['minutos']);
        $observ = validarsql($_POST['observ']);
        $query_disponible = sprintf("SELECT * FROM turno WHERE medico_id=%s AND dia='%s' AND hora='%s' ",
                                    $medico, $dia, $hora);
        $disponible = mysql_query($query_disponible) or die(mysql_error());
            if (mysql_num_rows($disponible) != 0 ){
                echo "El turno esta ocupado, por favor elija otro. <br />";
                echo "<a href='javascript:history.back(1);'>Volver</a>"; } 
                else{
        $consulta = "INSERT into turno (paciente_id, medico_id, dia, hora, observ ) 
            VALUES ( '$paciente', '$medico', '$dia', '$hora', '$observ')";
        $resultado = mysql_query($consulta) or die (mysql_error()) ;  
        
        $query_paciente = sprintf("SELECT * FROM pacientes WHERE id=%s", $paciente);
        $query_medico = sprintf("SELECT * FROM medicos WHERE id=%s", $medico);
        $paciente = mysql_query($query_paciente);
        $medico = mysql_query($query_medico);
        $row_paciente = mysql_fetch_assoc($paciente);
        $row_medico = mysql_fetch_assoc($medico);

        ?>
        Turno Creado
        <table class="formulario">
          <tr>
            <td width="15%">Paciente: </td>
            <td width="50%">
               <?= $row_paciente['nombre'] . ' ' . $row_paciente['apellido']; ?>
            </td>
          </tr>
          <tr>
            <td width="15%">Médico</td>
            <td width="50%" >
                <?= $row_medico['nombreMed']; ?>
            </td>
          </tr>
            <td width="15%">Fecha</td>
            <td width="50%"><?= $_POST['dia'].'-'.$_POST['mes'].'-'.$_POST['anio'].
                        ' a las '.$_POST['hora'].':'.$_POST['minutos'];
               ;  ?>
            </td>
          </tr>
          <tr>
            <td width="15%">Observaciones</td>
            <td width="50%"><?= $observ ; ?>
               
            </td>
          </tr>
         
        </table> <?php } ?>
            
  
    </td>
  </tr>
  <tr>
    <td colspan="2" align="right">Por ®RotseN-Shelvak® - 2012</td>
  </tr>
</table>
</body>
</html>
