<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:ice="http://ns.adobe.com/incontextediting"><!-- InstanceBegin template="/Templates/principal.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>La agenda del pibe del mas haya</title>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
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
    <?php 
	include ('connections/coso1.php');
	mysql_select_db($db, $coso1);
	$Recibido = $_POST['busca'];
	if ($_POST['tipo'] == "cel" ) {
		$query_contacto = sprintf("SELECT * FROM tb_contactos LEFT JOIN tb_grupos ON tb_contactos.idGrupo = tb_grupos.idGrupo WHERE celular=%s", $Recibido);}
	if ($_POST['tipo'] == "tel" ) {
		$query_contacto = sprintf("SELECT * FROM tb_contactos LEFT JOIN tb_grupos ON tb_contactos.idGrupo = tb_grupos.idGrupo WHERE telefono=%s", $Recibido);}
	$contacto = mysql_query($query_contacto, $coso1) or die(mysql_error());
	$row_contacto = mysql_fetch_assoc($contacto);
	$condi = mysql_num_rows ($contacto);
	?>
<form method="post" action="busqueda.php" id="buscar" name="buscar">
      <table align="center" width="95%" border="1">
        <tr align="center">
          <td align="center" width="40%"> Buscar por : </td>
          <td align="center" width="60%"> <select id="tipo" name="tipo">  
            <option value="cel">Celular</option>
            <option value="tel">Telefono </option>
            </select> </td>
          </tr>
        <tr align="center">
          <td align="center" colspan="2"><span id="sprytextfield1">
          <input type="text" id="busca" name="busca"  style="color:#3CC; background-color:#333;" />
          <span class="textfieldRequiredMsg">Campo obligatorio</span><span class="textfieldInvalidFormatMsg">Ingrese numero</span></span></td></tr>
        <tr align="center">
          <td align="center" colspan="2"> El número debe ser exacto</td></tr>
        <tr align="center">
          <td align="center" colspan="2"> <input type="submit" id="manda" name="manda" value="Buscar" />
      </td></tr></table></form>
    
    <p>&nbsp;</p>
     <?php 
	 if ($condi != 0) {
	 ?>
    
     <form id="buscar" name="buscar" method="post" action="busqueda.php">
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
            <td><?=$row_contacto['idContacto']?></td>
            <td><?php echo $row_contacto['Nombre']; ?></td>
            <td><?php echo $row_contacto['Apellido']; ?></td>
            <td><?php echo $row_contacto['Apodo']; ?></td>
            <td><?php echo $row_contacto['telefono']; ?></td>
            <td><?php echo $row_contacto['celular']; ?></td>
            <td><?php if ($row_contacto ['idGrupo'] != 0) {
			echo $row_contacto ['nombreGrupo']; }
			else echo " ---- ";
			?></td>
            <td><a href="mod-cont.php?id=<?php echo $row_contacto['idContacto'] ?>"><img src="images/editar.png" width="16" height="16"/></a></td>
            <td><a href="elim-cont.php?id=<?php echo $row_contacto['idContacto'] ?>"><img src="images/borrar.png" width="16" height="16"/></a></td>
          </tr>
          <?php } while ($row_contacto = mysql_fetch_assoc($contacto)); ?>
        </table>
      </form>
      
      <?php } 
	  else echo "No se encontro el contacto" ; ?>
      <script type="text/javascript">
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "integer");
//-->
      </script>
      
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
