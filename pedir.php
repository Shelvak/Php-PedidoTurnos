<?php
include ('connections/conect.php');
mysql_select_db($db, $conect);
$query_pacientes = "SELECT * FROM pacientes LIMIT 10";
$pacientes = mysql_query($query_pacientes) or die(mysql_error() );
$query_medicos = "SELECT * FROM medicos";
$medicos = mysql_query($query_medicos) or die(mysql_error() );

?>

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
      <form id="form1" method="post" action="ins-turno.php">
        <table class="formulario">
          <tr>
            <td width="15%">Paciente: </td>
            <td width="50%">
              <select name="paciente" id="paciente" />
                  <?php while ($row_paciente = mysql_fetch_assoc($pacientes))  { ?>
                    <option value="<?= $row_paciente['id']; ?>"> 
                        <?= $row_paciente['nombre'].' '. $row_paciente['apellido']; ?> 
                    </option>
                  <?php } ?>
              </select>
              <span id="error-paciente"></span>
            </td>
          </tr>
          <tr>
            <td width="15%">Médico</td>
            <td width="50%" >
              <select name="medico" id="medico">
              <?php while ($row_medico = mysql_fetch_assoc($medicos))  { ?>
                  <option value="<?= $row_medico['id']; ?>"> <?= $row_medico['nombreMed']; ?> </option>
                
                  <?php } ?>
              </select>
            </td>
          </tr>
          <tr>
            <td width="15%">Fecha</td>
            <td width="50%">
                <select name="dia">          
              <?php 
			  for ($dia=1 ; $dia <=31 ; $dia ++ ){
                            if ($dia == date(j))
				echo '<option value = '.$dia.' selected="selected"> '.$dia.'</option>';
                            else 
                                echo '<option value = '.$dia.'> '.$dia.'</option>';
			  }
			  ?> 
              </select> -
              <select name ="mes">
                <?php 
			  for ($mes=1 ; $mes <=12 ; $mes ++ ){
                            if ($mes == date(n))
				  	echo '<option value = '.$mes.' selected="selected"> '.$mes.' </option>';
				else
					echo '<option value = '.$mes.'> '.$mes.'</option>';
			  }
			  ?>
              </select> - 
          <select name="anio">
          <?php 
                    
			  for ($anio=date(Y) ; $anio <=date(Y) + 3 ; $anio ++ ){
				  echo '<option value = '.$anio.'> '.$anio.'</option>';
			  }
			  ?> 
      </select>
                <span id="error-fecha"></span>
            </td>
          <tr>
            <td width="15%">Hora</td>
            <td width="50%">
                <select name="hora">          
                     <?php 
			  for ($hora=8 ; $hora <=21 ; $hora ++ ){
				  echo '<option value = '.$hora.'>'.$hora.'</option>';
			  }
			  ?> 
              </select> :
              <select name="minutos">          
                     <?php 
			  for ($min=0 ; $min <=50 ; $min +=10 ){
				  echo '<option value = '.$min.'>'.$min.'</option>';
			  }
			  ?> 
              </select>
                <span id="error-hora"></span>
            </td>
          </tr>
          <tr>
            <td width="15%">Observaciones</td>
            <td width="50%">
                <textarea rows="10" cols="40" name="observ" id="observ" > </textarea>
            </td>
          </tr>
          
          <tr>
            <td colspan="2" align="center"><input type="submit" id="enviar" value="Crear" /> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="reset" id="reset" value="Limpiar"/></td>
          </tr>
        </table>
       </form>
            
  
    </td>
  </tr>
  <tr>
    <td colspan="2" align="right">Por ®RotseN-Shelvak® - 2012</td>
  </tr>
</table>
</body>
</html>
