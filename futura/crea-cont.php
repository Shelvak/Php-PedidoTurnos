<?php 
include ('connections/coso1.php');
mysql_select_db($db, $coso1);
$query_grupos = "SELECT * FROM tb_grupos";
$grupos = mysql_query($query_grupos, $coso1) or die(mysql_error()); 
$row_grupos = mysql_fetch_assoc($grupos);
$totalRows_grupos = mysql_num_rows($grupos);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:ice="http://ns.adobe.com/incontextediting"><!-- InstanceBegin template="/Templates/principal.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Crear Contacto</title>
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
      <form id="form1" name="form1" method="post" action="insertar.php">
        <table align="center" width="60%" border="1">
          <tr>
            <td width="25%">Nombre</td>
            <td width="50%"><span id="sprytextfield1">
              <input type="text" name="nombre" id="nombre" size="50%" style="color:#3CC; background-color:#333;"/>
            <span class="textfieldRequiredMsg">Ingrese Nombre</span></span></td>
          </tr>
          <tr>
            <td width="25%">Apellido</td>
            <td width="50%"><span id="sprytextfield2">
              <input type="text" name="apellido" id="apellido" size="50%" style="color:#3CC; background-color:#333;"/>
            <span class="textfieldRequiredMsg">Ingrese Apellido</span></span></td>
          </tr>
          <tr>
          <td width="25%">Apodo</td>
          <td width="50%"><span id="sprytextfield5">
            <input type="text" name="apodo" id="apodo" size="50%" style="color:#3CC; background-color:#333;"/>
</span></td>
          <tr>
            <td width="25%">Telefono</td>
            <td width="50%"><span id="sprytextfield3">
            <input type="text" name="telefono" id="telefono" size="50%" style="color:#3CC; background-color:#333;"/>
            <span class="textfieldRequiredMsg">Ingrese telefono</span><span class="textfieldInvalidFormatMsg"><span class="textfieldRequiredMsg">Ingrese </span>Ingrese solo numero</span></span></td>
          </tr>
          <tr>
            <td width="25%">Celular</td>
            <td width="50%"><span id="sprytextfield4">
            <input type="text" name="celular" id="celular" size="50%" style="color:#3CC; background-color:#333;"/>
            <span class="textfieldRequiredMsg">Ingrese Celular</span><span class="textfieldInvalidFormatMsg">Ingrese solo numero</span></span></td>
          </tr>
          <tr>
            <td width="25%">Fecha de Nacimiento</td>
            <td width="50%">
            <select name="dia" style="color:#3CC; background-color:#333;">          
              <?php 
			  for ($dia=1 ; $dia <=31 ; $dia ++ ){
				  echo '<option value = '.$dia.'> '.$dia.'</option>';
			  }
			  ?> 
              </select> -
              <select name ="mes" style="color:#3CC; background-color:#333;">
                <?php 
			  for ($mes=1 ; $mes <=12 ; $mes ++ ){
				  echo '<option value = '.$mes.'> '.$mes.'</option>';
			  }
			  ?>
              </select> - 
          <select name="anio" style="color:#3CC; background-color:#333;">
          <?php 
			  for ($anio=1950 ; $anio <=2011 ; $anio ++ ){
				  echo '<option value = '.$anio.'> '.$anio.'</option>';
			  }
			  ?> 
      </select>
    </td>
          </tr>
          <tr>
            <td width="25%">Grupo</td>
            <td width="50%">
             <select name="grupo" class="datos" id="grupo"   style="color:#3CC; background-color:#333; ">
              <?php
do {  
?>
              <option value="<?php echo $row_grupos['idGrupo'] ?>" > <?php $gru = $row_grupos['nombreGrupo']; echo $gru ;?></option>
              <?php
} while ($row_grupos = mysql_fetch_assoc($grupos));
  $rows = mysql_num_rows($grupos);
  if($rows > 0) {
      mysql_data_seek($grupos, 0);
	  $row_grupos = mysql_fetch_assoc($grupos);
  }
?>
            </select>
            </td>
          </tr>
          <tr>
            <td colspan="2" align="center"><input type="submit" name="enviar" id="enviar" value="Crear"/> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="reset" name="reset" id="reset" value="Limpiar"/></td>
          </tr>
        </table>
            </form>
            
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <script type="text/javascript">
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {hint:"Nombre", validateOn:["blur"]});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "none", {hint:"Apellido", validateOn:["blur"]});
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "integer", {hint:"4223344", validateOn:["blur"]});
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "integer", {hint:"2615112233", validateOn:["blur"]});
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5", "none", {isRequired:false, validateOn:["change"]});
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
