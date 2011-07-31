<?php
include ('connections/coso1.php');
if (!function_exists("GetSQLValueString")) { 
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}
mysql_select_db($db,$coso1);
$maxRows_contacto1 = 20;
$pageNum_contacto1 = 0;
$busca = $_POST['filtro']; //Filtrar por...////
$query_contacto1 = sprintf("SELECT * FROM tb_contactos LEFT JOIN tb_grupos ON tb_contactos.idGrupo = tb_grupos.idGrupo WHERE tb_contactos.idGrupo LIKE '%s'",$busca);
$query_limit_contacto1 = sprintf("%s LIMIT %d, %d", $query_contacto1, $startRow_contacto1, $maxRows_contacto1);
$contacto1 = mysql_query($query_limit_contacto1, $coso1) or die(mysql_error());
$row_contacto1 = mysql_fetch_assoc($contacto1);
$condi = mysql_num_rows($contacto1);

//rellamar el select de grupos
$query_grupos = "SELECT * FROM tb_grupos";
$grupos = mysql_query($query_grupos, $coso1) or die(mysql_error()); 
$row_grupos = mysql_fetch_assoc($grupos);

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
<title>La agenda del pibe del mas haya</title>
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
      
 	    <?php
   		include ('connections/coso1.php');
		mysql_select_db ($db,$coso1);
		$anioActu = date (Y);
		$mesActu = date (m);
		$diaActu = date (d);
        $query_contacto2 = "SELECT * FROM tb_contactos";
		$contacto2 = mysql_query($query_contacto2, $coso1) or die(mysql_error());
		$row_contacto2 = mysql_fetch_assoc($contacto2);
		$aux=0;
      echo "Cumples de hoy : </br>";
      do {
		 $a = explode ("-" , $row_contacto2['cumple']);
		 $Nac = $a[2] . $a[1] . $a[0];
		 $cump = $anioActu - $a[0];
		  if ($a[2] == $diaActu && $a[1] == $mesActu){
		echo " - " . $row_contacto2['Nombre'] . " " . $row_contacto2['Apellido'] . " ($cump)" . "</br>" ;
		$aux +=1;
		 }
  }
  while ($row_contacto2 = mysql_fetch_assoc($contacto2));
  if ($aux == 0) echo "Ninguno";
     ?>
      </td>
    <td valign="top"><!-- InstanceBeginEditable name="Show" -->
     <form method="post" action="filtrar-grup.php" name="form4" id="form4">
    <table width="70%" border="1" align="center" >
    <tr>
    <td width="40%">Filtrar por: </td> <td width="60%" align="center"> 
    <select name="filtro"  style="color:#3CC; background-color:#333; ">
              <?php
do {  
?>
              <option value="<?php echo $row_grupos['idGrupo'] ?>"><?php $gru =$row_grupos['nombreGrupo']; echo $gru ;?></option>
              <?php
} while ($row_grupos = mysql_fetch_assoc($grupos));
?>
    </select>
    </td>
    </tr>
    <tr>
    <td width="100%" colspan="2" align="center"> <input type="submit" id="filtrar" name="filtrar" value="Filtrar"/></td>
    </tr>
    </table>
    </form>
    
     <p><?php if ($condi != 0){ ?></p>
     <p></p>
     <p></p>
      
      <form id="form1" name="form1" method="post" action="">
        <table width="95%" border="1" align="center">
          <tr>
            <th bgcolor="#555555" scope="col">Nombre</th>
            <th bgcolor="#555555" scope="col">Apellido</th>
            <th bgcolor="#555555" scope="col">Apodo</th>
            <th bgcolor="#555555" scope="col">Telefono</th>
            <th bgcolor="#555555" scope="col">Celular</th>
            <th bgcolor="#555555" scope="col">Grupo</th>      
          </tr>
          <?php do { 
		  ?>
          <tr> 
            <td><?php echo $row_contacto1 ['Nombre']; ?></td>
            <td><?php echo $row_contacto1 ['Apellido']; ?></td>
            <td><?php echo $row_contacto1 ['Apodo']; ?></td>
            <td><?php echo $row_contacto1 ['telefono']; ?></td>
            <td><?php echo $row_contacto1 ['celular']; ?></td>
            <td><?php echo $row_contacto1 ['nombreGrupo'];?></td>
            </tr>
          <?php } while ($row_contacto1 = mysql_fetch_assoc($contacto1)); ?>
        </table>
      </form>
      <? }
	  else echo "No se encontro ningun contacto en el grupo, intente nuevamente";?>
     
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
