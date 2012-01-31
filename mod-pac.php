<?php 
include ('connections/conect.php');
require ('funciones.php');
mysql_select_db($db, $conect);


if (isset ($_GET['id'])){
$paciente = sprintf("SELECT * FROM pacientes WHERE id = %s", $_GET['id']);
$query_paciente= mysql_query ($paciente);
$row_paciente = mysql_fetch_assoc($query_paciente); 
}



if ((isset($_POST["update"])) && ($_POST["update"] == "up-form")) {
  $updateSQL = sprintf("UPDATE pacientes SET nombre='%s', apellido='%s', dni='%s', 
                direccion='%s', email='%s' WHERE id=%s",
                 validarsql($_POST['nombre']), validarsql($_POST['apellido']),
                 validarsql($_POST['dni']), validarsql($_POST['direccion']), 
                 validarsql($_POST['email']), validarsql($_POST['id']));

  $Resultado = mysql_query($updateSQL) or die(mysql_error());
  
  $updateGoTo = "todos.php";
  header(sprintf("Location: %s", $updateGoTo));
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
    <td >
      <form method="post" action="">
        <table class="formulario">
          <tr>
            <td class="">Nombre</td>
            <td width="50%">
              <input type="text" name="nombre" id="nombre" class="obligatorio" value="<?= $row_paciente['nombre']; ?>" />
              <span id="error-nombre"></span>
            </td>
          </tr>
          <tr>
            <td width="25%">Apellido</td>
            <td width="50%">
              <input type="text" name="apellido" id="apellido" class="obligatorio" value="<?= $row_paciente['apellido']; ?>" />
              <span id="error-apellido"></span>
            </td>
          </tr>
          <tr>
            <td width="25%">DNI</td>
            <td width="50%">
                <input type="text" name="dni" id="dni" class="obligatorio" value="<?= $row_paciente['dni']; ?>" />
                <span id="error-dni"></span>
            </td>
          <tr>
            <td width="25%">Dirección</td>
            <td width="50%">
                <input type="text" name="direccion" id="direccion" value="<?= $row_paciente['direccion']; ?>" />
            </td>
          </tr>
          <tr>
            <td width="25%">Email</td>
            <td width="50%">
                <input type="text" name ="email" id="email" class="obligatorio" class="validar-email" value="<?= $row_paciente['email']; ?>" />
                <span id="error-email"></span>
            </td>
          </tr>
          
          <tr>
            <td colspan="2" align="center">
                <input type="hidden" id="id" name="id" value="<?= $row_paciente['id']; ?>"/>
                <input type="hidden" id="update" name="update" value="up-form" />
                <input type="submit" id="enviar" name="enviar" value="Modificar"/>
          </tr>
        </table>
       </form>
            
  
    </td>
  </tr>
  <tr>
    <td colspan="2" align="right" >Por ®RotseN-Shelvak® - 2012</td>
  </tr>
</table>
</body>
</html>
