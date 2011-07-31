<?php
include ('connections/coso1.php');
$anioActu = date (Y);
$mesActu = date (m);
$diaActu = date (d);

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
      <?php
        $query_contacto2 = "SELECT * FROM tb_contactos LEFT JOIN tb_grupos ON tb_contactos.idGrupo = tb_grupos.idGrupo ORDER BY Apellido";
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
    Cumpleaños
     <?php
          $a=0; $b=0; $c=0; $d=0; $e=0; $f=0; $g=0; $h=0; $i=0; $j=0; $k=0; $l=0;
while ($row_contacto1 = mysql_fetch_assoc($contacto1)){ 
list($anioNacio,$mesNacio,$diaNacio) = explode ("-", $row_contacto1['cumple']);
$cump = $anioActu - $anioNacio + 1;
$contacto = $diaNacio . "/" . $mesNacio . "  " . $row_contacto1['Nombre'] . " " . $row_contacto1['Apellido'] . "  ($cump)";
if ($mesNacio == '01') { $enero [$a] = $contacto;  $a +=1;}
if ($mesNacio == '02') { $febrero [$b] = $contacto; $b +=1;}
if ($mesNacio == '03') { $marzo [$c] = $contacto; $c +=1;}
if ($mesNacio == '04') { $abril [$d] = $contacto; $d +=1;}
if ($mesNacio == '05') { $mayo [$e] = $contacto; $e +=1;}
if ($mesNacio == '06') { $junio [$f] = $contacto; $f +=1;}
if ($mesNacio == '07') { $julio [$g] = $contacto; $g +=1;}
if ($mesNacio == '08') { $agosto [$h] = $contacto; $h +=1;}
if ($mesNacio == '09') { $septiembre [$i] = $contacto; $i +=1;}
if ($mesNacio == '10') { $octubre [$j] = $contacto; $j +=1;}
if ($mesNacio == '11') { $noviembre [$k] = $contacto; $k +=1;}
if ($mesNacio == '12') { $diciembre [$l] = $contacto; $l +=1;} }
?>

                       <p>&nbsp;</p>
      <form id="form1" name="form1" method="post" action="">
        <table width="95%" align="center" border="1">
          <tr>
            <th bgcolor="#555555" width="25%" scope="col">Enero</th>
            <th bgcolor="#555555" width="25%" scope="col">Febrero</th>
            <th bgcolor="#555555" width="25%" scope="col">Marzo</th>
            <th bgcolor="#555555" width="25%" scope="col">Abril</th>
          </tr>
		<tr> 
		<td> <?php for ($z=0; $z<=$a; $z++) echo $enero[$z] . "</br>"; ?></td>
		<td> <?php for ($z=0; $z<=$b; $z++) echo $febrero[$z] . "</br>"; ?></td>
		<td> <?php for ($z=0; $z<=$c; $z++) echo $marzo[$z] . "</br>"; ?></td>
		<td> <?php for ($z=0; $z<=$d; $z++) echo $abril[$z] . "</br>"; ?></td>
		</tr>
        </table>
        <p>&nbsp;</p>
        <table width="95%" align="center" border="1">
          <tr>
            <th bgcolor="#555555" width="25%" scope="col">Mayo</th>
            <th bgcolor="#555555" width="25%" scope="col">Junio</th>
            <th bgcolor="#555555" width="25%" scope="col">Julio</th>
            <th bgcolor="#555555" width="25%" scope="col">Agosto</th>
          </tr>
		<tr> 
		<td> <?php for ($z=0; $z<=$e; $z++) echo $mayo[$z] . "</br>"; ?></td>
		<td> <?php for ($z=0; $z<=$f; $z++) echo $junio[$z] . "</br>"; ?></td>
		<td> <?php for ($z=0; $z<=$g; $z++) echo $julio[$z] . "</br>"; ?></td>
		<td> <?php for ($z=0; $z<=$h; $z++) echo $agosto[$z] . "</br>"; ?></td>
		</tr>
        </table>
        <p>&nbsp;</p>
        <table width="95%" align="center" border="1">
          <tr>
            <th bgcolor="#555555" width="25%" scope="col">Septiembre</th>
            <th bgcolor="#555555" width="25%" scope="col">Octubre</th>
            <th bgcolor="#555555" width="25%" scope="col">Noviembre</th>
            <th bgcolor="#555555" width="25%" scope="col">Diciembre</th>
          </tr>
		<tr> 
		<td> <?php for ($z=0; $z<=$i; $z++) echo $septiembre[$z] . "</br>"; ?></td>
		<td> <?php for ($z=0; $z<=$j; $z++) echo $octubre[$z] . "</br>"; ?></td>
		<td> <?php for ($z=0; $z<=$k; $z++) echo $noviembre[$z] . "</br>"; ?></td>
		<td> <?php for ($z=0; $z<=$l; $z++) echo $diciembre[$z] . "</br>"; ?></td>
		</tr>
        </table>
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
