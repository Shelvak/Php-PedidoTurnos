<?php 
include ('connections/coso1.php');

mysql_select_db ($db,$coso1 );
$borrar = sprintf("DELETE FROM tb_grupos WHERE idGrupo=%s",$_GET['id']);
$Result1 = mysql_query($borrar, $coso1) or die(mysql_error());

header("Location: crea-grup.php");
?>