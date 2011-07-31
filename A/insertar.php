<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:ice="http://ns.adobe.com/incontextediting"><!-- InstanceBegin template="/Templates/principal.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>La web del pibe del mas haya</title>
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
     <?php 
  include ('connections/coso1.php');
  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $apodo = $_POST['apodo'];
  $telefono = $_POST['telefono'];
  $celular = $_POST['celular'];
  $nacim = $_POST['anio'].'-'.$_POST['mes'].'-'.$_POST['dia'];
  $grupo = $_POST['grupo'];
      $coneccion = mysql_connect($host , $usuario , $contra); //Llamamos al archivo de coneccion
		mysql_select_db("$db"); //Seleccionamos la db desde el archivo de coneccion
	    $consulta = "INSERT into tb_contactos (Nombre , Apellido , Apodo , telefono , celular , cumple , idGrupo)VALUES ( '$nombre', '$apellido' , '$apodo' , '$telefono' , '$celular' , '$nacim' , '$grupo')"  ; // resumimos la consulta//
	    $resultado = mysql_query ($consulta) or die (mysql_error()) ;
		$naci = $_POST['dia'].'/'.$_POST['mes'].'/'.$_POST['anio'];
		$query_grupos = sprintf ("SELECT * FROM tb_grupos WHERE idGrupo=%s", $grupo);
		$grupos = mysql_query($query_grupos, $coso1) or die(mysql_error()); 
		$row_grupos = mysql_fetch_assoc($grupos);
		$gru = $row_grupos['nombreGrupo'];
		if (resultado){
		echo "Se cargo el contacto  : </br>" ;
		echo "Nombre : " .$nombre . "</br>";
		echo "Apellido : ".$apellido . "</br>";
		echo "Apodo : " .$apodo . "</br>";
		echo "Telefono : ".$telefono . "</br>";
		echo "Celular : ".$celular . "</br>";
		echo "Fecha de nacimiento : ".$naci . "</br>";
		echo "Grupo : " .$gru. "</br>";	}	
		else
		echo "te re kbio";

		
 ?>
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
