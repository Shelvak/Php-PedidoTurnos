<?php 
include ('connections/coso1.php');
mysql_select_db($db, $coso1);

$idrecibido ="-1";
if (isset ($_GET['id'])){
$idrecibido = $_GET['id'];
$conta = sprintf ("SELECT * FROM tb_contactos WHERE idContacto=%s", $idrecibido);
$query_contacto= mysql_query ($conta , $coso1);
$row_contacto = mysql_fetch_assoc($query_contacto); 
$idgrupo = $row_contacto['idGrupo'];
$query_grupos = sprintf ("SELECT * FROM tb_grupos WHERE idGrupo=%s",$idgrupo);
$grupos = mysql_query($query_grupos, $coso1) or die(mysql_error()); 
$row_grupos = mysql_fetch_assoc($grupos);
$totalRows_grupos = mysql_num_rows($grupos);

}
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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_delete"])) && ($_POST["MM_delete"] == "form3")) {
  $deleteSQL = sprintf("DELETE FROM tb_contactos WHERE idContacto=%s",$row_contacto['idContacto']);
  $Result1 = mysql_query($deleteSQL, $coso1) or die(mysql_error());
  
  $deleteGoTo = "todos.php";
  header(sprintf("Location: %s", $deleteGoTo));
}
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
      <form id="form3" name="form3" method="post" action="">
     <table align="center" width="60%" border="2">
       <tr>
         <td width="25%">Nombre</td>
         <td width="60%">
         <input type="text" readonly="readonly" name="nombre" id="nombre" value="<?php echo $row_contacto['Nombre']; ?>" style="color:#3CC; background-color:#333;"/></td>
         </tr>
       <tr>
         <td width="25%">Apellido</td>
         <td width="60%">
           <input type="text" readonly="readonly" name="apellido" id="apellido" value="<?php echo $row_contacto['Apellido']; ?>" style="color:#3CC; background-color:#333;"/></td>
         </tr>
          <tr>
         <td width="25%">Apodo</td>
         <td width="60%">
           <input type="text" readonly="readonly" name="apodo" id="apodo" value="<?php echo $row_contacto['Apodo']; ?>" style="color:#3CC; background-color:#333;"/></td>
         </tr>
       <tr>
         <td width="25%">Telefono</td>
         <td width="60%">
           <input type="text" readonly="readonly" name="telefono" id="telefono" value="<?php echo $row_contacto['telefono']; ?>" style="color:#3CC; background-color:#333;"/></td>
         </tr>
       <tr>
         <td width="25%">Celular</td>
         <td width="60%">
           <input type="text" readonly="readonly" name="celular" id="celular" value="<?php echo $row_contacto['celular']; ?>" style="color:#3CC; background-color:#333;"/></td>
         </tr>
       <tr>
         <td width="25%">Fecha de Nacimiento</td>
         <td width="60%">
           <input type="text" readonly="readonly" name="cumple" id="cumple" style="color:#3CC; background-color:#333;" 
           value="<?php $naci = explode ("-" , $row_contacto['cumple']); 
			$a= "/";
			$nacim = $naci[2].$a.$naci[1].$a.$naci[0];
			echo $nacim;
			?>"></input>
              </td>
         </tr>
       <tr>
         <td width="25%">Grupo</td>
         <td width="60%"><input id="grupo" name="grupo" readonly="readonly" value="<?php echo $row_grupos['nombreGrupo']; ?>" style="color:#3CC; background-color:#333;"></input></td>
         </tr>
       <tr>
         <td colspan="2" align="center"><input name="id" type="hidden" id="id" value="<?php echo $row_contacto['idContacto']; ?>" />
            <input name="MM_delete" type="hidden" id="MM_delete" value="form3" />
         <input type="submit" name="enviar" id="enviar" value="Eliminar"/></td>
         </tr>
       </table>
   </form>
    
    
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
