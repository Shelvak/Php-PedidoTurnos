<?php 
include ('connections/coso1.php');
mysql_select_db ($db , $coso1);
$query_grupo = "SELECT * FROM tb_grupos";
$grupos = mysql_query ($query_grupo , $coso1);
$row_grupos = mysql_fetch_assoc($grupos);
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
 <script language="javascript">
	function eliminar(grupo, url)
	{
		if(confirm('Quiere eliminar el grupo  ' + grupo + '?'))
		{
			window.location = url;
		}
	}
	</script>
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
    <form id="form2"  name="form2" method="post" action="insert-grup.php">
      <table align="center" width="60%" border="1">
        <tr>
          <td width="20%"> Crear Grupo : </td>
          <td width="40%"><span id="sprytextfield1">
            <input name="crea-grup" align="absmiddle" type="text" id="crea-grup" style="color:#3CC; background-color:#333;" size="50%" width="50%"  />
            <span class="textfieldRequiredMsg">Ingrese un nombre de Grupo</span></span>
            <input type="submit" id="env" name="env-grup" value="Crear">
            </td>
          </tr>
        <tr>
          <td width="100%" colspan="2" align="center"> 
		  <?php echo "Grupos creados: </br>" ;do {  ?> </td>
          </tr>
          <tr> 
		  <td width="50%" align="left"><?php echo $row_grupos['nombreGrupo'] ." "; ?></td>
          <td width="10" align="right"><img src="images/borrar.png" width="16" height="16" style="cursor:pointer" onclick="eliminar('<?php echo $row_grupos['nombreGrupo']; ?>', 'elim-grup.php?id=<?php echo $row_grupos['idGrupo']; ?>')"/></td>
          </tr>
		  <?php } while ($row_grupos = mysql_fetch_assoc($grupos));	?>
         
        <tr>
          <td width="100%" colspan="2" align="center">  </td>
          </tr>
        </table>
    </form>
    <script type="text/javascript">
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
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
