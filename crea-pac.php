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
      <form id="form1" method="post" action="ins-pac.php">
        <table class="formulario">
          <tr>
            <td width="15%">Nombre</td>
            <td width="50%">
              <input type="text" name="nombre" id="nombre" class="obligatorio" />
              <span id="error-nombre"></span>
            </td>
          </tr>
          <tr>
            <td width="15%">Apellido</td>
            <td width="50%" >
              <input type="text" name="apellido" id="apellido" class="obligatorio" />
              <span id="error-apellido"></span>
            </td>
          </tr>
          <tr>
            <td width="15%">DNI</td>
            <td width="50%">
                <input type="text" name="dni" id="dni"  class="obligatorio" />
                <span id="error-dni"></span>
            </td>
          <tr>
            <td width="15%">Dirección</td>
            <td width="50%">
                <input type="text" name="direccion" id="direccion" />
            </td>
          </tr>
          <tr>
            <td width="15%">Email</td>
            <td width="50%">
                <input type="text" name ="email" id="email" class="obligatorio" />
                <span id="error-email"></span>
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
