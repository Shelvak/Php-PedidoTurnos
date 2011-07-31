<?php 
include ('connections/coso1.php');
mysql_select_db($db, $coso1);
$query_grupos = "SELECT * FROM tb_grupos";
$grupos = mysql_query($query_grupos, $coso1) or die(mysql_error()); 
$row_grupos = mysql_fetch_assoc($grupos);
$totalRows_grupos = mysql_num_rows($grupos);

$idrecibido ="-1";
if (isset ($_GET['id'])){
$idrecibido = $_GET['id'];
$conta = sprintf ("SELECT * FROM tb_contactos LEFT JOIN tb_grupos ON tb_contactos.idGrupo = tb_grupos.idGrupo WHERE idContacto=%s", $idrecibido);
$query_contacto= mysql_query ($conta , $coso1);
$row_contacto = mysql_fetch_assoc($query_contacto); 
list($db_anio, $db_mes, $db_dia) = explode('-', $row_contacto['cumple']);
$aux = $row_contacto['idGrupo'];
}

if (!function_exists("GetSQLValueString")) { 
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = mysql_real_escape_string($theValue);

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

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form3")) {
	$cumple = $_POST['anio'].'-'.$_POST['mes'].'-'.$_POST['dia'];
	$updateSQL = sprintf("UPDATE tb_contactos SET Nombre=%s, Apellido=%s, Apodo=%s, telefono=%s, celular=%s,  cumple='$cumple', idGrupo=%s WHERE idContacto=%s",
                       GetSQLValueString($_POST['nombre'], "text"),
                       GetSQLValueString($_POST['apellido'], "text"),
					   GetSQLValueString($_POST['apodo'],"text"),
                       GetSQLValueString($_POST['telefono'], "text"),
                       GetSQLValueString($_POST['celular'], "text"),
					   GetSQLValueString($_POST['grupo'], "int"),
                       GetSQLValueString($_POST['id'], "int"));

  mysql_select_db($db, $coso1); 
  $Result1 = mysql_query($updateSQL, $coso1) or die(mysql_error());
  
  $updateGoTo = "todos.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
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
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
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
   <form id="form3" name="form3" method="post" action="">
     <table align="center" width="60%" border="2">
       <tr>
         <td width="25%">Nombre</td>
         <td width="60%"><span id="sprytextfield1">
         <input type="text" name="nombre" id="nombre" value="<?php echo $row_contacto['Nombre']; ?>" style="color:#3CC; background-color:#333;"/>
         <span class="textfieldRequiredMsg">Ingrese Nombre</span></span></td>
         </tr>
       <tr>
         <td width="25%">Apellido</td>
         <td width="60%"><span id="sprytextfield2">
           <input type="text" name="apellido" id="apellido" value="<?php echo $row_contacto['Apellido']; ?>" style="color:#3CC; background-color:#333;"/>
           <span class="textfieldRequiredMsg">Ingrese Apellido</span></span></td>
         </tr>
         <tr>
         <td width="25%">Apodo</td>
         <td width="60%">
         <input type="text" name="apodo" id="apodo" value="<?php echo $row_contacto['Apodo']; ?>" style="color:#3CC; background-color:#333;"/>
         </tr>
       <tr>
         <td width="25%">Telefono</td>
         <td width="60%"><span id="sprytextfield3">
         <input type="text" name="telefono" id="telefono" value="<?php echo $row_contacto['telefono']; ?>" style="color:#3CC; background-color:#333;"/>
         <span class="textfieldRequiredMsg">Ingrese Telefono</span><span class="textfieldInvalidFormatMsg">Ingrese numero</span></span></td>
         </tr>
       <tr>
         <td width="25%">Celular</td>
         <td width="60%"><span id="sprytextfield4">
         <input type="text" name="celular" id="celular" value="<?php echo $row_contacto['celular']; ?>" style="color:#3CC; background-color:#333;"/>
         <span class="textfieldRequiredMsg">Ingrese Celular</span><span class="textfieldInvalidFormatMsg">Ingrese numero.</span></span></td>
         </tr>
       <tr>
         <td width="25%">Fecha de Nacimiento</td>
         <td width="60%">
           <span id="spryselect2">
           <select name="dia" id="dia" style="color:#3CC; background-color:#333;">
             <?php 
			  for ($dia=1 ; $dia <=31 ; $dia ++ ){
				  if ($dia == $db_dia)
				  	echo '<option value = '.$dia.' selected="selected"> '.$dia.'</option>';
				  else 
				    echo '<option value = '.$dia.'> '.$dia.'</option>';
			  }
			  ?>
           </select>
           <span class="selectRequiredMsg">Seleccione un elemento.</span></span> -
           <span id="spryselect3">
           <select name ="mes" id="mes" style="color:#3CC; background-color:#333;">
             <?php 
			  for ($mes=1 ; $mes <=12 ; $mes ++ ){
				  if ($mes == $db_mes)
				  	echo '<option value = '.$mes.' selected="selected"> '.$mes.' </option>';
				else
					echo '<option value = '.$mes.'> '.$mes.'</option>';
			  }
			  ?>
           </select>
           <span class="selectRequiredMsg">Seleccione un elemento.</span></span> -
           <span id="spryselect4">
           <select name="anio" style="color:#3CC; background-color:#333;">
             <?php 
			  for ($anio=1950 ; $anio <=2011 ; $anio ++ ){
				if ($anio == $db_anio) echo '<option value = '.$anio.' selected="selected"> '.$anio.' </option>';
				else echo '<option value = '.$anio.'> '.$anio.'</option>';  }
			  ?>
           </select>
           <span class="selectRequiredMsg">Seleccione un elemento.</span></span></td>
         </tr>
       <tr>
         <td width="25%">Grupo</td>
         <td width="60%"><span id="spryselect1">
           <select name="grupo" class="datos" id="grupo">
             <?php
			 do {  
if ($aux != $row_grupos['idGrupo']){
	echo '<option value='.$row_grupos['idGrupo'].'> '.$row_grupos['nombreGrupo'].' ';}
else echo '<option value='.$aux.' selected="selected"> '.$row_contacto['nombreGrupo'].' '; ?>
             </option>            
             <?php
} while ($row_grupos = mysql_fetch_assoc($grupos));
  $rows = mysql_num_rows($grupos);
  if($rows > 0) {
      mysql_data_seek($grupos, 0);
	  $row_grupos = mysql_fetch_assoc($grupos);
  }
?>
           </select>
           <span class="selectRequiredMsg">Seleccione un elemento.</span></span></td>
         </tr>
       <tr>
         <td colspan="2" align="center"><input name="id" type="hidden" id="id" value="<?php echo $row_contacto['idContacto']; ?>" />
            <input name="MM_update" type="hidden" id="MM_update" value="form3" />
         <input type="submit" name="enviar" id="enviar" value="Modificar"/></td>
         </tr>
       </table>
   </form>
   <script type="text/javascript">
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {validateOn:["blur"]});
var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "none", {validateOn:["blur"]});
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "integer", {validateOn:["blur"]});
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "integer", {validateOn:["blur"]});
var spryselect2 = new Spry.Widget.ValidationSelect("spryselect2");
var spryselect3 = new Spry.Widget.ValidationSelect("spryselect3");
var spryselect4 = new Spry.Widget.ValidationSelect("spryselect4");
//-->
   </script>
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
