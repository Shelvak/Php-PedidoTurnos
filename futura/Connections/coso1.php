<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$host = "localhost";
$db = "curso";
$usuario = "root";
$contra = "magicad";
$coso1 = mysql_pconnect($host, $usuario, $contra) or trigger_error(mysql_error(),E_USER_ERROR); 
?>