<?php 
include ('connections/conect.php');
mysql_select_db($db, $conect);

$borrar = sprintf("DELETE FROM pacientes WHERE id=%s",$_GET['id']);
$Result = mysql_query($borrar) or die(mysql_error());

if (result){
header("Location: todos.php");
}
?>