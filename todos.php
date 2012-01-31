<?php
include ('connections/conect.php');
mysql_select_db($db, $conect);

$maxRows_pacientes = 10;
$pageNum_pacientes = 0;
//fila donde empieza
if (!isset($_GET['pagina'])) $startRow_pacientes = 0;
else $startRow_pacientes = ($_GET['pagina']-1) * $maxRows_pacientes;


//cantidad total de registros
$q = mysql_query('SELECT count(*) as cant FROM pacientes');
$cantidad = mysql_fetch_assoc($q);
$cantidadtotal = $cantidad['cant'];
//cant total de paginas
$cantPaginas = ceil($cantidadtotal / $maxRows_pacientes);

$paginado = '';
for($i=1; $i<=$cantPaginas; $i++) {
        if ($i < $cantPaginas ) {
            $a = '-';
        } else {
            $a = ' ';
        }
        if($i == $_GET['pagina']){ 
            $e = '<b>('.$i.')</b>';} else { $e = $i; }
            $paginado.= '<a href="todos.php?pagina='.$i.'">'.$e.'</a>'. $a ; 
            
      
}
if ($cantPaginas == 1){$paginado = '';}

$query_pacientes = "SELECT * FROM pacientes ORDER BY apellido ";
$query_limit_pacientes = sprintf("%s LIMIT %d, %d", $query_pacientes, $startRow_pacientes, $maxRows_pacientes);
$pacientes = mysql_query($query_limit_pacientes) or die(mysql_error());
$row_paciente = mysql_fetch_assoc($pacientes);

if (isset($_POST['totalRows_pacientes'])) {
  $totalRows_pacientes = $_POST['totalRows_pacientes'];
} else {
  $todos = mysql_query($query_pacientes);
  $totalRows_pacientes = mysql_num_rows($todos);
}
$totalPages_pacientes = ceil($totalRows_pacientes/$maxRows_pacientes)-1;
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
         
     <?php if (mysql_num_rows($pacientes) >=1){ ?>
          <h3>Lista </h3>
          
        <table class="lista">
          <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>DNI</th>
            <th>Dirección</th>
            <th>Email</th>
            <th colspan="2">Editar</th>
          </tr>
          <?php do { ?>
          <tr> 
            <td><?= $row_paciente ['nombre']; ?></td>
            <td><?= $row_paciente ['apellido']; ?></td>
            <td><?= $row_paciente ['dni']; ?></td>
            <td><?= $row_paciente ['direccion']; ?></td>
            <td><?= $row_paciente ['email']; ?></td>
           
            <td><a href="mod-pac.php?id=<?= $row_paciente ['id'] ?>"><img src="images/editar.png" class="edit"/></a></td>
            <td><a href="elim-pac.php?id=<?= $row_paciente ['id'] ?>" class="borrar-pac" ><img src="images/borrar.png" class="edit"/></a></td>
          </tr>
          <?php } while ($row_paciente = mysql_fetch_assoc($pacientes)); ?>
        </table>
      
          <?=$paginado;
     }else{echo 'No hay pacientes cargados';}
          ?>
          
      </td>
  </tr>
  <tr>  
    <td colspan="2" align="right">Por ®RotseN-Shelvak® - 2012</td>
  </tr>
</table>
    
</body>
</html>
