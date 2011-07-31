<?php
include ('connections/coso1.php');


$maxRows_contacto1 = 20;
$pageNum_contacto1 = 0;
//fila donde empieza
if (!isset($_GET['pagina'])) $startRow_contacto1 = 0;
else $startRow_contacto1 = ($_GET['pagina']-1) * $maxRows_contacto1;

mysql_select_db($db, $coso1);
//cantidad total de registros
$q = mysql_query('SELECT count(*) as cant FROM tb_contactos LEFT JOIN tb_grupos ON tb_contactos.idGrupo = tb_grupos.idGrupo', $coso1);
$cantidad = mysql_fetch_assoc($q);
$cantidadtotal = $cantidad['cant'];
//cant total de paginas
$cantPaginas = ceil($cantidadtotal / $maxRows_contacto1);

$paginado = '';
for($i=1; $i<=$cantPaginas; $i++) {
	$paginado.= '<a href="todos.php?pagina='.$i.'">'.$i.'</a> - ';
}

$query_contacto1 = "SELECT * FROM tb_contactos LEFT JOIN tb_grupos ON tb_contactos.idGrupo = tb_grupos.idGrupo ORDER BY Apellido";
$query_limit_contacto1 = sprintf("%s LIMIT %d, %d", $query_contacto1, $startRow_contacto1, $maxRows_contacto1);
$contacto1 = mysql_query($query_limit_contacto1, $coso1) or die(mysql_error());
$row_contacto1 = mysql_fetch_assoc($contacto1);

if (isset($_POST['totalRows_contacto1'])) {
  $totalRows_contacto1 = $_POST['totalRows_contacto1'];
} else {
  $all_contacto1 = mysql_query($query_contacto1);
  $totalRows_contacto1 = mysql_num_rows($all_contacto1);
}
$totalPages_contacto1 = ceil($totalRows_contacto1/$maxRows_contacto1)-1;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:ice="http://ns.adobe.com/incontextediting"><!-- InstanceBegin template="/Templates/principal.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>La pagina del pibe del mas haya</title>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css" style="color:#3CC; background-color:#000"/>
<style type="text/css" title=".manso">
<!--
body {
	background-color: #000;
	font-family: Comic Sans MS, cursive;
	font-size: 24px;
	color: #0CC;
	font-weight: bold;
}
.colorin {
	background-color:#333;
	color:#3CC
	font-family:"Arial Black", Gadget, sans-serif;
	font-size:16px;
	font-weight: bold;
}
-->
</style></head>

<body>
<table width="100%" border="2" cellspacing="0" cellpadding="0">
  <tr>
    <td width="167" height="170"><img src="/images/logo.jpg" width="167" height="170" alt="" /></td>
    <td width="82%">La mansa pagina! Version 1.3</td>
  </tr>
  <tr>
    <td height="100%" width="167" valign="top"><ul id="MenuBar1" class="MenuBarVertical">
      <li><a href="index.php">Inicio</a>        </li>
      <li><a class="menubaritemsubmenu" href="#">Crear un </a>        
        <ul>
        <li><a href="crea-cont.php">Contacto</a></li>
        <li><a href="crea-grup.php">Grupo</a></li>
        </ul>
      </li>
      <li><a class="MenuBarItemSubmenu" href="#">Contactos</a>
        <ul>
          <li><a href="todos.php">Mostrar todos</a></li>
          <li><a href="buscar.php">Buscar</a></li>
          <li><a class="MenuBarItemSubmenu" href="#">Filtrar por</a><ul>
          <li><a href="filtro.php">Nombre-Apellido</a></li>
          <li><a href="filtro-grup.php">Grupo</a></li></ul></li>
        </ul>
        </li>
       <li><a class="MenuBarItemSubmenu" href="#">Otros</a>
        <ul>
          <li><a href="cumples.php">Cumpleaños</a></li>
        </ul>
      </li>
      </ul>
      </td>
    <td valign="top"><!-- InstanceBeginEditable name="Show" -->
    Lista de contactos
                       <p>&nbsp;</p>
      <form id="form1" name="form1" method="post" action="">
        <table width="95%" border="1" align="center">
          <tr>
            <th bgcolor="#555555" scope="col">ID</th>
            <th bgcolor="#555555" scope="col">Nombre</th>
            <th bgcolor="#555555" scope="col">Apellido</th>
            <th bgcolor="#555555" scope="col">Apodo</th>
            <th bgcolor="#555555" scope="col">Telefono</th>
            <th bgcolor="#555555" scope="col">Celular</th>
            <th bgcolor="#555555" scope="col">Grupo</th>
            <th colspan="2" bgcolor="#555555" scope="col">Editar</th>
          </tr>
          <?php do { ?>
          <tr> 
            <td><?php echo $row_contacto1 ['idContacto']; ?></td>
            <td><?php echo $row_contacto1 ['Nombre']; ?></td>
            <td><?php echo $row_contacto1 ['Apellido']; ?></td>
            <td><?php echo $row_contacto1 ['Apodo']; ?></td>
            <td><?php echo $row_contacto1 ['telefono']; ?></td>
            <td><?php echo $row_contacto1 ['celular']; ?></td>
            <td><?php 
			if ($row_contacto1 ['idGrupo'] != 0)
			echo $row_contacto1 ['nombreGrupo'];
			else echo " --- ";
			?></td>
            <td><a href="mod-cont.php?id=<?php echo $row_contacto1 ['idContacto'] ?>"><img src="images/editar.png" width="16" height="16" style="cursor:pointer"/></a></td>
            <td><a href="elim-cont.php?id=<?php echo $row_contacto1 ['idContacto'] ?>"><img src="images/borrar.png" width="16" height="16" style="cursor:pointer"/></a></td>
          </tr>
          <?php } while ($row_contacto1 = mysql_fetch_assoc($contacto1)); ?>
        </table>
      </form>
      
      <?=$paginado?>
       <p>&nbsp;</p>
    <!-- InstanceEndEditable --></td>
  </tr>
  <tr>
    <td>
    
    <?php
    echo "Fecha: "; 
    echo date ( "j / n / y");
    ?></td>
    <td align="right">Por ®RotseN-Shelvak® - 2011</td>
  </tr>
</table>
<script type="text/javascript">
<!--
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgRight:"../SpryAssets/SpryMenuBarRightHover.gif"});
//-->
</script>
</body>
<!-- InstanceEnd --></html>
<?php
mysql_free_result($contacto1);
?>
