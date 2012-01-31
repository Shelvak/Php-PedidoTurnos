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
   <?php 
        include ('connections/conect.php');
        require ('funciones.php');
        mysql_select_db($db, $conect);
        $nombre = validarsql($_POST['nombre']);
        $apellido = validarsql($_POST['apellido']);
        $dni = validarsql($_POST['dni']);
        $direccion = validarsql($_POST['direccion']);
        $email = validarsql($_POST['email']);
        if ($nombre && $apellido && $dni && $email){
        $consulta = "INSERT into pacientes (nombre , apellido , dni , direccion , email ) VALUES ( '$nombre', '$apellido' , '$dni' , '$direccion' , '$email')";
        $resultado = mysql_query($consulta) or die (mysql_error()) ; 

            
            echo "Se cargo el contacto  : <br />" ;
            echo "Nombre : " .$nombre . "<br />";
            echo "Apellido : ".$apellido . "<br />";
            echo "DNI : " .$dni . "<br />";
            echo "Dirección : ".$direccion . "<br />";
            echo "Email : ".$email . "<br />";	}	
         else {
            echo "Ocurrío algún error... ";
            echo "<a href='crea-pac.php'> VOLVER </a>";
             }  ?>
      </td>
  </tr>
  <tr>
    <td> 
        
    </td>
  
    <td align="right">Por ®RotseN-Shelvak® - 2012</td>
  </tr>
</table>
    
</body>
</html>